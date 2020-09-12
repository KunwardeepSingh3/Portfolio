jQuery(document).ready(function ($) {

//What happen on window scroll
    function back_to_top(){
        var scrollTop = $(window).scrollTop();
        var offset = 500;
        if (scrollTop < offset) {
            $('.biography-back-to-top').hide();
        } else {
            $('.biography-back-to-top').show();
        }
    }
    $(window).on("scroll", function (e) {
        back_to_top();
    });
    back_to_top();
    $('a[href*=#]').on('click', function(event){
        if ($(this.hash).length){
            event.preventDefault();
            $("html, body").stop().animate({scrollTop: $(this.hash).offset().top - 70}, 2e3, "easeInOutExpo");
        }
    });

//Keyboard Navigation
    if( $(window).width() < 1024 ) {
        $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });
    }
    else {
        $( '#primary-menu li:last-child' ).unbind('keydown');
    }

    $(window).resize(function() {
        if( $(window).width() < 1024 ) {
            $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
                if( e.which === 9 ) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        }
        else {
            $( '#primary-menu li:last-child' ).unbind('keydown');
        }
    });

});