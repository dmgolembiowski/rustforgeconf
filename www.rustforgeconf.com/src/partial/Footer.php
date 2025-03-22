<?php

namespace rfc\ws\partial;

class Footer
{
    public static function render()
    {
        ?>

        </div> <!-- /#main -->

        <?php // Event_Supporters::render();
        ?>

        <footer class="row-spacing">
            <section id="sponsors">
                <div class="row-spacing">
                    <div class="tight-spacing">
                        <h2 class="small">Our lovely sponsors make this all possible:
                            <a class="button" href="/sponsor" alt="Sponsor Rust Forge Conf 2025">Become a Sponsor ►</a>
                        </h2>
                    </div>

                    <div class="tight-spacing" style="display: flex; flex-direction: column; align-items: center">
                        <h3 class="small">Furnace</h3>
                        <div class="logo-grid">
                            <img src="assets/images/sponsors/linux-foundation.svg">
                        </div>
                    </div>

                    <div class="tight-spacing" style="display: flex; flex-direction: column; align-items: center">
                        <h3 class="small">Ember</h3>
                        <div class="logo-grid">
                            <img src="assets/images/sponsors/jetbrains.svg">
                        </div>
                    </div>

                    <div class="tight-spacing">
                        <h3 class="small">Spark</h3>
                        <ul class="arrow">
                            <li>Neil Henderson, Blue Tarp Media</li>
                            <li>John Funk, Underscorefunk Design</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section>
                <div class="columns__2">
                    <div class="tight-spacing">
                        <h2 class="small">Industry partners:</h2>
                        <p class="small">Thanks to the support of our transportation and hospitality partners for making
                            Rust Forge 2025 accessible and affordable to our delegates.</p>
                        <div class="logo-grid">
                            <img src="assets/images/sponsors/cathay.png"> <img src="assets/images/sponsors/qantas.svg">
                        </div>
                    </div>
                    <div class="tight-spacing">
                        <h2 class="small">Event and planning supporters:</h2>
                        <p class="small">Thank you to the many people who are supporting the event in its inaugural
                            year. Rust Forge Conf 2025 is going to be a special event, in large part because of the
                            invisible effort of many people.</p>
                        <p class="small">A huge thank you to Wellington's regional tourism agency, WellingtonNZ and its
                            Business Events Wellington team for facilitating so many connections that have enabled this
                            event.</p>
                        <div class="logo-grid">
                            <img src="assets/images/sponsors/wellingtonnz.svg">
                            <img src="assets/images/sponsors/business-events-wellington.png">
                        </div>
                    </div>
                </div>

            </section>
            <section id="footer">
                <div class="tight-spacing">
                    <p class="small">
                        &copy; 2024-2025 <a href="https://accelerant.dev/" target="_blank">Accelerant Limited.</a> All
                        rights reserved. Design and Development by <a href="https://underscorefunk.com" target="_blank">Underscorefunk
                            Design</a>. Icons provided by
                        <a href="https://iconmonstr.com" target="_blank">Iconmonstr</a>. </p>
                    <p class="small">
                        Copyright © 2025 JetBrains s.r.o. JetBrains and the JetBrains logo are trademarks of JetBrains
                        s.r.o. The Linux Foundation and The Linux Foundation logo design are registered trademarks of
                        The Linux Foundation. Linux is a registered trademark of Linus Torvalds. </p>
                </div>
            </section>
        </footer></div> <!-- /#viewport column --></body></html>

        <?php
    }
}
