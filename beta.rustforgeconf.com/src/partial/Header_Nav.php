<?php

namespace rfc\ws\partial;

class Header_Nav
{
    const NAV_ITEMS = [
        'speak'    => ["/speak", "Speak"],
        'attend'   => ["/attend", "Attend"],
        'sponsor'  => ["/sponsor", "Sponsor"],
        'events'   => ["/events", "Events", [
            'social'      => ["/social", "Social"],
            'team-spaces' => ["/team-spaces", "Team Spaces"],
            'workshop'    => ["/how-to-adopt-rust-workshop", "Workshop"],
            'talks'       => ["/talks", "Talks"]
        ]],
        'location' => ["/location", "Location", [
            'venue'         => ["/venue", "Venue"],
            'travel'        => ["/travel", "Travel"],
            'accommodation' => ["/accommodation", "Accommodation"],
        ]],
        'news'     => ["/news", "News"],
        'about'    => ["/about", "About"]
    ];

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
        $child_nav_items = self::NAV_ITEMS[$parent_item][2] ?? [];

        echo '<div>';
        echo '<nav class="horizontal-nav">';

        self::render_link(
            'home',
            '/',
            '~',
            self::classes('', $active_item, $parent_item)
        );

        if ( !empty($child_nav_items) && !empty( $parent_item )  ) {
            $p = self::NAV_ITEMS[$parent_item];
            self::render_link(
                $parent_item,
                $p[0],
                $p[1],
                self::classes($parent_item, $active_item, $parent_item)
            );
          
        echo '<ul>';
        self::render_nav_items(self::NAV_ITEMS, $uri, $active_item, $parent_item);
        echo '</ul></nav>';


        $child_nav_items = self::NAV_ITEMS[$parent_item][2] ?? [];

        if (!empty($child_nav_items)) {
            echo '<nav class="horizontal-nav sub-nav">';
            echo '<ul>';
            self::render_nav_items($child_nav_items, $uri, $active_item, $parent_item);
            echo '</ul>';
            echo '</nav>';
        } else {

            echo '<ul>';
            self::render_nav_items(self::NAV_ITEMS, $uri, $active_item, $parent_item);
            echo '</ul></nav>';
        }

        echo '</div>';

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
