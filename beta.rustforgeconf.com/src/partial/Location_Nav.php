<?php

namespace rfc\ws\partial;

class Location_Nav
{
    public static function render($active_subpage = '')
    {
        ?>

        <div class="dual-navigation">
            <nav class="horizontal-nav">
                <a class="home" href="/">~</a>
                <ul class="horizontal-nav">
                    <li><a href="/speak">Speak</a></li>
                    <li><a href="/attend">Attend</a></li>
                    <li><a href="/sponsor">Sponsor</a></li>
                    <li><a href="/events">Events</a></li>
                    <li><a class="active" href="/location">Location</a></li>
                    <li><a href="/news">News</a></li>
                    <li><a href="/about">About</a></li>
                </ul>            
            </nav>

            <nav class="horizontal-nav sub-nav">             
                <ul class="horizontal-nav">

                    <li><a <?php if($active_subpage == "venue"): ?>class="active"<?php endif ?> href="/venue">Venue</a></li>
                    <li><a <?php if($active_subpage == "travel"): ?>class="active"<?php endif ?> href="/travel">Travel</a></li>
                    <li><a <?php if($active_subpage == "accommodation"): ?>class="active"<?php endif ?> href="/accommodation">Accommodation</a></li>
                        <!--
                    <li><a <?php if($active_subpage == "dining"): ?>class="active"<?php endif ?> href="/dining">dining</a></li>
                    <li><a <?php if($active_subpage == "activities"): ?>class="active"<?php endif ?>href="/activities">activites</a></li>
                    <li><a h<?php if($active_subpage == "culture"): ?>class="active"<?php endif ?>ref="/culture">culture</a></li>
                    -->
                </ul>
            </nav>
        </div>

        <?php
    }
}
