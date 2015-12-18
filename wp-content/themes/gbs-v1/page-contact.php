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

get_header(); ?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main column" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<h1 class="full-run"><span>Contact Us</span><em></em></h1>

				<div class="row"><div class="column large-8 large-offset-2">
					<?php get_template_part( 'content', 'page' ); ?>
					</div></div>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					/*if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;*/
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="grey">
		<div class="row"><div class="column">

		<h2 class="full-run"><span>Find Us</span><em></em></h2>
			
<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJTz0aEPgqeKGz_JNbN_dY-DcQKq1VBGw">
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: { lat: -34.397, lng: 150.644},
          zoom: 8
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

<!-- <div id="map-canvas"></div> -->


    
			<?php echo $google_map_embed; ?>

			<address><?php echo $the_address; ?></address>

			<div class="dotters"></div>

			<div class="contact-row"><?php $sp = '<em>&middot;</em>'; $pc = count($phone_numbers);
				foreach($phone_numbers as $coun => $n) :
					echo $n['label'] . ' <b>' . $n['number'] . '</b>';
					if($coun<($pc-1)) :
						echo $sp;
						endif;
					endforeach;
				//echo 'Main: <b>503.467.4710</b> '.$sp.' Toll Free: <b>866.743.4277</b> '.$sp.'Fax: <b>503.467.4711</b>';
			?>
			<ul class="social-links clearfix"><?php
				foreach($social_links as $coun => $l) :
					echo '<li><a href="'.$l['link'].'" title="'.$l['title'].'"><i class="fa fa-'.$l['icon'].'"></i></a></li>';
					endforeach;

			?></ul>
			<a href="#" class="btn">Email Us</a>
			</div>
		</div></div>

	</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
