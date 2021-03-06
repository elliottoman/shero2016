<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">

<?php 
/* Get the Summary */	$summary = get_post_meta($post->ID, 'summary', true);
/* Get Featured Image */ $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium', false, '' );
?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<meta property="og:title" content="<?php bloginfo('name'); ?>: <?php the_title(); ?>"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="<?php echo 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>"/>

<?php if ( $featured_image !='' ) { ?>
	<meta property="og:image" content="<?php echo $featured_image[0]; ?>"/>
<?php } else { ?>
	<meta property="og:image" content="<?php site_icon_url() ?>"/>
<?php } ?>


<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>

<?php if ( $summary !='' ) { ?>
	<meta property="og:description" content="<?php echo $summary; ?>"/>
	<meta name="description" content="<?php echo $summary; ?>">
<?php } else { ?>
	<meta property="og:description" content="<?php bloginfo('description'); ?>"/>
	<meta name="description" content="<?php bloginfo('description'); ?>"/>
<?php } ?>


<?php if ( is_front_page() ) { ?>
<title><?php /* Site Name */ bloginfo('name'); echo ': '; bloginfo('description'); ?></title>
<? } else { ?>
<title><?php /* Site Name */ bloginfo('name'); ?> | <?php /* Page Title */ wp_title( '|', true, 'right' );?> </title>
<?php } ?>



<link rel="stylesheet/less" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/imports.less" />

    <script>
        less = {
            env: "development"
        };
    </script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js" data-env="development"></script>



<!--[if lt IE 10]><link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style_ie.css" type="text/css" /><![endif]-->

<!--[if lt IE 9]>
   <script>
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('article');
      document.createElement('aside');
      document.createElement('footer');
   </script>
   <noscript>
     <strong>Warning !</strong>
     Because your browser does not support HTML5, some elements are simulated using JScript.
     Unfortunately your browser has disabled scripting. Please enable it in order to display this page.
  </noscript>
<![endif]-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<?php get_template_part('accordion-script'); ?>


<?php /* This should always be included just before the </head> tag. */ wp_head(); ?>
</head>

<body>

<header>
    <?php get_template_part('nav_menu'); ?>
    <div id="search">
        <div class="page-wrap"><?php get_search_form(); ?></div>
    </div>
</header>

<div id="site-wrap">

<?php get_template_part('breadcrumbs'); ?>

<?php get_template_part('subnavs'); ?>

<!-- END OF HEADER.PHP -->