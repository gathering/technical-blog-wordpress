<?php get_header(); ?>
<section class="left-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article>
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <div class="meta">
        <?php the_time('d M Y') ?>, by <?php the_author_posts_link(); ?>
            <?php
                    // The post's categories, without the default one
                    // ("Uncategorized"), whatever it is called.
                    $default = (int) get_option('default_category');
                    $names = [];
                    foreach (get_the_category() as $category) {
                        if ($category->term_id !== $default) {
                            $names[] = esc_html($category->name);
                        }
                    }
                    if ($names) {
                        echo ' from ' . implode(', ', $names);
                    }
            ?>
        </div>

<?php the_content(); ?>

    </article>
<?php endwhile; else: ?>
    <p>
        <?php esc_html_e('Sorry, no posts matched your criteria.'); ?>
    </p>
<?php endif; ?>
<div style="padding-bottom: 25px;">
<div class="alignright"><?php next_posts_link( 'Next page' ); ?></div>
<div class="alignleft"><?php previous_posts_link( 'Previous page' ); ?></div>
		</div>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
