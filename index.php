<?php get_header(); ?>		
<section class="left-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article>
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <div class="meta">  
        <?php the_time('d M Y') ?>, by <?php the_author_posts_link(); ?> 
            <?php   
                    $cats = get_the_category();
                    if ($cats[0]->cat_name != 'Ukategorisert') {
                        echo ' from ';
                        foreach($cats as $category) { 
                            echo $category->cat_name;
                            if (count($cats) > 1) { echo ', '; }
                        }
                    }
            ?>
        </div>

<?php the_content(__()); ?>

    </article>
<?php endwhile; else: ?>
    <p>
        <?php _e('Sorry, no posts matched your criteria.'); ?>
    </p>
<?php endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>