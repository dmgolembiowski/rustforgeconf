<?php

use rfc\ws\partial;

partial\Header::render();
?>


    <section id="travel">
        <div class="row-spacing">
            <?php partial\Location_Nav::render(); ?>
            <div>
                <h1>Travel <span class="boost">Guidance</span></h1>
                <p>The city's airport is <em>WLG</em> (Wellington International Airport). Delegates from outsize of New Zealand should review our <a href="/travel/intl">international traveller recommendations/guidelines</a> and <a href="/travel/visa">visa requirements</a>.</p>
            </div>
        </div>

        <p class="notice-box">Important: Please choose the offers(s) that suit you best! Neither Accelerant Limited, as the legal entity behind Rust Forge Conf, nor any member of the team receives any financial reward (e.g. kickbacks/referral payments) for any sales generated because of these listings. These offers are for your benefit only.</p>


        <div>
            <h3>Travel Offers</h3>
            <p>Rust Forge 2025 is delighted to have Cathay Pacific Airways and Qantas as international travel
            partners.</p>
        </div>

        <div id="travel-offers">

            <div class="feature-box">
                <div class="feature-box__body">

                    <h3 class="feature-box__heading">
                        <strong>Cathay Pacific</strong> <em>Worldwide</em>
                    </h3>

                    <p>Up to 10% off the listed sale price on CX-ticketed return flights to New Zealand from ports
                    worldwide.</p>

                    <ul class="plus">
                        <li>Flight bookings must be made via <a href="https://eventsoffer.cathaypacific.com/" target="_blank"> Cathay
                                Pacific's dedicated online booking page</a> using code <em>MICE08B</em>.
                        </li>
                        <li>In-bound flights to New Zealand must be within the 18-30 Aug 2025 period.</li>
                    </ul>
                </div>
                <div class="feature-box__footer">
                    <div class="feature-box__footer-blocks">
                        <div class="feature-box__footer-block-shaded">
                            Code: MICE08B
                        </div>
                        <a class="feature-box__footer-block-solid" href="https://eventsoffer.cathaypacific.com/" target="_blank"> Book
                            Cathay Pacific </a>
                    </div>
                </div>

            </div>

            <div class="feature-box">
                <div class="feature-box__body">

                    <h3 class="feature-box__heading">
                        <strong>Qantas</strong> <em>Australia</em>
                    </h3>

                    <p>AUD $100 off trans-tasman return tickets on QF-ticketed flights. </p>

                    <ul class="plus">
                        <li>Flight bookings must be made via the <a href="https://www.qantas.com/" target="_blank">Qantas website</a>
                            using code <em>TAKINA</em>.
                        </li>
                        <li>Valid for all Australian ports to WLG.</li>
                        <li>Flight credits, points and secondary promo codes are excluded forms of payment.</li>
                    </ul>
                </div>

                <div class="feature-box__footer">
                    <div class="feature-box__footer-blocks">
                        <div class="feature-box__footer-block-shaded">Code: TAKINA</div>
                        <a class="feature-box__footer-block-solid" href="https://www.qantas.com/" target="_blank">Book Qantas</a>
                    </div>
                </div>

            </div>

        </div> <!-- /#travel-offers -->

    </section> <!-- /#travel -->
<?php
partial\Footer::render();
