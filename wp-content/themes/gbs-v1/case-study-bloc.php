		<div class="row">
			<div class="columns medium-4 medium-offset-4">
				<?php drop_drop('market-sectors','Select Market Sector'); ?>
			</div>
		</div>

		<?php echo '<div class="row grid default">';
			
			$count = 1;

			while ( have_posts() ) : the_post(); if($post->post_content!='') : 

 				$i = $post->ID;
				$m = get_field('gallery',$i);	
				$l = get_field('location',$i);
				$s = get_field('services',$i);

				echo '<div class="columns large-4 medium-6 '.$count_posts.'"><a href="'.get_the_permalink($i).'">';
				echo '<img src="'.$m[0]['image']['sizes']['thumb'].'" alt="" />';
				echo '<span>'.$post->post_title.'<br>'.$l.'<i class="fa fa-caret-right"></i></span>';
				echo '</a></div>';
				$count++;
			endif; 
			endwhile;
				if( $count >= 6 ) {
					echo '<a href="#" class="btn trig">see all</a>';
				}
				else {
					echo '<a href="../../portfolio" class="btn back">back</a>';
				}
			
			echo '</div>';


			?>