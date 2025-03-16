<?php

use rfc\ws\partial;
use rfc\ws\ui\component\Api as ui;

$conference_format_ui = ui::section('conference-format')->has(
    ui::heading(level: 2)->has(ui::text('Format for the conference')),
    ui::paragraphs([
        "The conference is a single-track event, but there's an important difference. Delegates will be strongly encouraged to leave the room if there are sessions that they're not interested in. We're genuine when we mean that the \"hallway track\" is a main track.",
        "Make use of the networking opportunities through the social spaces and the hallway track. This is a feature, not a bug. It means that the people who are watching your talk _really_ want to be there."
    ])
);

$project_talks_ui = ui::section('project-talks')->has(
    ui::heading(level: 2)->has(ui::text('How to give your idea the best chance')),
    ui::paragraph()->has(ui::text('If you are the developer of an open source project, we want to hear from you! But, please note this is a single track event and we need the material to appeal to a broad audience.'))
);

$submission_tips_ui = ui::section('submission-tips')->has(
    ui::heading(level: 2)->has(ui::text('How to give your idea the best chance')),
    ui::paragraphs([
        "Allow your enthusiasm to shine through. Please tell us why you're excited to present.",
        "A short introduction is good. Generally, no introduction is better.",
        "Finish the code before starting the proposal. You should talk about things that you've learned, not about software that you hope to write between now and August.",
        "Think of your audience first. Every presentation must add to the experience.",
        "Do not think of Rust Forge 2025 as a chance to provide an advertorial or infomercial. Instead, try to think of an opportunity to share what you've learned. You should make sure that your talk is something that you would want to listen to if you were not employed by your company, or didn't work.",
    ])
);

$intended_audience_ui = ui::section('intended-audience')->has(
    ui::heading(level: 2)->has(ui::text('Intended audience')),
    ui::paragraphs([
        "The conference will appeal most to software developers who interested in the Rust programming language.",
        "Rust Forge is physically located in New Zealand as part of the Asia Pacific region.",
        "As Rust is not a predominant language in Australia and New Zealand, the conference is likely to draw a large contingent of people who are not experienced in the language. Their interests will be in ensuring that they can gain knowledge about something that is becoming more important globally.",
        "Rust Forge is not a conference to talk about the development of the the programming language itself. That's a job for Rust Conf.",
    ])
);

$selection_criteria_ui = ui::section('selection-criteria')->has(
    ui::heading(level: 2)->has(ui::text('Selection criteria')),
    ui::paragraph()->has(ui::text("The programme will be developed to create a cohesive whole. In general, we are looking to create sessions of 2-4 talks, followed by a group discussion with all of the speakers from that session.")),
    ui::list()->has(
        ui::for_each([
            ['Completeness.', "The proposal is well written and demonstrates"],
            ['Thoughtfulness.', "The proposal demonstrates that they have the target audience in mind."],
            ['Longevity.', "The topic in the proposal is likely to be relevant to Rust programmers, and people considering , for a long time."],
        ],
            fn(array $s) => ui::list_item()->has(
                ui::text($s[0]),
                ui::text($s[1])
            )
        )
    )
);

$other_questions_ui = ui::section('other-questions')->has(
    ui::heading(level: 2)->has(ui::text("Other questions you'll be asked")),
    ui::list()->has(
        ui::list_item()->has(
            ui::text("Would you like to have comments enabled on the YouTube recording? We will default to disabling comments.")
        ),
    )
);

$extension_possibilities_ui = ui::section('extension_possibilities')->has(
    ui::heading(level: 2)->has(ui::text("Extension possibilities")),
    ui::paragraph()->has(ui::text("All submitters will be invited to provide")),
    ui::list()->has(
        ui::for_each([
            "Podcast interview. All submitters will be invited to record an interview on the Compose",
            "Event for students and early-career (tentative)",
            "Group discussion",
            "Session mentorship programme",
            "Peer-review. Will you be willing to provide some notes to speakers about their talk? Perhaps you would",
        ],
            fn(string $s) => ui::list_item()->has(ui::text($s))

        )
    )
);


/**
 * Render response
 */

partial\Header::render();

ui::section("call-for-papers")->has(
    ui::heading(level: 1)->has(ui::text("Call for Papers")),
    $conference_format_ui,
    $project_talks_ui,
    $submission_tips_ui,
    $intended_audience_ui,
    $selection_criteria_ui,
    $other_questions_ui,
    $extension_possibilities_ui
)->render();

partial\Footer::render();