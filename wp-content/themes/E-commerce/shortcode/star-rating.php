


<?php

/** Stars Rating */
// define the woocommerce_product_get_rating_html callback 
function filter_woocommerce_product_get_rating_html($rating_html, $rating = 0, $count = 0)
{
    global $product;
    $label = sprintf(__('Rated %s out of 5', 'woocommerce'), $rating);
    $round = round((float) $rating);
    if($product)
    $review_count = $product->get_review_count();
    
    $stars = "";

    for ($i = 1; $i <= $round; $i++) {
        $stars .= '<svg viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10.797 0L13.9217 6.33026L20.9093 7.35159L15.8532 12.2762L17.0464 19.2335L10.797 15.947L4.54769 19.2335L5.74093 12.2762L0.684814 7.35159L7.67236 6.33026L10.797 0Z" fill="#FFC600"/>
        </svg>
        ';
    }

    $leftstars = 5 - $round;

    for ($i = 1; $i <= $leftstars; $i++) {
        $stars .= '<svg viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.15" d="M10.4819 0L13.6065 6.33026L20.5941 7.35159L15.538 12.2762L16.7312 19.2335L10.4819 15.947L4.2325 19.2335L5.42574 12.2762L0.369629 7.35159L7.35718 6.33026L10.4819 0Z" fill="#C1C8CE"/>
        </svg>
        ';
    }

    if($product){

        if($review_count > 10 && $review_count < 50){
            $review_count = '10+';
        }
        
        if($review_count > 50 && $review_count < 100){
            $review_count = '50+';
        }
        
        if($review_count > 100){
            $review_count = '100+';
        }
        $text = sprintf(__('%s user', 'e-commerce'), $review_count);
    }else{
        $text = "";
    }
    


    $div = '<div class="rating-ecm d-flex align-items-center justify-content-center">' . $stars .' <span class="ms-2 rating-text2">('.$text.')</span></div>';
    

    return $div;
};

// add the filter 
add_filter('woocommerce_product_get_rating_html', 'filter_woocommerce_product_get_rating_html', 10, 3);
