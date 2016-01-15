<?php

/**
 * @package WordPress
 * @subpackage asw_template
 */

// Thumbnails
add_theme_support('post-thumbnails');



//menus
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'shero' ),
			'footer' => __( 'Footer Menu' ),
			'about' => __( 'About Shero Menu' ),
			'services' => __( 'Services Menu' )
		)
	);
}



// Modify Excerpts
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');



// make sure quotes and single quotes dont end up in the url
add_action( 'title_save_pre', 'do_replace_dashes' );
function do_replace_dashes($string_to_clean) {
    $string_to_clean = str_replace( array('&#8212;', '—', '&#8211;', '–', '‚', '„', '“', '”', '’', '‘', '…'), array(' -- ',' -- ', '--','--', ',', ',,', '"', '"', "'", "'", '...'), $string_to_clean );
    return $string_to_clean;
}

//remove wp version from head
remove_action('wp_head', 'wp_generator');


// Custom Taxonomies (Should be above Custom Post Types)
function asw_register_taxonomies() {
	register_taxonomy("site_placement", array('snippets'),
	array(
		"hierarchical" => true, 
		"label" => __('Site Placement', 'snippets'),
		"singular_label" => "Site Placement",
		"rewrite" => true));

	register_taxonomy("service_icons", array('page'),
		array(
			"hierarchical" => true,
			"label" => __('Associated Services', 'page'),
			"singular_label" => "Associated Service",
			"rewrite" => true));

	register_taxonomy("team_category", array('team'),
		array(
			"hierarchical" => true,
			"label" => __('Team Categories', 'team'),
			"singular_label" => "Team Category",
			"rewrite" => true));

	register_taxonomy("hero_options", array('hero'),
		array(
			"hierarchical" => true,
			"label" => __('Hero Style Options', 'hero'),
			"singular_label" => "Hero Style Option",
			"rewrite" => true));
}


// Custom Post Types

function js_init() {
  asw_register_custom_types(); // Register Custom Post Types
  asw_register_taxonomies(); // Register Custom Taxonomies
}

add_action('init', 'js_init');

function asw_register_custom_types() {
	

	// FRONT PAGE HERO
	register_post_type(
		  'hero', array(
			  'labels' => array(
				  'name' => 'Heroes', 
				  'singular_name' => 'Hero', 
				  'add_new' => 'Add new Hero', 
				  'add_new_item' => 'Add new Hero', 
				  'new_item' => 'New Hero', 
				  'view_item' => 'View Hero',
				  'edit_item' => 'Edit Hero',
				  'not_found' =>  __('No Heroes found'),
				  'not_found_in_trash' => __('No Heroes found in Trash')
			  ), 
			  'public' => true,
			  'publicly_queryable' => true,
			  'show_ui' => true,
			  'query_var' => true,
			  'rewrite' => array( 'slug' => 'heroes','with_front' => FALSE),
			  'capability_type' => 'page',
			  'has_archive' => 'false',
			  'menu_icon' => 'dashicons-welcome-view-site',
			  'exclude_from_search' => true, // If this is set to TRUE, Taxonomy pages won't work.
			  'hierarchical' => true,
			  'menu_position' => null,
			  'supports' => array('title', 'thumbnail'),
			  'taxonomies' => array('hero_options')
		 )
	  );


	// FRONT PAGE FEATURES
	register_post_type(
		'fp-feature', array(
			'labels' => array(
				'name' => 'Frontpage Features',
				'singular_name' => 'Frontpage Feature',
				'add_new' => 'Add new Frontpage Feature',
				'add_new_item' => 'Add new Frontpage Feature',
				'new_item' => 'New Frontpage Feature',
				'view_item' => 'View Frontpage Feature',
				'edit_item' => 'Edit Frontpage Feature',
				'not_found' =>  __('No Frontpage Features found'),
				'not_found_in_trash' => __('No Frontpage Features found in Trash')
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'fp-features','with_front' => FALSE),
			'capability_type' => 'page',
			'has_archive' => 'false',
			'menu_icon' => 'dashicons-screenoptions',
			'exclude_from_search' => true, // If this is set to TRUE, Taxonomy pages won't work.
			'hierarchical' => true,
			'menu_position' => null,
			'supports' => array('title', 'thumbnail')
		)
	);


	// PARTNERS
	register_post_type(
		'partners', array(
			'labels' => array(
				'name' => 'Partners',
				'singular_name' => 'Partner',
				'add_new' => 'Add new Partner',
				'add_new_item' => 'Add new Partner',
				'new_item' => 'New Partner',
				'view_item' => 'View Partner',
				'edit_item' => 'Edit Partner',
				'not_found' =>  __('No Partners found'),
				'not_found_in_trash' => __('No Partners found in Trash')
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'partners','with_front' => FALSE),
			'capability_type' => 'page',
			'has_archive' => 'true',
			'menu_icon' => 'dashicons-businessman',
			'exclude_from_search' => true, // If this is set to TRUE, Taxonomy pages won't work.
			'hierarchical' => true,
			'menu_position' => null,
			'supports' => array('title', 'thumbnail', 'editor')
		)
	);


	// SNIPPETS
	register_post_type(
		'snippets', array(
			'labels' => array(
				'name' => 'Snippets',
				'singular_name' => 'Snippet',
				'add_new' => 'Add new Snippet',
				'add_new_item' => 'Add new Snippet',
				'new_item' => 'New Snippet',
				'view_item' => 'View Snippet',
				'edit_item' => 'Edit Snippet',
				'not_found' =>  __('No Snippets found'),
				'not_found_in_trash' => __('No Snippets found in Trash')
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'snippets','with_front' => FALSE),
			'capability_type' => 'post',
			'has_archive' => 'false',
			'menu_icon' => 'dashicons-editor-code',
			'exclude_from_search' => true, // If this is set to TRUE, Taxonomy pages won't work.
			'hierarchical' => true,
			'menu_position' => null,
			'supports' => array('title', 'thumbnail', 'editor'),
			'taxonomies' => array('site_placement')
		)
	);


	// MEET THE TEAM
	register_post_type(
		'team', array(
			'labels' => array(
				'name' => 'Team Biographies',
				'singular_name' => 'Team Member',
				'add_new' => 'Add new Team Member',
				'add_new_item' => 'Add new Team Member',
				'new_item' => 'New Team Member',
				'view_item' => 'View Team Member',
				'edit_item' => 'Edit Team Member',
				'not_found' =>  __('No Team Members found'),
				'not_found_in_trash' => __('No Team Members found in Trash')
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'biographies','with_front' => FALSE),
			'capability_type' => 'page',
			'has_archive' => true,
			'menu_icon' => 'dashicons-id-alt',
			'exclude_from_search' => true, // If this is set to TRUE, Taxonomy pages won't work.
			'hierarchical' => true,
			'menu_position' => null,
			'supports' => array('title', 'thumbnail'),
			'taxonomies' => array('team_category')
		)
	);
	
	flush_rewrite_rules();
 
 	add_action('add_meta_boxes', 'asw_add_meta');
	add_action('save_post', 'asw_save_meta');
 
}


function asw_add_meta() {
	add_meta_box('page_summary', 'Summary', 'summary', array('page', 'post'), 'side', 'high');
	add_meta_box('frontpage_hero_subtitle', 'Subtitle', 'hero_subtitle', array('hero'), 'normal', 'high');
	add_meta_box('frontpage_hero_content', 'Content', 'hero_content', array('hero'), 'normal', 'core');
	add_meta_box('custom_url', 'URL', 'url', array('fp-feature', 'partners', 'page'), 'normal', 'core');
	add_meta_box('the_royal_slider_ID', 'Royal Slider ID', 'royal_slider_ID', array('page', 'post'), 'side', 'high');
	// Team Member Fields
	// add_meta_box('team_bio_image', 'Bio Image', 'bio_image', array('team'), 'normal', 'core');
	add_meta_box('team_job_title', 'Job Title', 'job_title', array('team'), 'normal', 'core');
	add_meta_box('team_role', 'Role', 'role', array('team'), 'normal', 'core');
	add_meta_box('team_background', 'Education/Background', 'background', array('team'), 'normal', 'core');
	add_meta_box('team_favorite_tasks', 'Favorite things to do at Shero', 'favorite_tasks', array('team'), 'normal', 'core');
	add_meta_box('team_passtimes', 'Favorite things to do while not at work', 'passtimes', array('team'), 'normal', 'core');
	add_meta_box('team_media', 'What are you listening to, reading, or watching lately?', 'media', array('team'), 'normal', 'core');
	add_meta_box('team_travel', 'What is your favorite travel destination?', 'travel', array('team'), 'normal', 'core');
	add_meta_box('team_pets', 'Pet Corner', 'pets', array('team'), 'normal', 'core');
	add_meta_box('team_pet_image', 'Pet Image', 'pet_image', array('team'), 'normal', 'core');
	
}

function summary($post) {
    echo '<div id="summary">';
    echo '<textarea style="width:95%;" id="summary" name="summary" placeholder="250 Characters Max" maxlength="250">' . get_post_meta($post->ID, 'summary', true) . '</textarea>';
    echo '</div>';
}

function hero_subtitle($post) {
	echo '<div id="hero_subtitle">';
	echo '<input style="width:95%;" type="text" id="hero_subtitle" name="hero_subtitle" placeholder="Hero Subtitle" value="' . get_post_meta($post->ID, 'hero_subtitle', true) . '" />';
	echo '</div>';
}

function hero_content($post) {
	echo '<div id="hero_content">';
	echo '<textarea style="width:95%;" id="hero_content" name="hero_content" placeholder="Hero Content" maxlength="250">' . get_post_meta($post->ID, 'hero_content', true) . '</textarea>';
	echo '</div>';
}

function url($post) {
	echo '<div id="url">';
	echo '<input style="width:95%;" type="text" id="url" name="url" placeholder="Paste URL Here" value="' . get_post_meta($post->ID, 'url', true) . '" />';
	echo '</div>';
}

function royal_slider_ID($post) {
	echo '<div id="royal_slider_ID">';
	echo '<input style="width:95%;" type="text" id="royal_slider_ID" name="royal_slider_ID" placeholder="Royal Slider ID #" value="' . get_post_meta($post->ID, 'royal_slider_ID', true) . '" />';
	echo '<p>If a Royal Slider is associated with this article, input it here.</p>';
	echo '</div>';
}


function job_title($post) {
	echo '<div id="job_title">';
	echo '<input style="width:95%;" type="text" id="job_title" name="job_title" placeholder="Job Title" value="' . get_post_meta($post->ID, 'job_title', true) . '" />';
	echo '</div>';
}

function role($post) {
	echo '<div id="role">';
	echo '<textarea style="width:95%;" id="role" name="role" placeholder="Role" >' . get_post_meta($post->ID, 'role', true) . '</textarea>';
	echo '</div>';
}

function background($post) {
	echo '<div id="background">';
	echo '<textarea style="width:95%;" id="background" name="background" placeholder="Job Title" >' . get_post_meta($post->ID, 'background', true) . '</textarea>';
	echo '</div>';
}

function favorite_tasks($post) {
	echo '<div id="favorite_tasks">';
	echo '<textarea style="width:95%;" id="favorite_tasks" name="favorite_tasks" placeholder="Favorite things to do at Shero" >' . get_post_meta($post->ID, 'favorite_tasks', true) . '</textarea>';
	echo '</div>';
}

function passtimes($post) {
	echo '<div id="passtimes">';
	echo '<textarea style="width:95%;" id="passtimes" name="passtimes" placeholder="Favorite things to do while not at work" >' . get_post_meta($post->ID, 'passtimes', true) . '</textarea>';
	echo '</div>';
}

function pets($post) {
	echo '<div id="pets">';
	echo '<textarea style="width:95%;" id="pets" name="pets" placeholder="Tell us about your pets" >' . get_post_meta($post->ID, 'pets', true) . '</textarea>';
	echo '</div>';
}

function media($post) {
	echo '<div id="media">';
	echo '<textarea style="width:95%;" id="media" name="media" placeholder="What are you reading, watching or listening to?" >' . get_post_meta($post->ID, 'media', true) . '</textarea>';
	echo '</div>';
}

function travel($post) {
	echo '<div id="travel">';
	echo '<textarea style="width:95%;" id="travel" name="travel" placeholder="What is your favorite travel destination?" >' . get_post_meta($post->ID, 'travel', true) . '</textarea>';
	echo '</div>';
}


function bio_image($post) {
	echo '<div id="bio_image">';
	echo '<input style="width:95%;" type="text" id="bio_image" name="bio_image" placeholder="URL" value="' . get_post_meta($post->ID, 'bio_image', true) . '" />';
	echo '</div>';
}

function pet_image($post) {
	echo '<div id="pet_image">';
	echo '<input style="width:95%;" type="text" id="pet_image" name="pet_image" placeholder="URL" value="' . get_post_meta($post->ID, 'pet_image', true) . '" />';
	echo '</div>';
}





// Save the Custom Field Data
function asw_save_meta($post_id) {

    if (wp_is_post_revision($post_id)) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
       return $post_id;
    }

    if (isset($_POST['summary'])) {
       update_post_meta($post_id, 'summary', $_POST['summary']);
    }

	if (isset($_POST['hero_subtitle'])) {
		update_post_meta($post_id, 'hero_subtitle', $_POST['hero_subtitle']);
	}

	if (isset($_POST['hero_content'])) {
		update_post_meta($post_id, 'hero_content', $_POST['hero_content']);
	}

	if (isset($_POST['url'])) {
		update_post_meta($post_id, 'url', $_POST['url']);
	}

	if (isset($_POST['royal_slider_ID'])) {
		update_post_meta($post_id, 'royal_slider_ID', $_POST['royal_slider_ID']);
	}

	if (isset($_POST['job_title'])) {
		update_post_meta($post_id, 'job_title', $_POST['job_title']);
	}

	if (isset($_POST['background'])) {
		update_post_meta($post_id, 'background', $_POST['background']);
	}

	if (isset($_POST['role'])) {
		update_post_meta($post_id, 'role', $_POST['role']);
	}

	if (isset($_POST['favorite_tasks'])) {
		update_post_meta($post_id, 'favorite_tasks', $_POST['favorite_tasks']);
	}

	if (isset($_POST['passtimes'])) {
		update_post_meta($post_id, 'passtimes', $_POST['passtimes']);
	}

	if (isset($_POST['pets'])) {
		update_post_meta($post_id, 'pets', $_POST['pets']);
	}

	if (isset($_POST['media'])) {
		update_post_meta($post_id, 'media', $_POST['media']);
	}

	if (isset($_POST['travel'])) {
		update_post_meta($post_id, 'travel', $_POST['travel']);
	}

	if (isset($_POST['bio_image'])) {
		update_post_meta($post_id, 'bio_image', $_POST['bio_image']);
	}

	if (isset($_POST['pet_image'])) {
		update_post_meta($post_id, 'pet_image', $_POST['pet_image']);
	}
}





/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Blog Sidebar',
		'id'            => 'blog_sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 style="display: none;">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );


?>