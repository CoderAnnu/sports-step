<?php

defined('ABSPATH') or die("No direct script access!");

function qcld_woo_minmax_tabbed_dynamic_discount_price_table_show( $product_id = 0) {
        
        ob_start();
        $settings_optn=get_option('qcld_woo_minmax_dynamic_pricing_setting');
        if (isset($settings_optn['qcld_woo_minmax_pricing_table_qnty_shrtcode']) && !empty($settings_optn['qcld_woo_minmax_pricing_table_qnty_shrtcode'])) {
            $qcld_woo_minmax_pricing_table_qnty_shrtcode = $settings_optn['qcld_woo_minmax_pricing_table_qnty_shrtcode'];
        } else {
            $qcld_woo_minmax_pricing_table_qnty_shrtcode = esc_html__("Qty", 'express-shop-pro');
        }

        if (isset($settings_optn['qcld_woo_minmax_pricing_table_minimum_shrtcode']) && !empty($settings_optn['qcld_woo_minmax_pricing_table_minimum_shrtcode'])) {
            $qcld_woo_minmax_pricing_table_minimum_shrtcode = $settings_optn['qcld_woo_minmax_pricing_table_minimum_shrtcode'];
        } else {
            $qcld_woo_minmax_pricing_table_minimum_shrtcode = esc_html__("Min", 'express-shop-pro');
        }

        if (isset($settings_optn['qcld_woo_minmax_pricing_table_maximum_shrtcode']) && !empty($settings_optn['qcld_woo_minmax_pricing_table_maximum_shrtcode'])) {
            $qcld_woo_minmax_pricing_table_maximum_shrtcode = $settings_optn['qcld_woo_minmax_pricing_table_maximum_shrtcode'];
        } else {
            $qcld_woo_minmax_pricing_table_maximum_shrtcode = esc_html__("Max", 'express-shop-pro');
        }

        if (isset($settings_optn['qcld_woo_minmax_pricing_table_offer_shrtcode']) && !empty($settings_optn['qcld_woo_minmax_pricing_table_offer_shrtcode'])) {
            $qcld_woo_minmax_pricing_table_offer_shrtcode = $settings_optn['qcld_woo_minmax_pricing_table_offer_shrtcode'];
        } else {
            $qcld_woo_minmax_pricing_table_offer_shrtcode = esc_html__("Offer", 'express-shop-pro');
        }

        $product  = wc_get_product( $product_id );
        $rules_validator = new qcld_woo_minmax_RulesValidator('all_match', true, 'product_rules');
        //checking if product rules are enabled on settings page
        global $xa_dp_setting;
        if (!empty($xa_dp_setting['qcld_woo_minmax_product_rules_on_off']) && $xa_dp_setting['qcld_woo_minmax_product_rules_on_off'] !== 'enable') {
            $product_rules = array();
        } else {
            $product_rules = $rules_validator->qcld_woo_minmax_getValidRulesForProduct($product, qcld_woo_minmax_get_pid($product), 1);  
        }
        $count = 0;

        $Weight = get_option('woocommerce_weight_unit');
        $Quantity = $qcld_woo_minmax_pricing_table_qnty_shrtcode;

        $Price = get_option('woocommerce_currency');
        if (!empty($product_rules)) {
            foreach ($product_rules as $rule) {
                if (isset($rule['min']) && isset($rule['discount_type']) && isset($rule['value']) && isset($rule['check_on'])) {

                    switch ($rule['check_on']) {
                        case 'Weight': $unit = $Weight;
                            break;
                        case 'Quantity': $unit = $Quantity;
                            break;
                        case 'Price': $unit = $Price;
                            break;

                        default:
                            break;
                    }
                    $count++;
                    echo "<div  class='qcld_woo_tabbed_minmax_dynamic_dicount_price_table'>";
                    echo "<div  class='qcld_woo_tabbed_minmax_dynamic_dicount_price_table_minmax'>";
                    echo "$qcld_woo_minmax_pricing_table_minimum_shrtcode " . esc_html__( $unit, 'express-shop-pro') . ": $rule[min],";
                   
                    echo " " . __(isset($rule['max']) ? "$qcld_woo_minmax_pricing_table_maximum_shrtcode ". $unit .":" : '', 'express-shop-pro') . " ";
                    echo(isset($rule['max']) ? $rule['max'].'' : ' ');
                    echo " </div>";
                    echo " <div class='qcld_woo_tabbed_minmax_dynamic_dicount_price_table_offer'>";
                    echo " $qcld_woo_minmax_pricing_table_offer_shrtcode $rule[value]";
                    if ($rule['discount_type'] == 'Percent Discount') {
                        echo "% " . __("Discount", 'express-shop-pro') . "</td>";
                    } elseif ($rule['discount_type'] == 'Flat Discount') {
                        echo "$Price " . __("Discount", 'express-shop-pro') . "</td>";
                    } elseif ($rule['discount_type'] == 'Fixed Price') {
                        echo "$Price " . __("Fixed Price", 'express-shop-pro') . "</td>";
                    } else {
                        echo "$Price " . __($rule['discount_type'], 'express-shop-pro');
                    }
                    echo "</div>";
                    echo "</div>";
                }
            }
        }else{
            echo "<div  class='qcld_woo_tabbed_minmax_dynamic_dicount_price_table'>";
            echo "</div>";

        }

        $clean = ob_get_clean();
       return $clean;

    }
    


    function qcld_woo_minmax_product_discount_display( ) {
        global $product;

        $qcld_woo_minmax_dynamic_pricing_setting = get_option('qcld_woo_minmax_dynamic_pricing_setting');

        if(function_exists('qcld_woo_minmax_install') && (isset($qcld_woo_minmax_dynamic_pricing_setting['qcld_woo_minmax_price_table_on_off']) && $qcld_woo_minmax_dynamic_pricing_setting['qcld_woo_minmax_price_table_on_off'] == 'enable') ){

            $result_show = qcld_woo_minmax_tabbed_dynamic_discount_price_table_show($product->id);
            echo $result_show;
        }


    }
    add_filter( 'woocommerce_after_shop_loop_item', 'qcld_woo_minmax_product_discount_display' );