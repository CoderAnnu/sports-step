<section id="sold-product-section" class="container mb-3">
    
    <div class="row">

        <?php $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
            'posts_per_page'      => 8,
            'meta_key' => 'total_sales',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
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