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


	$quote 			= get_field('quote');
	$grey_content 	= get_field('grey_content');
	$green_content 	= get_field('green_content');

	$args = array(
		'posts_per_page'   => -1,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => 'menu_order',
		'order'            => 'ASC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'team',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$core 			= get_posts($args);

	?>
	<div id="primary" class="content-area row">
		<main id="main" class="site-main column" role="main">

			<?php $qc = count($quotes);
			echo '<div class="row"><div class="quotes column large-10 large-offset-1">';
			/*foreach($quotes as $coun => $q) :
				echo '<div><div class="bloc">'.$q['quo'].'<i class="q">"</i><i class="q">"</i></div><span>'.$q['att'].'</span></div>';
				endforeach;*/				
			echo '<div class="bloc">'.$quote.'<i class="q">"</i><i class="q">"</i></div>';
			echo '</div></div>';?>

			<?php echo '<div class="row grid default">';
			foreach($core as $coun => $c) : $i = $c->ID; $m = get_the_post_thumbnail($i,'port-thumb'); $p = get_field('position',$i);
				echo '<div class="columns large-4 medium-6"><a href="'.get_the_permalink($i).'">';
				echo $m;
				echo '<span>'.$c->post_title.'<br>'.$p.'<i class="fa fa-caret-right"></i></span>';
				echo '</a></div>';
				endforeach; 
			echo '<a href="#" class="btn trig">see all</a>';
			echo '</div>';	?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php //get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					/*if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;*/
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="grey"><div class="row"><div class="column">
		<?php the_content(); ?>
	</div></div></div>
	<div class="green"><div class="row"><div class="column">
		<?php echo apply_filters('the_content',$green_content); ?>
	</div></div></div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
