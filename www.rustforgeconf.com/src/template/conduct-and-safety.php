<?php

use rfc\ws\partial;

partial\Header::render( title: "Conduct and Safety");
?>

<section id="conduct-and-safety">

    <h1>Conduct and Safety</h1>

    <p>Everyone participating in the event and its online spaces agrees to the
    <a href="https://www.rust-lang.org/policies/code-of-conduct">Rust Project&rsquo;s Code of Conduct</a>. While
    in New Zealand, you are also subject to New Zealand law.</p>

    <div class="columns__2">

        <div>
            <h3>Active incidents</h3>

            <div>
                <p>
                <em>In an emergency, dial 111</em> from any phone and ask to speak to the Police. </p>
                <ul class="arrow">
                    <li>111 is New Zealand's emergency number.</li>
                    <li>The event venue's address as "Shed 6, Queens Wharf, Wellington".</li>
                </ul>
            </div>

            <div>
                <p>
                <em>In non-emergency situations</em>, please use whichever channel you prefer: </p>
                <ul class="arrow">
                    <li>Come to the reception desk</li>
                    <li>Speak to a security guard</li>
                    <li>Contact an event volunteer</li>
                    <li>Email <a href="mailto:safety@rustforgeconf.com">safety@rustforgeconf.com</a></li>
                    <li>In the Discord server, tag members with the #safety role</li>
                </ul>

            </div>
        </div>

        <div>
            <h3>Preventing incidents</h3>

            <p>
            If you would like to raise a possible safety concern before the event or offer advice to prevent
            breaches of the code of conduct: </p>
            <ul class="arrow">
                <li>Email <a href="mailto:safety@rustforgeconf.com">safety@rustforgeconf.com</a></li>
            </ul>
        </div>

        <div>
            <h3>Retrospective Reports</h3>
            <p>
            To notify us of an issue after the event has finished, then please use one of these channels: </p>
            <ul class="arrow">
                <li>Email <a href="mailto:safety@rustforgeconf.com">safety@rustforgeconf.com</a></li>
                <li>Contact the New Zealand <a href="https://www.police.govt.nz/use-105">Police via 105</a></li>
            </ul>
        </div>

        <div>

            <h3>Anonymous Reports</h3>

            <p>If you would like to raise a complaint avoid revealing your name to the event's organizers, then
            please:</p>

            <ul class="arrow">
                <li>Contact the Rust Project's moderation team <a href="mailto:rust-mods@rust-lang.org">rust-mods@rust-lang.org</a>
                </li>
            </ul>
        </div>

    </div> <!-- /#conduct-blocks -->

</section> <!-- /#conduct -->

<?php
partial\Footer::render();
