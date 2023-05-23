<?php
/**
* Plugin Name: Woo Tabbed Category Product Listing
* Plugin URI: https://www.quantumcloud.com/products/
* Description: WooCommerce addon to display Category based Product Listing in tab format on any page with a short code.
* Author: QuantumCloud
* Author URI: https://www.quantumcloud.com/
* Text Domain: woo-tabbed-category
* Requires at least: 4.6
* Version: 2.5.2
* License: GPL2
* Tested up to: 6.1
*/


if (!defined('WPINC')) {
    die;
}

if ( ! defined( 'WOO_PRODUCT_TAB_VERSION' ) ) {
    define('WOO_PRODUCT_TAB_VERSION', 2.2);
}
if ( ! defined( 'QC_WOO_TAB_PLUGIN_URL' ) ) {
    define('QC_WOO_TAB_PLUGIN_URL', plugin_dir_url(__FILE__));
}
if ( ! defined( 'QC_WOO_TAB_IMAGE_URL' ) ) {
    define('QC_WOO_TAB_IMAGE_URL', QC_WOO_TAB_PLUGIN_URL . "assets/images");
}


Class Woo_Tab_Product_Category_List
{

    private $id = 'woo-tab';
    private static $instance;

    public static function get_instance()
    {
        if (!self::$instance) {
            self::$instance = new self();
            self::$instance->init();
        }

    }


    public function admin_page()
    {
        $action = 'admin.php?page=woo-tab';

        if (is_admin()){

        ?>

        <form action="<?php echo esc_url($action); ?>" method="POST" enctype="multipart/form-data">
            <div class="qc_woo_free_admin">

                <h1> <?php esc_html_e( 'Woo Tabbed Category Product Listing Settings', 'woo-tabbed-category' ); ?></h1>
                <div class="updated notice">
                    <p> <?php esc_html_e( 'Use the shortcode', 'woo-tabbed-category' ); ?> <input type="text" class="qcld-woo-shortcode-code qcld-width" name="" value="[wtcpl-product-cat]"> <?php esc_html_e( 'inside any WordPress post or page to show
                        category wise WooCommerce product listing in tabbed format.', 'woo-tabbed-category' ); ?></p>
                </div>
                <div class="qc_woo_free_admin_left">


                    <label for="product_number"> <?php esc_html_e( 'Product in each category', 'woo-tabbed-category' ); ?></label>
                    <input type="text" name="product_number" id="product_number"
                           value="<?php echo esc_attr(get_option('product_number')); ?>"/>
                    <br>
                    <p class="qc-opt-dcs-font"> <?php esc_html_e( 'You can truncate category name by limiting number of letters to
                        display', 'woo-tabbed-category' ); ?></p>
                    <input type="number" name="max_char_per_cat" value="<?php echo esc_attr(get_option('max_char_per_cat')); ?>">
                    <br>
                    <p> <?php esc_html_e( 'Number of column in each category', 'woo-tabbed-category' ); ?></p>
                    <input type="text" name="column_number" id="product_number"
                           value="<?php echo esc_attr(get_option('column_number')); ?>"/>
                    <br>

                    <div class="admin_display_list admin_display_list_bg admin_display_list_full">
                        <p><?php esc_html_e( 'Select categories you want to exclude ( Use Ctrl+Select for multiple selections )', 'woo-tabbed-category' ); ?></p>
                        <?php $product_categories = get_terms('product_cat'); ?>
                        <?php $selected_categories = unserialize(get_option('selected_categories')); ?>
                        <select name="selected_categories[]" id="categories" multiple="multiple">
                            <option value=""> <?php esc_html_e( 'None', 'woo-tabbed-category' ); ?></option>
                            <?php if ($selected_categories != ''): ?>
                                <?php foreach ($selected_categories as $category) {
                                    if ($term = get_term_by('id', $category, 'product_cat')) { ?>
                                        <option value="<?php echo esc_attr($category); ?>"
                                                selected="selected"><?php echo esc_html($term->name); ?></option>
                                    <?php }
                                }
                                ?>
                            <?php endif; ?>
                            <?php foreach ($product_categories as $cats): ?>
                                <option value="<?php echo esc_attr($cats->term_id); ?>"><?php echo esc_html($cats->name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br>
                    <p> <?php esc_html_e( 'Display Category Image with Category filter', 'woo-tabbed-category' ); ?></p>
                    <ul class="radio-list">
                        <li>
                            <input type="radio"
                                   name="qc_woo_tabbed_enable_category_image" <?php echo(get_option('qc_woo_tabbed_enable_category_image') == 'enable' ? 'checked' : ''); ?>
                                   value="<?php echo esc_attr('enable'); ?>">
                             <?php esc_html_e( 'Enable', 'woo-tabbed-category' ); ?>
                        </li>
                        <li>
                            <input type="radio"
                                   name="qc_woo_tabbed_enable_category_image" <?php echo(get_option('qc_woo_tabbed_enable_category_image') == '' ? 'checked' : ''); ?>
                                   value="<?php echo esc_attr(''); ?>">
                             <?php esc_html_e( 'Disable', 'woo-tabbed-category' ); ?>
                        </li>
                    </ul>
                    <br>
                    <p> <?php esc_html_e( 'Load categories with URL', 'woo-tabbed-category' ); ?></p>
                    <ul class="radio-list">
                        <li>
                            <input type="radio"
                                   name="qc_woo_tabbed_display_category_url_based" <?php echo(get_option('qc_woo_tabbed_display_category_url_based') == 'enable' ? 'checked' : ''); ?>
                                   value="<?php echo esc_attr('enable'); ?>">
                             <?php esc_html_e( 'Enable', 'woo-tabbed-category' ); ?>
                        </li>
                        <li>
                            <input type="radio"
                                   name="qc_woo_tabbed_display_category_url_based" <?php echo(get_option('qc_woo_tabbed_display_category_url_based') == '' ? 'checked' : ''); ?>
                                   value="<?php echo esc_attr(''); ?>">
                             <?php esc_html_e( 'Disable', 'woo-tabbed-category' ); ?>
                        </li>
                    </ul>
                    <br>
                    <p><?php esc_html_e( 'Sort Category ', 'woo-tabbed-category' ); ?></p>
                    <ul class="radio-list woo_menu_orders">
                        <li>
                            <input type="radio"
                                   name="category_order" <?php echo(get_option('category_order') == 'asc' ? 'checked' : ''); ?>
                                   value="asc">
                            <?php esc_html_e( 'By Title Ascending ', 'woo-tabbed-category' ); ?>
                        </li>
                        <li>
                            <input type="radio"
                                   name="category_order" <?php echo(get_option('category_order') == 'desc' ? 'checked' : ''); ?>
                                   value="desc">
                            <?php esc_html_e( 'By Title Descending', 'woo-tabbed-category' ); ?>
                        </li>
                        <li>
                            <input type="radio"
                                   name="category_order" <?php echo(get_option('category_order') == 'menu_order' ? 'checked' : ''); ?>
                                   value="menu_order">
                            <?php esc_html_e( 'Menu Order', 'woo-tabbed-category' ); ?>
                        </li>
                        <li>
                            <input type="radio"
                                   name="category_order" <?php echo(get_option('category_order') == 'term_order' ? 'checked' : ''); ?>
                                   value="term_order">
                            <?php esc_html_e( 'Order by Category ID', 'woo-tabbed-category' ); ?>
                        </li>
                    </ul>

                    <p> <?php esc_html_e( 'Sort products by', 'woo-tabbed-category' ); ?></p>
                    <ul class="radio-list">
                        <li>
                            <input type="radio"
                                   name="qcld_orderby_product" <?php echo(get_option('qcld_orderby_product') == 'title' ? 'checked' : ''); ?>
                                   value="<?php echo esc_attr('title'); ?>">
                             <?php esc_html_e( 'Title', 'woo-tabbed-category' ); ?>
                        </li>
                        <li>
                            <input type="radio"
                                   name="qcld_orderby_product" <?php echo(get_option('qcld_orderby_product') == 'date' ? 'checked' : ''); ?>
                                   value="<?php echo esc_attr('date'); ?>">
                             <?php esc_html_e( 'Date', 'woo-tabbed-category' ); ?>
                        </li>
                        <li>
                            <input type="radio"
                                   name="qcld_orderby_product" <?php echo(get_option('qcld_orderby_product') == 'rand' ? 'checked' : ''); ?>
                                   value="<?php echo esc_attr('rand'); ?>">
                             <?php esc_html_e( 'Rand', 'woo-tabbed-category' ); ?>
                        </li>
                        <li>
                            <input type="radio"
                                   name="qcld_orderby_product" <?php echo(get_option('qcld_orderby_product') == 'id' ? 'checked' : ''); ?>
                                   value="<?php echo esc_attr('id'); ?>">
                             <?php esc_html_e( 'ID', 'woo-tabbed-category' ); ?>
                        </li>

                        <li>
                            <input type="radio"
                                   name="qcld_orderby_product" <?php echo(get_option('qcld_orderby_product') == 'menu_order' ? 'checked' : ''); ?>
                                   value="menu_order">
                            <?php esc_html_e( 'Menu Order', 'woo-tabbed-category' ); ?>
                        </li>
                    </ul>
                    <br>

                    <p> <?php esc_html_e( 'Product sorting order', 'woo-tabbed-category' ); ?></p>
                    <ul class="radio-list">
                        <li>
                            <input type="radio"
                                   name="order_product_by" <?php echo(get_option('order_product_by') == 'ASC' ? 'checked' : ''); ?>
                                   value="<?php echo esc_attr('ASC'); ?>">
                             <?php esc_html_e( 'Ascending', 'woo-tabbed-category' ); ?>
                        </li>
                        <li>
                            <input type="radio"
                                   name="order_product_by" <?php echo(get_option('order_product_by') == 'DESC' ? 'checked' : ''); ?>
                                   value="<?php echo esc_attr('DESC'); ?>">
                             <?php esc_html_e( 'Descending', 'woo-tabbed-category' ); ?>
                        </li>
                    </ul>
                    <br>

                    <p> <?php esc_html_e( 'Use Category ID', 'woo-tabbed-category' ); ?> <i><?php esc_html_e( '( Try turning this on if category tabs are not working for non-English stores )', 'woo-tabbed-category' ); ?></i></p>
                    <ul class="radio-list">
                        <li>
                            <input type="radio"
                                   name="qcld_use_category_tab" <?php echo(get_option('qcld_use_category_tab') == 'slug' ? 'checked' : ''); ?>
                                   value="<?php echo esc_attr('slug'); ?>">
                             <?php esc_html_e( 'Slug', 'woo-tabbed-category' ); ?>
                        </li>
                        <li>
                            <input type="radio"
                                   name="qcld_use_category_tab" <?php echo(get_option('qcld_use_category_tab') == 'id' ? 'checked' : ''); ?>
                                   value="<?php echo esc_attr('id'); ?>">
                             <?php esc_html_e( 'ID', 'woo-tabbed-category' ); ?>
                        </li>
                    </ul>
                    <p> <?php esc_html_e( 'Scroll to product section when click category', 'woo-tabbed-category' ); ?></p>
                    <ul class="radio-list">
                        <li>
                            <input type="radio"
                                   name="qc_woo_tabbed_scroll_category_clickable" <?php echo(get_option('qc_woo_tabbed_scroll_category_clickable') == 'enable' ? 'checked' : ''); ?>
                                   value="<?php echo esc_attr('enable'); ?>">
                             <?php esc_html_e( 'Enable', 'woo-tabbed-category' ); ?>
                        </li>
                        <li>
                            <input type="radio"
                                   name="qc_woo_tabbed_scroll_category_clickable" <?php echo(get_option('qc_woo_tabbed_scroll_category_clickable') == '' ? 'checked' : ''); ?>
                                   value="<?php echo esc_attr(''); ?>">
                             <?php esc_html_e( 'Disable', 'woo-tabbed-category' ); ?>
                        </li>
                    </ul>
                    <br>

                    <p> <?php esc_html_e( 'Shortcode Preview with Page Builder ', 'woo-tabbed-category' ); ?> <i><?php esc_html_e( ' (ex: Elementor)', 'woo-tabbed-category' ); ?></i></p>
                    <ul class="radio-list">
                        <li>
                            <input type="radio"
                                   name="qc_woo_tabbed_shortcode_preview" <?php echo(get_option('qc_woo_tabbed_shortcode_preview') == 'enable' ? 'checked' : ''); ?>
                                   value="<?php echo esc_attr('enable'); ?>">
                             <?php esc_html_e( 'Enable', 'woo-tabbed-category' ); ?>
                        </li>
                        <li>
                            <input type="radio"
                                   name="qc_woo_tabbed_shortcode_preview" <?php echo(get_option('qc_woo_tabbed_shortcode_preview') == 'disable' ? 'checked' : ''); ?>
                                   value="<?php echo esc_attr('disable'); ?>">
                             <?php esc_html_e( 'Disable', 'woo-tabbed-category' ); ?>
                        </li>
                    </ul>
                    <br>

                    <p> <?php esc_html_e( 'Show Empty Category', 'woo-tabbed-category' ); ?> <i><?php esc_html_e( ' ( If there is no Product in category )', 'woo-tabbed-category' ); ?></i></p>
                    <ul class="radio-list">
                        <li>
                            <input type="radio"
                                   name="qc_woo_tabbed_show_empty_category" <?php echo(get_option('qc_woo_tabbed_show_empty_category') == 'enable' ? 'checked' : ''); ?> value="<?php echo esc_attr('enable'); ?>">
                             <?php esc_html_e( 'Enable', 'woo-tabbed-category' ); ?>
                        </li>
                        <li>
                            <input type="radio"
                                   name="qc_woo_tabbed_show_empty_category" <?php echo( ( get_option('qc_woo_tabbed_show_empty_category') == 'disable' || get_option('qc_woo_tabbed_show_empty_category') == '' ) ? 'checked' : ''); ?> value="<?php echo esc_attr('disable'); ?>">
                             <?php esc_html_e( 'Disable', 'woo-tabbed-category' ); ?>
                        </li>
                    </ul>

                    <br>
                    <label for="product_number"> <?php esc_html_e( 'Empty Category Message', 'woo-tabbed-category' ); ?></label>
                    <input type="text" name="qc_woo_tabbed_show_empty_category_msg" id="qc_woo_tabbed_show_empty_category_msg"
                           value="<?php echo esc_attr(get_option('qc_woo_tabbed_show_empty_category_msg') ? get_option('qc_woo_tabbed_show_empty_category_msg') : 'No product found in this category' ); ?>"/>


                    <br>
                    <p class="qc-opt-dcs-font"> <?php esc_html_e( 'You can paste or write your custom css here.', 'woo-tabbed-category' ); ?></p>
                    <textarea name="custom_global_css"
                              class="form-control custom-global-css"
                              cols="" rows="15"><?php echo esc_textarea( get_option('custom_global_css') , 'woo-tabbed-category' ); ?></textarea>
                    <br>
                    <?php wp_nonce_field('woo-tab'); ?>
                    <div class="admin_cus_btn1">
                        <input type="submit" class="btn btn-primary submit-button" name="submit"
                               id="submit" value="<?php esc_attr_e('Save Settings', 'woo-tabbed-category'); ?>"/>
                    </div>
                </div>
                <div class="qc_woo_free_admin_right">
                    <h2> <?php esc_html_e( 'Upgrade to Pro', 'woo-tabbed-category' ); ?></h2>
                    <ul>
                        <li><?php esc_html_e( '10+ Innovative Design Templates', 'woo-tabbed-category' ); ?></li>
                        <li><?php esc_html_e( 'AJAX Load More & Add to Cart', 'woo-tabbed-category' ); ?></li>
                        <li><?php esc_html_e( 'AJAX Tabbed/Accordion/Carousel Filtering ', 'woo-tabbed-category' ); ?></li>
                        <li><?php esc_html_e( 'Show Category wise Featured/On Sale Products Only ', 'woo-tabbed-category' ); ?></li>
                        <li><?php esc_html_e( 'Display Sub Categories in Drop Down ', 'woo-tabbed-category' ); ?></li>
                        <li><?php esc_html_e( 'Shortcode for Hot, New, Best Buy and Featured Products ', 'woo-tabbed-category' ); ?></li>
                        <li><?php esc_html_e( 'Scroll/Stacked Category Filter Tabs ', 'woo-tabbed-category' ); ?></li>
                        <li><?php esc_html_e( 'Product Quick View (one page shop) ', 'woo-tabbed-category' ); ?></li>
                        <li><?php esc_html_e( 'Fixed Position Filter Tabs ', 'woo-tabbed-category' ); ?></li>
                        <li><?php esc_html_e( 'Front End Product Filtering & Ordering ', 'woo-tabbed-category' ); ?></li>
                        <li><?php esc_html_e( 'Floating Ajax Quick Cart! ', 'woo-tabbed-category' ); ?></li>
                        <li><?php esc_html_e( 'Selectively Display Price, Rating, Title, Cart Link ', 'woo-tabbed-category' ); ?></li>
                        <li><?php esc_html_e( 'Exclude Categories ', 'woo-tabbed-category' ); ?></li>
                        <li><?php esc_html_e( 'Sidebar Widget with Collapsible Category Links ', 'woo-tabbed-category' ); ?></li>
                        <li><?php esc_html_e( 'Customer Conversion Reporting with Charts and Graphs ', 'woo-tabbed-category' ); ?></li>
                        <li><?php esc_html_e( 'Customize Colors and Languages ', 'woo-tabbed-category' ); ?></li>
                    </ul>
                    <a href="<?php echo esc_url( 'https://www.quantumcloud.com/products/woo-tabbed-category-product-listing/', 'woo-tabbed-category' ); ?>" target="_blank"
                       class="upgrade_btn"> <?php esc_html_e( 'Upgrade Now!', 'woo-tabbed-category' ); ?></a></div>


                <div class="qc_woo_free_admin_right copy_right_box">
                    
                    <?php esc_html_e( 'Woo Tabbed was developed by Web Design Company -', 'woo-tabbed-category' ); ?> <a href="<?php echo esc_url( 'https://www.quantumcloud.com/', 'woo-tabbed-category' ); ?>" target="_blank">QuantumCloud</a>. <?php esc_html_e( 'We provide all kinds of ', 'woo-tabbed-category' ); ?>
                    <a href="<?php echo esc_url( 'https://www.quantumcloud.com/services/', 'woo-tabbed-category' ); ?>" target="_blank"> <?php esc_html_e( 'Custom WordPress Development services', 'woo-tabbed-category' ); ?></a>.


                </div>


                <div class="qc_woo_free_admin_right copy_right_box">
                    <div class="qcld_woo_tabbed_wholessale_woo_wrap">
                        <div class="qcld_woo_tabbed_wholessale_woo">
                            <a href="<?php echo esc_url('https://www.quantumcloud.com/products/wholesale-plugin-for-woocommerce/'); ?>" target="_blank"><img src="<?php echo esc_url(QC_WOO_TAB_IMAGE_URL); ?>/wholesale-woocommerce-plugin.png" alt=""></a>
                           
                <p><?php esc_html_e( 'Increase sales on your Woocommerce shop with the Wholesale addon. Provides useful features like Role Based Pricing, Dynamic Pricing and discounts based on Weight, Quantity, Price, Total Units and Number of items and Minimum Maximum Quantity for checkout.', 'woo-tabbed-category' ); ?></p> <p style="font-size: 15px;"> <?php esc_html_e( 'Wholesale features plugin works with WooTabbed', 'woo-tabbed-category' ); ?> <b><?php esc_html_e( 'Free', 'woo-tabbed-category' ); ?></b>, <?php esc_html_e( 'WooTabbed', 'woo-tabbed-category' ); ?> <b><?php esc_html_e( 'Pro', 'woo-tabbed-category' ); ?></b> <?php esc_html_e( 'and', 'woo-tabbed-category' ); ?> <b> <?php esc_html_e( 'any', 'woo-tabbed-category' ); ?></b> <?php esc_html_e( 'Woocommerce site.', 'woo-tabbed-category' ); ?></p>
                            <p><a href="<?php echo esc_url('https://www.quantumcloud.com/products/wholesale-plugin-for-woocommerce/'); ?>" target="_blank"><?php esc_html_e( 'Get it Now!', 'woo-tabbed-category' ); ?> </a></p>
                        </div>
                    </div>
                </div>


                <div class="clear" style="clear:both;"></div>
            </div>
        </form>
    <?php } }


    public function admin_menu()
    {

        /*
            add_submenu_page(
                    'woocommerce',
                    esc_html__('Woo Tabbed', 'woo-tab'),
                    esc_html__('Woo Tabbed', 'woo-tab'),
                    'manage_woocommerce',
                    $this->id,
                    array($this, 'admin_page')
                );
        */

        add_menu_page(
            esc_html__('Woo Tabbed', 'woo-tab'),
            esc_html__('Woo Tabbed', 'woo-tab'),
            'manage_options',
            'woo-tab',
            array($this, 'admin_page'),
            'dashicons-cart',
            20
        );


        add_submenu_page(
                'woo-tab',
                esc_html__('Woo Tabbed', 'woo-tab'),
                esc_html__('Woo Tabbed', 'woo-tab'),
                'manage_woocommerce',
                $this->id,
                array($this, 'admin_page')
            );

    }


    function woo_tab_save_options()
    {


        global $woocommerce;
        if (isset($_POST['_wpnonce']) && $_POST['_wpnonce']) {

            wp_verify_nonce($_POST['_wpnonce'], 'woo-tab');

            // Check if the form is submitted or not

            if (isset($_POST['submit'])) {

                $product_number                                 = sanitize_text_field($_POST['product_number']);
                $max_char_per_cat                               = sanitize_text_field($_POST['max_char_per_cat']);
                $custom_global_css                              = sanitize_text_field($_POST['custom_global_css']);
                $column_number                                  = sanitize_text_field($_POST['column_number']);
                $category_order                                 = sanitize_text_field($_POST['category_order']);
                $qcld_orderby_product                           = sanitize_text_field($_POST['qcld_orderby_product']);
                $order_product_by                               = sanitize_text_field($_POST['order_product_by']);

                $qcld_use_category_tab                          = sanitize_text_field($_POST['qcld_use_category_tab']);
                $qc_woo_tabbed_enable_category_image            = sanitize_text_field($_POST['qc_woo_tabbed_enable_category_image']);
                $qc_woo_tabbed_display_category_url_based       = sanitize_text_field($_POST['qc_woo_tabbed_display_category_url_based']);
                $qc_woo_tabbed_shortcode_preview                = sanitize_text_field($_POST['qc_woo_tabbed_shortcode_preview']);
                $qc_woo_tabbed_scroll_category_clickable        = sanitize_text_field($_POST['qc_woo_tabbed_scroll_category_clickable']);
                $qc_woo_tabbed_show_empty_category              = sanitize_text_field($_POST['qc_woo_tabbed_show_empty_category']);
                $qc_woo_tabbed_show_empty_category_msg          = sanitize_text_field($_POST['qc_woo_tabbed_show_empty_category_msg']);


                update_option('product_number', $product_number);
                update_option('max_char_per_cat', $max_char_per_cat);
                // update_option('custom_global_css', $custom_global_css);
                update_option('custom_global_css', str_replace('\\', '', $custom_global_css ));
                update_option('column_number', $column_number);
                update_option('category_order', $category_order);
                update_option('qcld_orderby_product', $qcld_orderby_product);
                update_option('order_product_by', $order_product_by);
                update_option('qcld_use_category_tab', $qcld_use_category_tab);
                update_option('qc_woo_tabbed_shortcode_preview', $qc_woo_tabbed_shortcode_preview);
                update_option('qc_woo_tabbed_show_empty_category', $qc_woo_tabbed_show_empty_category);
                update_option('qc_woo_tabbed_show_empty_category_msg', $qc_woo_tabbed_show_empty_category_msg);
                update_option('qc_woo_tabbed_enable_category_image', $qc_woo_tabbed_enable_category_image);
                update_option('qc_woo_tabbed_display_category_url_based', $qc_woo_tabbed_display_category_url_based);
                update_option('qc_woo_tabbed_scroll_category_clickable', $qc_woo_tabbed_scroll_category_clickable);

                if (isset($_POST['selected_categories'])) {
                    
                    if(!is_serialized($_POST['selected_categories'])) { 
                        $selected_categories = wp_parse_id_list($_POST['selected_categories']);
                        //serialize it 
                        update_option('selected_categories', maybe_serialize($selected_categories));

                    }

                }


            }

        }
        
    }


    public function init()
    {

        include_once 'class-qc-free-plugin-upgrade-notice.php';

        add_action('admin_menu', array($this, 'admin_menu'));

        // Check if WooCommerce is active, and is required WooCommerce version.
        if (!class_exists('WooCommerce') || version_compare(get_option('woocommerce_db_version'), WOO_PRODUCT_TAB_VERSION, '<')) {
            add_action('admin_notices', array($this, 'woocommerce_inactive_notice'));
            return;
        }


        if ((!empty($_GET["page"])) && ($_GET["page"] == "woo-tab")) {
            add_action('admin_init', array($this, 'woo_tab_save_options'));
        }


    }


    /**
     * Display Notifications on specific criteria.
     *
     * @since    2.14
     */
    public static function woocommerce_inactive_notice()
    {
        if (current_user_can('activate_plugins')) :
            if (!class_exists('WooCommerce')) :
                deactivate_plugins(plugin_basename(__FILE__));
                // wp_die('You need to activate WooCommerce first.');
                ?>
                <style>
                    .updated {
                        display: none;
                    }
                </style>
                <div id="message" class="error">
                    <p>
                        <?php
                        printf(
                            __('%sWoo Tabbed Category Product Listing REQUIRES WooCommerce%s %sWooCommerce%s must be active for Woo Tabbed Category Product Listing to work. Please install & activate WooCommerce.', 'woo-tabbed-category'),
                            '<strong>',
                            '</strong><br>',
                            '<a href="http://wordpress.org/extend/plugins/woocommerce/" target="_blank" >',
                            '</a>'
                        );
                        ?>
                    </p>
                </div>
                <?php
            elseif (version_compare(get_option('woocommerce_db_version'), WOO_PRODUCT_TAB_VERSION, '<')) :
                ?>
                <div id="message" class="error">
                    <p>
                        <?php
                        printf(
                            __('%sWoo Tabbed Category Product Listing is inactive%s This version of Woo Tabbed Category Product Listing requires WooCommerce %s or newer. For more information about our WooCommerce version support %sclick here%s.', 'woo-tabbed-category'),
                            '<strong>',
                            '</strong><br>',
                            WOO_PRODUCT_TAB_VERSION
                        );
                        ?>
                    </p>
                    <div style="clear:both;"></div>
                </div>
                <?php
            endif;
        endif;
    }
}


if (!function_exists('init_woo_tab_cat_list')) {
    function init_woo_tab_cat_list()
    {

        global $woo_tab_cat_list;

        $woo_tab_cat_list = Woo_Tab_Product_Category_List::get_instance();
    }
}


add_action('plugins_loaded', 'init_woo_tab_cat_list');

/**
 * Register the shortcode
 */

add_shortcode('wtcpl-product-cat', 'wtcpl_load_products');


/**
 * Check first if WooCommerce is activated or not
 */

// Plugin Code Below

require_once(plugin_dir_path(__FILE__) . 'class-woo-tabbed-category-product-listing.php');

if ( ! function_exists( 'woo_tabbed_category_start' ) ) {
    function woo_tabbed_category_start(){
        
        $tabbed_category = new Woo_Tabbled_Categoty();
        $tabbed_category->initialize();
    }
}

if ( ! function_exists( 'woo_tabbed_category_load_js_file' ) ) {
    function woo_tabbed_category_load_js_file(){

        global $pagenow;

       // if ( isset($_GET['page']) && ($_GET['page'] == 'woo-tab')) {

            woo_tabbed_category_start();
       // }

    }
}
add_action('admin_init', 'woo_tabbed_category_load_js_file');

/**
 * Loading the plugin specific javascript files.
 */

// add_action('wp_enqueue_scripts', 'wtcpl_plugin_scripts');
// add_action('wp_enqueue_scripts', 'wtcpl_scroll_to_scripts');
// add_action('wp_enqueue_scripts', 'wtcpl_plugin_styles');

if ( ! function_exists( 'wtcpl_plugin_scripts' ) ) {
    function wtcpl_plugin_scripts(){

        global $post;
       // if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'wtcpl-product-cat') ) {

            wp_enqueue_script('wtcpl-product-cat-js', plugins_url('/js/wtcpl-scripts.js', __FILE__), array('jquery'));

            wp_add_inline_script( 'wtcpl-product-cat-js', 
                    '
                     var display_category_url_based = "' . get_option('qc_woo_tabbed_display_category_url_based') . '";
                     var qc_scroll_category_clickable = "' . get_option('qc_woo_tabbed_scroll_category_clickable') . '";

                    ', 'before');
      //  }

    }

}

if ( ! function_exists( 'wtcpl_scroll_to_scripts' ) ) {
    function wtcpl_scroll_to_scripts(){

        global $post;
       // if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'wtcpl-product-cat') ) {

            wp_enqueue_script('wtcpl-scroll-to-js', plugins_url('/js/jquery.scrollTo-1.4.3.1-min.js', __FILE__), array('jquery'));
       // }

    }

}


/**
 * Loading the plugin specific stylesheet files.
 */
if ( ! function_exists( 'wtcpl_plugin_styles' ) ) {
    function wtcpl_plugin_styles(){

        global $post;
       // if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'wtcpl-product-cat') ) {

            wp_register_style('wtcpl_plugin_style', plugin_dir_url(__FILE__) . 'css/wtcpl-styles.css');
            wp_enqueue_style('wtcpl_plugin_style');

            // Override Global Stylesheet from admin settings.
            wp_add_inline_style( 'wtcpl_plugin_style', get_option('custom_global_css') );

        //}

    }

}



/**
 * The wtcpl_load_products() body
 */
if ( ! function_exists( 'wtcpl_load_products' ) ) {
    function wtcpl_load_products()
    {


    $qc_woo_tabbed_shortcode_preview = get_option('qc_woo_tabbed_shortcode_preview');

    if($qc_woo_tabbed_shortcode_preview != 'enable'){

        if (is_admin()) {
            return;
        }

    }

       // if (!is_admin()) {
            ob_start();
            $product_number                     = esc_attr(get_option('product_number'));
            $column_number                      = esc_attr(get_option('column_number'));
            $qc_woo_tabbed_show_empty_category  = esc_attr(get_option('qc_woo_tabbed_show_empty_category')) == 'enable' ? 0 : 1;

            wtcpl_plugin_scripts();
            wtcpl_scroll_to_scripts();
            wtcpl_plugin_styles();
            ?>
            <div class="wtcpl_container">
                <div id="nav-holder">
                    <div class="wtcpl_category_nav" id="wtcpl_tabs">
                        <?php

                        $product_categories = unserialize(get_option('selected_categories'));

                        if(!empty($product_categories) ){

                            $category_orders = get_option('category_order');

                            if($category_orders == 'menu_order'){
                                $args = array(
                                    'number'        => '',
                                    'order'         => 'asc',
                                    'orderby'       => 'menu_order',
                                    'hide_empty'    => $qc_woo_tabbed_show_empty_category,
                                    'exclude'       => $product_categories,
                                    //'include'       => $category_ids,
                                );
                            }else if($category_orders == 'term_order'){
                                $args = array(
                                    'number'        => '',
                                    'order'         => 'asc',
                                    'orderby'       => 'term_order',
                                    'hide_empty'    => $qc_woo_tabbed_show_empty_category,
                                    'exclude'       => $product_categories,
                                    //'include'       => $category_ids,
                                );
                            }else{
                                $args = array(
                                    'number'        => '',
                                    'order'         => get_option('category_order'),
                                    'orderby'       => 'title',
                                    'hide_empty'    => $qc_woo_tabbed_show_empty_category,
                                    'exclude'       => $product_categories,
                                    //'include'       => $category_ids,
                                );

                            }

                        }else{

                            $category_orders = get_option('category_order');

                            if($category_orders == 'menu_order'){

                                $args = array(
                                    'number'        => '',
                                    'order'         => 'asc',
                                    'orderby'       => 'menu_order',
                                    'hide_empty'    => $qc_woo_tabbed_show_empty_category,
                                    'include'       => ''
                                );
                            }else if($category_orders == 'term_order'){

                                $args = array(
                                    'number'        => '',
                                    'order'         => 'asc',
                                    'orderby'       => 'term_order',
                                    'hide_empty'    => $qc_woo_tabbed_show_empty_category,
                                    'include'       => ''
                                );
                            }else{

                                $args = array(
                                    'number'        => '',
                                    'order'         => get_option('category_order'),
                                    'orderby'       => 'title',
                                    'hide_empty'    => $qc_woo_tabbed_show_empty_category,
                                    'include'       => ''
                                );

                            }
                        }
            // $product_categories = get_terms('product_cat', $args);

                        $product_categories = get_terms('product_cat', $args); ?>
                        <ul>
                            <?php
                            $i = 0;
                            foreach ($product_categories as $cat) {

                                $slug_url = (get_option('qcld_use_category_tab') == 'id') ? $cat->term_id : $cat->slug;


                                ?>
                                <li><a id="<?php echo esc_attr($slug_url); ?>"
                                       class="product-<?php echo esc_attr($slug_url); echo($i == 0 ? ' active' : ''); ?>" data-name="<?php echo esc_attr($cat->name); ?>" href="#">

                                        <?php
                                        if(!empty(get_option('qc_woo_tabbed_enable_category_image')) || ( isset($cat_image_on_top) && $cat_image_on_top == 'enable' ) ){
                                            qcld_get_category_image($cat->term_id); 
                                        }
                                        ?>
                                       <?php echo esc_attr(substr($cat->name, 0, get_option('max_char_per_cat'))); ?></a>
                                </li>
                                <?php
                                $i++;
                            }
                            wp_reset_query();
                            ?>
                        </ul>
                        <!--   <div class="clear"></div>-->
                    </div>
                </div>
                <div class="product_content" id="wtcpl_tabs_container">
                    <?php
                    $i = 0;
                    foreach ($product_categories as $cat) {
                        $slug_url = (get_option('qcld_use_category_tab') == 'id') ? $cat->term_id : $cat->slug;

                        ?>
                        <div class="each_cat<?php echo($i == 0 ? ' active' : ''); ?>" id="product-<?php echo esc_attr($slug_url); ?>">
                            <?php

                            $args_query = array(
                            'post_type'             => 'product',
                            'post_status'           => 'publish',
                            'tax_query'             => array(
                                                    'relation' => 'OR',
                                                    array(
                                                        'taxonomy' => 'product_cat',
                                                        'field' => 'term_id',
                                                        'terms' => $cat->term_id,
                                                        'operator' => 'IN'
                                            ),
                                        )
                                    );

                            $product_querys = new WP_Query($args_query);
                            $product_nums = $product_querys->post_count;

                            if($product_nums > 0){

                                echo do_shortcode('[product_category category="' . esc_attr($cat->slug) . '" per_page=' . esc_attr($product_number) . ' columns=' . esc_attr($column_number) . ' orderby="' . esc_attr(get_option('qcld_orderby_product')) . '" order="' . esc_attr(get_option('order_product_by')) . '"]');

                            }else{
                                echo "<div class='wtcpl_category_empty_msg'> ". esc_html( get_option('qc_woo_tabbed_show_empty_category_msg') ) ." </div>";
                            }
                            ?>
                        </div>
                        <?php $i++;
                    }
                    wp_reset_query();

                    ?>
                </div>
            </div>
            <?php
            return ob_get_clean();
       // }
    }
}

function plugin_settings_page()
{
    ?>
    <?php
}




register_activation_hook(__FILE__, 'woo_tab_demo_content');
if ( ! function_exists( 'woo_tab_demo_content' ) ) {
    function woo_tab_demo_content(){

        update_option('product_number', 20);
        update_option('max_char_per_cat', 20);
        update_option('column_number', 4);
        update_option('category_order', 'menu_order');
        update_option('qcld_orderby_product', 'title');
        update_option('order_product_by', 'ASC');
        update_option('qcld_use_category_tab', 'slug');
        update_option('qc_woo_tabbed_shortcode_preview', 'disable');
        update_option('qc_woo_tabbed_show_empty_category', 'disable');
        update_option('qc_woo_tabbed_show_empty_category_msg', 'No product found in this category.');
        add_option('woo_tabbed_plugin_do_activation_redirect', true);

    }
}

// redirect when activation plugin...
add_action('admin_init', 'woo_tabbed_plugin_redirect');
if ( ! function_exists( 'woo_tabbed_plugin_redirect' ) ) {
    function woo_tabbed_plugin_redirect(){
        if(get_option('woo_tabbed_plugin_do_activation_redirect', false)){
            delete_option('woo_tabbed_plugin_do_activation_redirect');
            if(!isset($_GET['activate-multi'])){
                wp_redirect("admin.php?page=woo-tab");
            }
        }
    }
}


// category image 
if ( ! function_exists( 'qcld_get_category_image' ) ) {

    function qcld_get_category_image($cat_id){

        $thumbnail_id = get_term_meta($cat_id, 'thumbnail_id', true);
        if(get_option('qc_woo_tabbed_display_category_image_top') == 'enable'){

            $image = wp_get_attachment_image($thumbnail_id, array(80, 80), "", array("class" => "qcld_category_image_top"));

        }else{

            $image = wp_get_attachment_image($thumbnail_id, array(25, 25), "", array("class" => "qcld_category_image qcld_category_image_top"));
        }

        if ($image) {
            echo $image;
        }

    }
}


require_once('class-plugin-deactivate-feedback.php');
$wpbot_feedback = new Wp_Usage_woo_tabbed_Feedback( __FILE__, 'plugins@quantumcloud.com', false, true );


require_once('woo-tabbed-min-max-qty.php');
require_once('woo-tabbed-dynamic-discount-price.php');



// add_action( 'admin_notices', 'woo_tabbed_pro_notice',100 );
if ( ! function_exists( 'woo_tabbed_pro_notice' ) ) {
    function woo_tabbed_pro_notice(){
        global $pagenow, $typenow;
        $screen = get_current_screen();

        if(isset($screen->base) && ( $screen->base == 'toplevel_page_woo-tab' ) ){
        ?>
        <div id="message-tabbed" class="notice notice-info is-dismissible" style="padding:4px 0px 0px 4px;background:#000;">
            <?php
                printf(
                    __('%s  %s  %s', 'woo-tabbed-category'),
                    '<a href="'.esc_url('https://www.quantumcloud.com/products/woo-tabbed-category-product-listing/').'" target="_blank">',
                    '<img src="'.esc_url(QC_WOO_TAB_IMAGE_URL).'/wootabbed.jpg" >',
                    '</a>'
                );

            ?>
        </div>
<?php
        }

    }
    
}