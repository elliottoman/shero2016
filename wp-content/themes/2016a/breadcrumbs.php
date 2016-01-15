<?php if  ( is_front_page() ) { echo '<!-- No Breadcrumbs -->'; } else {
    echo '<section>';
        echo '<div id="breadcrumbs-container" class="page-wrap">';
            echo '<div id="breadcrumbs">';

                // Load Breadcrumb Trail Plugin
                breadcrumb_trail();

            echo '</div>';

            // Project Page Navigation
            if ( is_page_template('page_project_template.php') ) { get_template_part('project_nav'); }

            // Pagination
           get_template_part('pagination');

        echo '</div>';
    echo '</section>';
} ?>


