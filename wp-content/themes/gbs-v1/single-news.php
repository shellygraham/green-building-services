<?php
/**
 * The template for displaying news single posts.
 *
 * @package _mbbasetheme
 */

get_header(); ?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main column" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'news' ); ?>

			<?php _mbbasetheme_post_nav(); ?>
			
			<h5><a href="/news">Back to News & Events</a></h5>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
