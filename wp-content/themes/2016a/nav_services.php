<?php $services_menu = array(
    'theme_location'  => 'services',
    'menu'            => '',
    'container'       => 'false',
    'container_class' => '',
    'container_id'    => '',
    'menu_class'      => '',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'false',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => /* Don't wrap in a UL */ '%3$s',
    'depth'           => 1,
    'walker'          => ''
); ?>

<div id="services-menu" class="page-nav page-wrap">
    <ul>
        <?php wp_nav_menu( $services_menu ); ?>
    </ul>
</div>