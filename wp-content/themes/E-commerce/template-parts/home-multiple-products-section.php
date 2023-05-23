<!-- Home page multiple category Section   -->
<!-- Here we see all category in tabs  -->

<div class="text-center py-0 my-md-4">
    <h2 class="main-heading">BEST SELLER</h2>
</div>


<nav>
    <div class="nav nav-tabs d-flex justify-content-center mt-3 border-0" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">


            <?php $args = array(
                // 'number'     => $number,
                'orderby'    => 'title',
                'order'      => 'ASC',
                // 'hide_empty' => $hide_empty,
                // 'include'    => $ids
            );
            $product_categories = get_terms('product_cat', $args);
            $count = count($product_categories);
            if ($count > 0) {
                foreach ($product_categories as $product_category) {
                    echo '<h4><a href="' . get_term_link($product_category) . '">' . $product_category->name . '</a></h4>';
                    $args = array(
                        'posts_per_page' => 10,
                        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'post_status' => 'publish',
                                'orderby' => 'meta_value_num',
                                'order' => 'ASC',
                                'terms' => 'shoes',
                                'terms' => $product_category->slug
                            )
                        ),
                        'post_type' => 'product',
                        'orderby' => 'title,'
                    );
                    $products = new WP_Query($args);
                    while (have_posts()) {
                        the_post();
                        /**
                         * Hook: woocommerce_shop_loop.
                         */
                        do_action('woocommerce_shop_loop');

                        wc_get_template_part('content', 'product');
                    }






            ?>
        </button>
        <!-- <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button> -->
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

        <section>
            <?php include __DIR__ . '/best-sold-product.php' ?>
        </section>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

<?php
                }
            }
            // } 
?>

    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
</div>