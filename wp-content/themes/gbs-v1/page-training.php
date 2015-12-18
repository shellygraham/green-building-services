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

	$hero_icon 				= get_field('hero_icon');
	$hero_subs 				= get_field('hero_subs');
	$hero_title 			= get_field('hero_title');
	$hero_ctas 				= get_field('hero_ctas');
	$hero_cta_label 		= get_field('hero_cta_label');
	$hero_cta_destination 	= get_field('hero_cta_destination');
	$sub_title 			 	= '<h3>'.get_field('sub_title').'</h3>';

	?>

	<div class="hex-set">
		<div class="hex major"><img src="<?php echo $hero_icon; ?>" alt="" /></div>

		<?php foreach($hero_subs as $coun => $s) :
		echo '<div class="hex"><div class="center-frame"><div class="center-piece">'.$s['content'].'</div></div></div>';
		endforeach; ?>
	</div>
	<h3><?php echo $hero_title; ?></h3>

	<?php //echo '<a href="'.$hero_cta_destination.'" class="btn" title="'.$hero_cta_label.'">'.$hero_cta_label.'</a>'; 
	if($hero_ctas) :
		echo '<div class="setto">';
		foreach($hero_ctas as $coun => $cta) :
			$lnk_o = $cta['destination_url'];
			$lnk_i = $cta['internal_link'];
			if($lnk_o) :
				$lnk = $lnk_o;
			elseif($lnk_i) :
				//print_r($lnk_i[0]->ID);
				$lnk = get_permalink($lnk_i[0]->ID);
			endif;
			echo '<a href="'.$lnk.'" class="btn" title="'.$cta['label'].'"';
			if($lnk_o) : 
				echo ' target="_blank"';
			endif;
			echo '>'.$cta['label'].'</a>';
		endforeach;	
		echo '</div>';
	endif;
	?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main column" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

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
	<?php echo $sub_title . '<div id="site-calendar"></div>';//$google_calendar_embed; ?>
	</div></div></div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
