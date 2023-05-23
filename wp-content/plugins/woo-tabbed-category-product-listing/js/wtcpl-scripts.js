/**
 * Created by quantumcloud on 11/23/13.
 */

jQuery(document).ready(function($) {
    "use strict";

    $("#wtcpl_tabs a").click(function (event) {

        if ($(window).height() <= 767) {
            $.scrollTo('.product_content', 1000);
        }
        event.preventDefault();
        var my_id = jQuery(this).attr("id");
        $("#wtcpl_tabs a").removeClass("active");
        $(this).addClass("active");

        if(display_category_url_based == 'enable'){

            var cat_param = "?cat_id="+my_id;
            window.history.replaceState(null, null, cat_param);

        }

        $("#wtcpl_tabs_container .each_cat").fadeOut(0);
        $("#wtcpl_tabs_container .each_cat").removeClass("active");

        $("#product-" + my_id).fadeIn();
        $("#product-" + my_id).addClass("active");

        if( qc_scroll_category_clickable == 'enable' ){
            var currentDom = $(this);
            var content_warppers = currentDom.closest('.wtcpl_container');
            var scroll_each_wrap = content_warppers.find('.product_content');

            $('html,body').animate( { scrollTop: $(scroll_each_wrap).offset().top - 100 }, 300 );

        }


    });

    $( window ).on( "load", function() {

        $.urlParam = function(name){
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if(results){
                return results[1] || 0;
            }
        }

        var cat_check_param = $.urlParam('cat_id');

        if(display_category_url_based == 'enable' && $.urlParam('cat_id')){

            var cat_param = "?cat_id="+cat_check_param;
            window.history.replaceState(null, null, cat_param);

            $("#wtcpl_tabs a").removeClass("active");
            $("#wtcpl_tabs a#" + cat_check_param).addClass("active");

            $("#wtcpl_tabs_container .each_cat").fadeOut(0);
            $("#wtcpl_tabs_container .each_cat").removeClass("active");

            $("#product-" + cat_check_param).fadeIn();
            $("#product-" + cat_check_param).addClass("active");

            return false;
        }
        


    });




});
