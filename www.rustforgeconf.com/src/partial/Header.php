<?php

namespace rfc\ws\partial;


class Header
{
    public static function render(
            string $title = '',
            string $description = '',
            string|null $canonical_url = null,
            string $image_url = 'https://www.rustforgeconf.com/assets/images/rust-forge-conference-2025-1000x500.png',
            int $image_width = 500,
            int $image_height = 1000,
    )
    {
        $uri = $_SERVER['REQUEST_URI'];
        $url = $canonical_url ?? 'https://' . $_SERVER['HTTP_HOST'] . $uri;
        $is_home = $uri === '/';

        if ($is_home) {
            if (empty($description)) {
                $description = 'A tech conference for developers building with the Rust programming language hosted in Wellington, New Zealand from 27-30th August 2025.';
            }

            if (empty($title)) {
                $title = 'Rust Forge 2025';
            }
        }

        if (!empty($title)) {
            $full_title = $title . ' — Rust Forge Conference | Wellington, New Zealand | August 2025';
        } else {
            $title = 'Rust Forge Conference | Wellington, New Zealand | August 2025';
            $full_title = 'Rust Forge Conference | Wellington, New Zealand | August 2025';
        }

        ?>
        <!DOCTYPE html>
        <html lang="en" prefix="og: https://ogp.me/ns#">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title><?php echo $full_title; ?></title>
            <script src="https://unpkg.com/htmx.org@2.0.4"></script>
            <link rel="stylesheet" href="/styles"/>
            <meta property="og:title" name="twitter:title" content="<?php echo $title; ?>"/>
            <?php if($description) { echo '<meta property="og:description" name="description" content="' . $description . '"/>'; } ?>
            <meta property="og:locale" content="en"/>
            <meta property="og:url" content="<?php echo $url; ?>"/>
            <meta name="twitter:site" content="@rustforgeconf">
            <meta property="fb:app_id" content="61562783053986"/>
            <link rel="canonical" href="<?php echo $url; ?>"/>
            <?php if($is_home): ?>
                <meta property="og:image" name="twitter:image" content="<?php echo $image_url; ?>"/>
                <meta property="og:image:width" content="<?php echo $image_width; ?>"/>
                <meta property="og:image:height" content="<?php echo $image_height; ?>"/>
                <meta name="twitter:card" content="summary_large_image">
                
                <script type="application/ld+json">
                {
                    "@context": "https://schema.org",
                    "@type": "Event",
                    "name": "Rust Forge 2025",
                    "description": "A tech conference for developers building with the Rust programming language hosted in Wellington, New Zealand from 27-30th August 2025.",
                    "image": [
                        "https://www.rustforgeconf.com/assets/images/rust-forge-conference-2025-1000x500.png"
                    ],
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
                            "name": "Early Bird Registration",
                            "price": 225,
                            "priceCurrency": "USD",
                            "validFrom": "2025-03-01",
                            "validUntil": "2025-04-30",
                            "url": "https://rust-forge-2025.lilregie.com"
                        },
                        {
                            "@type": "Offer",
                            "name": "Individual Registration",
                            "price": 275,
                            "priceCurrency": "USD",
                            "validFrom": "2025-05-01",
                            "validUntil": "2025-07-31",
                            "url": "https://rust-forge-2025.lilregie.com"
                        },
                        {
                            "@type": "Offer",
                            "name": "Late Registration",
                            "price": 295,
                            "priceCurrency": "USD",
                            "validFrom": "2025-08-01",
                            "validUntil": "2025-08-30",
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
            <?php endif; ?>
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
                <section style="padding-bottom: 0">
                <?php Header_Nav::render(); ?>
                </section>

        <?php
    }
}