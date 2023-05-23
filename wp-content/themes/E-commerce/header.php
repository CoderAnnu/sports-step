<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 * 
 * @version 5.2.0.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/icon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/icon.png">
  <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/safari-pinned-tab.svg" color="#0d6efd">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php wp_body_open(); ?>

  <div id="to-top"></div>

  <div id="page" class="site">

    <header id="masthead" class="site-header">
      <div id="header" class="fixed-top bg-light border-bottom">
        <nav id="top-nav-main" class="bg-light border-bottom navbar navbar-expand-lg navbar-dark py-md-2 py-3">
          <div class="container text-center align-items-center justify-content-between">
            <!-- Navbar Brand -->
            <div>
              <!-- Dropdown -->
              <!-- mobile nav offcanvas button -->
              <button class="btn btn-sm d-lg-none ms-1 ms-md-2 me-2 side-open-button" type="button">
                <i class="fas fa-bars text-white"></i>
              </button>
              <!-- Display Logo on moble  -->
              <a class="navbar-brand xs d-md-none" href="<?php echo esc_url(home_url()); ?>">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/logo/main_logo.svg" alt="logo" class="logo xs">
              </a>
              <!-- End Display Logo on moble  -->


              <div class="translate-text d-none d-sm-none d-md-block">
                <!-- Top Footer Widget -->
                <?php if (is_active_sidebar('top-nav')) : ?>
                  <div>
                    <?php dynamic_sidebar('Top Nav'); ?>
                  </div>
                <?php endif; ?>

              </div>
              <!-- Dropdown -->
            </div>
            <div class="d-none d-md-block flex-fill mx-2">
              <?php echo do_shortcode('[fibosearch]'); ?>
            </div>

            <!-- icon div contact botton -->
            <div class="d-flex align-items-center justify-content-between stg-links-with-badge">
              <div class="d-md-none d-block navbar" id="search-bar">
                <?php echo do_shortcode('[fibosearch]'); ?>
              </div>
              <div>
                <?php if (is_user_logged_in()) : ?>
                  <a href="<?= get_site_url(); ?>/my-account" class="text-dark">
                    <!-- <img class="icon1" src="<?= get_template_directory_uri() . '/img/icons_image/account.svg'; ?>" alt=""> -->
                  </a>
                <?php else : ?>
                  <a href="<?= get_site_url(); ?>/my-account" class="text-dark xoo-el-reg-tgr" style="text-decoration:none;">
                    <img class="icon1" src="<?= get_template_directory_uri() . '/img/icons_image/account.svg'; ?>" alt="">
                    <!-- Login -->
                    <!-- Register -->
                  </a>
                <?php endif; ?>
              </div>

              <div>
                <?php $wishlist_page_url = YITH_WCWL()->get_last_operation_url(); ?>
                <a href="<?= $wishlist_page_url ?>">
                  <a href="<?= $wishlist_page_url; ?>">
                    <img class="icon2 ms-sm-0 ms-md-4" src="<?= get_template_directory_uri() . '/img/icons_image/heart.svg'; ?>" alt="">
                    <span class="whishlist-count-stg">
                      <?= do_shortcode('[yith_wcwl_items_count]') ?>
                    </span>
                  </a>
              </div>
              <div>
                <?php
                $cart_page_url = get_permalink(wc_get_page_id('cart'));
                ?>
                <a href="<?= $cart_page_url ?>">
                  <img class="icon3 ms-1 ms-md-4" src="<?= get_template_directory_uri() . '/img/icons_image/cart.svg'; ?>" alt="">
                  <!-- Items -->
                  <span class="cart-count-stg">
                    <?= count_item_in_cart(); ?>
                  </span>
                </a>
              </div>
            </div>


            <!-- Offcanvas Navbar -->
            <div class="offcanvas offcanvas-end d-block d-md-none" tabindex="-1" id="offcanvas-navbar">
              <div class="offcanvas-header bg-light">

                <!-- hide bootscore offcanvas button                  -->
                <!-- <span class="h5 mb-0"><?php esc_html_e('Menu', 'bootscore'); ?></span> -->
                <!-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> -->
              </div>
              <div class="offcanvas-body">
              </div>
            </div>
          </div><!-- .container -->
        </nav><!-- .navbar -->


        <!-- second menu -->
        <div id="top-nav-main" class="navbar navbar-expand-lg navbar-dark py-md-2 py-3 d-none d-md-block ">
          <div class="container text-center align-items-center justify-content-between">
            <!-- Navbar Brand -->
            <!-- <div> -->
            <!-- Display Logo On desktop Navbar Brand -->
            <a class="navbar-brand md d-none d-md-block" href="<?php echo esc_url(home_url()); ?>">
              <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/logo/main_logo.svg" alt="logo" class="logo md toggle-left-logo">
            </a>


            <!-- </?php the_custom_logo() ?> -->
            <!-- </div> -->


            <!-- main menus -->
            <?php include_once __DIR__ . '/shortcode/header-cat-menu.php'; ?>
            <!-- icon div contact botton -->
            <!-- Offcanvas Navbar -->
            <div class="offcanvas offcanvas-end d-block d-md-none" tabindex="-1" id="offcanvas-navbar">
              <div class="offcanvas-header bg-light">

                <!-- hide bootscore offcanvas button                  -->
                <!-- <span class="h5 mb-0"><?php esc_html_e('Menu', 'bootscore'); ?></span> -->
                <!-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> -->
              </div>
            </div>
          </div><!-- .container -->

        </div><!-- .navbar -->

        <!-- end second menu  -->
        <!-- if we want dropdown menu for hearder  -->
        <!-- <?php
              wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="promarc-navbar" class="navbar-nav  %2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new bootstrap_5_wp_nav_menu_walker()
              ));
              ?> -->


        <div class="header-actions d-flex align-items-center">

          <!-- Searchform Large -->
          <div class="d-none d-lg-block ms-1 ms-md-2 top-nav-search-lg">
            <?php if (is_active_sidebar('top-nav-search')) : ?>
              <div>
                <?php dynamic_sidebar('top-nav-search'); ?>
              </div>
            <?php endif; ?>
          </div>

          <!-- Search Toggler Mobile -->
          <button class="btn btn-outline-secondary d-lg-none ms-1 ms-md-2 top-nav-search-md" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-search" aria-expanded="false" aria-controls="collapse-search">
            <i class="fas fa-search"></i>
          </button>

          <!-- Navbar Toggler -->
        </div><!-- .header-actions -->

        <!-- Top Nav Search Mobile Collapse -->
        <div class="collapse container d-lg-none" id="collapse-search">
          <?php if (is_active_sidebar('top-nav-search')) : ?>
            <div class="mb-2">
              <?php dynamic_sidebar('top-nav-search'); ?>
            </div>
          <?php endif; ?>
        </div>
      </div><!-- .fixed-top .bg-light -->

    </header><!-- #masthead -->