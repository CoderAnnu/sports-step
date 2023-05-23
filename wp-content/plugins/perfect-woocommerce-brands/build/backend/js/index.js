(()=>{"use strict";var a={n:e=>{var n=e&&e.__esModule?()=>e.default:()=>e;return a.d(n,{a:n}),n},d:(e,n)=>{for(var t in n)a.o(n,t)&&!a.o(e,t)&&Object.defineProperty(e,t,{enumerable:!0,get:n[t]})},o:(a,e)=>Object.prototype.hasOwnProperty.call(a,e),r:a=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(a,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(a,"__esModule",{value:!0})}},e={};a.r(e);const n=window.jQuery;!function(a){var e=null;function n(e){a(".pwb_brand_image_selected span",e).append('<a href="#" class="pwb_brand_image_selected_remove">X</a>'),a(".pwb_brand_image_selected_remove",e).on("click",(function(n){n.preventDefault(),a(this).closest(".pwb_brand_image_selected").remove(),a("#pwb_brand_image",e).val(""),a("#pwb_brand_banner",e).val("")}))}function t(e){var n=a(".pwb-select-display-as");null!=e&&(n=a(".pwb-select-display-as",e)),n.on("change",(function(){"brand_logo"==a(this).val()?a(this).parent().siblings(".pwb-display-as-logo").addClass("show"):a(this).parent().siblings(".pwb-display-as-logo").removeClass("show")}))}a(".taxonomy-pwb-brand #pwb_brand_image_select, .taxonomy-pwb-brand #pwb_brand_banner_select").on("click",(function(t){!function(t,o){var s=o.parent();(e=wp.media({frame:"post",state:"insert",multiple:!1})).on("insert",(function(){var o=e.state().get("selection").first().toJSON(),i=o.id,d='<img src="'+o.url+'" width="90" height="90">',r="";switch(t.target.id){case"pwb_brand_image_select":r=".taxonomy-pwb-brand #pwb_brand_image";break;case"pwb_brand_banner_select":r=".taxonomy-pwb-brand #pwb_brand_banner"}a(r).val(i),a(r+"_result").remove(),a(".pwb_brand_image_selected",s).length?a(".pwb_brand_image_selected span",s).html(d):s.append('<div class="pwb_brand_image_selected"><span>'+d+"</span></div>"),n(s)})),e.open()}(t,a(this))})),a(".taxonomy-pwb-brand #pwb_brand_image_select, .taxonomy-pwb-brand #pwb_brand_banner_select").each((function(){n(a(this).parent())})),a("body").hasClass("edit-tags-php")&&a("body").hasClass("taxonomy-pwb-brand")&&a(document).ajaxSuccess((function(e,n,t){void 0!==t&&t.data&&~t.data.indexOf("action=add-tag")&&~t.data.indexOf("taxonomy=pwb-brand")&&(a("#pwb_brand_image").val(""),a("#pwb_brand_banner").val(""),a(".pwb_brand_image_selected").remove())})),a(".taxonomy-pwb-brand table .column-featured > span").not("pwb-blocked").on("click",(function(e){e.preventDefault();var n=a(this);n.addClass("pwb-blocked"),n.hasClass("dashicons-star-filled")?(n.removeClass("dashicons-star-filled"),n.addClass("dashicons-star-empty")):(n.removeClass("dashicons-star-empty"),n.addClass("dashicons-star-filled"));var t={action:"pwb_admin_set_featured_brand",brand:n.data("brand-id"),nonce:pwb_ajax_object_admin.nonce.pwb_admin_set_featured_brand};a.post(pwb_ajax_object_admin.ajax_url,t,(function(e){if(n.removeClass("pwb-blocked"),e.success){var t=a(".taxonomy-pwb-brand .pwb-featured-count > span");"up"==e.data.direction?t.html(parseInt(t.text())+1):t.html(parseInt(t.text())-1)}else alert(e.data.error_msg)}))})),a(".taxonomy-pwb-brand #pwb-first-featured-brands").on("change",(function(e){e.preventDefault(),a("#screen-options-apply").replaceWith('<img src="'+pwb_ajax_object_admin.site_url+'/wp-admin/images/loading.gif">');var n={action:"pwb_admin_save_screen_settings",new_val:a(this).is(":checked"),nonce:pwb_ajax_object_admin.nonce.pwb_admin_save_screen_settings};a.post(pwb_ajax_object_admin.ajax_url,n,(function(a){location.reload()}))})),a(".pwb-edit-brands-bottom > span").on("click",(function(e){e.preventDefault(),a(".taxonomy-pwb-brand #col-left").toggleClass("pwb-force-full-width"),a(".taxonomy-pwb-brand #col-right").toggleClass("pwb-force-full-width")})),a(".pwb-admin-selectwoo").length&&a(".pwb-admin-selectwoo").selectWoo(),a("#wc_pwb_admin_tab_tools_migrate").on("change",(function(){if("-"!=a(this).val()&&confirm(pwb_ajax_object_admin.translations.migrate_notice)){a("html").append('<div class="pwb-modal"><div class="pwb-modal-inner"></div></div>'),a(".pwb-modal-inner").html("<p>"+pwb_ajax_object_admin.translations.migrating+"</p>");var e={action:"pwb_admin_migrate_brands",from:a(this).val(),nonce:pwb_ajax_object_admin.nonce.pwb_admin_migrate_brands};a.post(pwb_ajax_object_admin.ajax_url,e,(function(a){setTimeout((function(){location.href=pwb_ajax_object_admin.brands_url}),1e3)}))}a(this).val("-")})),a("#wc_pwb_admin_tab_tools_dummy_data").on("change",(function(){if("-"!=a(this).val()&&confirm(pwb_ajax_object_admin.translations.dummy_data_notice)){a("html").append('<div class="pwb-modal"><div class="pwb-modal-inner"></div></div>'),a(".pwb-modal-inner").html("<p>"+pwb_ajax_object_admin.translations.dummy_data+"</p>");var e={action:"pwb_admin_dummy_data",from:a(this).val(),nonce:pwb_ajax_object_admin.nonce.pwb_admin_dummy_data};a.post(pwb_ajax_object_admin.ajax_url,e,(function(a){setTimeout((function(){location.href=pwb_ajax_object_admin.brands_url}),1e3)}))}a(this).val("-")})),a("#wc_pwb_admin_tab_tools_system_status").siblings("p").addClass("button wc_pwb_admin_tab_status_btn"),a(".wc_pwb_admin_tab_status_btn").on("click",(function(e){if(e.preventDefault(),!a("#wc_pwb_admin_status_result").length){var n=a("#wc_pwb_admin_tab_tools_system_status");a('<pre id="wc_pwb_admin_status_result"></pre>').insertAfter(n),a("#wc_pwb_admin_status_result").click((function(e){e.preventDefault();var n=a(this)[0];if(a.browser?.msie)(t=document.body.createTextRange()).moveToElementText(n),t.select();else if(a.browser?.mozilla||a.browser?.opera){var t,o=window.getSelection();(t=document.createRange()).selectNodeContents(n),o.removeAllRanges(),o.addRange(t)}else a.browser?.safari&&(o=window.getSelection()).setBaseAndExtent(n,0,n,1)}))}a("#wc_pwb_admin_status_result").html('<img src="'+pwb_ajax_object_admin.site_url+'/wp-admin/images/spinner.gif" alt="Loading" height="20" width="20">'),a("#wc_pwb_admin_status_result").show();var t={action:"pwb_system_status",nonce:pwb_ajax_object_admin.nonce.pwb_system_status};a.post(ajaxurl,t,(function(e){a("#wc_pwb_admin_status_result").html(e),a("#wc_pwb_admin_status_result").trigger("click")}))})),a(document).on("click",".pwb-notice-dismissible .notice-dismiss",(function(e){e.preventDefault();var n={action:"pwb_dismiss_notice",notice_name:a(this).closest(".pwb-notice-dismissible").data("notice"),nonce:pwb_ajax_object_admin.nonce.pwb_dismiss_notice};a.post(ajaxurl,n,(function(a){}))})),t(),a(document).bind("widget-added",(function(a,e){t(e)})),a(document).on("widget-updated",(function(a,e){t(e)})),a("button.pwb-brands-export").on("click",(function(e){e.preventDefault();var n=a(this);n.addClass("pwb-loading-overlay"),n.prop("disabled",!0);var t={action:"pwb_brands_export",nonce:pwb_ajax_object_admin.nonce.pwb_brands_export};a.post(pwb_ajax_object_admin.ajax_url,t,(function(e){if(e.success){n.removeClass("pwb-loading-overlay"),n.prop("disabled",!1),a("#pwb-download-export-file").remove();var t=document.createElement("a");t.download="brands.json",t.id="pwb-download-export-file",t.href=e.data.export_file_url,a("body").append(t),t.click()}}))})),a("button.pwb-brands-import").on("click",(function(e){e.preventDefault(),a("input.pwb-brands-import-file").trigger("click")})),a("input.pwb-brands-import-file").on("change",(function(e){e.preventDefault();var n=a("button.pwb-brands-import");n.addClass("pwb-loading-overlay"),n.prop("disabled",!0);var t=a(this)[0].files[0],o=new FormData;o.append("action","pwb_brands_import"),o.append("file",t),o.append("nonce",pwb_ajax_object_admin.nonce.pwb_brands_import),a.ajax({url:pwb_ajax_object_admin.ajax_url,type:"post",cache:!1,dataType:"json",contentType:!1,processData:!1,data:o,success:function(a){a.success?(n.removeClass("pwb-loading-overlay"),location.reload()):alert("Importer error")}})}))}(a.n(n)()),(window.tiktok=window.tiktok||{}).backend=e})();