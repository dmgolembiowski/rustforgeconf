<?php

use rfc\ws\partial;

partial\Header::render();
?>

    <section id="talks">
        <div class="row-spacing">
            <?php partial\Event_Nav::render(); ?>
            <div class="ragged-right">
                <h1>
                    Conference <br><span class="boost">Talks</span>
                </h1>
                <div class="product-block">
                    <div class="product-name">
                        PART 2 <strong>August 29–30, 2025</strong>
                    </div>
                    <div class="product-price">
                        $275 USD
                    </div>
                </div>
            </div>
        </div>
        <div class="regular-spacing">
            <p class="highlight">It’s time!</p>
            <p>Sit back and enjoy a conference featuring inspiring keynote presentations, insightful panel discussions,
                and inspiring presentations by passionate developers. Our conference is designed as a single track.
                There’s no risk of missing an important presentation, and we’ll have plenty of room to relax
                in-between.</p>
            <p>Lunch and refreshments included.</p>
        </div>

    </section>

<?php
partial\Footer::render();

