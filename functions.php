<?php
// What the theme asks of WordPress: a title per page, the RSS feed links,
// HTML5 markup and embeds that scale. wp_head() in header.php prints them.
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('responsive-embeds');
});

// The theme's stylesheets. Each URL carries the file's modification time,
// so a browser fetches it again after a deploy that changed it.
add_action('wp_enqueue_scripts', function () {
    $style = function ($handle, $file, $deps = []) {
        wp_enqueue_style(
            $handle,
            get_template_directory_uri() . $file,
            $deps,
            (string) filemtime(get_template_directory() . $file)
        );
    };
    $style('technical-fonts', '/static/css/fonts.css');
    $style('technical-normalize', '/static/css/normalize.css');
    $style('technical-main', '/static/css/main.css', ['technical-fonts', 'technical-normalize']);
});
