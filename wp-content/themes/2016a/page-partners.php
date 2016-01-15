<?php get_header(); ?>

    <!-- page-partners.php ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


    <section class="page-wrap">
        <article>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </article>
    </section>

<?php endwhile; endif; ?>

    <section id="partners-grid" class="page-wrap grid-large">


        <?php
        $the_partners = new WP_Query( array( 'post_type' => 'partners', 'order' => 'ASC', 'orderby' => 'menu_order', 'posts_per_page' => -1 ) );
        while ( $the_partners->have_posts() ) : $the_partners->the_post();
        $url = get_post_meta ($post->ID, 'url', true);
        $thisTitle = get_the_title();
        $thisContent = get_the_content();
        if ( $thisContent != '' ) { // Only display posts with Content ?>

            <article class="grid-item">
                <h2><?php if( $url != '' ) { echo '<a href="' . $url . '" target="_blank">' . $thisTitle . '</a>'; } else { echo $thisTitle; } ?></h2>
                <p><?php the_content(); ?></p>
            </article>

        <?php } endwhile;

        // Reset Post Data
        wp_reset_postdata();

        ?>

    </section>

<?php get_footer(); ?>