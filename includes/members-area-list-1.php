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

			'post_name' => 'members-area',
			'post_number' => '6'

		),
		$atts
	);

	extract($atts);

	ob_start(); // OUTPUT BUFFERING

	$args = array(
		'post_type' => $post_name,
		'posts_per_page' => $post_number
	);

  $front_page_post_items = new WP_Query($args);
  echo '<pre>';
  // print_r($front_page_post_items);
  echo '</pre>';

	?>

<main class="CG-CPT-LISTBOX-SHORTCODE">

  <div class="masonry content-holder">

    <?php
				if ($front_page_post_items->have_posts()) : /* Start the Loop */
					while ($front_page_post_items->have_posts()) :
						$front_page_post_items->the_post();
						?>

    <div class="item">

      <?php

									/**
									 *
									 * Collecting Taxonomies
									 *
									 */


									?>



      <article class="content-block">

        <figure class="featured-img-holder">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('large'); ?>
          </a>
        </figure>


        <section class="main-content">

          <p class="text-only">
            <?php the_excerpt(); ?>
          </p>

        </section>

      </article>

    </div>

    <?php
					endwhile;
				else :
					get_template_part('template-parts/content', 'none');
				endif;

				wp_reset_postdata();

				?>

  </div>

</main>


<?php

	$module_contents = ob_get_contents();

	ob_end_clean();

	return $module_contents;
	// return "<h2>CPT: $post_name and Number: $post_number</h2>";
}

add_shortcode('cg-property-list-cpt', 'cg_cpt_listing');