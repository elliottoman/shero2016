<?php get_header(); ?>

    <!-- page.php ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php // Get the Royal Slider ID if one is assigned:
        $royal_slider = get_post_meta( $post->ID, 'royal_slider_ID', true );
        if ($royal_slider != '') {
            echo '<section id="royal-slider">';
            echo get_new_royalslider($royal_slider);
            echo '</section>';
        };
    ?>

    <?php // Get the summary:
        $summary = get_post_meta( $post->ID, 'summary', true );
    ?>


    <main class="page-wrap">
        <article>
            <h1><?php the_title(); ?></h1>
            <h4><?php echo $summary; ?></h4>
            <?php the_content(); ?>
        </article>
    </main>


    <?php /*  Load Projects grid on Projects page */ if ( is_page('work') ) { get_template_part('projects_grid'); } ?>



    <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>

<?php get_footer(); ?>