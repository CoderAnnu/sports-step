<?php

defined('ABSPATH') or die("No direct script access!");

class Woo_Tabbled_Categoty{

    public function initialize()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
    }

    public function enqueue_styles()
    {
        wp_enqueue_style(
            'woo_tabbed_category',
            plugins_url('woo-tabbed-category-product-listing/assets/css/admin.css'),
            array(),
            '0.1.0'
        );       


        wp_enqueue_style( 'select2-style', plugins_url('woo-tabbed-category-product-listing/assets/css/select2.css'), array(), '0.1.0' ); 

        wp_enqueue_style('select2');
    }


    public function enqueue_scripts()
    {
        wp_enqueue_script(
            'woo_tabbed_category',
            plugins_url('woo-tabbed-category-product-listing/assets/js/admin.js'),
            array('jquery'),
            '0.1.0'
        );

        wp_enqueue_script(
            'select_two',
            plugins_url('woo-tabbed-category-pro/assets/js/select2.full.js'),
            array('jquery'),
            '0.1.0'
        );

        wp_enqueue_script('select2');
        wp_enqueue_script( 'wc-country-select' );


    }
    
}

?>