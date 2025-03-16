<?php

namespace rfc\ws\partial;

class Background
{
    public static function render()
    {
        ?>

        <div id="floating-header">
            <a href="#" id="tone-it-down">Hey, tone it down!</a>
        </div>

        <div id="pattern">

        </div>
        <div id="scan-lines">
        </div>

        <div id="background">
            <div id="background-overlay-pattern"></div>
        </div>
        <?php
    }

    public static function render_js()
    {
        ?>
        <script>

            function egg() {
                const body = document.querySelector('body');
                const logo = document.getElementById('intro-logo');
                const logo_parts = Array.from(logo.querySelectorAll('path, polygon'));
                const deyas = document.getElementById('tone-it-down');

                function yas_manager_controller_module() {

                    let is_yasified = logo_parts.reduce((is_it, el) => el.classList.contains('yas') && is_it, true);
                    if (is_yasified) {
                        body.classList.add('yas');
                    } else {
                        // shell_up();
                        body.classList.remove('yas');
                    }
                }

                if (body.classList.contains('yas')) {
                    logo_parts.forEach(el => el.classList.add('yas'));
                }

                logo_parts.forEach(el => {
                    el.addEventListener('mouseenter', e => {

                        if (!el.classList.contains('yas')) {
                            el.classList.add('yas');
                        }
                        yas_manager_controller_module();
                    });
                    el.addEventListener('click', e => {
                        el.classList.toggle('yas');
                        yas_manager_controller_module();
                    })
                });

                deyas.addEventListener('click', e => {
                    logo_parts.forEach(el => el.classList.remove('yas'));
                    body.classList.remove('yas');
                });

                window.setTimeout(() => {
                    logo_parts.forEach(el => el.classList.add('yas'));
                    body.classList.add('yas');
                }, 20 * 60 * 1000);
            }

            document.addEventListener('htmx:afterRequest', function (e) {
                if (!e.detail.boosted || e.detail.pathInfo.requestPath !== "/") {
                    return;
                }

                egg();
            });

            document.addEventListener('DOMContentLoaded', egg);
        </script>
        <?php
    }
}
