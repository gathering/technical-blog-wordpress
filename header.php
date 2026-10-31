<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php wp_head(); ?>
</head>
<?php /* No body_class(): on an author's page it adds the class "author",
         which main.css styles as an author box. */ ?>
<body>
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
