<?php get_header(); ?>

<!-- front-page.php -->

<section id="hero">
    <?php get_template_part('hero') ?>
</section>


<section id="fp-features" class="page-wrap grid-large">
    <?php
    $the_query = new WP_Query( array( 'post_type' => 'fp-feature', 'order' => 'DESC', 'orderby' => 'menu_order', 'posts_per_page' => 2 ) );
    while ( $the_query->have_posts() ) : $the_query->the_post();
        $feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false, '' );
        $url = get_post_meta ($post->ID, 'url', true);
        ?>

        <article class="grid-item">
            <a href="<?php echo $url; ?>" class="thumbnail" style="<?php if ($feature_image !='') { echo 'background-image: url(' . $feature_image[0] . ');'; } ?>">
                <?php if ($feature_image !='') { echo '<img src="' . $feature_image . '" />'; } ?>
            </a>
            <h3><a href="<?php echo $url; ?>"><?php the_title(); ?> &raquo;</a></h3>
        </article>

    <?php endwhile;

    // Reset Post Data
    wp_reset_postdata();

    ?>
</section>


<section id="project-slider">
    <?php get_template_part('project_slider'); ?>
</section>

<section id="latest-blogs" class="page-wrap">

    <h2>Latest News</h2>

    <?php
    $the_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3 ) );
    while ( $the_query->have_posts() ) : $the_query->the_post();
        $post_excerpt = get_the_excerpt();
    ?>

        <article class="column third">
            <div class="timestamp"><?php the_time('F j, Y') ?></div>
            <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo $post_excerpt; ?> <a href="<?php the_permalink(); ?>" title="Read full article"></p>
            <p><em>Read more</em> &raquo;</a></p>
        </article>

    <?php endwhile;

    // Reset Post Data
    wp_reset_postdata();

    ?>
</section>

<section id="partners" class="page-wrap">

    <h2>Our Partners</h2>

    <ul class="partners-list">

        <?php
        $the_query = new WP_Query( array( 'post_type' => 'partners', 'orderby' => 'menu_order', 'posts_per_page' => -1 ) );
        while ( $the_query->have_posts() ) : $the_query->the_post();
            $partner_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium', false, '' );
            $url = get_post_meta ($post->ID, 'url', true);
            $name = get_the_title();
            ?>

            <?php

                if( $partner_image != '' ) { // Only display posts with featured images!

                    if ($url != '') {
                        echo '<li style="background-image: url(' . $partner_image[0] . ');"><a href="' . $url . '" target="_blank"><span>' . $name . '</span></a></li>';
                    } else {
                        echo '<li style="background-image: url(' . $partner_image[0] . ');"><span>' . $name . '</span></li>';
                    }
                }

            ?>

        <?php endwhile;
        // Reset Post Data
        wp_reset_postdata();
        ?>

    </ul>

</section>


<?php get_footer(); ?>
