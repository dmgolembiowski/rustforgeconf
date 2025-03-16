<?php

namespace rfc\ws\partial;

class Event_Nav
{
    public static function render()
    {
        ?>

        <nav class="horizontal-nav">
            <a class="home" href="/">~</a> <a class="area" href="/events">Events</a>
            <ul class="horizontal-nav">
                <li><a href="/social">Social</a></li>
                <li><a href="/team-spaces">Team Spaces</a></li>
                <li><a href="/workshop">Workshop</a></li>
                <li><a href="/talks">Talks</a></li>
            </ul>
        </nav>


        <?php
    }
}
