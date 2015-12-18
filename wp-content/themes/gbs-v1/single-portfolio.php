<?php
/**
 * The template for displaying all single posts.
 *
 * @package _mbbasetheme
 */

get_header(); 

	$t_pos 			= get_field('location');
	$t_serv 		= get_the_terms( $post->ID, 'market-services' );//get_field('services');
	$t_msector 		= get_the_terms( $post->ID, 'market-sectors' );//get_field('market_sector');
	$t_gallery 		= get_field('gallery');
	$t_hero 		= get_field('grey_content');

	$previous = "javascript:history.go(-1)";
	if(isset($_SERVER['HTTP_REFERER'])) {
	    $previous = $_SERVER['HTTP_REFERER'];
	} elseif(strpos($previous,url)===false) {
		$previous = url.'portfolio';
	}

	function drop_list($core) {
		foreach($core as $coun => $t) :
			if($coun>0) : $st .= ', '; endif;
			$st .= $t->name;
		endforeach;
		return $st;
	}
	?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main column" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="gallery"><?php //the_post_thumbnail('port');//get_template_part( 'content', 'single' ); 
			foreach ($t_gallery as $coun => $img) {
				echo '<div><img src="'.$img['image']['sizes']['thumb'].'" alt="" /></div>';
			}


			?></div>

			<div class="portfolio-wrap">
				<h1><?php echo get_the_title() . '<span>' . $t_pos . '</span>'; ?></h1>
				<div class="stats clearfix row">
					<div class="columns medium-4">
						<h3>Market Sector:</h3>
						<?php echo drop_list($t_msector); ?>
					</div>
					<div class="columns medium-8">
						<h3>Services Provided:</h3>
						<?php echo drop_list($t_serv); ?>
					</div>

				</div>
				<!-- <div class="sub-box"> -->
					<?php echo apply_filters('the_content',$t_hero); ?>
				<!-- </div> -->

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
		
				<?php the_content();//_mbbasetheme_post_nav(); ?>
		<a href="<?php echo $previous;/*echo url /portfolio*/ ?>" class="btn">&lt; back</a>
	</div></div></div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
