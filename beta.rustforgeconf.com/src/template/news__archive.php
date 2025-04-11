<?php

use rfc\ws\partial;
use rfc\ws\News;

partial\Header::render(title: 'News');
?>

    <section>
        <div class="row-spacing">
            <h1>News</h1>
        </div>
        <ul class="news-items">
        <?php
        $article = News::get_all();
        array_map(function ($n) {
            $banner = ! empty( $n['metadata_banner'] ?? '') ? '<img src="'.$n['metadata_banner'].'" />' : '';
            $excerpt = ! empty( $n['excerpt'] ?? '') ? '<p class="small">'.$n['excerpt'].'</p>' : '';
            printf('        
                            <li class="news-item">%s
                                <h4><a href="%s">%s</a><span class="news-item-date"><em class="news-item__date">%s</em></span></h4>
                                %s
                            </li>',
                $banner,
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
