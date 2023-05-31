// load Custom js 

// This function work for header scrolling conditions when header scroller then add bs 5 class shadow-sm and also remove border of the header
jQuery(window).scroll(function () {
    var scroll = jQuery(window).scrollTop();
    if (scroll > 0) {
        jQuery("#header").addClass("shadow-sm");
        jQuery("#header").removeClass("border-bottom");
    } else {
        jQuery("#header").removeClass("shadow-sm");
        jQuery("#header").addClass("border-bottom");
    }
});

// this function work for product increase and decrease plus minus simble (Single product page)
const updateQuantity = (action, qtyId) => {
    let qtyEL = document.querySelector(`#${qtyId}`);

    let qty = qtyEL.value;
    let min, max = null;

    max = qtyEL.getAttribute('max');
    if (max.length == 0) max = false;

    if (action == 'minus' && qty > 1) {
        if (qty > 1) {
            qty--;
        }
    }

    if (action == 'plus') {

        if (max && qty < max) {
            qty++;
        } else {
            qty++;
        }
    }

    qtyEL.value = qty;

    jQuery(`#${qtyId}`).trigger("change");

}
