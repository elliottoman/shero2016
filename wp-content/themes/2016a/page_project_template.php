<?php /* Template Name: Project Page */ ?>

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

    <?php // Get the live URL:
        $live_url = get_post_meta( $post->ID, 'url', true );
        if ( $live_url != '' ) {
            echo '<section id="live-url" class="page-wrap">';
                echo '<div>';
                    echo '<a href="' . $live_url . '" target="_blank"><i class="fa fa-desktop"></i><i class="fa fa-mobile"></i> View Live Site &raquo;</a>';
                echo '</div>';
            echo '</section>';
        }
    ?>

    <?php // Get the service icons associated with this Page:
    $terms = get_terms( 'service_icons' );
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

    // Display service icons:
    echo '<section id="services" class="page-wrap">';
        echo '<div id="service-icons">';
            echo '<div class="cell label-container"><span class="service-icon label">Services: </span></div>';
                echo '<div class="cell icons-container">';

                    foreach ( $terms as $term ) {
                        echo '<span class="service-icon ' . $term->slug . '"><span class="icon">&nbsp;</span>' . $term->name . '</span>';

                    }


            echo '</div>';
        echo '</div>';
    echo '</section>';

    }
    ?>


    <main class="page-wrap">
        <article>
            <h1><?php the_title(); ?></h1>
            <h4><?php echo $summary; ?></h4>
            <?php the_content(); ?>
        </article>
    </main>


    <section class="page-wrap">
        <?php
        $get_ctas = get_post( 14758 );
        $ctas = $get_ctas->post_content;
        echo $ctas;
        ?>
    </section>



    <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>

<?php get_footer(); ?>