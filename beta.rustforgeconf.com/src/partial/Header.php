<?php

namespace rfc\ws\partial;

class Header
{
    public static function render(
            string $title = '',
            string $head = '',
            bool $is_home = False, 
    )
    {
        ?>
        <!DOCTYPE html>
        <html lang="en" prefix="og: https://ogp.me/ns#">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title><?php echo $title; ?> — Rust Forge Conference | Wellington, New Zealand | August 2025</title>
            <script src="https://unpkg.com/htmx.org@2.0.4"></script>
            <link rel="stylesheet" href="/styles"/>
            
            <?php if($is_home): ?>
                <meta property="og:title" content="Rust Forge 2025"/>
                <meta property="og:url" content="https://www.rustforgeconf.com/"/>
                <meta property="og:description" name="twitter:description" content="A tech conference for developers building with the Rust programming language hosted in Wellington, New Zealand from 27-30th August 2025."/>
                <meta property="og:locale" content="en"/>
                <meta property="og:image" name="twitter:image" content="https://www.rustforgeconf.com/assets/images/rust-forge-conference-2025-1000x500.png"/>
                <meta property="og:image:width" content="1000"/>
                <meta property="og:image:height" content="500"/>
                <meta property="fb:app_id" content="61562783053986"/>
                <meta name="twitter:card" content="summary_large_image">
                <meta name="twitter:site" content="@rustforgeconf">
                <meta name="twitter:title" content="Rust Forge 2025"/>
                <link rel="canonical" href="https://www.rustforgeconf.com/"/>

                <script type="application/ld+json">
                    {
                        "@context": "https://schema.org",
                        "@type": "Event",
                        "name": "Rust Forge 2025",
                        "description": "A tech conference for developers building with the Rust programming language hosted in Wellington, New Zealand from 27-30th August 2025.",
                        "image": "https://www.rustforgeconf.com/assets/images/rust-forge-conference-2025-1000x500.png",
                        "startDate": "2025-08-27",
                        "endDate": "2025-08-30",
                        "eventAttendanceMode": "https://schema.org/MixedEventAttendanceMode",
                        "eventStatus": "https://schema.org/EventScheduled",
                        "location": [
                            {
                                "@type": "VirtualLocation",
                                "url": "https://discord.gg/fwd8tGC4Ya"
                            },
                            {
                                "@type": "Place",
                                "name": "Shed 6",
                                "address": {
                                    "@type": "PostalAddress",
                                    "streetAddress": "4 Queens Wharf",
                                    "addressLocality": "Wellington Central",
                                    "postalCode": "5011",
                                    "addressRegion": "Wellington",
                                    "addressCountry": "New Zealand"
                                }
                            }
                        ],
                        "offers": [
                            {
                                "@type": "Offer",
                                "price": 225,
                                "priceCurrency": "USD",
                                "availability": "https://schema.org/InStock",
                                "url": "https://rust-forge-2025.lilregie.com"
                            }
                        ],
                        "organizer": {
                            "@type": "Organization",
                            "name": "Accelerant Limited",
                            "url": "https://accelerant.dev"
                        }
                    }
                </script>
            <?php else: ?>
                <meta property="og:title" content="<?php echo $title; ?>"/>
            <?php endif; ?>
            
            <?php echo $head; ?>
            <?php Background::render_js(); ?>
        </head>

        <body hx-boost="true" hx-push-url="true" hx-select="#viewport-column" hx-target="#viewport-column" hx-swap="innerHTML">

        <?php
        Background::render();
        Nav::render();
        Floating_Footer::render();
        ?>
        <div id="viewport-column">
        <div id="main">
        <?php
    }
}