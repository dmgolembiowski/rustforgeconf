<?php

namespace rfc\ws;

class News
{
    const PATH               = __DIR__ . '/../content/news/';
    const CACHE_PATH         = __DIR__ . '/../cache/news/';
    const FRONT_MATTER_SPLIT = "---\n";

    public static function get_from_request(string $request_uri): array
    {

        $request_uri = trim(Router::sanitize_request_uri($request_uri), '/');
        $parts       = explode('/', $request_uri);
        $slug        = $parts[1] ?? 'missing-article';

        $missing_article = [
            'title' => "Missing article",
            'slug'  => 'missing-article'
        ];

        return array_reduce(self::get_all(),
            function ($article, $maybe_article) use ($missing_article, $slug) {

                if (
                    $article === $missing_article &&
                    !empty($maybe_article['slug']) &&
                    $maybe_article['slug'] === $slug) {
                    return $maybe_article;
                }
                return $article;
            },
            $missing_article
        );

        /*
        $cache_file = self::CACHE_PATH . md5($request_uri). '.json';
        if (file_exists($cache_file) && filemtime($cache_file) > time() - 60) {
            return json_decode(file_get_contents($cache_file), true);
        }

        $article = self::get_from_filename($request_uri);

        file_put_contents($cache_file, json_encode($article));
        */
    }

    public static function get_all(): array
    {
        $file_names         = scandir(self::PATH);
        $article_file_names = array_filter($file_names, fn($fn) => strpos($fn, '.md'));
        asort($article_file_names);
        $article_file_names = array_reverse($article_file_names);
        $articles           = array_map([__CLASS__, 'parse_article'], $article_file_names);
        $articles           = array_filter($articles, [__CLASS__, 'is_valid']);

        return $articles;
    }

    public static function get_recent($limit = 5): array
    {
        return array_slice(
            self::get_all(),
            0,
            $limit
        );

    }

    public static function is_valid(array $article): bool
    {
        if ( empty($article['slug'] ?? '') ||
            empty($article['title'] ?? '') ||
            empty($article['content_formatted'] ?? '') ||
            empty($article['date'] ?? '')
        ) {
            return false;
        }

        if ( strtotime( $article['date']) >= strtotime('tomorrow')) {
            return false;
        }
        return true;
    }

    public static function parse_article(string $filename): array
    {
        $content      = file_get_contents(self::PATH . $filename);
        $front_matter = self::parse_front_matter($content);
        $content      = substr($content, $front_matter['content_start'] ?? 0);
        $date         = substr($filename, 0, 10);

        $article = $front_matter;

        $article['slug']              ??= '';
        $article['date']              = $date;
        $article['content_raw']       = $content;
        $article['content_formatted'] = (new \Parsedown())->text($content);
        $article['url']               = '/news/' . $article['slug'];
        return $article;
    }

    public static function parse_front_matter(string $content): array
    {
        if (strpos($content, self::FRONT_MATTER_SPLIT) !== 0) {
            return [];
        }

        $start = strlen(self::FRONT_MATTER_SPLIT);
        $end   = strpos($content, self::FRONT_MATTER_SPLIT, $start);

        $front_matter                  = trim(substr($content, $start, $end - $start));
        $front_matter                  = explode("\n", $front_matter);
        $front_matter                  = array_map([__CLASS__, 'parse_front_matter_field'], $front_matter);
        $front_matter                  = self::flatten_front_matter($front_matter);
        $front_matter['content_start'] = $end + $start;
        $front_matter['title']         ??= '';
        $front_matter['slug']          ??= '';
        $front_matter['date']          ??= '';
        return $front_matter;
    }

    public static function parse_front_matter_field(string $str): array
    {
        $re = '/([^: ]+): (.*)/m';
        preg_match($re, $str, $matches);
        if (sizeof($matches) !== 3) {
            return [];
        }
        return [$matches[1], $matches[2]];
    }

    public static function flatten_front_matter(array $fields): array
    {

        return array_reduce($fields, function ($carry, $item) {

            $carry[$item[0]] = trim($item[1]);
            return $carry;
        }, []);
    }

}