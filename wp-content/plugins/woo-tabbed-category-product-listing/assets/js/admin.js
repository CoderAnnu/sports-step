(function ($) {
    'use strict';
    $(function () {
        //$('#product_number').val('Shibly');

        $('#categories').select2({width: '100%'});

        
    var sbdstoredNoticeId = localStorage.getItem('qcld_tabbed_Notice_set');
    var qcld_tabbed_Notice_time_set = localStorage.getItem('qcld_tabbed_Notice_time_set');

    var notice_current_time = Math.round(new Date().getTime() / 1000);

    if ('tabbed-msg' == sbdstoredNoticeId && qcld_tabbed_Notice_time_set > notice_current_time  ) {
        $('#message-tabbed').css({'display': 'none'});
    }

    $(document).on('click', '#message-tabbed .notice-dismiss', function(e){

        var currentDom = $(this);
        var currentWrap = currentDom.closest('.notice');
        currentWrap.css({'display': 'none'});
        localStorage.setItem('qcld_tabbed_Notice_set', 'tabbed-msg');
        var ts = Math.round(new Date().getTime() / 1000);
        var tsYesterday = ts + (24 * 3600);
        localStorage.setItem('qcld_tabbed_Notice_time_set', tsYesterday);
        console.log(tsYesterday)

    });



    })
})(jQuery);