<section class="featured-sec-bg-color my-5" id="main-section">

    <div class="container">
        <div class="text-center py-0 my-md-4">
            <h2 class="main-heading">Populære deler til bilen din</h2>
            <p class="sub-heading">Se et utvalg av våre mest populære bildeler</p>
        </div>
        <div class="row">
            <?php

            $args = array(
                'post_type' => 'featured_links',
                'post_status' => 'publish',
                'posts_per_page'      => 8,
                'order' => 'DISC',
            );

            $loop = new WP_Query($args);
            foreach ($loop->posts as $featured_link) :
                $featured_link_img = get_the_post_thumbnail_url($featured_link->ID);

                $link = get_field('link', $featured_link->ID);

            ?>
                <div class="col-6 mb-4 col-md-3">
                    <div class="border-0 card shadow-on-hover border-radias cursor-pointer" style="height:180px;" onClick="window.location.href = '<?= $link['url']; ?>' ">
                        <div class="card-img card-img-size" style="background-image: url('<?= $featured_link_img; ?>'); background-position: center;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title featured-link-card-title text-center"><?= $featured_link->post_title; ?></h5>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>