<?php

use rfc\ws\partial;

partial\Header::render();
?>


    <section id="workshop">

        <div class="row-spacing">
            <?php partial\Event_Nav::render(); ?>
            <div class="ragged-right">
                <h1>
                    How to Adopt Rust <span class="boost">Workshop</span>
                </h1>
                <div class="product-block">
                    <div class="product-name">
                        PART 1 <strong>August 27–28, 2025</strong>
                    </div>
                    <div class="product-price">
                        $450 USD
                    </div>
                </div>
            </div>
        </div>

        <div class="regular-spacing">
            <p class="highlight">Learn directly from the author of <em>Rust in Action</em> and conference organizer Tim
                McNamara!</p>
            <p>
                Participate in a full day workshop split over two sessions where Tim will present pragmatic approaches
                and techniques to adopting Rust and using Rust creatively. The workshop is split over two days to create
                time to collaborate with your peers and connect with your community. Lunch and refreshments
                included. </p>
        </div>

    </section>

<?php
partial\Footer::render();

