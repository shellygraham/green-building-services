<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _mbbasetheme
 */

get_header(); 
	$ed = get_page_by_path('portfolio');
	$ed = $ed->ID;
	$p_img = get_field('client_images',$ed);
	$q_lst = get_field('quick_list',$ed);
	$t_qls = get_field('quick_list_title',$ed);
	$g_con = get_field('green_content',$ed);

	?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main column" role="main">

		<?php echo do_shortcode('[dot-header title="Market Sector: '.single_tag_title('',false).'"]'); ?>

		<?php include 'case-study-bloc.php'; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

		<?php include 'case-study-subs.php'; ?>
	

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
