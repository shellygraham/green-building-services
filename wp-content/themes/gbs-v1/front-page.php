<?php
/**
 * The template for displaying the front page.
 *
 * This is the template that displays on the front page only.
 *
 * @package _mbbasetheme
 */


$stacs = get_field('stacs', $post->ID);

function add_cta() {
	global $post;
	$c_link  = get_field('cta_lnk', $post->ID);
	$c_labl = get_field('cta_lab', $post->ID);
	if(!$c_labl) : 
		$c_labl = get_the_title($c_link);
		endif;
	
	$cta = '<a href="'.get_permalink($c_link[0]).'" class="btn">'.$c_labl.'</a>';
	return $cta;

}
add_shortcode('cta', 'add_cta');
//print_r($stacs); 


get_header(); //print_r($bg); ?>

	<!-- <div class="bg-screen" style="background:url(<?php echo $bg; ?>) 50% 50% no-repeat; background-size:cover;"></div> -->
	<!-- <div class="roll"> -->
	<?php foreach($stacs as $coun => $st) : ?>
	<div class="stac"><div class="center-frame"><div class="center-piece">

		<?php echo apply_filters('the_content',$st['stac']); ?>

	</div></div></div>
	<?php endforeach; ?>
	<!-- </div> -->

	<?php/*?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php*/ //get_sidebar(); ?>
<?php get_footer(); ?>
