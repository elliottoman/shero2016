<!-- FOOTER.PHP ++++++++++++++++++++++ -->


</div> <!-- #site-wrap -->

<?php
$column_one = new WP_Query( array( 'post_type' => 'snippets', 'tax_query' => array( array( 'taxonomy' => 'site_placement', 'field' => 'slug', 'terms' => 'footer-col-1' ) ) ) );
$column_two = new WP_Query( array( 'post_type' => 'snippets', 'tax_query' => array( array( 'taxonomy' => 'site_placement', 'field' => 'slug', 'terms' => 'footer-col-2' ) ) ) );
$column_three = new WP_Query( array( 'post_type' => 'snippets', 'tax_query' => array( array( 'taxonomy' => 'site_placement', 'field' => 'slug', 'terms' => 'footer-col-3' ) ) ) );
?>



<footer>
    <div id="footer-columns" class="page-wrap">
        <div class="column" id="col-1">

            <?php
                while ( $column_one->have_posts() ) : $column_one->the_post();

                    the_content();

                endwhile;
                wp_reset_postdata();
            ?>

        </div>
        <div class="column" id="col-2">

            <?php
            while ( $column_two->have_posts() ) : $column_two->the_post();

                the_content();

            endwhile;
            wp_reset_postdata();
            ?>

        </div>
        <div class="column" id="col-3">

            <?php
            while ( $column_three->have_posts() ) : $column_three->the_post();

                the_content();

            endwhile;
            wp_reset_postdata();
            ?>

        </div>
    </div>

    <div id="copyright">
        <div class="page-wrap">
            <div class="copyright">&copy; <?php echo date('Y'); ?> Shero Designs, Inc.</div>
            <?php get_template_part('nav_footer') ?>
        </div>
    </div>

</footer>



<?php /* Include this so the admin bar is visible. */ wp_footer(); ?>

</body>
</html>