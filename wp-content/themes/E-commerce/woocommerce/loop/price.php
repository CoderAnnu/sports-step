<?php

/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

global $post, $product;
?>
<div class="rating-custom">
    <?php wc_get_template( 'single-product/rating.php' ); ?>
</div>

<?php if ($price_html = $product->get_price_html()) : ?>
  <div class="price mb-2"><?php echo $price_html; ?>
  <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
</div>
  
<?php endif; ?>