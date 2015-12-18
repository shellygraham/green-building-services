<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _mbbasetheme
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<p class="copyright"><?php echo apply_filters('the_content',footer_line) /*&copy; <?php echo date( "Y" ); echo " "; bloginfo( 'name' );*/ ?></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->


	</div><!-- #page -->

<?php if(is_page('home')) : ?>
	<a class="aro"><i class="fa fa-chevron-down"></i></a>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
