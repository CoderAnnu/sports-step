jQuery(function ($) {

  // Single add to cart button
  $('.single_add_to_cart_button:not(.product_type_variable):not(.product_type_external):not(.product_type_grouped)').attr('data-bs-toggle', 'offcanvas').attr('data-bs-target', '#offcanvas-cart');
  // Single add to cart button END

  
  // Add loading class to offcanvas-cart
  $('body').bind('adding_to_cart', function () {
    $('#offcanvas-cart').addClass('loading');
  });

  $('body').bind('added_to_cart', function () {
    $('#offcanvas-cart').removeClass('loading');
  });
  // Add loading class to offcanvas-cart END

  
  // Review Checkbox Products
  $('.comment-form-cookies-consent').addClass('form-check');
  $('#wp-comment-cookies-consent').addClass('form-check-input');
  $('.comment-form-cookies-consent label').addClass('form-check-label');
  // Review Checkbox END

  
  // Checkout Form Validation
  $('body').on('blur change', '.form-row input', function () {
    $('.woocommerce form .form-row.woocommerce-validated .select2-container, .woocommerce form .form-row.woocommerce-validated input.input-text, .woocommerce form .form-row.woocommerce-validated select, .woocommerce form .form-row.woocommerce-validated .form-check-input[type=checkbox]').removeClass('is-invalid').addClass('is-valid');
    $('.woocommerce form .form-row.woocommerce-invalid .select2-container, .woocommerce form .form-row.woocommerce-invalid input.input-text, .woocommerce form .form-row.woocommerce-invalid select, .woocommerce form .form-row.woocommerce-invalid .form-check-input[type=checkbox]').removeClass('is-valid').addClass('is-invalid');
  });
  // Checkout Form Validation END


  // Single-product Tabs  
  // First item active
  $('.wc-tabs .nav-item:first-child a').addClass('active');

  // Set active class to nav-link  
  $('body').on('click', '.wc-tabs li a', function (e) {
    e.preventDefault();
    var $tab = $(this);
    var $tabs_wrapper = $tab.closest('.wc-tabs-wrapper, .woocommerce-tabs');
    var $tabs = $tabs_wrapper.find('.wc-tabs');

    $tabs.find('li a').removeClass('active');
    $tabs_wrapper.find('.wc-tab, .panel:not(.panel .panel)').hide();

    $tab.closest('li a').addClass('active');
    $tabs_wrapper.find($tab.attr('href')).show();
  });
  // Single-product Tabs End

}); // jQuery End





