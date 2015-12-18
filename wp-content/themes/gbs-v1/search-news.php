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
?>
	<div id="primary" class="content-area row">
		<main id="main" class="site-main column" role="main">

			<h3 class="full-run"><span>News Search Results</span><em></em></h3>
			
			<!-- News Articles -->

			<div class="row news">
				<div class="columns large-12 medium-12 article">
					<?php the_content(); ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
