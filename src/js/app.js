var PIXELSIGNS = PIXELSIGNS || {};

(function ($) {

    /*!----------------------------------------------
    	# This beautiful code written with heart
    	# by Mominul Islam <hello@mominul.me>
    	# In Dhaka, BD at the PixelSigns Theme workstation.
    	---------------------------------------------*/

    // USE STRICT
    "use strict";

    PIXELSIGNS.initialize = {

        init: function () {
            PIXELSIGNS.initialize.general();
            PIXELSIGNS.initialize.sectionBackground();
            PIXELSIGNS.initialize.tab();
            PIXELSIGNS.initialize.sectionSwitch();
            PIXELSIGNS.initialize.portfolio();
            PIXELSIGNS.initialize.swiperSlider();
            PIXELSIGNS.initialize.countUp();         
            PIXELSIGNS.initialize.googleMap();
            PIXELSIGNS.initialize.contactFrom();
        },

        /*========================================================*/
        /*=           Collection of snippet and tweaks           =*/
        /*========================================================*/

        general: function () {

            //Popup Search
            $('#search-menu-wrapper').removeClass('toggled');

            $('#search-icon').on('click', function(e) {
                e.stopPropagation();
                $('#search-menu-wrapper').toggleClass('toggled');
                $("#popup-search").focus();
            });

            $('#search-menu-wrapper input').on('click', function(e) {
                e.stopPropagation();
            });

            $('#search-menu-wrapper, body').on('click', function() {
                $('#search-menu-wrapper').removeClass('toggled');
            });

            /* Wow Js Init */

            var wow = new WOW({
                boxClass: 'wow',
                animateClass: 'animated',
                offset: 0,
                mobile: false,
                live: true,
                scrollContainer: null,
            });
            wow.init();

            /* Bootstrap Accordion  */
            $('.faq .card').each(function () {
                var $this = $(this);
                $this.on('click', function (e) {
                    var has = $this.hasClass('active');
                    $('.faq .card').removeClass('active');
                    if (has) {
                        $this.removeClass('active');
                    } else {
                        $this.addClass('active');
                    }
                });
            });

            /* Magnefic Popup */
            $('.popup-video').each (function() {
                $('.popup-video').magnificPopup({
                    type: 'iframe'
                });
            });
            

            /** Pricing Tabs */
            $('.pricing-tab-switcher, .tab-btn').on('click', function () {
                $('.pricing-tab-switcher, .tab-btn').toggleClass('active');
                $(".pricing-tab").toggleClass('seleceted');

                $('.pricing-amount').toggleClass('change-subs-duration');
            });


            if ($('.tabs-box').length) {
                $('.tabs-box .pricing-tab  .tab-btn').on('click', function (e) {
                    e.preventDefault();
                    var target = $($(this).attr('data-tab'));

                    if ($(target).is(':visible')) {
                        return false;
                    } else {
                        target.parents('.tabs-box').find('.pricing-tab ').find('.tab-btn').removeClass('active-btn');
                        $(this).addClass('active-btn');
                        target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
                        target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab animated fadeIn');
                        $(target).fadeIn(300);
                        $(target).addClass('active-tab animated fadeIn');
                    }
                });
            }
   
            $('.pix-tabs').each(function () {
                $('#pix-tabs-nav li a').on('click', function () {

                    //Check if the tabs menu has active class
                    $('#pix-tabs-nav li').removeClass('active');
                    $(this).parent().addClass('active');            

                    // Display active tab
                    var currentTab = $(this).attr('href');
                    $('#pix-tabs-content .content').fadeOut(500).hide();
                    $(currentTab).fadeIn(500).show();

                    return false;
                });
            });

            /*  Active Menu */
            $('.site-main-menu li a').each(function () {
                if ($(this).attr('href') == location.href.split("/").slice(-1)) {
                    $(this).addClass('current_page');
                }
            });

            if ($("#wpadminbar").length && $(window).width() < 768) {
                $("#wpadminbar").css({
                    position: "fixed",
                    top: "0"
                })
            }

        },

        /*====================================*/
        /*=           Swiper Slider          =*/
        /*====================================*/

        swiperSlider: function () {
            $('#related-portfolio').each(function () {   

                var id = $(this).attr('id');
                var perpage = $(this).data('perpage') || 1;
                var loop = $(this).data('loop') || true;
                var speed = $(this).data('speed') || 700;
                var autoplay = $(this).data('autoplay') || 50000;
                var space = $(this).data('space') || 0;
                var effect = $(this).data('effect');
                var direction = $(this).data('direction') || 'horizontal';
                var breakpoints = $(this).data('breakpoints');

                var swiper = new Swiper($(this), {
                    slidesPerView: perpage,
                    spaceBetween: space,                  
                    loop: true,
                    speed: speed, 
                    effect: effect,                               
                    breakpoints: breakpoints,
                    autoplay: autoplay,                     
                    pagination: ".swiper-pagination",
                    paginationClickable: true,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    fadeEffect: {
                        crossFade: true
                      },
                });
            });
            
        },

        /*==============================*/
        /*=           Portfolio          =*/
        /*==============================*/

        portfolio: function () {

            if ((typeof $.fn.imagesLoaded !== 'undefined') && (typeof $.fn.isotope !== 'undefined')) {

                $(".pixsass-portfolio-items").imagesLoaded(function () {
                    var container = $(".pixsass-portfolio-items");

                    container.isotope({
                        itemSelector: '.pixsass-portfolio-item',
                        // percentPosition: true,
                        // transitionDuration: '0.5s',

                            // columnWidth: '.grid-sizer',
                            layoutMode: 'masonry',

                    });

                    $('.pixsass-isotope-filter a').on('click', function () {
                        $('.pixsass-isotope-filter').find('.current').removeClass('current');
                        $(this).parent().addClass('current');

                        var selector = $(this).attr("data-filter");
                        container.isotope({
                            filter: selector
                        });

                        return false;
                    });

                    $(window).resize(function () {
                        container.isotope();
                        blogContainer.masonry();
                    });

                });

                var blogContainer = $(".saaspik-masonry");

                blogContainer.masonry({
                    itemSelector: '.grid-item',
                    percentPosition: true
                });

            }
        },

        /*============================*/
        /*=           Tabs           =*/
        /*============================*/
        tab: function() {
            $(".tab-nav-item > .acc-btn").on("click", function() {
                if ($(this).hasClass("active")) {
                    $(this).removeClass("active");
                    $(this)
                        .siblings(".content")
                        .slideUp(400);
                    $(".tab-nav-item > .acc-btn i")
                        .removeClass("fa-minus")
                        .addClass("fa-plus");
                } else {
                    $(".tab-nav-item > .acc-btn i")
                        .removeClass("fa-minus")
                        .addClass("fa-plus");
                    $(this)
                        .find("i")
                        .removeClass("fa-plus")
                        .addClass("fa-minus");
                    $(".tab-nav-item > .acc-btn").removeClass("active");
                    $(this).addClass("active");
                    $(".content").slideUp(400);
                    $(this)
                        .siblings(".content")
                        .slideDown(400);
                }
            });



            var tabItems = $('.gp-tabs-navigation li'),
                tabContentWrapper = $('.gp-tabs-content');

            tabItems.on('click', function(event) {
                event.preventDefault();
                var selectedItem = $(this);
                if (!selectedItem.hasClass('active-tab')) {
                    var selectedTab = selectedItem.data('content'),
                        selectedContent = tabContentWrapper.find('.pix-tab-item[data-content="' + selectedTab + '"]'),
                        slectedContentHeight = selectedContent.innerHeight();

                    tabItems.removeClass('active-tab');
                    selectedItem.addClass('active-tab');
                    selectedContent.addClass('active-tab').siblings('.pix-tab-item').removeClass('active-tab');
                    //animate tabContentWrapper height when content changes
                    tabContentWrapper.animate({
                        'height': slectedContentHeight
                    }, 500);
                }
            });

            //hide the .gp-tabs::after element when tabbed navigation has scrolled to the end (mobile version)
            checkScrolling($('.gp-tabs nav'));
            $(window).on('resize', function() {
                checkScrolling($('.gp-tabs nav'));
                tabContentWrapper.css('height', 'auto');
            });

            $('.gp-tabs nav').on('scroll', function() {
                checkScrolling($(this));
            });

            function checkScrolling(tabs) {
                var totalTabWidth = parseInt(tabs.children('.gp-tabs-navigation').width()),
                    tabsViewport = parseInt(tabs.width());
                if (tabs.scrollLeft() >= totalTabWidth - tabsViewport) {
                    tabs.parent('.gp-tabs').addClass('is-ended');
                } else {
                    tabs.parent('.gp-tabs').removeClass('is-ended');
                }
            }
        },
        /*==========================================*/
        /*=           Section Background           =*/
        /*==========================================*/

        sectionBackground: function () {

            // Section Background Image
            $('[data-bg-image]').each(function () {
                var img = $(this).data('bg-image');
                $(this).css({
                    backgroundImage: 'url(' + img + ')',
                });
            });
        },

        /*=====================================*/
        /*=           Section Switch          =*/
        /*=====================================*/

        sectionSwitch: function () {
            $('[data-type="section-switch"], #menu-home li a, .scroll-btn').on('click', function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    if (target.length > 0) {

                        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                        $('html,body').animate({
                            scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            });
        },

        /*==============================*/
        /*=           Countup          =*/
        /*==============================*/

        countUp: function () {
            var options = {
                useEasing: true,
                useGrouping: true,
                separator: ',',
                decimal: '.',
                prefix: '',
                suffix: ''
            };

            var counteEl = $('[data-counter]');

            if (counteEl) {
                counteEl.each(function () {
                    var val = $(this).data('counter');

                    var countup = new CountUp(this, 0, val, 0, 2.5, options);
                    $(this).appear(function () {
                        countup.start();
                    }, {
                        accX: 0,
                        accY: 0
                    })
                });
            }
        },

        /*=================================*/
        /*=           Google Map          =*/
        /*=================================*/

        googleMap: function () {
            $('.gmap3-area').each(function () {
                var $this = $(this),
                    key = $this.data('key'),
                    lat = $this.data('lat'),
                    lng = $this.data('lng'),
                    mrkr = $this.data('mrkr'),
                    zoom = $this.data('zoom'),
                    scrollwheel = $this.data('scrollwheel') || false;

                $this.gmap3({
                        center: [lat, lng],
                        zoom: zoom,
                        scrollwheel: scrollwheel,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        styles: [{
                            "featureType": "administrative.country",
                            "elementType": "geometry.fill",
                            "stylers": [{
                                "visibility": "on"
                            }]
                        }]
                    })
                    .marker(function (map) {
                        return {
                            position: map.getCenter(),
                            icon: mrkr
                        };
                    })

            });
        },

        /*=================================*/
        /*=           Contact Form          =*/
        /*=================================*/

        contactFrom: function () {

            $('[data-saaspik-form]').each(function () {
                var $this = $(this);
                $('.form-result', $this).css('display', 'none');

                $this.submit(function () {

                    $('button[type="submit"]', $this).addClass('clicked');

                    // Create a object and assign all fields name and value.
                    var values = {};

                    $('[name]', $this).each(function () {
                        var $this = $(this),
                            $name = $this.attr('name'),
                            $value = $this.val();
                            values[$name] = $value;
                    });

                    // Make Request
                    $.ajax({
                        url: $this.attr('action'),
                        type: 'POST',
                        data: values,
                        success: function success(data) {

                            if (data.error == true) {
                                $('.form-result', $this).addClass('alert-warning').removeClass('alert-success alert-danger').fadeIn(200).show().fadeOut(2000);
                            } else {
                                $('.form-result', $this).addClass('alert-success').removeClass('alert-warning alert-danger').fadeIn(200).show().fadeOut(2000);
                            }
                            $('.form-result > .content', $this).html(data.message);
                            $('button[type="submit"]', $this).removeClass('clicked');
                            $this.trigger("reset");
                        },
                        error: function error() {
                            $('.form-result', $this).addClass('alert-danger').removeClass('alert-warning alert-success').css('display', 'block');
                            $('.form-result > .content', $this).html('Sorry, an error occurred.');
                            $('button[type="submit"]', $this).removeClass('clicked');
                        }
                    });
                    return false;
                });

            });
        }

    };

    PIXELSIGNS.documentOnReady = {
        init: function () {
            PIXELSIGNS.initialize.init();

        },
    };

    PIXELSIGNS.documentOnLoad = {
        init: function () {
            $("#preloader").fadeOut("slow");
        },
    };

    PIXELSIGNS.documentOnResize = {
        init: function () {
            if ($("#wpadminbar").length && $(window).width() < 768) {
                $("#wpadminbar").css({
                    position: "fixed",
                    top: "0"
                })
            }
        },
    };

    PIXELSIGNS.documentOnScroll = {
        init: function () {
            PIXELSIGNS.initialize.sectionBackground();

            if ($(window).scrollTop() > 300) {
                $('.return-to-top').addClass('back-top');
            } else {
                $('.return-to-top').removeClass('back-top');
            }
        },
    };

    // Initialize Functions
    $(document).ready(PIXELSIGNS.documentOnReady.init);
    $(window).on('load', PIXELSIGNS.documentOnLoad.init);
    $(window).on('resize', PIXELSIGNS.documentOnResize.init);
    $(window).on('scroll', PIXELSIGNS.documentOnScroll.init);

})(jQuery);