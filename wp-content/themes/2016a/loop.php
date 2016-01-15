<?php if ( is_single() ) { ?>


    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium', false, '' ); ?>

        <article class="post">

            <h2><?php the_title(); ?></h2>
            <div class="post-subhead">
                <div class="post-meta">
                    Posted <?php the_time('F j, Y') ?> by <?php the_author(); ?> in <span class="category-list"><?php echo get_the_category_list(', ','', false ); ?></span>
                </div>
                <div class="comments-count">
                    <a href="#comments"><?php comments_number('Leave a Comment', 'One Comment', '% Comments') ?></a>
                </div>
            </div>
            <?php the_content(); ?>


        </article>

    <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>


<?php } else { ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium', false, '' ); ?>

    <article class="post-excerpt">

        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <div class="summary">
            <?php if ( $thumbnail != '' ) { ?>
                <a class="thumbnail" style="background-image: url('<?php echo $thumbnail[0]; ?>');" href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>" /></a>
            <?php } ?>
            <div class="timestamp"><?php the_time('F j, Y') ?> by <?php the_author_posts_link(); ?></div>
            <?php the_excerpt(); ?>
            <p><a href="<?php the_permalink(); ?>"><em>Read more</em> &raquo;</a></p>
        </div>


        <span class="category-list"><?php echo get_the_category_list(' | ','', false ); ?></span>  <span class="comments-count"><?php comments_number('', ' | One Comment', ' | % Comments') ?></span>

    </article>


    <?php endwhile; else: ?>
        <div id="index-404" class="post-404"></div>
        <?php if( is_search() ) { echo 'Your search for <i>' . get_search_query() . '</i> did not return any results.  Please attempt another search or <a href="mailto:biz@sherodesigns.com">contact us</a> for more information.'; }
        else { echo 'Sorry, we weren\'t able to find what you\'re looking for.  Would you like to try a <a href="#search">search</a> instead?'; } ?>
    <?php endif; ?>

<?php } ?>

