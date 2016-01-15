<?php
$the_query = new WP_Query( array( 'post_type' => 'hero', 'order' => 'DESC', 'orderby' => 'menu_order', 'posts_per_page' => 1 ) );
while ( $the_query->have_posts() ) : $the_query->the_post();
$hero_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false, '' );
$hero_subtitle = get_post_meta ($post->ID, 'hero_subtitle', true);
$hero_content = get_post_meta ($post->ID, 'hero_content', true);
?>

    <div class="hero-wrap" style="<?php if ($hero_image !='') { echo 'background-image: url(' . $hero_image[0] . ');'; } ?>">
        <div id="hero-content" class="page-wrap <?php if( has_term( 'white-text', 'hero_options', '' ) ) { echo 'white-text';} ?>">
            <article>
                <h1><?php the_title(); ?></h1>
                <h2><?php echo $hero_subtitle; ?></h2>
                <p><?php echo wpautop( $hero_content ); ?></p>
            </article>
        </div>
    </div>

<?php endwhile;

// Reset Post Data
wp_reset_postdata();

?>
