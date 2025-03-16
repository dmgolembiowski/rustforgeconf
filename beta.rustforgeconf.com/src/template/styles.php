<?php

use rfc\ws\Styles;

header("Content-type: text/css");

echo Styles::load([
    // setup
    'fonts',
    'variables',
    'layout',
    'layout-content',

    // defaults/global
    'any',
    'html',

    // block elements
    'typography',
    'lists',
    'forms',
    'images',
    'figure',
    'details',
    'links',

    // inline elements
    'component/logo',
    'component/floating-footer',
    'component/news-item',
    'component/horizontal-nav',
    'component/notice-box',
    'component/logo-grid',
    'component/form-box',
    'component/product-box',
    'component/feature-box',
    'component/background-easter-egg',

    // templates
    'template/footer',
    'template/home',
    'template/about',
    'template/venue',
]);