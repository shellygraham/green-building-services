<meta name="robots" content="noindex">
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


	$quote 			= get_field('lead-in-copy');
	$grey_content 	= get_field('grey_content');
	$green_content 	= get_field('green_content-area');

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
		'post_type'        => 'news',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$core 			= get_posts($args);

	?>
	<div id="primary" class="content-area row">
		<main id="main" class="site-main column" role="main">

			<h3 class="full-run"><span>News | Events</span><em></em></h3>
			<?php get_sidebar(); ?>
			
			<!-- News Articles -->

			<?php echo '<div class="row news">';
			foreach($core as $coun => $c) : $i = $c->ID; $m = get_the_post_thumbnail($i,'blog-thumb'); $p = get_field('position',$i); $t = get_field('news-excerpt',$i); $r = get_the_date('F j, Y',$i); $s = get_the_author($i); 
				echo '<div class="columns large-12 medium-12 article">';
				echo '<a href="'.get_the_permalink($i).'">';
				echo $m;
				echo '</a>';
				echo '<a href="'.get_the_permalink($i).'">';
				echo '<h3>'.$c->post_title.'<br>'.$p.'</h3>';
				echo '</a>';
				echo do_action( "addthis_widget" );
				echo '<span class="date">'.$r.' &nbsp; - &nbsp; by '.$s.'</span>';
				echo '<p>';
				echo $t;
				echo '... ';
				echo '<a href="'.get_the_permalink($i).'">';				
				echo 'Read More <i class="fa fa-caret-right"></i>';
				echo '</a>';
				echo '</p>';
				echo '</div>';
				endforeach; 
// 			echo '<a href="#" class="btn trig" style="clear:both;">see all</a>';
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
	<div class="green"><div class="row"><div class="column">
	<h3 class="full-run"><span>Job Postings</span><em></em></h3>
		<?php echo apply_filters('the_content',$green_content); ?>
	</div></div></div>

<?php get_footer(); ?>
