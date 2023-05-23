<section id="top-tour-shoes-product-section" class="my-5 container">
    <div class="text-center py-0 my-md-4">
        <h2 class="main-heading">Most Purchased</h2>
    </div>

    <div class="row">

        <?php

        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
            'posts_per_page'      => 8,
            'meta_key' => '_wc_average_rating',
            'orderby' => 'meta_value_num',
            'order' => 'DES',
        );

        $wp_query = new WP_Query($args);


        // print_r($wp_query);

        while (have_posts()) {
            the_post();

            do_action('woocommerce_shop_loop');

            wc_get_template_part('content', 'product');
        }
        ?>


    </div>
</section>