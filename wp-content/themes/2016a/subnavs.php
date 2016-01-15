<?php // Determine whether secondary navigation should be loaded:

    if ( is_page('about-shero') || is_page('partners') || is_post_type_archive('team') || is_singular('team') ) { get_template_part('nav_about'); }

    if ( is_page('services') || is_page('magento') || is_page('wordpress') || is_page('hourly') ) { get_template_part('nav_services'); }

?>