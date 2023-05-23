/*--------------------------------------------------------------
>>> TABLE OF CONTENTS:
----------------------------------------------------------------
1.  Header
2.  Theme
--------------------------------------------------------------*/

/*--------------------------------------------------------------
1. Header
--------------------------------------------------------------*/

jQuery(function ($) {

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    /* Smart system to make responsive menu */
    if ($(window).width() > 700) {
        let menu = $('#nav-cat')[0].getBoundingClientRect();
        let menu_container = $('#desktop-menu')[0].getBoundingClientRect();

        while (menu.width > menu_container.width) {
            jQuery('#nav-cat > li:last-child').hide();

            menu = $('#nav-cat')[0].getBoundingClientRect();
        }
    }


    setInterval(function () {
        $('.sub-menu-container-stg > ul').show();

        /* Check if modal is inside menu div */
        if (jQuery("#registration_modal").parent().attr('id') == 'page') {
            $(document.body).append($('#registration_modal').detach());
        }

        // if($('body').hasClass('post-type-archive-product')){
        //     const products = $('.product-desc');
        //     products.each(function(){
        //         const product = $(this);
        //         if(!product.parent().hasClass('col-md-3')){
        //             product.wrap('<div class="col-md-3 col-6 mb-4"></div>');
        //         }
        //     })
        // }

    }, 400);

    // Hide offcanvas menu in navbar and enable body scroll on resize through the breakpoints
    $(window).on('resize', function () {
        $('.navbar .offcanvas').offcanvas('hide');
    });

    // Close offcanvas on click a, keep .dropdown-menu open
    $('.offcanvas a:not(.dropdown-toggle):not(a.remove_from_cart_button), a.dropdown-item').on('click', function () {
        $('.offcanvas').offcanvas('hide');
    });

    // Dropdown menu animation
    // Add slideDown animation to Bootstrap dropdown when expanding.
    $('.dropdown').on('show.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

    // Add slideUp animation to Bootstrap dropdown when collapsing.
    $('.dropdown').on('hide.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });

    // Search collapse button hide if empty
    if ($('#collapse-search').children().length == 0) {
        $('.top-nav-search-md, .top-nav-search-lg').remove();
    }

    // Searchform focus
    $('#collapse-search').on('shown.bs.collapse', function () {
        $('.top-nav-search input:first-of-type').focus();
    });

    // Close collapse if searchform loses focus
    $('.top-nav-search input:first-of-type').focusout(function () {
        $('#collapse-search').collapse('hide');
    });





    $('#nav-cat ul').hide();

    $('#nav-cat li > a').hover(
        function () {
            //show its submenu
            $(this).parent().children('ul').stop().slideDown(100);
        }
    );
    $('#nav-cat li').hover(null,
        function (e) {
            //hide its submenu
            $(this).children('ul').stop().slideUp(100);
        }
    );




}); // jQuery End

/*--------------------------------------------------------------
2. Theme
--------------------------------------------------------------*/

jQuery(function ($) {
    // Smooth Scroll. Will be removed when Safari supports scroll-behaviour: smooth (Bootstrap 5).
    // $(function () {
    //   $('a[href*="#"]:not([href="#"]):not(a.comment-reply-link):not([href="#tab-reviews"]):not([href="#tab-additional_information"]):not([href="#tab-description"]):not([href="#reviews"]):not([href="#carouselExampleIndicators"]):not([data-smoothscroll="false"])').click(function () {
    //     if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    //       var target = $(this.hash);
    //       target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    //       if (target.length) {
    //         // Change your offset according to your navbar height
    //         $('html, body').animate({ scrollTop: target.offset().top - 55 }, 1000);
    //         return !1;
    //       }
    //     }
    //   });
    // });

    // Scroll to ID from external url. Will be removed when Safari supports scroll-behaviour: smooth (Bootstrap 5).
    if (window.location.hash) scroll(0, 0);
    setTimeout(function () {
        scroll(0, 0);
    }, 1);
    $(function () {
        $('.scroll').on('click', function (e) {
            e.preventDefault();
            // Change your offset according to your navbar height
            $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top - 55 }, 1000, 'swing');
        });
        if (window.location.hash) {
            // Change your offset according to your navbar height
            $('html, body').animate({ scrollTop: $(window.location.hash).offset().top - 55 }, 1000, 'swing');
        }
    });

    // Scroll to top Button
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 500) {
            $('.top-button').addClass('visible');
        } else {
            $('.top-button').removeClass('visible');
        }
    });

    // div height, add class to your content
    $('.height-50').css('height', 0.5 * $(window).height());
    $('.height-75').css('height', 0.75 * $(window).height());
    $('.height-85').css('height', 0.85 * $(window).height());
    $('.height-100').css('height', 1.0 * $(window).height());

    // Forms
    $('select').addClass('form-select').removeClass('form-control'); // form-control is added to select by WooCommerce form filter

    // Alert links
    $('.alert a').addClass('alert-link');


    $(document).on('click', '[stg-add-to-cart]', function (e) {
        e.preventDefault();
        const $btn = $(this);
        const conf = JSON.parse($(this).attr('stg-add-to-cart'));
        const originaltext = $btn.html();

        $.ajax({
            type: 'post',
            url: wc_add_to_cart_params.ajax_url,
            data: conf,
            beforeSend: function (response) {
                $btn.prop('disabled', true);
                $btn.html(`<div class="spinner-border spinner-border-sm" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>`);
            },
            complete: function (response) {
                console.log(response)
            },
            success: function (response) {
                if (response.error && response.product_url) {
                    window.location = response.product_url;
                    return;
                } else {
                    $btn.html('Lagt til i handlekurven');
                    setTimeout(function () {
                        $btn.prop('disabled', false);
                        $btn.html(originaltext);
                    }, 1000);
                    $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash]);
                }
            },
        });

        console.log(conf)
    });

}); // jQuery End


if (document.querySelector('body.single-product')) {
    let element = document.querySelector("body.single-product div.woocommerce-tabs div.woocommerce-Tabs-panel");
    var windowWidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    if (windowWidth >= 768) {
        element.classList.remove('d-none');
    }
    if (windowWidth < 768) {
        element.classList.add('d-none');

    }
    window.addEventListener('resize', function (event) {
        let clientWidth = document.documentElement.clientWidth;

        if (clientWidth > 768) {
            element.classList.remove('d-none');
        }
        if (clientWidth <= 768) {
            element.classList.add('d-none');

        }
    }, true);

    var wishlistChecker = setInterval(() => {
        if (document.querySelector('body.single-product .yith-wcwl-icon')) {
            document.querySelector('body.single-product .yith-wcwl-icon').classList.remove('fa');
            document.querySelector('body.single-product .yith-wcwl-icon').classList.add('far');
            clearInterval(wishlistChecker);
        }
    }, 1000);

}


// owlCarousel
jQuery(document).ready(function () {

    jQuery('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        pagination: false,
        dots: false,
        responsive: {
            0: {
                items: 2,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 5,
                nav: true,
                loop: false
            }
        }
    })

});