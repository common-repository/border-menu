jQuery(document).on( 'click', '.wow-plugin-notice .notice-dismiss', function() {
		jQuery.ajax({
        url: ajaxurl,
        data: {
            action: 'border_menu_notice_action'
        }
    })
})