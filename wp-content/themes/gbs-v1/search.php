<?php
/**
 * The template for displaying search results pages.
 *
 * @package _mbbasetheme
 */

get_header(); ?>
	<section id="primary" class="content-area row">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="entry-header">
				<h3 class="full-run"><span><?php printf( __( 'Search Results for: %s', '_mbbasetheme' ), '<span>' . get_search_query() . '</span>' ); ?></span><em></em></h3>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="columns large-12 medium-12 article">
				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>
				</div>

			<?php endwhile; ?>

			<?php _mbbasetheme_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->
<div class="columns large-12 medium-12">
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
