<?php
get_header();
?>



<!-- main container Start  -->
<div id="main-conainer" class="site-content py-md-5">
    <div id="primary" class="container content-area">
        <!-- header Banner  -->
        <section>
            <div class="header-banner">
                <?php
                echo do_shortcode('[smartslider3 slider="1"]');
                ?>
            </div>
        </section>
        <!-- Top Listed products  -->
        <!-- recent product post section -->
        <section class="top-selling">
            <div class="row justify-content-center">
                <?php

                // The tax query
                $tax_query[] = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'ignore_sticky_posts' => 1,
                    'posts_per_page'      => 8,
                    'meta_key' => 'total_sales',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                );

                // The query
                $loop = new WP_Query(array(
                    'post_type'           => 'product',
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => 1,
                    'posts_per_page'      => 3,
                    'tax_query'           => $tax_query
                ));
                ?>

                <div class="front-page-3-images align-items-center d-md-none row justify-content-center">
                    <?php

                    $index = 0;
                    if ($loop->have_posts()) {
                        while ($loop->have_posts()) : $loop->the_post();
                            $product = wc_get_product(get_the_ID());
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                    ?>
                            <div class="col-6 mb-3 product-mobile-home">
                                <a href="<?= get_permalink($product->ID); ?>">
                                    <div class="w-100 d-flex align-item-center">
                                        <figure class="w-100 mb-0">
                                            <span><?= do_shortcode('[yith_wcwl_add_to_wishlist]') ?></span>
                                            <img class="mobile-img" src="<?= $image[0]; ?>" width="100%" />
                                        </figure>
                                    </div>
                                    <div class="my-2">
                                        <p class="product-title mb-0"><strong><?= the_title(); ?></strong></p>
                                        <?php wc_get_template('single-product/rating.php'); ?>
                                        <?= $product->get_price_html(); ?>
                                        <!-- SALE FLASH  -->
                                        <?php if ($product->is_on_sale()) : ?>
                                            <?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale">' . __('Sale!', 'woocommerce') . '</span>', $post, $product); ?>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </div>
                    <?php
                            $index++;
                        endwhile;
                    } else {
                        echo __('No products found');
                    }
                    ?>
                </div>

                <!-- Product  card/section-->
                <div class="d-flex front-page-3-images d-none d-md-flex mx-auto">
                    <?php

                    $index = 0;
                    if ($loop->have_posts()) {
                        while ($loop->have_posts()) : $loop->the_post();
                            $product = wc_get_product(get_the_ID());
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full'); ?>
                            <div class="px-0 col-md-6 col-lg-4 col-xxl-4" image-index="<?= $index; ?>">
                                <a href="<?= get_permalink($product->ID); ?>">
                                    <div class="w-100 d-flex align-items-center <?= ($index === 2) ? "justify-content-end" : ""; ?>" style="<?php if ($index === 1) : ?> width:100% <?php else : ?> width:80% <?php endif; ?>">
                                        <figure class="shadow-sm w-100 mb-0">
                                            <div class="p-2" style="background-color: #FCFCFC;">
                                                <div class="product-image-container  d-flex justify-content-between top-sell-img" style="background-image:url('<?= $image[0]; ?>');">
                                                    <div class="<?= ($index === 2) ? "text-end" : (($index === 1) ? 'text-center' : ''); ?> m-4" style="display:contents;">
                                                        <p class="mb-0 p-2"><strong><?= the_title(); ?></strong></p>
                                                        <span><?= do_shortcode('[yith_wcwl_add_to_wishlist]') ?></span>
                                                    </div>
                                                </div>
                                                <div class="<?= ($index === 2) ? "text-end" : (($index === 1) ? 'text-center' : ''); ?> m-3">
                                                    <?php wc_get_template('single-product/rating.php'); ?>
                                                    <?= $product->get_price_html(); ?>
                                                    <!-- SALE FLASH  -->
                                                    <?php if ($product->is_on_sale()) : ?>
                                                        <?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale">' . __('Sale!', 'woocommerce') . '</span>', $post, $product); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </a>
                            </div>
                    <?php
                            $index++;
                        endwhile;
                    } else {
                        echo __('No products found');
                    }
                    ?>
                </div> <!-- end Product section -->
            </div>
        </section><!-- end recent product post section -->


        <!-- start Display Category Product  -->
        <?php include __DIR__ . '/shortcode/product-category-section.php' ?>
        <!-- ena Display Category Product  -->


        <!-- Best Seller All Product by category -->
        <section class="best-seller-content">
            <div class="text-center best-seller-content">
                <h2 class="main-heading">BEST SELLER</h2>
            </div>
            <?= do_shortcode('[wtcpl-product-cat]'); ?>
            <div>
                <div class="d-grid gap-2 col-md-2 mx-auto mb-5">
                    <?php $shop_page_url = get_permalink(wc_get_page_id('shop')); ?>
                    <a href="<?= $shop_page_url ?>" class="btn rounded-0 btn-primary text-white text-uppercase" type="button">EXPLORE EVERYTHING
                    </a>
                </div>
            </div>
        </section>
        <!-- end Best Seller All Product by category -->
    </div>


    <!-- image With content -->
    <section>
        <div class="content-image" style="background-color: #40BFFF;">
            <div class="container">
                <div class="row ">
                    <div class="col-md-6 d-flex justify-content-start align-items-center text-white">
                        <div class="content-text-mg">
                            <h4>Adidas Men Running Sneakers</h4>
                            <p>Performance and design. Taken right to the edge.</p>
                            <?php $shop_page_url = get_permalink(wc_get_page_id('shop')); ?>

                            <button type="button" class="btn border shop-button">SHOP NOW</button>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <img class="pb-4" src="<?= get_template_directory_uri() . '/img/images/11.png'; ?>" alt="">
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- start Display New Product  -->
    <?php include __DIR__ . '/template-parts/new-product.php' ?>
    <!-- ena Display New Product  -->



    <!--Customer Customer Suppport Section  -->
    <section>
        <?php include __DIR__ . '/template-parts/best-offer-product.php' ?>
    </section>
    <!--  End Customer Customer Suppport Section  -->



    <!-- start Display New Product  -->
    <section>
        <?php include __DIR__ . '/template-parts/featured-products.php' ?>
    </section>
    <!-- ena Display New Product  -->



    <!--Customer Customer Suppport Section  -->
    <section>
        <?php include __DIR__ . '/template-parts/customer_support_content.php' ?>
    </section>
    <!--  End Customer Customer Suppport Section  -->








    <!-- main Container End  -->
</div>


<?php

get_footer();

?>