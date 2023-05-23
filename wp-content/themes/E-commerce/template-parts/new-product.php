<section id="best-product-section" class="container my-md-5  my-3">
    <div class="text-center py-0 my-md-4">
        <h2 class="text-center eco-header-text text-uppercase">New product</h2>
    </div>
    <!-- <div class="row owl-carousel owl-theme owl-stage-outer-div all-short-carousel"> -->

    <div class="row add-classst" id="myHeader">

        <?php $args = array(
            'post_type' => 'product',
            'orderby' => 'ID',
            'order' => 'ASC',
            'posts_per_page' => 8,

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