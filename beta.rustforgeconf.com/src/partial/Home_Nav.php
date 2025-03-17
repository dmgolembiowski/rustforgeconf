<?php

namespace rfc\ws\partial;

class Home_Nav
{
    public static function render($active = '')
    {
        ?>
        <section>
            <nav class="horizontal-nav">
                <a class="home" href="/">~</a>
                <ul class="horizontal-nav">
                    <li><a <?php if($active_subpage == "speak"): ?>class="active"<?php endif ?> href="/speak">Speak</a></li>
                    <li><a <?php if($active_subpage == "attend"): ?>class="active"<?php endif ?> href="/attend">Attend</a></li>
                    <li><a <?php if($active_subpage == "sponsor"): ?>class="active"<?php endif ?> href="/sponsor">Sponsor</a></li>
                    <li><a <?php if($active_subpage == "events"): ?>class="active"<?php endif ?> href="/events">Events</a></li>
                    <li><a <?php if($active_subpage == "location"): ?>class="active"<?php endif ?> href="/location">Location</a></li>
                    <li><a <?php if($active_subpage == "about"): ?>class="active"<?php endif ?> href="/about">About</a></li>
                </ul>
            </nav>
        </section>

        <?php
    }
}
