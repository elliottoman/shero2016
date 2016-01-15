<?php $navmenu = array(
	'theme_location'  => 'primary',
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

<div class="page-wrap">
	<div id="logo">
		<a title="Shero Designs" href="<?php bloginfo('wpurl'); ?>">shero</a>
		<span class="logo-left"></span>
		<span class="logo-right"></span>
	</div>
	<nav id="menu" class="navmenu">
		<a class="menu-open" href="#menu"><span>Open Menu</span></a>
		<a id="#nomenu" class="menu-close" href="#nomenu"><span>Close Menu</span></a>
		<span class="menu-icon">Toggle Menu</span>
		<a class="nav-cta" href="<?php bloginfo('wpurl'); ?>/free-website-design-quote">
			Get a Quote
		</a>
		<ul>
			<?php wp_nav_menu( $navmenu ); ?>
			<li class="search-icon"><a href="#search"><span class="fa fa-search"><span>Search</span></span></a></li>
		</ul>
	</nav>
</div>


