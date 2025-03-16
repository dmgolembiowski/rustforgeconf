<?php

namespace rfc\ws;

class Styles
{
    const ROOT = __DIR__ . '/styles/';

    public static function get(string $name): string
    {
        return file_get_contents(self::ROOT . '/' . $name . '.css');
    }

    public static function load(array $files, bool $echo = true): string {
        $styles = '';

        foreach ($files as $file) {
            $styles .= self::get($file);
        }

        if ($echo) {
            echo $styles;
        }
        return $styles;
    }
}
