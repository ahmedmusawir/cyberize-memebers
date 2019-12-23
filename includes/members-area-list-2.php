<?php
/*
PROPERTY LIST DISPLAY SHORTCODE
*/

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 *
 * Adding Custom Shortcode for Property or any CPT list
 *
 */

function cg_cpt_listing($atts)
{

	$atts = shortcode_atts(

		array(

			'tax_name' => 'courses',
			// 'post_number' => '6'

		),
		$atts
	);

	extract($atts);

	ob_start(); // OUTPUT BUFFERING

	$term_args = array(
		'taxonomy'   => $tax_name, // Swap in your custom taxonomy name
		'hide_empty' => true, 
		'cache_images' => true,
	);
	
	$terms = apply_filters( 'taxonomy-images-get-terms', '', $term_args );
	

  // $front_page_post_items = new WP_Query($args);
  // echo '<pre>';
  // print_r($terms);
  // echo '</pre>';
	// die('Stop');
	?>

<main class="CG-CPT-LISTBOX-SHORTCODE">

  <div class="masonry content-holder">

    <?php
				if ($terms) : /* Start the Loop */

				// TERM LOOP STARTS
				foreach( $terms as $term ) :	
		?>

    <div class="item">

<?php 
// echo '<pre>';
// print_r($term);
// echo '</pre>';
// die('stop!');
$featured_img_url = wp_get_attachment_image_src($term->image_id, 'full'); 
// print_r( $featured_img_url[0] );
?>

      <article class="content-block">

        <figure class="featured-img-holder">
					<a href="<?php echo esc_url( get_term_link( $term, $term->taxonomy ) ) ?> ">
						<img src="<?php echo $featured_img_url[0]; ?>" alt="">
					</a>
					<!-- <a href="<?php // echo esc_url( get_term_link( $term, $term->taxonomy ) ) ?> ">  <?php //echo wp_get_attachment_image( $term->image_id, 'full' ) ?> </a> -->
        </figure>


        <section class="main-content">
					<h3><?php echo $term->name ?></h3>
          <p class="text-only">
            <?php echo $term->description; ?>
          </p>

        </section>

      </article>

    </div>

    <?php
					endforeach;
				else :
					get_template_part('template-parts/content', 'none');
				endif;

		?>

  </div>

</main>


<?php

	$module_contents = ob_get_contents();

	ob_end_clean();

	return $module_contents;
}

add_shortcode('cg-property-list-cpt', 'cg_cpt_listing');