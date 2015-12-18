<?php
/**
 * The template for displaying all single posts.
 *
 * @package _mbbasetheme
 */

get_header(); 

	$t_pos 			= get_field('position');
	$t_serv 		= get_field('services');
	$t_email 		= get_field('email');
	$t_phone 		= get_field('phone_number');
	$t_sub 			= get_field('sub_content');

	?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main column" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php the_post_thumbnail('port');//get_template_part( 'content', 'single' ); ?>

			<div class="team-wrap">
				<h1><?php echo get_the_title() . '<span>' . $t_pos .'</span>'; ?></h1>
				<div class="stats clearfix row">
					<div class="columns medium-5">
						<h3>Credentials:</h3>
						<?php echo the_field('sub_content'); ?>
					</div>
					<?php if($t_email||$t_phone) : ?>
					<div class="columns medium-7">
						<h3>Contact:</h3>
						<?php if($t_email) : ?>
						<a href="mailto:<?php echo $t_email ?>?subject=Contact from GBS Website"><i class="fa fa-envelope-o"></i><?php echo $t_email; ?></a>
						<?php endif; ?>

						<?php if($t_phone) : ?>
						<a href="tel:<?php echo $t_phone; ?>"><i class="fa fa-phone"></i><?php echo $t_phone; ?></a>
						<?php endif; ?>
					</div>
					<?php endif; ?>

				</div>
				<?php the_content();//_mbbasetheme_post_nav(); ?>

				<?php if($t_sub) : ?>
				<div class="sub-box">
					<?php echo apply_filters('the_content',$t_sub); ?>
				</div>
				<?php endif; ?>

			</div>




			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="grey"><div class="row"><div class="column">
		
		<a href="<?php echo url ?>/team" class="btn">&lt; back</a>

	</div></div></div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
