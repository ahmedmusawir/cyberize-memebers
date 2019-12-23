<?php

/*
PROPERTY LIST DISPLAY ON GOOGLE MAP SHORTCODE
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

/**
 *
 * Adding Custom Shortcode for Property or any CPT list on Google Map
 *
 */

function cg_googlemap_listing($atts) {

	$atts = shortcode_atts( 

		array(

			'post_name' => 'properties',
			'post_number' => 50
		
		), $atts
	);

	extract($atts);

	ob_start(); // OUTPUT BUFFERING

	$args = array(
	    'post_type' => $post_name,
	    'posts_per_page' => $post_number
	);	

	$front_page_post_items = new WP_Query($args);

	?>

<main class="CG-GOOGLEMAP-LISTBOX-SHORTCODE">

	<div class="content-holder">
		<div class="row">

			<style type="text/css">

			.acf-map {
				width: 100%;
				height: 700px;
				border: #ccc solid 1px;
				margin: 20px 0;
			}

			/* fixes potential theme css conflict */
			.acf-map img {
			   max-width: inherit !important;
			}

			</style>


			<?php
			if ($front_page_post_items->have_posts()): /* Start the Loop */ 
			    while ($front_page_post_items->have_posts()):
			        $front_page_post_items->the_post();
			?>

					<div class="col-sm-12 col-md-12 col-lg-12">

						<!-- ACF MAP START -->
						<div class="acf-map">

						<?php 

							$mapLocation = get_field('location');

						?>	


						    <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng']; ?>">
						    	<a href="<?php the_permalink(); ?>">
						    		<figure style="width: 50% !important;">
							    		<?php the_post_thumbnail( 'blog-size' ); ?>
							    	</figure>
							    	<h6><?php the_title(); ?></h6>
							    	<?php echo $mapLocation['address']; ?>
						    	</a>
						    </div>
							
						<?php 	endwhile;
								
								wp_reset_postdata();
								
							endif;

						?>

						
						</div> <!-- ACF-MAP END -->						
							
					</div> <!-- END col-sm-12 col-md-12 col-lg-6 -->

		</div> <!-- END ROW -->
	</div>
	
</main>


	<?php 

	$module_contents = ob_get_contents();

	ob_end_clean();	

	return $module_contents;
	// return "<h2>CPT: $post_name and Number: $post_number</h2>";
}

add_shortcode( 'cg-googlemap-list-cpt', 'cg_googlemap_listing' );















