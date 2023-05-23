<?php
// check all sub fields and only display if there are values
if (get_field('item_number') || get_field('ean') || get_field('brand') || get_field('item_type') || get_field('fire_classification') || get_field('crowd') || get_field('viscosity') || get_field('approval') || get_field('approval_train')) : ?>

    <section id="top-tour-shoes-product-section" class="my-5 container">
        <div class="text-center py-0 my-md-4">
            <h2 class="main-heading">Spesifikasjoner</h2>
            <p class="sub-heading">Amet minim mollit non deserunt ullamco est sit a</p>
        </div>

        <div class="row">
            <table class="table">
                <tbody style="background: #F5F5F5;">
                    <?php
                    global $product;
                    $item_number = get_field('item_number', $product->get_ID());
                    ?>
                    <?php if ($item_number) : ?>
                        <tr>
                            <td class="p-3">Varenummer</td>
                            <td class="text-center p-3"><?= $item_number; ?></td>
                        </tr>
                    <?php endif; ?>


                    <?php $EAN = get_field('ean', $product->get_ID()); ?>
                    <?php if ($EAN) : ?>
                        <tr>
                            <td class="p-3">EAN</td>
                            <td class="text-center p-3"><?= $EAN; ?></td>
                        </tr>
                    <?php endif; ?>


                    <?php $Brand = get_field('brand', $product->get_ID()); ?>
                    <?php if ($Brand) : ?>
                        <tr>
                            <td class="p-3">Merke</td>
                            <td class="text-center p-3"><?= $Brand; ?></td>
                        </tr>
                    <?php endif; ?>


                    <?php $item_type = get_field('item_type', $product->get_ID()); ?>
                    <?php if ($item_type) : ?>
                        <tr>
                            <td class="p-3">Varetype </td>
                            <td class="text-center p-3"><?= $item_type; ?></td>
                        </tr>
                    <?php endif; ?>


                    <?php $fire_classification = get_field('fire_classification', $product->get_ID()); ?>
                    <?php if ($item_type) : ?>
                        <tr>
                            <td class="p-3 text-primary">BRANNKLASSIFISERING</td>
                            <td class="text-center p-3"><?= $fire_classification; ?></td>
                        </tr>
                    <?php endif; ?>


                    <?php $fire_hazard_class = get_field('fire_hazard_class', $product->get_ID()); ?>
                    <?php if ($fire_hazard_class) : ?>
                        <tr>
                            <td class="p-3">brannfare klasse</td>
                            <td class="text-center p-3"><?= $fire_hazard_class; ?></td>
                        </tr>
                    <?php endif; ?>


                    <?php $crowd = get_field('crowd', $product->get_ID()); ?>
                    <?php if ($crowd) : ?>
                        <tr>
                            <td class="p-3">Mengde </td>
                            <td class="text-center p-3"><?= $crowd; ?></td>
                        </tr>
                    <?php endif; ?>

                    <?php $viscosity = get_field('viscosity', $product->get_ID()); ?>
                    <?php if ($viscosity) : ?>
                        <tr>
                            <td class="p-3">Viskositet</td>
                            <td class="text-center p-3"><?= $viscosity; ?></td>
                        </tr>
                    <?php endif; ?>

                    <?php $approval = get_field('approval', $product->get_ID()); ?>
                    <?php if ($approval) : ?>
                        <tr>
                            <td class="p-3">Godkjennelse</td>
                            <td class="text-center p-3"><?= $approval; ?></td>
                        </tr>
                    <?php endif; ?>

                    <?php $approval_train = get_field('approval_train', $product->get_ID()); ?>
                    <?php if ($approval_train) : ?>
                        <tr>
                            <td class="p-3">Godkjennelse train </td>
                            <td class="text-center p-3"><?= $approval_train; ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
<?php endif; ?>