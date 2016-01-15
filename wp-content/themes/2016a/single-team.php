<?php get_header(); ?>

    <!-- archive-biographies.php -->

    <main id="biography" class="page-wrap">



        <?php while ( have_posts() ) : the_post();
            $bio_image = get_post_meta($post->ID, 'bio_image', true );
            $job_title = get_post_meta($post->ID, 'job_title', true );
            $role = get_post_meta($post->ID, 'role', true );
            $background = get_post_meta($post->ID, 'background', true );
            $favorite_tasks = get_post_meta($post->ID, 'favorite_tasks', true );
            $passtimes = get_post_meta($post->ID, 'passtimes', true );
            $media = get_post_meta($post->ID, 'media', true );
            $travel = get_post_meta($post->ID, 'travel', true );
            $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium', false, '' );
            $pets = get_post_meta($post->ID, 'pets', true );
            $pet_image = get_post_meta($post->ID, 'pet_image', true );
        ?>

            <article>
                <h1><?php the_title(); ?></h1>
                <h2><?php echo $job_title; ?></h2>

                <?php if($featured_image != '') { ?>
                    <img id="featured-image" class="alignleft" src="<?php echo $featured_image[0]; ?>" />
                <?php } ?>

                <?php if ($background != '') { ?>
                    <p><h3>Education &amp; Background:</h3><?php echo wpautop( $background ); ?></p>
                <?php } ?>

                <?php if ($role != '') { ?>
                    <p><h3>What is your role at Shero?</h3><?php echo wpautop( $role ); ?></p>
                <?php } ?>

                <?php if ($favorite_tasks != '') { ?>
                    <p><h3>What do you most enjoy doing at Shero?</h3><?php echo wpautop( $favorite_tasks ); ?></p>
                <?php } ?>

                <?php if ($passtimes != '') { ?>
                    <p><h3>What do you do when you're not working?</h3><?php echo wpautop( $passtimes ); ?></p>
                <?php } ?>

                <?php if ($pets != '') { ?>
                    <div id="pet-corner">
                        <?php if ($pet_image != '') { ?>
                            <div id="pet-thumbnail" style="background-image:url('<?php echo $pet_image; ?>');"><img src="<?php echo $pet_image; ?>" /></div>
                        <?php } ?>
                        <div id="pet-content">
                            <h3>Pet Corner:</h3>
                            <?php echo wpautop( $pets ); ?>
                        </div>
                    </div>
                <?php } ?>

                <?php if ($media != '') { ?>
                    <p><h3>What are you reading, watching or listening to right now?</h3><?php echo wpautop( $media ); ?></p>
                <?php } ?>

                <?php if ($travel != '') { ?>
                    <p><h3>Where do you most like to travel?</h3><?php echo wpautop( $travel ); ?></p>
                <?php } ?>

            </article>

        <?php endwhile ?>

         </main>

<?php get_footer(); ?>