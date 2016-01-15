<div id="sidebar-search">
    <?php get_search_form(); ?>
</div>

<div id="sidebar-widgets">

    <?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'blog_sidebar' ); ?>
    <?php endif; ?>


    <article class="newsletters green">


        <ul>

            <h3>Latest Shero Newsletters</h3>
            <p>Our monthly newsletter helps our clients and friends stay updated on the latest Magento news, design trends and eCommerce resources.</p>

        <?php
        $the_query = new WP_Query( array( 'post_type' => 'post', 'order' => 'DESC', 'category_name' => 'newsletter', 'posts_per_page' => 4 ) );
        while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <li><a href="<?php the_permalink(); ?>"><?php the_time('F Y'); ?></a></li>

        <?php endwhile;
            wp_reset_postdata();
        ?>

        </ul>

    </article>


    <article id="popular-posts">

        <?php // wpp_get_mostpopular(); ?>

        <h3>Popular Articles</h3>

        <ol>

            <?php
            $the_query = new WP_Query( array( 'post_type' => 'post', 'order' => 'DESC', 'orderby' => 'comment_count', 'posts_per_page' => 6 ) );
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

            <?php endwhile;
            wp_reset_postdata();
            ?>

        </ol>

    </article>

</div>
