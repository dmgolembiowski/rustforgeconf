<?php

use rfc\ws\partial;
use rfc\ws\News;

$article = News::get_from_request($_SERVER['REQUEST_URI']);

partial\Header::render( title: $article['title'], description: $article['description']);
?>

    <section>
        <div class="row-spacing">
            <article class="hentry">
            <div class="tight-spacing-spacing">
                <h1 class="entry-title"><?php echo $article['title']; ?></h1>
                <p><time class="published" datetime="<?php echo date('Y-m-d', strtotime($article['date'])); ?>"><?php echo date('jS F Y', strtotime($article['date'])); ?><time></p>
            </div>
            </article>
        </div>
        <div class="entry-content regular-spacing">
            <?php echo $article['content_formatted'] ?? ''; ?>
        </div>
    </section>

<?php
partial\Footer::render();
