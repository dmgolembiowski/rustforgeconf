<?php

use rfc\ws\partial;

partial\Header::render( title: "Team Spaces");
?>

    <section>
        <div class="row-spacing">

            <div class="ragged-right">
                <h1>
                    Team <span class="boost">Spaces</span>
                </h1>

                <div class="product-block">
                    <div class="product-name">
                        PART 1 <strong>August 27–28, 2025</strong>
                    </div>
                    <div class="product-price">
                        $4,000 USD
                    </div>
                    <div class="product-price">
                        $6,250 USD
                    </div>
                </div>
            </div>
        </div>

        <div class="regular-spacing">
            <div class="regular-spacing">
                <p class="highlight">
                    Bring your team together and gather in one of our two batteries included team spaces. </p>
                <ul class="arrow">
                    <li>Team offsite/allhands meeting</li>
                    <li>Presentations to customers & prospects + create a branded satellite event for the public,
                        conference attendees or just your team
                    </li>
                </ul>
            </div>
        </div>

        <div class="columns__3-2">
            <div>
                <h3>2 Day Team Spaces Include:</h3>
                <ul class="plus">
                    <li>Access on August 27–28, 2025 from 9am to 6pm</li>
                    <li>A/V support</li>
                    <li>Branded conference badges</li>
                    <li>Security/registration</li>
                </ul>
            </div>

            <div>
                <h3>Did you know?!</h3>
                <p class="highlight">Reserving a team space is the best way to support Rust Forge. Each room includes a
                    sponsorship credit!</p>
            </div>
        </div>

        <div class="columns__3 narrow">

            <div class="feature-box" id="room1">
                <div class="feature-box__body">
                    <h3 class="feature-box__heading">
                        <strong>Room 1:</strong></h3>
                    <ul class="plus">
                        <li class="highlight">$5,000k USD Sponsorship Credit</li>
                        <li>Main conference room</li>
                        <li>Theatre screen</li>
                        <li>36 seats</li>
                        <li>5 conference passes</li>
                    </ul>
                </div>
                <div class="feature-box__footer">
                    <div class="feature-box__footer-blocks">
                        <div class="feature-box__footer-block-solid">$6,250 USD</div>
                    </div>
                </div>
            </div> <!-- /.feature-box -->

            <div class="feature-box" id="room2">
                <div class="feature-box__body">
                    <h3 class="feature-box__heading">
                        <strong>Room 2:</strong></h3>
                    <ul class="plus">
                        <li class="highlight">$3,000k USD Sponsorship Credit</li>
                        <li>Breakout room</li>
                        <li>Large screen</li>
                        <li>24 seats</li>
                        <li>2 conference passes</li>
                    </ul>
                </div>
                <div class="feature-box__footer">
                    <div class="feature-box__footer-blocks">
                        <div class="feature-box__footer-block-solid">
                            $4,000 USD
                        </div>
                    </div>
                </div>
            </div> <!-- /.feature-box -->

            <div class="feature-box dashed">
                <div class="feature-box__body">
                    <h3 class="feature-box__heading">
                        <em>Option&lt;Catering&gt;</em></h3>
                    <ul class="plus">
                        <li>Lunch</li>
                        <li>In room refreshments</li>
                        <li>Drinks and snacks</li>
                    </ul>
                </div>
                <div class="feature-box__footer">
                    <div class="feature-box__footer-blocks">
                        <div class="feature-box__footer-block-solid">
                            $60 USD/pp/day
                        </div>
                    </div>
                </div>
            </div> <!-- /.feature-box -->

        </div> <!-- /#available-spaces -->

    </section> <!-- /#spaces -->

<?php
partial\Footer::render();

