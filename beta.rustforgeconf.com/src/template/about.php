<?php

use rfc\ws\partial;

partial\Header::render(title: "About Us");
?>

    <section>
        <div class="row-spacing">
            <?php partial\Top_Level_Nav::render(); ?>
            <div>
                <h1>
                    <span class="boost">Who</span> is Involved? </h1>
            </div>
        </div>

        <div class="columns__1-4">

            <div>
                <div class="image-frame">
                    <img src="/assets/images/tim-mcnamara.jpeg" alt="Tim McNamara">
                </div>

            </div>
            <div>
                <p class="highlight">
                    It’s people you know! </p>
                <p>Rust Forge is organized by Tim McNamara. Tim is the author of Rust in Action, an international
                    educator, the mind behind free online resources like TimClicks (YouTube), and the lead consultant of
                    Accelerant. </p>

            </div>
        </div>

        <div class="columns__2">
            <div>
                <h3>HOSTED BY</h3>
                <p>Rust Forge is an educational events series hosted by Accelerant.</p>
            </div>
            <div>
                <h3>LEGAL DETAILS</h3>
                <p>Accelerant Limited is a New Zealand limited company with registered offices in Lower Hutt, New
                    Zealand.</p>
            </div>
            <div>
                <h3>Business Identifiers</h3>
                <ul class="arrow">
                    <li>D-U-N-S Number 758620449</li>
                    <li>GST Number 139-343-670</li>
                    <li>NZBN 9429051341565</li>
                </ul>
            </div>
            <div>
                <h3>Contact Details</h3>
                <p>Timothy McNamara<br> Managing Director<br> <a href="mailto:tim@accelerant.dev">tim@accelerant.dev</a>
                </p>
            </div>
        </div>

    </section>

<?php
partial\Footer::render();
