<?php

use rfc\ws\partial;

partial\Header::render(title: "Privacy Policy");
?>
    <div class="section" id="legal">

        <div id="details-layout">
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
                <p>
                Timothy McNamara<br> Managing Director<br> <a href="mailto:tim@accelerant.dev">tim@accelerant.dev</a>
                </p>
            </div>
        </div>

    </div>
<?php
partial\Footer::render();
