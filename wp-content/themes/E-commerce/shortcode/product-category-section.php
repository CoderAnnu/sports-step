<!--  bg 2-image section -->
<section>
    <div class="container mb-5">
        <div class="text-center">
            <h2 class="section-title mb-4">Product Category</h2>
        </div>
        <!-- products images  -->
        <?php

        $orderby = 'name';
        $order = 'asc';
        $hide_empty = false;
        $cat_args = array(
            'orderby'    => $orderby,
            'order'      => $order,
            'hide_empty' => $hide_empty,
            'number' => 5
        );

        $product_categories = get_terms('product_cat', $cat_args);
        $thumbnail_id_1 = get_term_meta($product_categories[0]->term_id, 'thumbnail_id', true);
        $thumbnail_id_2 = get_term_meta($product_categories[1]->term_id, 'thumbnail_id', true);
        $thumbnail_id_3 = get_term_meta($product_categories[2]->term_id, 'thumbnail_id', true);
        $thumbnail_id_4 = get_term_meta($product_categories[3]->term_id, 'thumbnail_id', true);
        $thumbnail_id_5 = get_term_meta($product_categories[4]->term_id, 'thumbnail_id', true);

        $image_1 = ($thumbnail_id_1) ? wp_get_attachment_url($thumbnail_id_1) : get_template_directory_uri() . "/img/images/No-Image-Placeholder.svg";
        $image_2 = ($thumbnail_id_2) ? wp_get_attachment_url($thumbnail_id_2) : get_template_directory_uri() . "/img/images/No-Image-Placeholder.svg";
        $image_3 = ($thumbnail_id_3) ? wp_get_attachment_url($thumbnail_id_3) : get_template_directory_uri() . "/img/images/No-Image-Placeholder.svg";
        $image_4 = ($thumbnail_id_4) ? wp_get_attachment_url($thumbnail_id_4) : get_template_directory_uri() . "/img/images/No-Image-Placeholder.svg";
        $image_5 = ($thumbnail_id_5) ? wp_get_attachment_url($thumbnail_id_5) : get_template_directory_uri() . "/img/images/No-Image-Placeholder.svg";


        ?>


        <?php if (count($product_categories) >= 5) : ?>
            <div class="container">
                <div class="product-cats row mb-0">
                    <div class="col-8 p-0">
                        <div class="h-100">
                            <div class="row h-50">
                                <div class="col-6 mb-2 pe-0">
                                    <a href="<?= get_category_link($product_categories[0]->term_id); ?>">
                                        <div class="category-image d-flex align-items-end justify-content-center" style="background-image: url('<?= $image_1; ?>');">
                                            <div></div>
                                            <h5 class="text-center"><?= $product_categories[0]->name; ?></h5>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6 mb-2">
                                    <a href="<?= get_category_link($product_categories[1]->term_id); ?>">
                                        <div class="category-image d-flex align-items-end justify-content-center" style="background-image: url('<?= $image_2; ?>');">
                                            <h5 class="text-center"><?= $product_categories[1]->name; ?></h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row h-50">
                                <div class="col-5 pe-0">
                                    <a href="<?= get_category_link($product_categories[2]->term_id); ?>">
                                        <div class="category-image d-flex align-items-end justify-content-center" style="background-image: url('<?= $image_3; ?>');">
                                            <h5 class="text-center"><?= $product_categories[2]->name; ?></h5>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-7">
                                    <a href="<?= get_category_link($product_categories[3]->term_id); ?>">
                                        <div class="category-image d-flex align-items-end justify-content-center" style="background-image: url('<?= $image_4; ?>');">
                                            <h5 class="text-center"><?= $product_categories[3]->name; ?></h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 pe-0">
                        <a href="<?= get_category_link($product_categories[4]->term_id); ?>">
                            <div class="big-img category-image d-flex align-items-end justify-content-center" style="background-image: url('<?= $image_5; ?>');">
                                <h5 class="text-center"><?= $product_categories[4]->name; ?></h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section> <!--  end bg 2-image section -->