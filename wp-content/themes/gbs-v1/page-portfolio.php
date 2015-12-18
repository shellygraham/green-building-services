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

	$p_img = get_field('client_images');
	$q_lst = get_field('quick_list');
	$t_qls = get_field('quick_list_title');
	$g_con = get_field('green_content');

	$args = array(
		'posts_per_page'   => -1,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => 'menu_order',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'portfolio',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$core 			= get_posts($args);

	?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main column" role="main">

		<?php //echo do_shortcode('[dot-header title="Case Studies"]'); ?>
		<div class="row">
			<div class="columns medium-6 pull-right">
				<div class="service-categories">
					<?php wp_dropdown_categories( 'name=market-sector&show_option_none=Select Market Sector&taxonomy=market-sector' ); ?>
					<script type="text/javascript">
						<!--
						// var dropdown = document.getElementById("cat");
						// function onCatChange() {
						// 	if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
						// 		location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?cat="+dropdown.options[dropdown.selectedIndex].value;
						// 	}
						// }
						// dropdown.onchange = onCatChange;
						-->
					</script>			
					<i class="fa fa-caret-down"></i>
				</div>
			</div>
		</div>

			<?php echo '<div class="row grid">';
			foreach($core as $coun => $c) : $i = $c->ID; 	
				$m = get_field('gallery',$i);	
				$l = get_field('location',$i);
				$s = get_field('services',$i);
				
			//	print_r($m[0]['image']);

				echo '<div class="columns large-4 medium-6"><a href="'.get_the_permalink($i).'">';
				echo '<img src="'.$m[0]['image']['sizes']['thumb'].'" alt="" />';
				echo '<span>'.$c->post_title.'<br>'.$l.'<i class="fa fa-caret-right"></i></span>';
				echo '</a></div>';
				endforeach; 
			echo '</div>';	?>

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

	<div class="grey clearfix">
		<div class="row">
			<div class="column">
			<?php echo do_shortcode('[dot-header title="Clients"]'); ?>
			</div>
		</div>
		<div class="row grid">
		<?php foreach($p_img as $coun => $i) :	?>
			<div class="columns large-3"><div class="center-frame"><div class="center-piece">
			<?php echo '<img src="'.$i['image'].'" alt="" />'; ?>
			</div></div></div>
		<?php endforeach; ?>

	</div></div>

	<div class="green clearfix"><div class="row"><div class="column">

		<?php echo do_shortcode('[dot-header title="'.$t_qls.'"]'); ?>
		<?php if($q_lst) : $st = '<div class="row"><div class="column medium-8 medium-offset-2"><ul class="serv-list">'; foreach($q_lst as $coun => $l) :
		$st_s = explode(' : ',$l['item']);
		$st_2 = '';
		foreach($st_s as $c => $m) :
			if($c>0) :
				$st_2 .= ' <b>:</b> ';
				endif;
			if($c==0) :
				$m = '<strong>'.$m.'</strong>';
				endif;
			$st_2 .= $m;
			//print_r($m);
			endforeach;
		$st .= '<li>'.$st_2.'</li>';
		endforeach; $st .= '</ul></div></div>'; echo $st; else : echo apply_filters('the_content',$g_con); endif;	?>

	</div></div></div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
