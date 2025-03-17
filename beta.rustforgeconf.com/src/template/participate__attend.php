<?php

use rfc\ws\partial;

partial\Header::render( title: "Attend");
?>


    <section>
        <div class="row-spacing">
            <div class="regular-spacing">
                <h1><span class="boost">Let's get together</span> <br>in August</h1>
                <p class="highlight">We'd love to see you there!</p>
            </div>
        </div>

        <div class="columns__2">
            <div>
                <h3>Each Pass Includes</h3>
                <p>{A statement about the pricing structure and what's include in conference passes.}</p>
            </div>
            <div class="regular-spacing">
                <h3>For Business and Organizations</h3>
                <div class="tight-spacing">
                    <p>Pick-up some <a href="/sponsor"><em>sponsored passes</em></a> to gain some recognition and help
                        us grow!</p>
                    <ul>
                        <li><a href="/sponsor#ember">Ember:</a> 2 conference passes</li>
                        <li><a href="/sponsor#spark">Spark:</a> 1 conference passes</li>
                    </ul>
                </div>
                <div class="tight-spacing">
                    <p>Host your own event in one of our <a href="/spaces"><em>team spaces!</em></a></p>
                    <ul>
                        <li><a href="/team-spaces#room1">Room 1:</a> 5 conference passes</li>
                        <li><a href="/team-spaces#room2">Room 2:</a> 2 conference passes</li>
                    </ul>
                </div>

            </div>
        </div>


        <div class="columns__1">
            <div class="feature-box">
                <div class="feature-box__body">

                    <h3 class="feature-box__heading">
                        <strong>Early Bird</strong> <em>1 Pass</em>
                    </h3>

                    <p>Available through March 31, 2025.</p>

                </div>

                <div class="feature-box__footer">
                    <div class="feature-box__footer-blocks">
                     <a class="feature-box__footer-block-solid" href="/register" hx-boost="false">$225 USD</a>
                    </div>
                </div>

            </div><!-- /.feature-box -->

            <div class="feature-box">
                <div class="feature-box__body">

                    <h3 class="feature-box__heading">
                        <strong>Std</strong> <em>1 Pass</em>
                    </h3>

                    <p>Available April 1 through July 31, 2025.</p>

                </div>

                <div class="feature-box__footer">
                    <div class="feature-box__footer-blocks">
                        <div class="feature-box__footer-block-solid">$275 USD</div>
                    </div>
                </div>

            </div><!-- /.feature-box -->

            <div class="feature-box">
                <div class="feature-box__body">

                    <h3 class="feature-box__heading">
                        <strong>Late</strong> <em>1 Pass</em>
                    </h3>

                    <p>Available August 1, 2025.</p>

                </div>

                <div class="feature-box__footer">
                    <div class="feature-box__footer-blocks">
                        <div class="feature-box__footer-block-solid">$295 USD</div>
                    </div>
                </div>

            </div><!-- /.feature-box -->


            <div class="feature-box">
                <div class="feature-box__body">

                    <h3 class="feature-box__heading">
                        <strong>Spark</strong> <em>1 Pass + Sponsor</em>
                    </h3>

                    <p>The support of individual developers helps us grow!</p>

                    <ul class="plus">
                        <li>Logo or name on website</li>
                        <li>1 conference pass</li>
                    </ul>
                </div>

                <div class="feature-box__footer">
                    <div class="feature-box__footer-blocks">
                        <a href="/become-a-sponsor" class="feature-box__footer-block-solid">$1k USD</a>
                    </div>
                </div>

            </div><!-- /.feature-box -->

            <div class="feature-box">
                <div class="feature-box__body">

                    <h3 class="feature-box__heading">
                        <strong>Ember</strong> <em>2 Passes + Sponsor</em>
                    </h3>

                    <p>Perfect for businesses or friends looking to support Rust Forge.</p>

                    <ul class="plus">
                        <li>Shoutouts at beginning/end</li>
                        <li>Custom role in Discord server</li>
                        <li>Logo or name on website</li>
                        <li>2 conference pass</li>
                    </ul>
                </div>

                <div class="feature-box__footer">
                    <div class="feature-box__footer-blocks">
                        <a href="/become-a-sponsor" class="feature-box__footer-block-solid" >$3k USD</a>
                    </div>
                </div>

            </div><!-- /.feature-box -->



        </div>


    </section>
<?php

partial\Footer::render();
