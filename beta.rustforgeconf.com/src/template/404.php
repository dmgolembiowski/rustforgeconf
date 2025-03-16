<?php
use rfc\ws\partial;
use rfc\ws\ui\component\Api as ui;

/**
 * Render response
 */

http_response_code(404);

partial\Header::render( title: "Sorry");

ui::section("404")->has(
    ui::heading(level: 1)->has(ui::text("OOPS! Couldn't find what you were lookin' for there. Sorry.")),
)->render();

partial\Footer::render();