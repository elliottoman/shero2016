<section id="projects-grid" class="page-wrap">
    <?php
    // The Query
    $the_query = new WP_Query( array( 'post_type' => 'page', 'order' => 'ASC', 'orderby' => 'menu_order', 'post_parent' => 3419, 'posts_per_page' => -1 ) );
    // The Loop
    while ( $the_query->have_posts() ) : $the_query->the_post();
        $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false, '' ); ?>

        <article>
            <a href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $featured_image[0]; ?>');">
                <span>
                    <h2><?php the_title();?></h2>
                </span>
            </a>
        </article>

    <?php endwhile;

    // Reset Post Data
    wp_reset_postdata();

    ?>
</section>
