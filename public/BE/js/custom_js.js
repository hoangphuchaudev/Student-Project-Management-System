 $(window).on('load', function() {
        $('.andro_preloader').addClass('hidden');

        if (!checkCookie('newsletter_popup_viewed')) {
            setTimeout(function() {
                $("#androNewsletterPopup").modal('show');
            }, 3000);
        }

});