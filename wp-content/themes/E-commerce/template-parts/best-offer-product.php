<section id="best-product-section" class="container my-md-5 my-3">
    <div class="text-center py-0 my-md-4">
        <h2 class="text-center eco-header-text text-uppercase">Product Offers</h2>
    </div>
    <div class="row">

        <?php

        // Display Only sold Product 

        // $args = array(
        //     'post_type' => 'product',
        //     'post_status' => 'publish',
        //     'ignore_sticky_posts' => 1,
        //     'posts_per_page'      => 8,
        //     'meta_key' => 'total_sales',
        //     'orderby' => 'meta_value_num',
        //     // 'order' => 'DESC',
        // );

        // Display Only Product offers 

        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 8,
            'orderby' => 'meta_value_num',
            // 				'order' => 'DESC',
            // 				'meta_key' => 'total_sales',
            
            'meta_query'     => array(
                'relation' => 'OR',
                array( // Simple products type
                    'key'           => '_sale_price',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                ),
                array( // Variable products type
                    'key'           => '_min_variation_sale_price',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                )
            )

        );
        $wp_query = new WP_Query($args);


        while (have_posts()) {
            the_post();
            /**
             * Hook: woocommerce_shop_loop.
             */
            do_action('woocommerce_shop_loop');

            wc_get_template_part('content', 'product');
        }
        ?>
    </div>
</section>