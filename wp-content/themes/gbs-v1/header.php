<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _mbbasetheme
 */


?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon.png">
	<link href='http://fonts.googleapis.com/css?family=Actor' rel='stylesheet' type='text/css'>
	<?php wp_head();
		$bg = get_field('bg_img', $post->ID);
		if(is_page('home')) : ?>
		<style>
			body,html { background-color:transparent; }
			body { background:#414143 url(<?php echo $bg; ?>) 50% 50% no-repeat fixed; background-size:cover; }
		</style>
		<?php endif;		
	?>

</head>

<body <?php body_class(); ?>>

<?php //if(!is_page('home')) : ?>
	<div id="page" class="hfeed site clearfix">
<?php //endif; ?>

	<!--[if lt IE 9]>
	    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->






	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_mbbasetheme' ); ?></a>

	<header id="masthead" class="site-header" role="banner"><div class="row clearfix">
		<div class="columns medium-4">
			<div class="site-branding clearfix">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo THEME; ?>/assets/img/logo.png" alt="" /></a></h1>
				<!-- <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2> -->
				<a class="menu-toggle"><i class="fa fa-bars"></i></a>
			</div>
		</div>
		<div class="columns medium-8">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?>
			</nav><!-- #site-navigation -->
		</div>
	</div></header><!-- #masthead -->

	<div id="content" class="site-content">
