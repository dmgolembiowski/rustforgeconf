<?php

namespace rfc\ws\partial;

class Event_Nav
{
    public static function render($active_subpage = "")
    {
        ?>

        <div class="dual-navigation">
            <nav class="horizontal-nav">
                <a class="home" href="/">~</a>
                <ul class="horizontal-nav">
                    <li><a href="/speak">Speak</a></li>
                    <li><a href="/attend">Attend</a></li>
                    <li><a href="/sponsor">Sponsor</a></li>
                    <li><a class="active" href="/events">Events</a></li>
                    <li><a href="/location">Location</a></li>
                    <li><a href="/news">News</a></li>
                    <li><a href="/about">About</a></li>
                </ul>            
            </nav>

            <nav class="horizontal-nav sub-nav">
                <ul class="horizontal-nav">
                    <li><a <?php if($active_subpage == "social"): ?>class="active"<?php endif ?> href="/social">Social</a></li>
                    <li><a <?php if($active_subpage == "team-spaces"): ?>class="active"<?php endif ?> href="/team-spaces">Team Spaces</a></li>
                    <li><a <?php if($active_subpage == "how-to-adopt-rust-workshop"): ?>class="active"<?php endif ?> href="/how-to-adopt-rust-workshop">Workshop</a></li>
                    <li><a <?php if($active_subpage == "talks"): ?>class="active"<?php endif ?> href="/talks">Talks</a></li>
                </ul>
            </nav>
        </div>


        <?php
    }
}
