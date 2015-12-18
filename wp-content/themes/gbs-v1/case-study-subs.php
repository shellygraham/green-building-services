	<?php /*<div class="grey clearfix">
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

	</div></div>*/ ?>

	<div class="green clearfix"><div class="row"><div class="column">

		<?php 
		if(is_tax()) :
			$tit = $t_qls.': '.single_tag_title('',false);
		else :
			$tit = $t_qls;
			$p_lim = 10;
			$cun = 0;
		endif;
		echo do_shortcode('[dot-header title="'.$tit.'"]'); 

		function drop_content($post) {
			$i 			= $post->ID;
			$t_pos 		= get_field('location', $i);
			$t_msector 	= get_the_terms( $i, 'market-sectors' );//get_field('market_sector');
			$dv 		= '<b>:</b>';
			//print_r($t_msector[0]->name);
			echo '<li class="spltt"></li><li>'.$t_msector[0]->name.$dv.'<strong>'.$post->post_title.'</strong>'.$dv.$t_pos.$dv.'<strong>'.'</strong></li>';
	
		} ?>
		<div class="row"><div class="column"><ul class="serv-list">
			<?php while ( have_posts() ) : the_post(); if($post->post_content=='') : 
				if($p_lim) :
					if($p_lim>$cun) :
 					drop_content($post); 	
 					$cun++;
 					endif;
				else :
					drop_content($post); 
				endif;
			endif; endwhile; ?>
		</ul></div></div>
		<?php /*if($q_lst) : $st = '<div class="row"><div class="column medium-8 medium-offset-2"><ul class="serv-list">'; foreach($q_lst as $coun => $l) :
		$st_s = explode(' : ',$l['item']);
		$st_2 = '';
		foreach($st_s as $c => $m) :
			if($c>0) :
				$st_2 .= ' <b>:</b> ';
				endif;
			if($c % 2 == 0) :
				
			else :
				$m = '<strong>'.$m.'</strong>';
				endif;
			$st_2 .= $m;
			//print_r($m);
			endforeach;
		$st .= '<li>'.$st_2.'</li>';
		endforeach; $st .= '</ul></div></div>'; echo $st; else : echo apply_filters('the_content',$g_con); endif; */	?>

	</div></div></div>