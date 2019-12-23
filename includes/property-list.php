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

			'post_name' => 'properties',
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


									// LISTING STATUS	
									$terms = get_the_terms(get_the_ID(), 'listing-status');


									if ($terms && !is_wp_error($terms)) :

										$term_links = array();

										foreach ($terms as $term) {
											$term_links[] = $term->name;
										}

										$status = join(", ", $term_links);

									endif;

									// PROPERTY TYPE	
									$terms = get_the_terms(get_the_ID(), 'property-type');


									if ($terms && !is_wp_error($terms)) :

										$term_links = array();

										foreach ($terms as $term) {
											$term_links[] = $term->name;
										}

										$type = join(", ", $term_links);

									endif;

									?>



      <article class="content-block">

        <h3 class="listing-status"><?php echo $status; ?></h3>

        <figure class="featured-img-holder">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('large'); ?>
          </a>
          <!-- <img class="featured-img img-responsive" src="http://via.placeholder.com/450x250" alt=""> -->
        </figure>


        <section class="main-content">

          <h3 class="prop-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <h4 class="prop-subtitle">
            <span class="per-sqr-feet">$<?php the_field('psf') ?> psf</span> - <span
              class="prop-type"><?php echo $type ?></span>
          </h4>

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