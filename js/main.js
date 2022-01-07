(function($) {
    $(function() {

        $('.header-area').sticky({
            topSpacing:0
        });

                
        // -------------slicknav area------------
        $('#menu').slicknav({
            label: '',
            prependTo: '.header-area .main-menu',
            closeOnClick: true,
        });



        $('.patient-carousel').owlCarousel({
            items: 1,
            loop: true,
            nav: false,
            dots: true,
            margin: 30,
            autoplay: false,
            autoplaySpeed: 3000,
            autoplayHoverPause: true,
            smartSpeed: 2500,
            responsiveClass: true,
            responsive: {
                0:{
                    items: 1,
                },
                480:{
                    items: 1,
                },
                767:{
                    items: 1,
                },
                992:{
                    items: 1,
                    dots: true,
                }
            }
        });


        $('.laboratory-col7').owlCarousel({
            items: 1,
            loop: true,
            nav: false,
            dots: true,
            margin: 30,
            autoplay: true,
            autoplaySpeed: 3000,
            autoplayHoverPause: true,
            smartSpeed: 2000,
            responsiveClass: true,
            responsive: {
                0:{
                    items: 1,
                },
                767:{
                    items: 1,
                },
                992:{
                    items: 1,
                }
            }
        });
        

        $('.owl-carousel').owlCarousel({
            items: 4,
            loop: true,
            nav: false,
            dots: true,
            margin: 30,
            autoplay: true,
            autoplaySpeed: 3000,
            autoplayHoverPause: true,
            smartSpeed: 2000,
            responsiveClass: true,
            responsive: {
                0:{
                    items: 1,
                },
                767:{
                    items: 2,
                },
                992:{
                    items: 4,
                }
            }
        });

        $('.gallery-carousel').owlCarousel({
            items: 4,
            loop: true,
            nav: true,
            navtext: ['<i class="fab fa-angle-left"></i>', '<i class="fab fa-angle-right"></i>'],
            dots: false,
            autoplay: true,
            autoplaySpeed: 3000,
            autoplayHoverPause: true,
            smartSpeed: 2000,
            responsiveClass: true,
            responsive: {
                0:{
                    items: 1,
                },
                767:{
                    items: 2,
                },
                992:{
                    items: 4,
                }
            }
        });


        $('.play-btn').magnificPopup({
            type: 'video'
        })

            // scroll top
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            if (scroll < 500) {
                $(".bottomToup").removeClass("active-top");
            } else {
                $(".bottomToup").addClass("active-top");
            }
        });

        // wow
        var wow = new WOW({
            //disabled for mobile
            mobile: true,
        });
        wow.init();

        // preloader
        jQuery(window).load(function() {
            $(".loader").fadeOut(1000); 
        });

    });
    
})(jQuery);
