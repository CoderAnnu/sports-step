<?php

/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.1
 */

if (!defined('ABSPATH')) {
  exit;
}

do_action('woocommerce_before_account_navigation');
?>

<div class="my-login-account" id="my-account">
  <div class="container">

    <div class="row px-md-0 row set-div shadow">
      <!-- End in my-account.php -->
      <div class="col-md-3 p-md-4 bg-light py-2">
        <nav class="woocommerce-MyAccount-navigation w-100" role="navigation">
          <div class="list-group list-group-flush woocommerce-MyAccount-navigation-div-1">

            <?php
            $icons = ['fas fa-user', 'fas fa-box-open', 'fas fa-cloud-download-alt', 'fas fa-map-marked-alt', 'fas fa-file-invoice', 'fas fa-sign-out-alt', 'fas fa-list', 'fas fa-phone'];
            $i = 0;

            foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
              <div class="align-items-center d-flex flex-row woocommerce-MyAccount-navigation-div-2 p-2 rounded justify-content-center list-group list-group-flush ">

                <i class="<?= $icons[$i]; ?> me-2"></i>
                <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>" class="list-group-item px-md-1 bg-light p-0 list-group-item-action"><?php echo esc_html($label); ?></a>
                <?php $i++; ?>
              </div>
            <?php endforeach; ?>

          </div>
        </nav>
      </div>

      <?php do_action('woocommerce_after_account_navigation'); ?>