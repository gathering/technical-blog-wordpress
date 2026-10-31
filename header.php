<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id="main-header">
    <section class="container">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            The Gathering
            <span class="header-link-separator">Technical blog</span>

        </a>
    </section>
</header>

<div class="container">
