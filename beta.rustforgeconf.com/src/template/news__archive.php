<?php

use rfc\ws\partial;
use rfc\ws\News;

partial\Header::render(title: 'News');
?>

    <section>
        <div class="row-spacing">
            <?php partial\News_Nav::render(); ?>
            <h1>News</h1>
        </div>
        <ul class="news-items">
        <?php
        $article = News::get_all();
        array_map(function ($n) {
            $excerpt = ! empty( $n['excerpt'] ?? '') ? '<p class="small">'.$n['excerpt'].'</p>' : '';
            printf('
                            <li class="news-item">
                                <h4><a href="%s">%s</a><span class="news-item-date"><em class="news-item__date">%s</em></span></h4>
                                %s
                            </li>',
                $n['url'],
                $n['title'] ?? 'News Update',
                $n['date'] ?? '',
                $excerpt
            );
        }, News::get_all());
        ?>
        </ul>
    </section>

<?php
partial\Footer::render();
