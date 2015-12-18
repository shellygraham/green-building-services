<?php
/**
 * _mbbasetheme theme functions definted in /lib/init.php
 *
 * @package _mbbasetheme
 */



global $social_links, $phone_numbers, $the_address, $google_map_embed, $google_calendar_embed;//, $footer_line;
$social_links 			= get_field('social_links','Options');
$phone_numbers 			= get_field('phone_numbers','Options');
$the_address 			= get_field('address','Options');
define(footer_line, get_field('footer_line','Options'));
$google_map_embed 		= get_field('google_map_embed','Options');
$google_calendar_embed 	= get_field('google_calendar_embed','Options');

/**
 * Register Widget Areas
 */
function mb_widgets_init() {
	// Main Sidebar
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_mbbasetheme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}

/**
 * Remove Dashboard Meta Boxes
 */
function mb_remove_dashboard_widgets() {
	global $wp_meta_boxes;
	// unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}

/**
 * Change Admin Menu Order
 */
function mb_custom_menu_order( $menu_ord ) {
	if ( !$menu_ord ) return true;
	return array(
		// 'index.php', // Dashboard
		// 'separator1', // First separator
		// 'edit.php?post_type=page', // Pages
		// 'edit.php', // Posts
		// 'upload.php', // Media
		// 'gf_edit_forms', // Gravity Forms
		// 'genesis', // Genesis
		// 'edit-comments.php', // Comments
		// 'separator2', // Second separator
		// 'themes.php', // Appearance
		// 'plugins.php', // Plugins
		// 'users.php', // Users
		// 'tools.php', // Tools
		// 'options-general.php', // Settings
		// 'separator-last', // Last separator
	);
}

/**
 * Hide Admin Areas that are not used
 */
function mb_remove_menu_pages() {
	// remove_menu_page( 'link-manager.php' );
}

/**
 * Remove default link for images
 */
function mb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	if ( $image_set !== 'none' ) {
		update_option( 'image_default_link_type', 'none' );
	}
}

/**
 * Enqueue scripts
 */
function mb_scripts() {
	wp_enqueue_style( 'foundation', 'https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css' );
	wp_enqueue_style( 'icons', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'calendar', '//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.2/fullcalendar.min.css'	);
	wp_enqueue_style( '_mbbasetheme-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( !is_admin() ) {
		wp_dequeue_script('jquery');
 		wp_enqueue_script( 'jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js' );
 		wp_enqueue_script ('moment', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js', array('jquery'), NULL, true);
		wp_enqueue_script('calendar', '//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.2/fullcalendar.min.js', array('jquery'), NULL, true);
 		wp_enqueue_script( 'gcal', get_template_directory_uri() . '/assets/js/vendor/gcal.js', array('jquery'), NULL, true );
		wp_enqueue_script( 'customplugins', get_template_directory_uri() . '/assets/js/plugins.min.js', array('jquery'), NULL, true );
		wp_enqueue_script( 'customscripts', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), NULL, true );
	}
}

/**
 * Remove Query Strings From Static Resources
 */
function mb_remove_script_version( $src ){
	$parts = explode( '?ver', $src );
	return $parts[0];
}

/**
 * Remove Read More Jump
 */
function mb_remove_more_jump_link( $link ) {
	$offset = strpos( $link, '#more-' );
	if ($offset) {
		$end = strpos( $link, '"',$offset );
	}
	if ($end) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}


//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );


/* 		IMAGE SIZES LIKE A MUH 		*/
add_image_size( 'port', 573, 775, array( 'center', 'top' ) );
add_image_size( 'thumb', 376, 268, true );
add_image_size( 'port-thumb', 376, 440, array( 'center', 'top' ) );
add_image_size( 'blog-thumb', 500, 300, true );

/*		SHORTCODES YALL 		*/	


add_shortcode('cr', 		function() { 	return '&copy;';	});
add_shortcode('sp', 		function() { 	return '<em>&middot;</em>';	});

function year_tag() {
	$born = 2015;
	$now = date('Y');
	$str = '';
	if($now>$born) :
		$str = $born.' - ';
		endif;/**/
	$str .= $now;
	return $str;
}
add_shortcode('yr', 'year_tag');

function top_number() {
	global $phone_numbers;
	return($phone_numbers[0]['number']);

}
add_shortcode('main-phone','top_number');

function the_address() {
	global $the_address;
	return $the_address;
}
add_shortcode('the-address','the_address');

function site_name() {
	return get_bloginfo('name');
}
add_shortcode('site-name','site_name');

function dot_title($atts) {
	$t = $atts['title'];
/**/	if(!$t) : 
		$str = '';
		$str .= 'use [dot-header] shortcode with a title value<br>';
		$str .= 'like so : <br><br>';
		$str .= '[dot-header title="Great Shortcode"]';
		return $str;
	else :
		return '<h3 class="full-run"><span>'.$t.'</span><em></em></h3>';
		endif;
	
}
add_shortcode('dot-header','dot_title');

