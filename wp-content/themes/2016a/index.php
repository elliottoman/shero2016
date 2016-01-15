<?php get_header(); ?>

<!-- Index Template -->

    <div id="blog" class="page-wrap">
        <main>
            <?php get_template_part('loop'); ?>
        </main>
        <div id="sidebar">
            <?php get_template_part('sidebar'); ?>
        </div>
    </div>

<?php get_footer(); ?>