<section id="top-tour-shoes-product-section-1" class="container my-md-5  my-3">
    <div class="text-center py-0 my-md-4">
        <h2 class="text-center stg-header-text">FEATURED PRODUCTS</h2>
    </div>
    <div class="row">
        <?php

        // The tax query
        $tax_query[] = array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
            'operator' => 'IN', // or 'NOT IN' to exclude feature products
        );

        // The query
        $wp_query = new WP_Query(array(
            'post_type'           => 'product',
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
            'posts_per_page'      => 8,
            'orderby'             => 'meta_value_num',
            'order'               => $order == 'asc' ? 'asc' : 'desc',
            'tax_query'           => $tax_query // <===
        ));


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