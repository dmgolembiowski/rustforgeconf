<?php

use rfc\ws\partial;
use rfc\ws\ui\component\Api as ui;

partial\Header::render(title: "Mailing List");

?>
    <section>
        <div class="row-spacing">

            <div class="regular-spacing">
                <h1>Mailing list</h1>
            </div>
        </div>

            <div class="form-box">
                <h2>Let's do this!</h2>
                <p>Show your interest, let us know if you'd like to attend, speak, volunteer, or any of the above. You'll
                    also receive updates as planning develops. There's no commitment. ♥</p>
                <p>We're also looking for sponsors. Your support makes all the difference, especially during our first
                    year! </p>
                <form enctype="multipart/form-data" id="form02" method="post" target="https://hooks.zapier.com/hooks/catch/19805528/263afdp/" data-autofocus="1">

                    <div class="field" data-type="email">
                        <input type="email" name="email" placeholder="iloverust@example.com" maxlength="128" required="">
                    </div>

                    <div class="field" data-type="select">
                        <select name="interested-in">
                            <option value="">– Interested In ... (optional) –</option>
                            <option value="Attending">Attending</option>
                            <option value="Speaking">Speaking</option>
                            <option value="Sponsoring">Sponsoring</option>
                            <option value="Organising">Organising</option>
                            <option value="Volunteering">Volunteering</option>
                            <option value="Something Else">Something Else</option>
                        </select>
                    </div>

                    <div class="actions">
                        <button type="submit" class="button">
                            form.submit()
                        </button>
                    </div>

                    <input type="hidden" name="id" value="form01">
                </form>

            </div>

    </section>


<?php
partial\Footer::render();