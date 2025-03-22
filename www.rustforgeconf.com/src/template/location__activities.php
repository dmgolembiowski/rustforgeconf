<?php

use rfc\ws\partial;

partial\Header::render( title: "Activities in Wellington");
?>

    <section id="families">

        <h1><span class="boost">Bring</span> your family </h1>

        <div id="families-photos">

            <figure>
                <img src="assets/images/capitale-interior-500-334.png" alt="Children playing and laughing at Capital-E">
                <figcaption>
                    Children playing and laughing at Capital-E. Photo by Celeste Fontein/WellingtonNZ.
                </figcaption>
            </figure>

            <figure>
                <img src="assets/images/trail-with-kids-500x333.png" alt="Child riding a tricycle along a natural path with a parent.">
                <figcaption>
                    A child and parent exploring the Spicer Link trail. Photo by Mark Tantrum.
                </figcaption>
            </figure>
        </div>

        <p>While Rust Forge itself is intended for adults, the surrounding area provides many opportunities for young
            explorers to have fun.</p>

        <div>
            <h3>Here are some ideas: </h3>

            <ul class="plus">
                <li>
                    <a href="https://wellington.govt.nz/recreation/outdoors/parks-and-reserves/city-and-suburban-reserves/frank-kitts-park">Frank
                        Kitts Park</a> playground is next door to the venue.
                </li>
                <li><a href="https://www.tepapa.govt.nz/">Te Papa Tongarewa</a> and
                    <a href="https://www.museumswellington.org.nz/wellington-museum/">Wellington Museum</a> are within
                    10 minutes' walk and can easily absorb hours.
                </li>
                <li>Visiting <a href="">Wellington Zoo</a> and/or <a href="https://visitzealandia.com/">Zealandia Te
                        Māra a Tāne</a> ecosanctuary provides opportunities to explore the country's wildlife.
                </li>
                <li>The children's play space <a href="https://www.capitale.org.nz/">Nōku te Ao Capital-E</a> is next
                    door. Check out <a href="">PlayHQ</a> for under 5s.
                </li>
                <li>A trip up the top of <a href="https://www.wellingtoncablecar.co.nz/">Wellington Cable Car</a> will
                    take you to Wellington Botanic Garden
                </li>
            </ul>

        </div>
    </section>

<?php
partial\Footer::render();
