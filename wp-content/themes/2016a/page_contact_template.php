<?php /* Template Name: Contact Sidebar */ ?>

<?php get_header(); ?>

<!-- page_contact_template.php ++++++++++++++++++++++++++++++++++++++++++++  -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
// Get the summary:
$summary = get_post_meta( $post->ID, 'summary', true ); ?>


    <section class="page-wrap">


        <h1><?php the_title(); ?></h1>
        <h4><?php echo $summary; ?></h4>

        <div class="column two-thirds-left">
            <main>
                <article class="post">
                        <?php the_content(); ?>
                </article>
            </main>
        </div>

        <div id="contact-sidebar" class="column one-third-right">
            <aside>
                <?php
                    $getSnippet = get_post( 14917 );
                    $snippet = $getSnippet->post_content;
                    echo wpautop( $snippet );
                ?>
            </aside>
        </div>


    </section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>



