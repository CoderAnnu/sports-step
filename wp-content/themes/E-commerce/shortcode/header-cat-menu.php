<nav id="nav-bar" class="navbar navbar-expand-lg py-0 sd-none d-md-block">

    <div class="container" id="desktop-menu">


        <?php

        // Get Woocommerce product categories WP_Term objects

        $taxonomy     = 'product_cat';
        $orderby      = 'name';
        $show_count   = 0;      // 1 for yes, 0 for no
        $pad_counts   = 0;      // 1 for yes, 0 for no
        $hierarchical = 1;      // 1 for yes, 0 for no  
        $title        = '';
        $empty        = 0;
        $args = array(
            'taxonomy'     => $taxonomy,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty
        );
        $categories = get_categories($args);
        echo '<ul id="nav-cat" class="navbar-nav">';

        foreach ($categories as $mainindex => $cat) {
            if ($cat->slug == 'uncategorized') {
                continue;
            }
            if ($cat->category_parent == 0) {
                $category_id = $cat->term_id;
                $args2 = array(
                    'taxonomy'     => $taxonomy,
                    'child_of'     => 0,
                    'parent'       => $category_id,
                    'orderby'      => $orderby,
                    'show_count'   => $show_count,
                    'pad_counts'   => $pad_counts,
                    'hierarchical' => $hierarchical,
                    'title_li'     => $title,
                    'hide_empty'   => $empty
                );
                // get_term_link($cat->slug, 'product_cat') 



                $sub_cats = get_categories($args2);
                if (isset($sub_cats)) {
                    echo '<li class="menu-item hoverli menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown nav-item me-1 nav-item-' . $cat->term_id . '" >
                    <a  class="nav-link dropdown-toggle text-dark" data-bs-toggle="" aria-haspopup="true" aria-expanded="true" href="' . generate_filter_cat_link($cat) . '">' . $cat->name . '</a>';
                }
        ?>

        <?php if ($sub_cats) {
                    $sub_cat_count = 1;

                    echo '<ul class="dropdown-menu cat_menu depth_0 shadow-sm border-0" total-items="' . count($sub_cats) . '">';
                    echo '<div class="d-flex sub-menu-container-stg">';
                    foreach ($sub_cats as $key => $sub_category) :
                        $sub_category_id = $sub_category->term_id;
                        $args3 = array(
                            'taxonomy'     => $taxonomy,
                            'child_of'     => 0,
                            'parent'       => $sub_category_id,
                            'orderby'      => $orderby,
                            'show_count'   => $show_count,
                            'pad_counts'   => $pad_counts,
                            'hierarchical' => $hierarchical,
                            'title_li'     => $title,
                            'hide_empty'   => $empty
                        );
                        $sub_cats_2 = get_categories($args3);
                        if (in_array($sub_cat_count, [1, 12, 24, 36, 48])) echo '<ul class="px-0" style="display:block !important;list-style-type:none;">';
                        echo stg_create_menu_li_item($sub_category, $sub_cats_2);
                        if (in_array($sub_cat_count, [11, 23, 35, 47])) echo '</ul>';

                        $sub_cat_count++;
                    endforeach;

                    echo '</div>';
                    echo '</ul>';
                }
                echo '</li>';
            }
        }

        echo "</ul>";
        ?>

    </div><!-- container -->



    <div class="header-actions d-flex align-items-center">
        <!-- Search Toggler Mobile -->
        <button class="btn btn-outline-secondary d-lg-none ms-1 ms-md-2 top-nav-search-md" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-search" aria-expanded="false" aria-controls="collapse-search">
            <i class="fas fa-search"></i>
        </button>

        <!-- Navbar Toggler -->
    </div><!-- .header-actions -->
</nav><!-- navbar -->


<div class="container d-none" id="desktop-menu-hidden">


    <?php

    // Get Woocommerce product categories WP_Term objects

    $taxonomy     = 'product_cat';
    $orderby      = 'name';
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no  
    $title        = '';
    $empty        = 0;
    $args = array(
        'taxonomy'     => $taxonomy,
        'orderby'      => $orderby,
        'show_count'   => $show_count,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'hide_empty'   => $empty
    );
    $categories = get_categories($args);
    echo '<ul id="nav-cat" class="navbar-nav">';

    foreach ($categories as $mainindex => $cat) {
        if ($cat->slug == 'uncategorized') {
            continue;
        }
        if ($cat->category_parent == 0) {
            $category_id = $cat->term_id;
            $args2 = array(
                'taxonomy'     => $taxonomy,
                'child_of'     => 0,
                'parent'       => $category_id,
                'orderby'      => $orderby,
                'show_count'   => $show_count,
                'pad_counts'   => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li'     => $title,
                'hide_empty'   => $empty
            );
            // get_term_link($cat->slug, 'product_cat') 



            $sub_cats = get_categories($args2);
            if (isset($sub_cats)) {
                echo '<li class="menu-item hoverli menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown nav-item me-1 nav-item-' . $cat->term_id . '" >
            <a  class="nav-link dropdown-toggle text-dark" data-bs-toggle="" aria-haspopup="true" aria-expanded="true" href="' . generate_filter_cat_link($cat) . '">' . $cat->name . '</a>';
            }
    ?>

    <?php if ($sub_cats) {
                $sub_cat_count = 1;

                echo '<ul class="dropdown-menu cat_menu depth_0 shadow-sm border-0" total-items="' . count($sub_cats) . '">';
                foreach ($sub_cats as $key => $sub_category) :
                    $sub_category_id = $sub_category->term_id;
                    $args3 = array(
                        'taxonomy'     => $taxonomy,
                        'child_of'     => 0,
                        'parent'       => $sub_category_id,
                        'orderby'      => $orderby,
                        'show_count'   => $show_count,
                        'pad_counts'   => $pad_counts,
                        'hierarchical' => $hierarchical,
                        'title_li'     => $title,
                        'hide_empty'   => $empty
                    );
                    $sub_cats_2 = get_categories($args3);
                    echo stg_create_menu_li_item($sub_category, $sub_cats_2);

                    $sub_cat_count++;
                endforeach;
                echo '</ul>';
            }
            echo '</li>';
        }
    }



    ?>

    <?php

    if (1 == 2) :

        $taxonomy = 'brands';
        $orderby = 'name';
        $show_count = 0; // 1 for yes, 0 for no
        $pad_counts = 0; // 1 for yes, 0 for no
        $hierarchical = 1; // 1 for yes, 0 for no
        $title = '';
        $empty = 0;
        $args = array(
            'taxonomy' => $taxonomy,
            'orderby' => $orderby,
            'show_count' => $show_count,
            'pad_counts' => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li' => $title,
            'hide_empty' => $empty
        );
        $brands = get_categories($args);

        // print_r($brands);
        // exit;
    ?>


        <li class="menu-item hoverli menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown nav-item me-1 nav-item-">
            <a class="nav-link dropdown-toggle cursor-pointer" data-bs-toggle="" aria-haspopup="true" aria-expanded="true">Brands</a>

            <ul class="dropdown-menu cat_menu depth_0 shadow-sm border-0">
                <?php foreach ($brands as $brand) : ?>

                    <li class="menu-item hoverli menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown nav-item me-1 nav-item-<?= $brand->term_id ?>">
                        <a href="<?= get_term_link($brand->slug, 'brands') ?>" class="nav-link dropdown-toggle"><?= $brand->name ?></a>
                    </li>

                    <!-- <li class="menu-item hoverli menu-item-type-post_type menu-item-object-page menu-item-has-children  nav-item me-1 nav-item-<?= $brand->term_id ?>">
                    <a href="<?= get_term_link($brand->slug, 'brands') ?>" class="nav-link dropdown-toggle"><?= $brand->name ?></a>
                </li> -->

                <?php endforeach; ?>
            </ul>
        </li>

    <?php

    endif;


    echo "</ul>";
    ?>

</div><!-- container -->