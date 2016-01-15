<?php get_header(); ?>

<?php
// WP Queries
$executives = new WP_Query( array( 'post_type' => 'team', 'order' => 'ASC', 'orderby'=>'menu_order', 'tax_query' => array(array('taxonomy' => 'team_category', 'field' => 'slug', 'terms' => 'executive')) ) );
$new_york_crew = new WP_Query( array( 'post_type' => 'team', 'order' => 'ASC', 'orderby'=>'title', 'tax_query' => array(array('taxonomy' => 'team_category', 'field' => 'slug', 'terms' => array('new-york-crew'))) ) );
$team_tirana = new WP_Query( array( 'post_type' => 'team', 'order' => 'ASC', 'orderby'=>'title', 'tax_query' => array(array('taxonomy' => 'team_category', 'field' => 'slug', 'terms' => array('team-tirana'))) ) );
$get_blurb = get_post(14887); $blurb = $get_blurb->post_content;

?>

    <!-- archive-biographies.php -->

    <div id="biographies" class="page-wrap">
        <main>

            <h1>Meet the Shero Team</h1>
            <?php echo wpautop( $blurb ); ?>

        <section id="executives" class="executives">

            <h2>The Executive Team</h2>

            <?php while ( $executives->have_posts() ) : $executives->the_post();
                $job_title = get_post_meta($post->ID, 'job_title', true );
                $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false, '' ); ?>

                <article>
                    <a class="thumbnail" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $featured_image[0]; ?>');"></a>
                    <div class="title-container">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <h3><?php echo $job_title; ?></h3>
                    </div>
                </article>


                <?php endwhile; wp_reset_postdata();?>
        </section>


        <section id="new-york-crew" class="crew">

            <h2>The New York Crew</h2>

            <?php while ( $new_york_crew->have_posts() ) : $new_york_crew->the_post();
                $job_title = get_post_meta($post->ID, 'job_title', true );
                $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false, '' ); ?>

                <article>
                    <a class="thumbnail" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $featured_image[0]; ?>');">
                        <div class="title-container">
                            <h2><?php the_title(); ?></h2>
                            <h3><?php echo $job_title; ?></h3>
                        </div>
                    </a>
                </article>

            <?php endwhile; wp_reset_postdata();?>
        </section>



            <section id="team-tirana" class="crew">

                <h2>Team Tirana</h2>

                <?php while ( $team_tirana->have_posts() ) : $team_tirana->the_post();
                    $job_title = get_post_meta($post->ID, 'job_title', true );
                    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false, '' ); ?>

                    <article>
                        <a class="thumbnail" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $featured_image[0]; ?>');">
                            <div class="title-container">
                                <h2><?php the_title(); ?></h2>
                                <h3><?php echo $job_title; ?></h3>
                            </div>
                        </a>
                    </article>

                <?php endwhile; wp_reset_postdata();?>
            </section>




        </main>
    </div>

<?php get_footer(); ?>