<?php

/**
 * Bootscore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bootscore
 */


// WooCommerce
//require get_template_directory() . '/woocommerce/woocommerce-functions.php';
// WooCommerce END


define('eco_theme_dir', __DIR__);
require_once __DIR__ . '/shortcode/social_icon_field.php';
require_once __DIR__ . '/shortcode/woocommerce-hooks.php';


// Register Bootstrap 5 Nav Walker
if (!function_exists('register_navwalker')) :
  function register_navwalker()
  {
    require_once('inc/class-bootstrap-5-navwalker.php');
    // Register Menus
    register_nav_menu('main-menu', 'Main menu');
    register_nav_menu('footer-menu-1', 'Footer menu-1');
    register_nav_menu('footer-menu-2', 'Footer menu-2');
    register_nav_menu('footer-menu-3', 'Footer menu-3');
    register_nav_menu('footer-menu-4', 'Footer menu-4');
  }
endif;
add_action('after_setup_theme', 'register_navwalker');
// Register Bootstrap 5 Nav Walker END


// Register Comment List
if (!function_exists('register_comment_list')) :
  function register_comment_list()
  {
    // Register Comment List
    require_once('inc/comment-list.php');
  }
endif;
add_action('after_setup_theme', 'register_comment_list');
// Register Comment List END


if (!function_exists('bootscore_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function bootscore_setup()
  {
    /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Bootscore, use a find and replace
		 * to change 'bootscore' to the name of your theme in all the template files.
		 */
    load_theme_textdomain('bootscore', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
    add_theme_support('title-tag');

    /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
    add_theme_support('post-thumbnails');


    //  * Set the content excerpt based on the theme's design .

    add_post_type_support('page', 'excerpt');

    /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
    add_theme_support('html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',

    ));

    add_image_size('fullpage-thumb size', 300, 300);

    add_theme_support('widgets');

    // Set up the WordPress core custom background feature.
    add_theme_support(
      'custom-background',
      apply_filters(
        'vatogun_custom_background_args',
        array(
          'default-color' => 'ffffff',
          'default-image' => '',
        )
      )
    );


    /**
     * Add support for core custom logo.
     *
     */
    add_theme_support(
      'custom-logo',
      array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
      )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
  }
endif;
add_action('after_setup_theme', 'bootscore_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bootscore_content_width()
{
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters('bootscore_content_width', 640);
}
add_action('after_setup_theme', 'bootscore_content_width', 0);





/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// Widgets
if (!function_exists('bootscore_widgets_init')) :

  function bootscore_widgets_init()
  {


    // Top Nav
    register_sidebar(array(
      'name' => esc_html__('Top Nav', 'bootscore'),
      'id' => 'top-nav',
      'description' => esc_html__('Add widgets here.', 'bootscore'),
      'before_widget' => '<div class="ms-3">',
      'after_widget' => '</div>',
      'before_title' => '<div class="widget-title d-none">',
      'after_title' => '</div>'
    ));
    // Top Nav End

    // Top Nav Search
    register_sidebar(array(
      'name' => esc_html__('Top Nav Search', 'bootscore'),
      'id' => 'top-nav-search',
      'description' => esc_html__('Add widgets here.', 'bootscore'),
      'before_widget' => '<div class="top-nav-search">',
      'after_widget' => '</div>',
      'before_title' => '<div class="widget-title d-none">',
      'after_title' => '</div>'
    ));
    // Top Nav Search End

    // Sidebar
    register_sidebar(array(
      'name'          => esc_html__('Sidebar', 'bootscore'),
      'id'            => 'sidebar-1',
      'description'   => esc_html__('Add widgets here.', 'bootscore'),
      'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4 bg-light border-0">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title card-title border-bottom py-2">',
      'after_title'   => '</h2>',
    ));
    // Sidebar End

    // Top Footer
    register_sidebar(array(
      'name' => esc_html__('Top Footer', 'bootscore'),
      'id' => 'top-footer',
      'description' => esc_html__('Add widgets here.', 'bootscore'),
      'before_widget' => '<div class="footer_widget mb-5">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>'
    ));
    // Top Footer End

    // Footer 1
    register_sidebar(array(
      'name' => esc_html__('Footer 1', 'bootscore'),
      'id' => 'footer-1',
      'description' => esc_html__('Add widgets here.', 'bootscore'),
      'before_widget' => '<div class="footer_widget mb-4 f-logo_text">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget-title h4">',
      'after_title' => '</h2>'
    ));
    // Footer 1 End

    // Footer 2
    register_sidebar(array(
      'name' => esc_html__('Footer 2', 'bootscore'),
      'id' => 'footer-2',
      'description' => esc_html__('Add widgets here.', 'bootscore'),
      'before_widget' => '<div class="footer_widget mb-4">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget-title h4">',
      'after_title' => '</h2>'
    ));
    // Footer 2 End

    // Footer 3
    register_sidebar(array(
      'name' => esc_html__('Footer 3', 'bootscore'),
      'id' => 'footer-3',
      'description' => esc_html__('Add widgets here.', 'bootscore'),
      'before_widget' => '<div class="footer_widget mb-4">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget-title h4">',
      'after_title' => '</h2>'
    ));
    // Footer 3 End

    // Footer Menus Section
    // Footer 1st Menu Section 
    register_sidebar(array(
      'name' => esc_html__('Footer widget 1', 'bootscore'),
      'id' => 'footer-widget-1',
      'description' => esc_html__('Add widgets here.', 'bootscore'),
      'before_widget' => '<div class="footer_widget mb-4">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget-title h4">',
      'after_title' => '</h2>'
    ));
    // End Footer 1st Menu Section 

    // Footer 2nd Menu Section 
    register_sidebar(array(
      'name' => esc_html__('Footer widget 2', 'bootscore'),
      'id' => 'footer-widget-2',
      'description' => esc_html__('Add widgets here.', 'bootscore'),
      'before_widget' => '<div class="footer_widget mb-4">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget-title h4">',
      'after_title' => '</h2>'
    ));
    // End Footer 2nd Menu Section 


    // Footer Third Menu Section 
    register_sidebar(array(
      'name' => esc_html__('Footer widget 3', 'bootscore'),
      'id' => 'footer-widget-3',
      'description' => esc_html__('Add widgets here.', 'bootscore'),
      'before_widget' => '<div class="footer_widget mb-4">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget-title h4">',
      'after_title' => '</h2>'
    ));
    // End Footer Third Menu Section 

    // Footer Fourth Menu Section 
    register_sidebar(array(
      'name' => esc_html__('Footer widget 4', 'bootscore'),
      'id' => 'footer-widget-4',
      'description' => esc_html__('Add widgets here.', 'bootscore'),
      'before_widget' => '<div class="footer_widget mb-4">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget-title h4">',
      'after_title' => '</h2>'
    ));
    // End Footer Fourth Menu Section 


    // 404 Page
    register_sidebar(array(
      'name' => esc_html__('404 Page', 'bootscore'),
      'id' => '404-page',
      'description' => esc_html__('Add widgets here.', 'bootscore'),
      'before_widget' => '<div class="mb-4">',
      'after_widget' => '</div>',
      'before_title' => '<h1 class="widget-title">',
      'after_title' => '</h1>'
    ));
    // 404 Page End


  }
  add_action('widgets_init', 'bootscore_widgets_init');


endif;
// Widgets END


// Shortcode in HTML-Widget
add_filter('widget_text', 'do_shortcode');
// Shortcode in HTML-Widget End



//Enqueue scripts and styles
function bootscore_scripts()
{
  /* Owl Carousel */
  wp_enqueue_script('eco-owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js');
  // Get modification time. Enqueue files with modification date to prevent browser from loading cached scripts and styles when file content changes.
  $modificated_styleCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/style.css'));
  if (file_exists(get_template_directory() . '/css/lib/bootstrap.min.css')) {
    $modificated_bootscoreCss = date('YmdHi', filemtime(get_template_directory() . '/css/lib/bootstrap.min.css'));
  } else {
    $modificated_bootscoreCss = 1;
  }
  $modificated_fontawesomeCss = date('YmdHi', filemtime(get_template_directory() . '/css/lib/fontawesome.min.css'));
  $modificated_bootstrapJs = date('YmdHi', filemtime(get_template_directory() . '/js/lib/bootstrap.bundle.min.js'));
  $modificated_themeJs = date('YmdHi', filemtime(get_template_directory() . '/js/theme.js'));

  // Style CSS
  wp_enqueue_style('bootscore-style', get_stylesheet_uri(), array(), $modificated_styleCss);

  // bootScore
  require_once 'inc/scss-compiler.php';
  bootscore_compile_scss();
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/lib/bootstrap.min.css', array(), $modificated_bootscoreCss);

  /* Owl Carousel */
  wp_enqueue_style('eco-owl-carousel-style', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');


  // Fontawesome
  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/lib/fontawesome.min.css', array(), $modificated_fontawesomeCss);

  // Bootstrap JS
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/lib/bootstrap.bundle.min.js', array(), $modificated_bootstrapJs, true);

  // Theme JS
  wp_enqueue_script('bootscore-script', get_template_directory_uri() . '/js/theme.js', array('jquery'), $modificated_themeJs, true);

  // IE Warning
  wp_localize_script('bootscore-script', 'bootscore', array(
    'ie_title' => __('Internet Explorer detected', 'bootscore'),
    'ie_limited_functionality' => __('This website will offer limited functionality in this browser.', 'bootscore'),
    'ie_modern_browsers_1' => __('Please use a modern and secure web browser like', 'bootscore'),
    'ie_modern_browsers_2' => __(' <a href="https://www.mozilla.org/firefox/" target="_blank">Mozilla Firefox</a>, <a href="https://www.google.com/chrome/" target="_blank">Google Chrome</a>, <a href="https://www.opera.com/" target="_blank">Opera</a> ', 'bootscore'),
    'ie_modern_browsers_3' => __('or', 'bootscore'),
    'ie_modern_browsers_4' => __(' <a href="https://www.microsoft.com/edge" target="_blank">Microsoft Edge</a> ', 'bootscore'),
    'ie_modern_browsers_5' => __('to display this site correctly.', 'bootscore'),
  ));
  // IE Warning End

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'bootscore_scripts');
//Enqueue scripts and styles END


// Add <link rel=preload> to Fontawesome
add_filter('style_loader_tag', 'wpse_231597_style_loader_tag');

function wpse_231597_style_loader_tag($tag)
{

  $tag = preg_replace("/id='font-awesome-css'/", "id='font-awesome-css' online=\"if(media!='all')media='all'\"", $tag);

  return $tag;
}
// Add <link rel=preload> to Fontawesome END


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';



// /*** wordpress Customizer for customize your content******/
require get_template_directory() . '/shortcode/star-rating.php';

// <!-- This field for Custom Social Media Link and you can change or add link from wordpress settings -->
// require get_template_directory() . '/shortcode/social_icon_field.php';


/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}


// Amount of posts/products in category
if (!function_exists('wpsites_query')) :

  function wpsites_query($query)
  {
    if ($query->is_archive() && $query->is_main_query() && !is_admin()) {
      $query->set('posts_per_page', 24);
    }
  }
  add_action('pre_get_posts', 'wpsites_query');

endif;
// Amount of posts/products in category END


// Pagination Categories
if (!function_exists('bootscore_pagination')) :

  function bootscore_pagination($pages = '', $range = 2)
  {
    $showitems = ($range * 2) + 1;
    global $paged;
    if ($pages == '') {
      global $wp_query;
      $pages = $wp_query->max_num_pages;

      if (!$pages)
        $pages = 1;
    }

    if (1 != $pages) {
      echo '<nav aria-label="Page navigation" role="navigation">';
      echo '<span class="sr-only">Page navigation</span>';
      echo '<ul class="pagination justify-content-center ft-wpbs mb-4">';


      if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
        echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link(1) . '" aria-label="First Page">&laquo;</a></li>';

      if ($paged > 1 && $showitems < $pages)
        echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($paged - 1) . '" aria-label="Previous Page">&lsaquo;</a></li>';

      for ($i = 1; $i <= $pages; $i++) {
        if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems))
          echo ($paged == $i) ? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>' . $i . '</span></li>' : '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($i) . '"><span class="sr-only">Page </span>' . $i . '</a></li>';
      }

      if ($paged < $pages && $showitems < $pages)
        echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link(($paged === 0 ? 1 : $paged) + 1) . '" aria-label="Next Page">&rsaquo;</a></li>';

      if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages)
        echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($pages) . '" aria-label="Last Page">&raquo;</a></li>';

      echo '</ul>';
      echo '</nav>';
      // Uncomment this if you want to show [Page 2 of 30]
      // echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">of</span> '.$pages.' ]</div>';	 	
    }
  }

endif;
//Pagination Categories END


// Pagination Buttons Single Posts
add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');

function post_link_attributes($output)
{
  $code = 'class="page-link"';
  return str_replace('<a href=', '<a ' . $code . ' href=', $output);
}
// Pagination Buttons Single Posts END


// Excerpt to pages
add_post_type_support('page', 'excerpt');
// Excerpt to pages END


// Breadcrumb
if (!function_exists('the_breadcrumb')) :
  function the_breadcrumb()
  {
    if (!is_home()) {
      echo '<nav class="breadcrumb mb-4 mt-2 bg-light py-2 px-3 small rounded">';
      echo '<a href="' . home_url('/') . '">' . ('<i class="fas fa-home"></i>') . '</a><span class="divider">&nbsp;/&nbsp;</span>';
      if (is_category() || is_single()) {
        the_category(' <span class="divider">&nbsp;/&nbsp;</span> ');
        if (is_single()) {
          echo ' <span class="divider">&nbsp;/&nbsp;</span> ';
          the_title();
        }
      } elseif (is_page()) {
        echo the_title();
      }
      echo '</nav>';
    }
  }
  add_filter('breadcrumbs', 'breadcrumbs');
endif;
// Breadcrumb END


// Comment Button
function bootscore_comment_form($args)
{
  $args['class_submit'] = 'btn btn-outline-primary'; // since WP 4.1    
  return $args;
}
add_filter('comment_form_defaults', 'bootscore_comment_form');
// Comment Button END


// Password protected form
function bootscore_pw_form()
{
  $output = '
		  <form action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post" class="form-inline">' . "\n"
    . '<input name="post_password" type="password" size="" class="form-control me-2 my-1" placeholder="' . __('Password', 'bootscore') . '"/>' . "\n"
    . '<input type="submit" class="btn btn-outline-primary my-1" name="Submit" value="' . __('Submit', 'bootscore') . '" />' . "\n"
    . '</p>' . "\n"
    . '</form>' . "\n";
  return $output;
}
add_filter("the_password_form", "bootscore_pw_form");
// Password protected form END


// Allow HTML in term (category, tag) descriptions
foreach (array('pre_term_description') as $filter) {
  remove_filter($filter, 'wp_filter_kses');
  if (!current_user_can('unfiltered_html')) {
    add_filter($filter, 'wp_filter_post_kses');
  }
}

foreach (array('term_description') as $filter) {
  remove_filter($filter, 'wp_kses_data');
}
// Allow HTML in term (category, tag) descriptions END


// Allow HTML in author bio
remove_filter('pre_user_description', 'wp_filter_kses');
add_filter('pre_user_description', 'wp_filter_post_kses');
// Allow HTML in author bio END


// Hook after #primary
function bs_after_primary()
{
  do_action('bs_after_primary');
}
// Hook after #primary END


// Open links in comments in new tab
if (!function_exists('bs_comment_links_in_new_tab')) :
  function bs_comment_links_in_new_tab($text)
  {
    return str_replace('<a', '<a target="_blank" rel=”nofollow”', $text);
  }
  add_filter('comment_text', 'bs_comment_links_in_new_tab');
endif;
// Open links in comments in new tab END


// Disable Gutenberg blocks in widgets (WordPress 5.8)
// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter('gutenberg_use_widgets_block_editor', '__return_false');
// Disables the block editor from managing widgets.
add_filter('use_widgets_block_editor', '__return_false');
// Disable Gutenberg blocks in widgets (WordPress 5.8) END




// woocommerce support
function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'mytheme_add_woocommerce_support');
add_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);


// Display Discount price 
add_filter('woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3);
function add_percentage_to_sale_badge($html, $post, $product)
{
  if ($product->is_type('variable')) {
    $percentages = array();

    // Get all variation prices
    $prices = $product->get_variation_prices();

    // Loop through variation prices
    foreach ($prices['price'] as $key => $price) {
      // Only on sale variations
      if ($prices['regular_price'][$key] !== $price) {
        // Calculate and set in the array the percentage for each variation on sale
        $percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100));
      }
    }
    $percentage = max($percentages) . '%';
  } else {
    $regular_price = (float) $product->get_regular_price();
    $sale_price    = (float) $product->get_sale_price();

    $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
  }
  return '<span class="onsale">' . esc_html__(' ', 'woocommerce') . ' ' . $percentage . ' off' . '</span>';
}



// Display the Woocommerce Discount Percentage on the Sale Badge for variable products and single products
// add_action('woocommerce_before_shop_loop_item_title', 'bbloomer_show_sale_percentage_loop', 25);

// function bbloomer_show_sale_percentage_loop()
// {
//   global $product;
//   if (!$product->is_on_sale()) return;
//   if ($product->is_type('simple')) {
//     $max_percentage = (($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100;
//   } elseif ($product->is_type('variable')) {
//     $max_percentage = 0;
//     foreach ($product->get_children() as $child_id) {
//       $variation = wc_get_product($child_id);
//       $price = $variation->get_regular_price();
//       $sale = $variation->get_sale_price();
//       if ($price != 0 && !empty($sale)) $percentage = ($price - $sale) / $price * 100;
//       if ($percentage > $max_percentage) {
//         $max_percentage = $percentage;
//       }
//     }
//   }
//   if ($max_percentage > 0) echo "<div class='sale-perc text-start ms-2'>Sparte " . round($max_percentage) . "%</div>";
// }


//menu Sections 


if (!function_exists('stg_create_menu_li_item')) {
  function stg_create_menu_li_item($cat_item, $sub_cats = [])
  {
    $li_classes = ['menu-item', 'menu-item-type-post_type', 'menu-item-object-page', 'nav-item', "nav-item-$cat_item->term_id"];
    $a_classes = ['dropdown-item'];
    $li_classes = apply_filters('stg-header-li-item-classes', $li_classes, $cat_item, $sub_cats);

    $sub_item_content = "";

    /* Subcats */
    if (!empty($sub_cats)) {
      $li_classes[] = 'position-relative';
      $li_classes[] = 'stg-has-sub-items';
      $sub_item_content .= "<ul class='dropdown-menu stg-sub-item shadow-sm border-0'>";

      foreach ($sub_cats as $sub_cat) :
        $sub_category_id = $sub_cat->term_id;
        $taxonomy     = 'product_cat';
        $orderby      = 'name';
        $show_count   = 0;      // 1 for yes, 0 for no
        $pad_counts   = 0;      // 1 for yes, 0 for no
        $hierarchical = 1;      // 1 for yes, 0 for no  
        $title        = '';
        $empty        = 0;
        $args3 = array(
          'taxonomy'     => $taxonomy,
          'child_of'     => 0,
          'parent'       => $sub_category_id,
          'orderby'      => $orderby,
          'show_count'   => $show_count,
          'pad_counts'   => $pad_counts,
          'hierarchical' => $hierarchical,
          'title_li'     => $title,
          'hide_empty'   => $empty
        );
        $sub_cats_2 = get_categories($args3);


        $sub_item_content .= stg_create_menu_li_item($sub_cat, $sub_cats_2);
      endforeach;

      $sub_item_content .= "</ul>";
    }

    return '<li id="menu-item-' . $cat_item->term_id . '" class="' . implode(' ', $li_classes) . '"><a href="' . generate_filter_cat_link($cat_item) . '" class="' . implode(' ', $a_classes) . '">' . $cat_item->name . '</a>' . $sub_item_content . '</li>';
  }
}


// add to cart button icon 
