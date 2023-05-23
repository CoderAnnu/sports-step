<?php

/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_navigation'); ?>


<div class="col-md-9">
  <div class="woocommerce-MyAccount-content woocommerce-MyAccount-right-content p-2">
    <?php
    /**
     * My Account content.
     *
     * @since 2.6.0
     */
    do_action('woocommerce_account_content');
    ?>
  </div>
</div>

</div>
</div>
</div><!-- row navigation.php -->



<?php

$text = sprintf(
  /* translators: %s: https://wordpress.org/ */
  __('Homepage <a href="%s">E-commerce</a>.'),
  __('http://localhost/e-commerce/')
);
echo '<div class="my-2 text-center">';
echo $text;
echo ' | <a href="' . wc_logout_url() . '">Log Out</a>';
echo '</div>';
?>