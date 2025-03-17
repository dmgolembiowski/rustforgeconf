<?php

namespace rfc\ws;

include_once("vendor/autoload.php");

$routes = [
    '/styles' => 'styles.php',

    '/' => 'home.php',

    '/news'      => 'news__archive.php',
    '/news/(.*)' => 'news__article.php',

    '/speak'       => 'participate__speak.php',
    '/attend'      => 'participate__attend.php',
    '/sponsor'     => 'participate__sponsor.php',
    '/become-a-sponsor' => 'participate__become-a-sponsor.php',

    '/events'                     => 'event__hub.php',
    '/social'                     => 'event__social.php',
    '/workshop'                   => 'event__workshop.php', // TODO: remove
    '/how-to-adopt-rust-workshop' => 'event__workshop.php',
    '/talks'                      => 'event__talks.php',
    '/team-spaces'                => 'event__team_spaces.php',

    '/location'    => 'location__hub.php',
    '/venue'       => 'location__venue.php',
    '/travel'      => 'location__travel.php',
    '/travel/intl' => 'location__intl.php',
    '/travel/visa' => 'location__visa.php',
    '/accommodation'     => 'location__accommodation.php',
    //    '/dining'    => 'location__dining.php',
    //    '/activities'  => 'location__activities.php',
    //    '/culture'    => 'location__culture.php',

    '/conduct-and-safety' => 'conduct-and-safety.php',


    '/about' => 'about.php',

    '/privacy-policy' => 'privacy-policy.php',

    '/404' => '404.php',

    '/mailing-list' => 'mailing-list.php',

    '/cfp'      => 'redirect__cfp.php',
    '/register' => 'redirect__register.php',
    '/discord'  => 'redirect__discord.php',
    '/linkedin' => 'redirect__linkedin.php',
    '/x'        => 'redirect__x.php',
];

Router::run($routes, $_SERVER);