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

	$quotes = get_field('quotes');
	$buckets = get_field('buckets');
	$grey_content = apply_filters('the_content',get_field('grey_content'));
	$cta_label = get_field('cta_label');
	$cta_destination = get_field('cta_destination');

	$cta = '<a href="'.$cta_destination.'" class="btn" target="_blank">'.$cta_label.'</a>';

	//print_r($quotes);

	?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main column" role="main">

			<?php $qc = count($quotes);
			echo '<div class="row"><div class="quotes column large-10 large-offset-1">';
			foreach($quotes as $coun => $q) :
				echo '<div><div class="bloc">'.$q['quo'].'<i class="q">"</i><i class="q">"</i></div><span>'.$q['att'].'</span></div>';
				endforeach;
			echo '</div></div>';


			while ( have_posts() ) : the_post(); ?>

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

	<div class="grey"><div class="row">
	<?php 

		echo '<div class="column">' . $grey_content . $cta . '</div><div>';

		foreach($buckets as $coun => $b) :
			$sub_c = $b['sub_content'];
			$ico = '<img src="'.$b['icon'].'" title="'.$b['title'].'" />';
			$ico_r = $b['icon_r'];
			$ico_r = '<img src="'.$ico_r.'" title="'.$b['title'].'" class="roll" />';
			$con = '<div class="tucc arrow_box">'.apply_filters('the_content',$b['sub_content']).'</div>';
			$con .= '<ul><li>'.$b['content'].'</li></ul>';
			$con = str_replace(array('<br>','<br />'),'</li><li>',$con);
			$str = '<div class="columns medium-6 large-3 bucket">';
			$str .= '<div class="trig sett">';
			$str .= $ico;
			if($ico_r) :
				$str .= $ico_r;
				endif;
			$str .= '<h3><span>'.$b['title'].'</span></h3>';
			$str .= $con;
			$str .= '</div>';
			$str .= '</div>';
			echo $str;
			endforeach;

		echo '</div>';

		?>
	</div></div>



<?php //get_sidebar(); ?>
<?php get_footer(); ?>
