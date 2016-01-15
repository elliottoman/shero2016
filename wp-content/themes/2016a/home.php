<?php get_header(); ?>

    <!-- home.php ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->


<?php
$the_query = new WP_Query( array( 'post_type' => 'page', 'name' => 'blog' ) );
while ( $the_query->have_posts() ) : $the_query->the_post();
// Get the summary:
$summary = get_post_meta( $post->ID, 'summary', true );
?>


    <section class="page-wrap">
        <article>
            <h1><?php the_title(); ?></h1>
            <h4><?php echo $summary; ?></h4>
        </article>
    </section>


<?php endwhile;

// Reset Post Data
wp_reset_postdata();

?>


    <div id="blog" class="page-wrap">
        <main>
            <?php get_template_part('loop'); ?>
        </main>
        <div id="sidebar">
            <?php get_template_part('sidebar'); ?>
        </div>
    </div>


<?php get_footer(); ?>