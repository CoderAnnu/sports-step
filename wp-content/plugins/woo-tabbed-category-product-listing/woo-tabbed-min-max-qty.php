<?php

defined('ABSPATH') or die("No direct script access!");

function qcld_woo_minmax_tabbed_add_rules_text( $product_id = 0, $variation_id = 0 ) {

			if ( $product_id == 0 ) {

				global $post;

				if ( empty( $post ) ) {
					return;
				}

				$product_id = $post->ID;

			}


			$product = wc_get_product( $product_id );

			if ( ! $product ) {
				return;
			}


			if ( $product->get_meta( '_qcld_woo_minmax_product_exclusion' ) == 'yes' ) {
				return;
			}

			$product            = wc_get_product( $product_id );
			$product_quantity_limit_override     = $product->get_meta( '_qcld_woo_minmax_product_quantity_limit_override' );

			if ( $product_quantity_limit_override != 'yes' ) {


			$product_categories = wp_get_object_terms( $product_id, 'product_cat', array( 'fields' => 'all' ) );

			foreach ( $product_categories as $category ) {

				$category_exclusion = get_term_meta( $category->term_id, '_qcld_woo_minmax_category_exclusion', true );

				if ( $category_exclusion == 'yes' ) {
					return;
				}

				if ( get_option( 'qcld_woo_minmax_category_quantity_limit' ) == 'yes' ) {

					$limit = qcld_woo_minmax_tabbed_category_limits( $category->term_id, 'quantity' );

					return $limit;

				}

			}

			$product_tag = wp_get_object_terms( $product_id, 'product_tag', array( 'fields' => 'all' ) );

			foreach ( $product_tag as $tag ) {

				$tag_exclusion = get_term_meta( $tag->term_id, '_qcld_woo_minmax_tag_exclusion', true );

				if ( $tag_exclusion == 'yes' ) {
					return;
				}

				if ( get_option( 'qcld_woo_minmax_tag_quantity_limit' ) == 'yes' ) {

					$limit = qcld_woo_minmax_tabbed_tag_limits( $tag->term_id, 'quantity' );

					return $limit;
				}

			}

		}


			if ( get_option( 'qcld_woo_minmax_product_quantity_limit' ) == 'yes' ) {

				$limit = qcld_woo_minmax_tabbed_product_limits( $product_id, $variation_id );

				return $limit;

			}


		}



		function qcld_woo_minmax_tabbed_tag_limits( $tag_id, $type = 'quantity' ) {

			$limit = array(
				'min'  => 0,
				'max'  => 0,
				'step' => 1,
			);

			$tag_exclusion = get_term_meta( $tag_id, '_qcld_woo_minmax_tag_exclusion', true );

			if ( $tag_exclusion == 'yes' ) {
				return $limit;
			}

			$tag_limit_override = get_term_meta( $tag_id, '_qcld_woo_minmax_tag_' . $type . '_limit_override', true );

			if ( $tag_limit_override == 'yes' ) {

				$limit['min']  = get_term_meta( $tag_id, '_qcld_woo_minmax_tag_minimum_' . $type, true );
				$limit['max']  = get_term_meta( $tag_id, '_qcld_woo_minmax_tag_maximum_' . $type, true );
				$limit['step'] = get_term_meta( $tag_id, '_qcld_woo_minmax_tag_step_' . $type, true );

				return $limit;

			} else {

				$limit['min']  = get_option( 'qcld_woo_minmax_tag_minimum_' . $type );
				$limit['max']  = get_option( 'qcld_woo_minmax_tag_maximum_' . $type );
				$limit['step'] = get_option( 'qcld_woo_minmax_tag_step_' . $type );

			}

			return $limit;

		}




		function qcld_woo_minmax_tabbed_category_limits( $category_id, $type = 'quantity' ) {

			$limit = array(
				'min'  => 0,
				'max'  => 0,
				'step' => 1
			);

			$category_exclusion = get_term_meta( $category_id, '_qcld_woo_minmax_category_exclusion', true );

			if ( $category_exclusion == 'yes' ) {
				return $limit;
			}

			$category_limit_override = get_term_meta( $category_id, '_qcld_woo_minmax_category_' . $type . '_limit_override', true );

			if ( $category_limit_override == 'yes' ) {

				$limit['min']  = get_term_meta( $category_id, '_qcld_woo_minmax_category_minimum_' . $type, true );
				$limit['max']  = get_term_meta( $category_id, '_qcld_woo_minmax_category_maximum_' . $type, true );
				$limit['step'] = get_term_meta( $category_id, '_qcld_woo_minmax_category_step_' . $type, true );

				return $limit;

			} else {

				$limit['min']  = get_option( 'qcld_woo_minmax_category_minimum_' . $type );
				$limit['max']  = get_option( 'qcld_woo_minmax_category_maximum_' . $type );
				$limit['step'] = get_option( 'qcld_woo_minmax_category_step_' . $type );

			}

			return $limit;

		}

		function qcld_woo_minmax_tabbed_product_limits( $product_id, $variation_id ) {

			$limit = array(
				'min'  => 0,
				'max'  => 0,
				'step' => 1
			);

			$product            = wc_get_product( $product_id );
			$limit_override     = $product->get_meta( '_qcld_woo_minmax_product_quantity_limit_override' );
			$limit_var_override = $product->get_meta( '_qcld_woo_minmax_product_quantity_limit_variations_override' );

			if ( $limit_override == 'yes' ) {

				$limit['min']  = $product->get_meta( '_qcld_woo_minmax_product_minimum_quantity' );
				$limit['max']  = $product->get_meta( '_qcld_woo_minmax_product_maximum_quantity' );
				$limit['step'] = $product->get_meta( '_qcld_woo_minmax_product_step_quantity' );

				return $limit;

			} else {

				$limit['min']  = get_option( 'qcld_woo_minmax_product_minimum_quantity' );
				$limit['max']  = get_option( 'qcld_woo_minmax_product_maximum_quantity' );
				$limit['step'] = get_option( 'qcld_woo_minmax_product_step_quantity' );

			}

			return $limit;

		}