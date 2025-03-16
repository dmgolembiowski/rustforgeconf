<?php

use rfc\ws\partial;

partial\Header::render();
?>


    <section id="location">

        <div class="row-spacing">
            <?php partial\Location_Nav::render(); ?>
            <div>
                <h1>
                    The perfect <span class="boost">Place</span></h1>
                <p class="highlight">Join us in New Zealand!</p>
            </div>
        </div>


        <div class="columns__2">
            <div class="regular-spacing">
                <img src="/assets/images/wel_ington-500x533.png" alt="Cyclists at the top of Mt Victoria" style="opacity: 0.8;">
                <p class="highlight">Rust Forge will take place on <strong>August 27-30, 2025</strong> at
                    <strong><a href="/venue">Shed6</a> in Wellington, New Zealand.</strong></p>
                <dl id="where-and-when-dates">
                    <dt>27–28:</dt>
                    <dd>Training + Coding</dd>
                    <dt>29–30:</dt>
                    <dd>Presentations + Conversations</dd>
                </dl>
            </div>
            <div class="regular-spacing">
                <img src="/assets/images/princess-bay-500x333.png" alt="A couple sitting at Princess Bay at dusk." style="opacity: 0.8;">
                <div>
                    <h3 class="highlight">Why New Zealand?</h3>
                    <p>Wellington was selected for its beauty and accessibility. It features affordable and accessible
                        amenities, a deep/rich culture, and undeniable natural beauty. It’s a perfect place to gather,
                        learn, and forge the next big thing.</p>
                </div>
            </div>
        </div>

    </section>

<?php
partial\Footer::render();

