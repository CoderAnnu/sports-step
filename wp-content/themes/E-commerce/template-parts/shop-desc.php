<!-- shop page Description  -->



<?php
global $post;

$args = array('taxonomy' => 'product_cat',);
$terms = wp_get_post_terms($post->ID, 'product_cat', $args);
// $count = count($terms); 
// if (!empty($count > 0)) {

foreach ($terms as $term) {
    echo '<div class="shop-desc d-none">';
    echo '<h4 class="my-3">' . $term->name . '</h4>';
    echo '<p>' . $term->description . '</p>';
    echo '</div>';
}
// }
?>