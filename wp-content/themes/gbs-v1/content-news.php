<?php
/**
 * @package _mbbasetheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h3 class="full-run"><span><?php the_title(); ?></span><em></em></h3>
		<?php the_post_thumbnail(); ?>

		<div class="entry-meta">
			<span class="date"><?php echo the_date(); ?> &nbsp; - &nbsp;by <?php the_author(); ?></span>
			
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', '_mbbasetheme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', '_mbbasetheme' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', '_mbbasetheme' ) );

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
