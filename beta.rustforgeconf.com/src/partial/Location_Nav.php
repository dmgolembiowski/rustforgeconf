<?php

namespace rfc\ws\partial;

class Location_Nav
{
    public static function render()
    {
        ?>

            <nav class="horizontal-nav">
                <a class="home" href="/">~</a>
                <a class="area" href="/location">Location</a>
                <ul class="horizontal-nav">

                    <li><a href="/venue">venue</a></li>
                    <li><a href="/travel">travel</a></li>
                    <li><a href="/lodging">lodging</a></li>
                    <!--
                    <li><a href="/dining">dining</a></li>
                    <li><a href="/activities">activites</a></li>
                    <li><a href="/culture">culture</a></li>
                    -->
                </ul>
            </nav>


        <?php
    }
}
