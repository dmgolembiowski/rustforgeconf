<?php

use rfc\ws\partial;

partial\Header::render();
?>


    <section id="venue">
        <div class="row-spacing">
            <?php partial\Location_Nav::render($active_subpage = 'venue'); ?>
            <div>
                <h1>Shed <span class="boost">6</span></h1>
                <p class="highlight">
                    Rust Forge Conf 2025 will be held at Shed 6, located at
                    <a target="_blank" href="https://maps.app.goo.gl/oYsP9N1thTF1m137A">4 Queens Wharf, Jervois Quay,
                        Wellington</a>. </p>
            </div>
        </div>
        <div class="regular-spacing">
            <img src="/assets/images/shed6-500x260.png" alt="Shed 6 from across the harbour." style="opacity: 0.8;">
            
            <p>
                Shed 6 is a multi-purpose indoor venue that will be divided into multiple spaces at our event.
                During the two co-creation days, we'll have spaces for workshops, team spaces, coding/writing, 
                socialising and relaxing. During the two conference days, we'll introduce the main auditorium.  
            </p>

            <p>
                The venue will also act as a hub for tours, both self-orgnanised and pre-planned. There are 
                hundreds of things to do within a few minutes&rsquo; walk.
            </p>

            <h2>Accessibility features</h2>

            <p>
                Unfortunately, the venue does not have an audio loop for hearing-impaired audience members.
            </p>

            <ul class="plus">
                <li>Wheelchair access is available to the ground floor and all rooms, although ramps are required in some places</li>
                <li>Wheelchairs are available at the venue but require you to give advanced notice so they can ensure they are on-site during the event</li>
                <li>Guide dogs (seeing-eye dogs) are welcome</li>
            </ul>


            <h2>Proximity</h2>
            <p>
                Within 10 minutes' walk, you'll find dozens of places to eat, drink and discover. Wellington's 
                waterfront houses cafes, resturants, bars, galleries and museums. Shed 6 itself houses indoor
                rock climbing, kayak hire and helicopter businesses.
            </p>

            <h2>History of Shed 6</h2>

            <p>
                Shed 6 sits on Queens Wharf, a <a target="_blank" href="https://en.wikipedia.org/wiki/Podocarpus_totara">tōtara</a> wharf built in the 1860s then known as ‘deep water wharf’. 
                It is one of several cargo sheds that have been built in this area over the years to support naval trade.</p>
            <p>Learn more about the space at <a target="_blank" href="https://www.wellingtonnz.com/venues-wellington/our-venues/shed-6">Venues
                    Wellington</a>.</p>
            

            <iframe id="venue__map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2998.089604069756!2d174.77437489532875!3d-41.28515429734614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d38af007dc7b483%3A0x9235d8609c45cd40!2sShed%206!5e0!3m2!1sen!2sca!4v1741876330818!5m2!1sen!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
<?php
partial\Footer::render();
