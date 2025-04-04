
<?php

use rfc\ws\partial;

partial\Header::render( title: "Draw a profile");

$rows = 12;
$cols = 12;
$brushes = [
    " ",
    "░",
    "▒",
    "▓",
    "█",
];
?>
<style>
    #matrix {

        gap: 0;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        margin: auto;
    }

    .canvas-cell {

        float: left;
        outline: 1px solid var(--brand-color-light-ghost);
        cursor: pointer;
        /*height: 1.25rem; */
        overflow: hidden;
    }
    input[name="brush"] {
        display: none;
    }
    #brushes {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }
    #brushes p {
        color: var(--brand-color-light);
        font-size: 0.75em;
    }
    .brush-tip{
        outline: 1px solid var(--brand-color-light-ghost);
        color: var(--brand-color-light);
        margin: .5rem 0.5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 1.325rem;
        width: 1rem;
        overflow: hidden;
    }
    .brush-tip.selected {
        color: var(--text-color-highlight);
        outline: 2px solid var(--brand-color-light);
    }
    .brush-tip:hover{
        cursor: pointer;
    }

    .brush-tip{
        font-size: 2rem;
        line-height: 1.325;
        white-space: pre-wrap;
    }
    .canvas-cell {
        font-size: 2rem;
        line-height: 1;
        white-space: pre-wrap;
        height: 1.25rem;
    }

    .canvas-cell {
        float: left;
    }
    .canvas-cell:nth-child(<?php echo $cols;?>n+1) {
        clear: both;
    }
    /*
    .canvas-cell[data-tip="1"],
    .canvas-cell[data-tip="2"],
    .canvas-cell[data-tip="3"] {
        color: var(--brand-color-light-ghost);
    }
    */

    fieldset {
        border-color: var(--brand-color-light);
        padding: 0.5rem;
    }
    legend {
        text-transform: uppercase;
        color: var(--brand-color-light);
    }
    #drawing-app {
        display: grid;
        grid-template-columns: 1fr;
        grid-gap: 1rem;
        width: 100%;
    }
    #drawing-data {
        word-wrap: break-word;
        padding: 1rem;
        color: var(--brand-color-light);
        max-width: 100%;
        box-sizing: border-box;
        overflow-wrap: anywhere;
    }
    #brushes_wrap,
    #canvas_wrap {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<section id="venue">
    <div class="row-spacing">
        <h1> Draw a profile </h1>

        <div id="drawing-app" data-tip="1" data-mode="0">
            <fieldset id="brushes_wrap">
                <legend>Brushes (Click or Number keys 1-5)</legend>

                <div id="brushes">

                    <?php foreach( $brushes as $index => $brush ) {
                        $selected = $index == 1 ? 'selected' : '';
                        printf( '<div class="brush-tip %s" data-tip="%s">%s</div>', $selected, $index, $brush );
                    }
                    ?>

                </div>

            </fieldset>
            <fieldset id="canvas_wrap">
                <legend>Canvas</legend>
                <div id="matrix">

                    <?php for($i= 0;  $i < ($rows * $cols); $i++) {
                        ?>
                        <div class="canvas-cell"> </div>
                        <?php
                    }
                    ?>
                </div>
            </fieldset>
        </div>
        <fieldset>
            <legend>Data</legend>
            <p id="drawing-data"></p>
        </fieldset>
    </div>
</section>
<script>

    let app = document.getElementById("drawing-app");
    let brush_options = Array.from(document.querySelectorAll(".brush-tip"));
    let canvas_cells = Array.from(document.querySelectorAll(".canvas-cell"));

    function set_tip(val) {
        let tip = parseInt(val);
        app.dataset.tip = tip;
        highlight_active_tip(tip)
    }

    function get_tip() {
        let tip = parseInt(app.dataset.tip);
        console.log( app.dataset.tip );
        return is_valid_tip(tip) ? tip : default_tip();
    }

    function default_tip() {
        return 0;
    }

    function is_valid_tip(int_val) {
        return (int_val >= 0 || int_val < brush_options.length);
    }

    function highlight_active_tip(int_val) {
        brush_options.forEach(brush => {
            if ( parseInt(brush.dataset.tip) === int_val ) {
                brush.classList.add("selected");
            } else {
                brush.classList.remove("selected");
            }
        });
    }

    function in_draw_mode() {
        return (parseInt(app.dataset.mode ?? 0) === 1);
    }
    function enable_draw_mode() {
        app.dataset.mode = 1;
    }
    function disable_draw_mode() {
        app.dataset.mode = 0;
    }
    function fill_cell(cell, tip) {
        cell.dataset.tip = tip;

        cell.innerText = tip === 0
            ? " "
            : brush_options[tip].innerText;

        update_data()
    }

    function update_data() {
        let data = canvas_cells.map( cell => cell.dataset.tip ?? 0).join("");
        document.getElementById("drawing-data").innerText = data;
    }

    document.addEventListener('keypress', (el) => {
        let tip = parseInt(el.key) - 1;
        if ( 0 <= tip && tip < brush_options.length) {
            set_tip(tip);
        }
    })

    document.addEventListener('mousedown', enable_draw_mode );
    document.addEventListener('mouseup', disable_draw_mode);


    brush_options.forEach( brush => brush.addEventListener('click', _ => {
        set_tip(brush.dataset.tip);
    }));

    canvas_cells.forEach( cell => cell.addEventListener('click', _ => {
        fill_cell( cell, get_tip())
    }));

    canvas_cells.forEach( cell => cell.addEventListener('mouseenter', _ => {
        if (in_draw_mode()) {
            fill_cell(cell, get_tip())
        }
    }));


</script>
<?php
partial\Footer::render();

