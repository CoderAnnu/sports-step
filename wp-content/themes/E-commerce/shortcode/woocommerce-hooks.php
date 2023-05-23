<?php
// require_once __DIR__ . '/filters.php';	
/**
 * Remove action from default priority
 * Add action for custom priority
 */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 8);


/**
 * Remove action from default priority
 * Add action for custom priority
 */

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 8);


/* Remove Default Sidebar */
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);


/**
 * Remove meta action 
 */

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

/**
 * Remove related product action
 * Add related product action for custom custom design
 */
remove_action('woocommerce_output_related_products', 'woocommerce_output_related_products', 20);
add_action('woocommerce_output_related_products', 'woocommerce_output_related_products', 20);

if (!function_exists('woocommerce_template_loop_product_title')) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function woocommerce_template_loop_product_title()
	{
		echo '<h6 class=" ' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '">' . get_the_title() . '</h6>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}


/**
 * Edit function for custom anchor design
 */
if (!function_exists('woocommerce_template_loop_product_link_open')) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function woocommerce_template_loop_product_link_open()
	{
		global $product;

		$link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);

		echo '<a class="text-decoration-none figure-height" href="' . esc_url($link) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
	}
}


add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_excerpt', 8);

// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

/**
 * Remove action from loop product thumbnail
 * And add new action on place of loop product thumbnail
 */
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

add_action('woocommerce_before_shop_loop_item_title', function () {
	global $product;
	$image_size = apply_filters('single_product_archive_thumbnail_size', 'woocommerce_thumbnail');
	$url = wp_get_attachment_image_src(get_post_thumbnail_id($product->get_ID()), 'woocommerce_thumbnail');
	echo '<div class="p-2" style="background-color: #FCFCFC;" ><div class="product-image-container" style="background-image:url(' . $url[0] . ');">';
	echo '</div></div>';
}, 10);


/**
 * Remove action from loop rating.
 */
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);




/**
 * Add action to show rating on single product page.
 */

// add_action('woocommerce_after_shop_loop_item_title', function () {
// 	echo get_star_rating();
// });

add_action('woocommerce_template_single_title', function () {
	echo get_star_rating();
}, 5);

function get_star_rating()
{

	global $woocommerce, $product;

	$average      = $product->get_average_rating();
	$review_count = $product->get_review_count();

	return '<div class="star-rating">
                <span style="width:' . (($average / 5) * 100) . '%" title="' .
		$average . '">
                    <strong itemprop="ratingValue" class="rating">' . $average . '</strong> ' . __('out of 5', 'woocommerce') .
		'</span>                    
            </div>';
}



// function get_stg_sidebar()
// {
// 	include __DIR__ . '/stg-sidebar.php';
// }



/**
 * Add action to design side bar on arvhive-product.php page.
 */

add_action('woocommerce_before_main_content', function () {
	if (is_shop()) {
		echo '<div class="container my-3">';
		echo '<div class="row">';
		echo '<div class="d-none d-md-block col-md-4 col-xxl-3 pt-2 mt-0">';
		// get_stg_sidebar();
		echo do_shortcode('[yith_wcan_filters slug="default-preset"]');
		echo '</div>';
		echo '<div class="col-md-8 col-xxl-9 pt-2 mt-0">';
	}
	if (is_shop()) {
		include_once eco_theme_dir . '/template-parts/shop-desc.php';
	}

	if (is_single()) {
		echo '<div class="container">';
	}
});

add_action('woocommerce_after_main_content', function () {

	if (is_shop()) {

		echo '</div>';
		// woocommerce_get_sidebar();
		echo '</div>';

		echo '</div>';
		echo '</div>';

		if (is_single()) {
			echo '</div>';
		}
		include_once eco_theme_dir . '/template-parts/customer_support_content.php';
	}
}, 8);

/**
 * Add action to design side bar on arvhive-product.php page.
 */


if (!function_exists('generate_filter_cat_link')) {
	function generate_filter_cat_link($cat)
	{

		// $link = null;
		// $_link = get_term_link($cat->slug, 'product_cat');
		$shop_url = get_permalink(wc_get_page_id('shop'));

		// $categories = str_replace(get_site_url() . '/product-category/', '', $_link);
		// $categories = explode('/', $categories);


		$link = $shop_url . '?query=' . urlencode('{"max_price":null,"tax":{"brands":[],"product_cat":["' . $cat->slug . '"]}}');

		return $link;
	}
}




add_theme_support('custom-logo');


add_theme_support('woocommerce');

// count item in cart

function count_item_in_cart()
{
	global $woocommerce;
	return $woocommerce->cart->cart_contents_count;;
}

add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
	$fragments['.cart-count-stg'] = '<span class="cart-count-stg">' . count_item_in_cart() . '</span>';
	return $fragments;
});


// count item in wishlist

if (defined('YITH_WCWL') && !function_exists('yith_wcwl_get_items_count')) {
	function yith_wcwl_get_items_count()
	{
		ob_start();
?>
		<a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>">
			<span class="yith-wcwl-items-count">
				<i class=""><?php echo esc_html(yith_wcwl_count_all_products()); ?></i>
			</span>
		</a>
	<?php
		return ob_get_clean();
	}

	add_shortcode('yith_wcwl_items_count', 'yith_wcwl_get_items_count');
}

if (defined('YITH_WCWL') && !function_exists('yith_wcwl_ajax_update_count')) {
	function yith_wcwl_ajax_update_count()
	{
		wp_send_json(array(
			'count' => yith_wcwl_count_all_products()
		));
	}

	add_action('wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count');
	add_action('wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count');
}

if (defined('YITH_WCWL') && !function_exists('yith_wcwl_enqueue_custom_script')) {
	function yith_wcwl_enqueue_custom_script()
	{
		wp_add_inline_script(
			'jquery-yith-wcwl',
			"
        jQuery( function( $ ) {
          $( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
            $.get( yith_wcwl_l10n.ajax_url, {
              action: 'yith_wcwl_update_wishlist_count'
            }, function( data ) {
              $('.yith-wcwl-items-count').children('i').html( data.count );
            } );
          } );
        } );
      "
		);
	}

	add_action('wp_enqueue_scripts', 'yith_wcwl_enqueue_custom_script', 20);
}


add_filter('woocommerce_checkout_fields', 'addBootstrapToCheckoutFields');
function addBootstrapToCheckoutFields($fields)
{
	foreach ($fields as &$fieldset) {
		foreach ($fieldset as &$field) {
			// if you want to add the form-group class around the label and the input
			$field['class'][] = 'form-group';

			// add form-control to the actual input
			$field['input_class'][] = 'form-control';
		}
	}
	return $fields;
}


add_action('woocommerce_register_form_start', function () {
	echo '<label class="d-block">Her kan du registrere deg for å bli kunde hos oss.</label>';
	echo '<small class="text-muted">';
	echo 'Fyll inn deres epost eller tlf nummer i feltet under, Klikk så på knappen Registrer under. Vi tar så fortløpende kontakt med dere.';
	echo '</small>';
});






/**
 * Lists all product categories and sub-categories in a tree structure.
 *
 * @return array
//  */
// function list_taxanomy($args = [])
// {

// 	$categories = get_terms($args);

// 	$categories = treeify_terms($categories);

// 	return $categories;
// }

/**
 * Converts a flat array of terms into a hierarchical tree structure.
 *
 * @param WP_Term[] $terms Terms to sort.
 * @param integer   $root_id Id of the term which is considered the root of the tree.
 *
 * @return array Returns an array of term data. Note the term data is an array, rather than
 * term object.
 */
// function treeify_terms($terms, $root_id = 0)
// {
// 	$tree = array();

// 	foreach ($terms as $term) {
// 		if ($term->parent === $root_id) {
// 			array_push(
// 				$tree,
// 				array(
// 					'name'     => $term->name,
// 					'slug'     => $term->slug,
// 					'id'       => $term->term_id,
// 					'count'    => $term->count,
// 					'children' => treeify_terms($terms, $term->term_id),
// 				)
// 			);
// 		}
// 	}

// 	return $tree;
// }

function generate_ul($items, $name = '', $first = false, $small = false)
{
	?>
	<ul class="checkbox-ul m-0 <?= ($first) ? 'px-0' : 'ps-2'; ?>">
		<?php foreach ($items as $b) : ?>
			<li <?= ($first) ? 'class="mb-2 border-bottom"' : ''; ?>>
				<div class="d-flex justify-content-between">
					<div class="form-check">
						<input class="form-check-input" ng-disabled="loading" ng-model="filters.tax.<?= $name; ?>['<?= $b['slug']; ?>']" type="checkbox" id="stg_<?= $name; ?>_<?= $b['slug']; ?>">
						<label data-bs-toggle="tooltip" data-bs-placement="right" title="<?= $b['name']; ?>" class="form-check-label single-line" for="stg_<?= $name; ?>_<?= $b['slug']; ?>">
							<?php if ($small) : ?><small><?php endif; ?>
								<?= $b['name']; ?>
								<?php if ($small) : ?></small><?php endif; ?>
						</label>
					</div>
					<small style="min-width:20px;">(<?= $b['count']; ?>)</small>
				</div>
				<?php if ($b['children']) : ?>
					<?php generate_ul($b['children'], $name); ?>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php
}
