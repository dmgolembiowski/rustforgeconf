<?php

namespace rfc\ws\partial;

class Floating_Footer
{
    public static function render()
    {
        ?>
        <div id="floating-footer">
            <p class="small">Early Bird Registration is Open</p>
            <a href="/register" hx-boost="false">Get your Pass</a>
        </div>

        <?php
    }
}
