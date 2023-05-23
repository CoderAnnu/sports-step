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
