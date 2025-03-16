<?php

use rfc\ws\partial;

partial\Header::render();
?>


    <section id="venue">
        <div class="row-spacing">
            <?php partial\Location_Nav::render(); ?>
            <div>
                <h1>Shed <span class="boost">6</span></h1>
                <p class="highlight">
                    Rust Forge Conf 2025 will be held at Shed 6, located at
                    <a target="_blank" href="https://maps.app.goo.gl/oYsP9N1thTF1m137A">4 Queens Wharf, Jervois Quay,
                        Wellington</a>. </p>
            </div>
        </div>
        <div class="regular-spacing">
            <p>Our venue is located across the street from your <a href="/lodging">lodging</a> with available
                accessibility features.</p>

            <p>Shed 6 sits on Queens Wharf, a totara wharf built in the 1860s then known as ‘deep water wharf’. It is
                one of several cargo sheds that have been built in this area over the years. Among them are Shed 5
                (built in 1886), Shed 3 Dockside (built in 1887), and Shed 1 (1964).</p>
            <p>Learn more at <a target="_blank" href="https://www.wellingtonnz.com/venues-wellington/our-venues/shed-6">Venues
                    Wellington</a>.</p>
            <img src="/assets/images/shed6-500x260.png" alt="Shed 6 from across the harbour." style="opacity: 0.8;">

            <iframe id="venue__map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2998.089604069756!2d174.77437489532875!3d-41.28515429734614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d38af007dc7b483%3A0x9235d8609c45cd40!2sShed%206!5e0!3m2!1sen!2sca!4v1741876330818!5m2!1sen!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
<?php
partial\Footer::render();
