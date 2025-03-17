<?php

use rfc\ws\partial;
use rfc\ws\News;

$article = News::get_from_request($_SERVER['REQUEST_URI']);

partial\Header::render( title: $article['title']);
?>

    <section>
        <div class="row-spacing">
            <?php partial\Top_Level_Nav::render(); ?>
            <div class="tight-spacing-spacing">
                <h1><?php echo $article['title']; ?></h1>
                <p><time datetime="<?php echo date('Y-m-d', strtotime($article['date'])); ?>"><?php echo date('jS F Y', strtotime($article['date'])); ?><time></p>
            </div>
        </div>
        <div>
            <?php echo $article['content_formatted'] ?? ''; ?>
        </div>
    </section>

<?php
partial\Footer::render();
