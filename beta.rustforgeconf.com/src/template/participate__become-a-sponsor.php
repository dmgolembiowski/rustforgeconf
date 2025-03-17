<?php

use rfc\ws\partial;

partial\Header::render( title: "Become a Sponsor");
?>

    <section>
    <div class="row-spacing">

        <?php partial\Header_Nav::render(); ?>
        <div class="ragged-right">
            <h1>
                You're <span class="boost">Rad</span>
            </h1>
            <p class="highlight">Thank you for considering sponsoring Rust Forge!</p>

        </div>
        <div>
            <p>
                Please email <a href="mailto:sponsor@rustforgeconf.com?Subject=Sponsoring Rust
                    Forge 2025">&lt;sponsor@rustforgeconf.com&gt;</a> to set-up your sponsorship. We'll discuss how to
                enable all of your perks and to make sure that you're making the most of your support for the event and
                the local Rust community. </p>
        </div>
    </div>


<?php
partial\Footer::render();

