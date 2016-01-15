<?php $navmenu = array(
    'theme_location'  => 'footer',
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

<div id="footer-menu">
    <ul>
        <?php wp_nav_menu( $navmenu ); ?>
    </ul>
</div>