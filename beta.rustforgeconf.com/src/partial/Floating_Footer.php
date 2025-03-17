<?php

namespace rfc\ws\partial;

class Floating_Footer
{
    public static function render()
    {
        ?>
        <div id="floating-footer">
            <?php if (mktime(0, 0, 0, 3, 30, 2025) > strtotime("now")): ?>
            <p class="small">Early Bird Registration is Open</p>
            <?php endif ?>
            <a href="/register" hx-boost="false">Register Now</a>
        </div>

        <?php
    }
}
