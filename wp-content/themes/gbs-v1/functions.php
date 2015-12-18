<?php
/**
 * _mbbasetheme functions and definitions
 *
 * @package _mbbasetheme
 */

/****************************************
Theme Setup
*****************************************/

define(url,get_site_url(),true);

/**
 * Theme initialization
 */
require get_template_directory() . '/lib/init.php';

/**
 * Custom theme functions definited in /lib/init.php
 */
require get_template_directory() . '/lib/theme-functions.php';

require get_template_directory() . '/lib/theme-post-types.php';

/**
 * Helper functions for use in other areas of the theme
 */
require get_template_directory() . '/lib/theme-helpers.php';

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/lib/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/lib/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/lib/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/lib/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/lib/inc/jetpack.php';


/****************************************
Require Plugins
*****************************************/

// require get_template_directory() . '/lib/class-tgm-plugin-activation.php';
// require get_template_directory() . '/lib/theme-require-plugins.php';

// add_action( 'tgmpa_register', 'mb_register_required_plugins' );


/****************************************
Misc Theme Functions
*****************************************/

define('THEME', get_bloginfo('template_directory'));

define('DISALLOW_FILE_EDIT', true);

/**
 * Define custom post type capabilities for use with Members
 */
add_action( 'admin_init', 'mb_add_post_type_caps' );
function mb_add_post_type_caps() {
	// mb_add_capabilities( 'portfolio' );
}

/**
 * Filter Yoast SEO Metabox Priority
 */
add_filter( 'wpseo_metabox_prio', 'mb_filter_yoast_seo_metabox' );
function mb_filter_yoast_seo_metabox() {
	return 'low';
}





/* 		taxonomy shtuff 		*/


	$drop_count = 1;

	function drop_drop($name,$label) {
		global $drop_count; $dc = $drop_count;

		echo '<div class="service-categories">';
		wp_dropdown_categories( 'name='.$name.'&show_option_none='.$label.'&taxonomy='.$name.'&value_field=slug' ); // ?>
		<script type="text/javascript">
			<!--
			var drop<?php echo $dc ?> = document.getElementById("<?php echo $name ?>");
			function onCatChange<?php echo $dc ?>() {


				if ( drop<?php echo $dc ?>.options[drop<?php echo $dc ?>.selectedIndex].value.length > 0 ) {
					//alert(drop<?php echo $dc ?>.options[drop<?php echo $dc ?>.selectedIndex].value);
					location.href = "<?php echo esc_url( home_url( '/' ) ) . $name; ?>/"+drop<?php echo $dc ?>.options[drop<?php echo $dc ?>.selectedIndex].value;
				}
			}
			drop<?php echo $dc ?>.onchange = onCatChange<?php echo $dc ?>;
			-->
		</script>
		<i class="fa fa-caret-down"></i>
		<?php	echo '</div>';
		$drop_count++;
	}

add_filter('wpseo_enable_xml_sitemap_transient_caching', '__return_false');