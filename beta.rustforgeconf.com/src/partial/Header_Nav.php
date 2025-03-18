<?php

namespace rfc\ws\partial;

class Header_Nav
{
    const NAV_ITEMS = [
        'speak'    => ["/speak", "Speak", []],
        'attend'   => ["/attend", "Attend", []],
        'sponsor'  => ["/sponsor", "Sponsor", []],
        'events'   => ["/events", "Events", [
            'social'      => ["/social", "Social", []],
            'team-spaces' => ["/team-spaces", "Team Spaces", []],
            'workshop'    => ["/how-to-adopt-rust-workshop", "Workshop", []],
            'talks'       => ["/talks", "Talks", []],
        ]],
        'location' => ["/location", "Location", [
            'venue'         => ["/venue", "Venue", []],
            'travel'        => ["/travel", "Travel", [
                'travel/intl' => ["/travel/intl", "Recommended Timetable", []],
                'travel/visa' => ["/travel/visa", "Visa Requirements", []]],
            ],
            'accommodation' => ["/accommodation", "Accommodation", []],
        ]],
        'news'     => ["/news", "News", []],
        'about'    => ["/about", "About", []],
    ];

    const BREADCRUMBS = [
        '/'                           => [['/', '~']],
        '/attend'                     => [['/', '~'], ['/attend', 'Attend']],
        '/speak'                      => [['/', '~'], ['/speak', 'Speak']],
        '/sponsor'                    => [['/', '~'], ['/sponsor', 'Sponsor']],
        '/events'                     => [['/', '~'], ['/events', 'Events']],
        '/social'                     => [['/', '~'], ['/events', 'Events'], ['/social', 'Social']],
        '/team-spaces'                => [['/', '~'], ['/events', 'Events'], ['/team-spaces', 'Team Spaces']],
        '/workshop'                   => [['/', '~'], ['/events', 'Events'], ['/how-to-adopt-rust-workshop', 'Workshop']],
        '/how-to-adopt-rust-workshop' => [['/', '~'], ['/events', 'Events'], ['/how-to-adopt-rust-workshop', 'Workshop']],
        '/talks'                      => [['/', '~'], ['/events', 'Events'], ['/talks', 'Talks']],
        '/location'                   => [['/', '~'], ['/location', 'Location']],
        '/venue'                      => [['/', '~'], ['/location', 'Location'], ['/venue', 'Venue']],
        '/travel'                     => [['/', '~'], ['/location', 'Location'], ['/travel', 'Travel']],
        '/travel/intl'                => [['/', '~'], ['/location', 'Location'], ['/travel', 'Travel'], ['/travel/intl', 'Recommended Timetable']],
        '/travel/visa'                => [['/', '~'], ['/location', 'Location'], ['/travel', 'Travel'], ['/travel/visa', 'Visa Requirements']],
        '/accommodation'              => [['/', '~'], ['/location', 'Location'], ['/accommodation', 'Accommodation']],
        '/news'                       => [['/', '~'], ['/news', 'News']],
        '/about'                      => [['/', '~'], ['/about', 'About']],
    ];

    public static function breadcrumbs(string $uri): array
    {
        // TODO: create this array dynamically, rather than pre-computing a table

        // all articles should point to the news
        if (!empty(stristr($uri, '/news'))) {
            $uri = '/news';
        }

        $crumbs = self::BREADCRUMBS[$uri] ?? [['/', '~']];
        return $crumbs;
    }

    public static function parent_item(string $uri, string $active_item): string
    {
        foreach (self::NAV_ITEMS as $name => $details) {
            $children = $details[2] ?? [];
            if (empty($children)) {
                continue;
            }
            if (in_array($uri, array_column($children, 0))) {
                return $name;
            }
        }
        return $active_item;
    }

    public static function child_items(string $uri): array
    {
        // breadth-first search, e.g. try the top-level headings first
        $queue = new \SplQueue();
        
        foreach (self::NAV_ITEMS as $key => $item) {
            $queue->enqueue([$key, $item]);
        }
        
        while (!$queue->isEmpty()) {
            [$_item_name, $item_details] = $queue->dequeue();
            
            if ($item_details[0] === $uri) {
                return $item_details[2];
            }
            
            foreach ($item_details[2] as $next_item_name =>$next_item_details) {
                $queue->enqueue([$next_item_name, $next_item_details]);
            }
        }
        
        return [];
    }

    public static function active_item(string $uri): string
    {
        foreach (self::NAV_ITEMS as $name => $details) {
            if ($uri === $details[0]) {
                return $name;
            }
            if (empty($details[2])) {
                continue;
            }
            foreach ($details[2] as $child_name => $child_details) {
                if ($uri === $child_details[0]) {
                    return $child_name;
                }
            }
        }
        return '';
    }

    public static function classes(string $name, string $active, string $parent): string
    {
        if ($name === $active) {
            return 'active';
        }
        if ($name === $parent) {
            return 'ancestor';
        }
        return '';
    }

    public static function render()
    {
        $uri         = $_SERVER['REQUEST_URI'];
        $active_item = self::active_item($uri);
        $parent_item = self::parent_item($uri, $active_item);
        $child_items = self::child_items($uri);

        $crumbs = self::breadcrumbs($uri);

        echo '<div id="powerline">';
        echo '<nav class="horizontal-nav" >';

        foreach ($crumbs as $crumb) {
            self::render_link('', $crumb[0], $crumb[1], 'ancestor');
        }

        if (!empty($child_items)) {
            echo '<nav class="horizontal-nav sub-nav">';
            echo '<ul>';
            self::render_nav_items($child_items, $uri, $active_item, $parent_item);
            echo '</ul>';
            echo '</nav>';
        } else if ($uri === '/') {
            echo '<nav class="horizontal-nav sub-nav">';
            echo '<ul>';
            self::render_nav_items(self::NAV_ITEMS, $uri, $active_item, $parent_item);
            echo '</ul></nav>';
        }

        echo '</div>'; // powerline
    }

    public static function render_nav_items(
        array  $nav_items,
        string $uri,
        string $active_item,
        string $parent_item
    )
    {
        foreach ($nav_items as $name => $link) {
            $href = $link[0];

            $label   = $link[1];
            $classes = self::classes($name, $active_item, $parent_item);

            printf(
                '<li><a class="%s" href="%s">%s</a></li>',
                $classes, $href, $label
            );
        }
    }

    public static function render_link(
        string $name = "",
        string $url = "",
        string $label = "",
        string $classes = "")
    {
        printf(
            '<a class="%s" href="%s">%s</a>',
            $classes, $url, $label
        );
    }
}
