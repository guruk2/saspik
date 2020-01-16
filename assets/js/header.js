(function($, window, document) {
    "use strict";
    $(window).on("scroll load", function() {
        if ($(this).scrollTop() >= 30) {
            if ($(".site-header.header_trans-fixed").length) {
                $(".site-header.header_trans-fixed").not(".fixed-dark").addClass("pix-header-fixed");
                $(".fixed-dark").addClass("bg-fixed-dark");
                $(".sticky-logo, .header-button-scroll").show();
                $(".main-logo, .header-button-default").hide()
            }
            if ($(".right-menu.modern").length) {
                $(".right-menu.modern").closest(".fixed-header").addClass("fixed-header-scroll")
            }
        } else {
            if ($(".site-header.header_trans-fixed").length) {
                $(".site-header.header_trans-fixed").not(".fixed-dark").removeClass("pix-header-fixed");
                $(".fixed-dark").removeClass("bg-fixed-dark");
                $(".sticky-logo, .header-button-scroll").hide();
                $(".main-logo, .header-button-default").show()
            }
            if ($(".right-menu.modern").length) {
                $(".right-menu.modern").closest(".fixed-header").removeClass("fixed-header-scroll")
            }
        }
    });


    if ($(window).width() >= $(".menu-wrapper").data("top")) {
        $('.site-main-menu li:not(.menu-item-has-children) > a[href^="#"]').on("click", function(e) {
            e.preventDefault();
            var elem = $(this).attr("href");
            if ($(elem).length) {
                $("html,body").animate({
                    scrollTop: $(elem).offset().top - $(".header_trans-fixed").outerHeight() - $("#wpadminbar").outerHeight()
                }, "slow")
            }
        })
    }

    $(".toggle-menu").on("click", function(e) {
        e.preventDefault();
        $("html").addClass("no-scroll sidebar-open").height(window.innerHeight + "px");
        if ($("#wpadminbar").length) {
            $(".sidebar-open .site-nav").css("top", "46px")
        } else {
            $(".sidebar-open .site-nav").css("top", "0")
        }
    });


     if ($('body').hasClass("admin-bar")) {
         $('body').addClass('header-position');
     }


    $(".close-menu").on("click", function(e) {
        e.preventDefault();
        $("html").removeClass("no-scroll sidebar-open").height("auto")
    });

    function menuArrows() {
        var mobW = $(".menu-wrapper").attr("data-top");
        if (window.outerWidth < mobW || $(".site-header").hasClass("topmenu-arrow")) {
            if (!$(".menu-item-has-children i").length) {
                $("header .menu-item-has-children").append('<i class="fa fa-angle-down"></i>');
                $("header .menu-item-has-children i").addClass("hide-drop")
            }
            $("header .menu-item-has-children i").on("click", function() {
                if (!$(this).hasClass("animation")) {
                    $(this).parent().toggleClass("is-open");
                    $(this).addClass("animation");
                    $(this).parent().siblings().removeClass("is-open").find(".fa").removeClass("hide-drop").prev(".sub-menu").slideUp(250);
                    if ($(this).hasClass("hide-drop")) {
                        if ($(this).closest(".sub-menu").length) {
                            $(this).removeClass("hide-drop").prev(".sub-menu").slideToggle(250)
                        } else {
                            $(".menu-item-has-children i").addClass("hide-drop").next(".sub-menu").hide(250);
                            $(this).removeClass("hide-drop").prev(".sub-menu").slideToggle(250)
                        }
                    } else {
                        $(this).addClass("hide-drop").prev(".sub-menu").hide(100).find(".menu-item-has-children a").addClass("hide-drop").prev(".sub-menu").hide(250)
                    }
                }
                setTimeout(removeClass, 250);

                function removeClass() {
                    $("header .site-main-menu i").removeClass("animation")
                }
            })
        } else {
            $("header .menu-item-has-children i").remove()
        }
    }




    $(".additional-nav").on("click", function(e) {
        e.preventDefault();
        $(".additional-menu-wrapper").addClass("menu-open");
        $(".menu-wrapper").addClass("additional-menu-open")
    });
    $(".additional-nav-close, .additional-menu-overlay").on("click", function() {
        $(".additional-menu-wrapper").removeClass("menu-open");
        $(".menu-wrapper").removeClass("additional-menu-open")
    });
    $(window).on("ready", function() {
    });

    $(window).on("load resize", function() {
        menuArrows();
    });
    window.addEventListener("orientationchange", function() {
        menuArrows()
    })
})(jQuery, window, document);