<?php

use rfc\ws\partial;

partial\Header::render( title: 'Conference Events');
?>

    <section>
        <div class="row-spacing">

            <div class="ragged-right">
                <h1>Rust Forge
                    <span class="boost">Events</span></h1>
            </div>
        </div>
        <div class="regular-spacing">
            <p class="highlight">There's a lot to see and do at Rust Forge.</p>
            <ul class="arrow">
                <li><a href="/social"><em>Socialize</em></a> and connect with developers and creators</li>
                <li><a href="/team-spaces"><em>Hang our or host a team space</em></a></li>
                <li><a href="/workshop"><em>Learn about how to adopt rust</em></a> through a workshop by Tim McNamara</li>
                <li><a href="/talks"><em>Listen to inspiring talks</em></a> during our main conference presentations </li>
            </ul>
        </div>

    </section>

<?php
partial\Footer::render();

