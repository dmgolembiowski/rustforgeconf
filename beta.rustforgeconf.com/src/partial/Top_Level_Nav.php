<?php

namespace rfc\ws\partial;

class Top_Level_Nav
{
    public static function render()
    {
        ?>

        <nav class="horizontal-nav">
            <a class="home" href="/">~</a>
            <ul class="horizontal-nav">
                <li><a href="/speak">Speak</a></li>
                <li><a href="/attend">Attend</a></li>
                <li><a href="/sponsor">Sponsor</a></li>
                <li><a href="/events">Events</a></li>
                <li><a href="/location">Location</a></li>
                <li><a href="/about">About</a></li>
            </ul>
        </nav>


        <?php
    }
}
