/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/app.js":
/*!***********************!*\
  !*** ./src/js/app.js ***!
  \***********************/
/*! no static exports found */
/***/ (function(module, exports) {

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
    init: function init() {
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
    general: function general() {
      //Popup Search
      $('#search-menu-wrapper').removeClass('toggled');
      $('#search-icon').on('click', function (e) {
        e.stopPropagation();
        $('#search-menu-wrapper').toggleClass('toggled');
        $("#popup-search").focus();
      });
      $('#search-menu-wrapper input').on('click', function (e) {
        e.stopPropagation();
      });
      $('#search-menu-wrapper, body').on('click', function () {
        $('#search-menu-wrapper').removeClass('toggled');
      });
      /* Wow Js Init */

      var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: false,
        live: true,
        scrollContainer: null
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

      $('.popup-video').each(function () {
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
          $(this).parent().addClass('active'); // Display active tab

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
        });
      }
    },

    /*====================================*/

    /*=           Swiper Slider          =*/

    /*====================================*/
    swiperSlider: function swiperSlider() {
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
            prevEl: '.swiper-button-prev'
          },
          fadeEffect: {
            crossFade: true
          }
        });
      });
    },

    /*==============================*/

    /*=           Portfolio          =*/

    /*==============================*/
    portfolio: function portfolio() {
      if (typeof $.fn.imagesLoaded !== 'undefined' && typeof $.fn.isotope !== 'undefined') {
        $(".pixsass-portfolio-items").imagesLoaded(function () {
          var container = $(".pixsass-portfolio-items");
          container.isotope({
            itemSelector: '.pixsass-portfolio-item',
            // percentPosition: true,
            // transitionDuration: '0.5s',
            // columnWidth: '.grid-sizer',
            layoutMode: 'masonry'
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
    tab: function tab() {
      $(".tab-nav-item > .acc-btn").on("click", function () {
        if ($(this).hasClass("active")) {
          $(this).removeClass("active");
          $(this).siblings(".content").slideUp(400);
          $(".tab-nav-item > .acc-btn i").removeClass("fa-minus").addClass("fa-plus");
        } else {
          $(".tab-nav-item > .acc-btn i").removeClass("fa-minus").addClass("fa-plus");
          $(this).find("i").removeClass("fa-plus").addClass("fa-minus");
          $(".tab-nav-item > .acc-btn").removeClass("active");
          $(this).addClass("active");
          $(".content").slideUp(400);
          $(this).siblings(".content").slideDown(400);
        }
      });
      var tabItems = $('.gp-tabs-navigation li'),
          tabContentWrapper = $('.gp-tabs-content');
      tabItems.on('click', function (event) {
        event.preventDefault();
        var selectedItem = $(this);

        if (!selectedItem.hasClass('active-tab')) {
          var selectedTab = selectedItem.data('content'),
              selectedContent = tabContentWrapper.find('.pix-tab-item[data-content="' + selectedTab + '"]'),
              slectedContentHeight = selectedContent.innerHeight();
          tabItems.removeClass('active-tab');
          selectedItem.addClass('active-tab');
          selectedContent.addClass('active-tab').siblings('.pix-tab-item').removeClass('active-tab'); //animate tabContentWrapper height when content changes

          tabContentWrapper.animate({
            'height': slectedContentHeight
          }, 500);
        }
      }); //hide the .gp-tabs::after element when tabbed navigation has scrolled to the end (mobile version)

      checkScrolling($('.gp-tabs nav'));
      $(window).on('resize', function () {
        checkScrolling($('.gp-tabs nav'));
        tabContentWrapper.css('height', 'auto');
      });
      $('.gp-tabs nav').on('scroll', function () {
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
    sectionBackground: function sectionBackground() {
      // Section Background Image
      $('[data-bg-image]').each(function () {
        var img = $(this).data('bg-image');
        $(this).css({
          backgroundImage: 'url(' + img + ')'
        });
      });
    },

    /*=====================================*/

    /*=           Section Switch          =*/

    /*=====================================*/
    sectionSwitch: function sectionSwitch() {
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
    countUp: function countUp() {
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
          });
        });
      }
    },

    /*=================================*/

    /*=           Google Map          =*/

    /*=================================*/
    googleMap: function googleMap() {
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
        }).marker(function (map) {
          return {
            position: map.getCenter(),
            icon: mrkr
          };
        });
      });
    },

    /*=================================*/

    /*=           Contact Form          =*/

    /*=================================*/
    contactFrom: function contactFrom() {
      $('[data-saaspik-form]').each(function () {
        var $this = $(this);
        $('.form-result', $this).css('display', 'none');
        $this.submit(function () {
          $('button[type="submit"]', $this).addClass('clicked'); // Create a object and assign all fields name and value.

          var values = {};
          $('[name]', $this).each(function () {
            var $this = $(this),
                $name = $this.attr('name'),
                $value = $this.val();
            values[$name] = $value;
          }); // Make Request

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
    init: function init() {
      PIXELSIGNS.initialize.init();
    }
  };
  PIXELSIGNS.documentOnLoad = {
    init: function init() {
      $("#preloader").fadeOut("slow");
    }
  };
  PIXELSIGNS.documentOnResize = {
    init: function init() {
      if ($("#wpadminbar").length && $(window).width() < 768) {
        $("#wpadminbar").css({
          position: "fixed",
          top: "0"
        });
      }
    }
  };
  PIXELSIGNS.documentOnScroll = {
    init: function init() {
      PIXELSIGNS.initialize.sectionBackground();

      if ($(window).scrollTop() > 300) {
        $('.return-to-top').addClass('back-top');
      } else {
        $('.return-to-top').removeClass('back-top');
      }
    }
  }; // Initialize Functions

  $(document).ready(PIXELSIGNS.documentOnReady.init);
  $(window).on('load', PIXELSIGNS.documentOnLoad.init);
  $(window).on('resize', PIXELSIGNS.documentOnResize.init);
  $(window).on('scroll', PIXELSIGNS.documentOnScroll.init);
})(jQuery);

/***/ }),

/***/ 0:
/*!*****************************!*\
  !*** multi ./src/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Development\Wordpress\pixsaas\wp-content\themes\saspik\src\js\app.js */"./src/js/app.js");


/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAiLCJ3ZWJwYWNrOi8vLy4vc3JjL2pzL2FwcC5qcyJdLCJuYW1lcyI6WyJQSVhFTFNJR05TIiwiJCIsImluaXRpYWxpemUiLCJpbml0IiwiZ2VuZXJhbCIsInNlY3Rpb25CYWNrZ3JvdW5kIiwidGFiIiwic2VjdGlvblN3aXRjaCIsInBvcnRmb2xpbyIsInN3aXBlclNsaWRlciIsImNvdW50VXAiLCJnb29nbGVNYXAiLCJjb250YWN0RnJvbSIsInJlbW92ZUNsYXNzIiwib24iLCJlIiwic3RvcFByb3BhZ2F0aW9uIiwidG9nZ2xlQ2xhc3MiLCJmb2N1cyIsIndvdyIsIldPVyIsImJveENsYXNzIiwiYW5pbWF0ZUNsYXNzIiwib2Zmc2V0IiwibW9iaWxlIiwibGl2ZSIsInNjcm9sbENvbnRhaW5lciIsImVhY2giLCIkdGhpcyIsImhhcyIsImhhc0NsYXNzIiwiYWRkQ2xhc3MiLCJtYWduaWZpY1BvcHVwIiwidHlwZSIsImxlbmd0aCIsInByZXZlbnREZWZhdWx0IiwidGFyZ2V0IiwiYXR0ciIsImlzIiwicGFyZW50cyIsImZpbmQiLCJmYWRlT3V0IiwiZmFkZUluIiwicGFyZW50IiwiY3VycmVudFRhYiIsImhpZGUiLCJzaG93IiwibG9jYXRpb24iLCJocmVmIiwic3BsaXQiLCJzbGljZSIsIndpbmRvdyIsIndpZHRoIiwiY3NzIiwicG9zaXRpb24iLCJ0b3AiLCJpZCIsInBlcnBhZ2UiLCJkYXRhIiwibG9vcCIsInNwZWVkIiwiYXV0b3BsYXkiLCJzcGFjZSIsImVmZmVjdCIsImRpcmVjdGlvbiIsImJyZWFrcG9pbnRzIiwic3dpcGVyIiwiU3dpcGVyIiwic2xpZGVzUGVyVmlldyIsInNwYWNlQmV0d2VlbiIsInBhZ2luYXRpb24iLCJwYWdpbmF0aW9uQ2xpY2thYmxlIiwibmF2aWdhdGlvbiIsIm5leHRFbCIsInByZXZFbCIsImZhZGVFZmZlY3QiLCJjcm9zc0ZhZGUiLCJmbiIsImltYWdlc0xvYWRlZCIsImlzb3RvcGUiLCJjb250YWluZXIiLCJpdGVtU2VsZWN0b3IiLCJsYXlvdXRNb2RlIiwic2VsZWN0b3IiLCJmaWx0ZXIiLCJyZXNpemUiLCJibG9nQ29udGFpbmVyIiwibWFzb25yeSIsInBlcmNlbnRQb3NpdGlvbiIsInNpYmxpbmdzIiwic2xpZGVVcCIsInNsaWRlRG93biIsInRhYkl0ZW1zIiwidGFiQ29udGVudFdyYXBwZXIiLCJldmVudCIsInNlbGVjdGVkSXRlbSIsInNlbGVjdGVkVGFiIiwic2VsZWN0ZWRDb250ZW50Iiwic2xlY3RlZENvbnRlbnRIZWlnaHQiLCJpbm5lckhlaWdodCIsImFuaW1hdGUiLCJjaGVja1Njcm9sbGluZyIsInRhYnMiLCJ0b3RhbFRhYldpZHRoIiwicGFyc2VJbnQiLCJjaGlsZHJlbiIsInRhYnNWaWV3cG9ydCIsInNjcm9sbExlZnQiLCJpbWciLCJiYWNrZ3JvdW5kSW1hZ2UiLCJwYXRobmFtZSIsInJlcGxhY2UiLCJob3N0bmFtZSIsImhhc2giLCJzY3JvbGxUb3AiLCJvcHRpb25zIiwidXNlRWFzaW5nIiwidXNlR3JvdXBpbmciLCJzZXBhcmF0b3IiLCJkZWNpbWFsIiwicHJlZml4Iiwic3VmZml4IiwiY291bnRlRWwiLCJ2YWwiLCJjb3VudHVwIiwiQ291bnRVcCIsImFwcGVhciIsInN0YXJ0IiwiYWNjWCIsImFjY1kiLCJrZXkiLCJsYXQiLCJsbmciLCJtcmtyIiwiem9vbSIsInNjcm9sbHdoZWVsIiwiZ21hcDMiLCJjZW50ZXIiLCJtYXBUeXBlSWQiLCJnb29nbGUiLCJtYXBzIiwiTWFwVHlwZUlkIiwiUk9BRE1BUCIsInN0eWxlcyIsIm1hcmtlciIsIm1hcCIsImdldENlbnRlciIsImljb24iLCJzdWJtaXQiLCJ2YWx1ZXMiLCIkbmFtZSIsIiR2YWx1ZSIsImFqYXgiLCJ1cmwiLCJzdWNjZXNzIiwiZXJyb3IiLCJodG1sIiwibWVzc2FnZSIsInRyaWdnZXIiLCJkb2N1bWVudE9uUmVhZHkiLCJkb2N1bWVudE9uTG9hZCIsImRvY3VtZW50T25SZXNpemUi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LGFBQUQsQ0FBRCxDQUFpQm9ELEdBQWpCLENBQXFCO0FBQ2pCQyxrQkFBUSxFQUFFLE9BRE87QUFFakJDLGFBQUcsRUFBRTtBQUZZLFNBQXJCO0FBSUg7QUFDSjtBQVJ5QixHQUE5QjtBQVdBdkQsWUFBVSxDQUFDa0ssZ0JBQVgsR0FBOEI7QUFDMUIvSixRQUFJLEVBQUUsZ0JBQVk7QUFDZEgsZ0JBQVUsQ0FBQ0UsVUFBWCxDQUFzQkcsaUJBQXRCOztBQUVBLFVBQUlKLENBQUMsQ0FBQ2tELE1BQUQsQ0FBRCxDQUFVK0QsU0FBVixLQUF3QixHQUE1QixFQUFpQztBQUM3QmpILFNBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9COEIsUUFBcEIsQ0FBNkIsVUFBN0I7QUFDSCxPQUZELE1BRU87QUFDSDlCLFNBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CWSxXQUFwQixDQUFnQyxVQUFoQztBQUNIO0FBQ0o7QUFUeUIsR0FBOUIsQ0FyZVUsQ0FpZlY7O0FBQ0FaLEdBQUMsQ0FBQ2tLLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCcEssVUFBVSxDQUFDK0osZUFBWCxDQUEyQjVKLElBQTdDO0FBQ0FGLEdBQUMsQ0FBQ2tELE1BQUQsQ0FBRCxDQUFVckMsRUFBVixDQUFhLE1BQWIsRUFBcUJkLFVBQVUsQ0FBQ2dLLGNBQVgsQ0FBMEI3SixJQUEvQztBQUNBRixHQUFDLENBQUNrRCxNQUFELENBQUQsQ0FBVXJDLEVBQVYsQ0FBYSxRQUFiLEVBQXVCZCxVQUFVLENBQUNpSyxnQkFBWCxDQUE0QjlKLElBQW5EO0FBQ0FGLEdBQUMsQ0FBQ2tELE1BQUQsQ0FBRCxDQUFVckMsRUFBVixDQUFhLFFBQWIsRUFBdUJkLFVBQVUsQ0FBQ2tLLGdCQUFYLENBQTRCL0osSUFBbkQ7QUFFSCxDQXZmRCxFQXVmR2tLLE1BdmZILEUiLCJmaWxlIjoiYXBwLmpzIiwic291cmNlc0NvbnRlbnQiOlsiIFx0Ly8gVGhlIG1vZHVsZSBjYWNoZVxuIFx0dmFyIGluc3RhbGxlZE1vZHVsZXMgPSB7fTtcblxuIFx0Ly8gVGhlIHJlcXVpcmUgZnVuY3Rpb25cbiBcdGZ1bmN0aW9uIF9fd2VicGFja19yZXF1aXJlX18obW9kdWxlSWQpIHtcblxuIFx0XHQvLyBDaGVjayBpZiBtb2R1bGUgaXMgaW4gY2FjaGVcbiBcdFx0aWYoaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0pIHtcbiBcdFx0XHRyZXR1cm4gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0uZXhwb3J0cztcbiBcdFx0fVxuIFx0XHQvLyBDcmVhdGUgYSBuZXcgbW9kdWxlIChhbmQgcHV0IGl0IGludG8gdGhlIGNhY2hlKVxuIFx0XHR2YXIgbW9kdWxlID0gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0gPSB7XG4gXHRcdFx0aTogbW9kdWxlSWQsXG4gXHRcdFx0bDogZmFsc2UsXG4gXHRcdFx0ZXhwb3J0czoge31cbiBcdFx0fTtcblxuIFx0XHQvLyBFeGVjdXRlIHRoZSBtb2R1bGUgZnVuY3Rpb25cbiBcdFx0bW9kdWxlc1ttb2R1bGVJZF0uY2FsbChtb2R1bGUuZXhwb3J0cywgbW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG5cbiBcdFx0Ly8gRmxhZyB0aGUgbW9kdWxlIGFzIGxvYWRlZFxuIFx0XHRtb2R1bGUubCA9IHRydWU7XG5cbiBcdFx0Ly8gUmV0dXJuIHRoZSBleHBvcnRzIG9mIHRoZSBtb2R1bGVcbiBcdFx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xuIFx0fVxuXG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlcyBvYmplY3QgKF9fd2VicGFja19tb2R1bGVzX18pXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm0gPSBtb2R1bGVzO1xuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZSBjYWNoZVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5jID0gaW5zdGFsbGVkTW9kdWxlcztcblxuIFx0Ly8gZGVmaW5lIGdldHRlciBmdW5jdGlvbiBmb3IgaGFybW9ueSBleHBvcnRzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQgPSBmdW5jdGlvbihleHBvcnRzLCBuYW1lLCBnZXR0ZXIpIHtcbiBcdFx0aWYoIV9fd2VicGFja19yZXF1aXJlX18ubyhleHBvcnRzLCBuYW1lKSkge1xuIFx0XHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBuYW1lLCB7IGVudW1lcmFibGU6IHRydWUsIGdldDogZ2V0dGVyIH0pO1xuIFx0XHR9XG4gXHR9O1xuXG4gXHQvLyBkZWZpbmUgX19lc01vZHVsZSBvbiBleHBvcnRzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLnIgPSBmdW5jdGlvbihleHBvcnRzKSB7XG4gXHRcdGlmKHR5cGVvZiBTeW1ib2wgIT09ICd1bmRlZmluZWQnICYmIFN5bWJvbC50b1N0cmluZ1RhZykge1xuIFx0XHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBTeW1ib2wudG9TdHJpbmdUYWcsIHsgdmFsdWU6ICdNb2R1bGUnIH0pO1xuIFx0XHR9XG4gXHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCAnX19lc01vZHVsZScsIHsgdmFsdWU6IHRydWUgfSk7XG4gXHR9O1xuXG4gXHQvLyBjcmVhdGUgYSBmYWtlIG5hbWVzcGFjZSBvYmplY3RcbiBcdC8vIG1vZGUgJiAxOiB2YWx1ZSBpcyBhIG1vZHVsZSBpZCwgcmVxdWlyZSBpdFxuIFx0Ly8gbW9kZSAmIDI6IG1lcmdlIGFsbCBwcm9wZXJ0aWVzIG9mIHZhbHVlIGludG8gdGhlIG5zXG4gXHQvLyBtb2RlICYgNDogcmV0dXJuIHZhbHVlIHdoZW4gYWxyZWFkeSBucyBvYmplY3RcbiBcdC8vIG1vZGUgJiA4fDE6IGJlaGF2ZSBsaWtlIHJlcXVpcmVcbiBcdF9fd2VicGFja19yZXF1aXJlX18udCA9IGZ1bmN0aW9uKHZhbHVlLCBtb2RlKSB7XG4gXHRcdGlmKG1vZGUgJiAxKSB2YWx1ZSA9IF9fd2VicGFja19yZXF1aXJlX18odmFsdWUpO1xuIFx0XHRpZihtb2RlICYgOCkgcmV0dXJuIHZhbHVlO1xuIFx0XHRpZigobW9kZSAmIDQpICYmIHR5cGVvZiB2YWx1ZSA9PT0gJ29iamVjdCcgJiYgdmFsdWUgJiYgdmFsdWUuX19lc01vZHVsZSkgcmV0dXJuIHZhbHVlO1xuIFx0XHR2YXIgbnMgPSBPYmplY3QuY3JlYXRlKG51bGwpO1xuIFx0XHRfX3dlYnBhY2tfcmVxdWlyZV9fLnIobnMpO1xuIFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkobnMsICdkZWZhdWx0JywgeyBlbnVtZXJhYmxlOiB0cnVlLCB2YWx1ZTogdmFsdWUgfSk7XG4gXHRcdGlmKG1vZGUgJiAyICYmIHR5cGVvZiB2YWx1ZSAhPSAnc3RyaW5nJykgZm9yKHZhciBrZXkgaW4gdmFsdWUpIF9fd2VicGFja19yZXF1aXJlX18uZChucywga2V5LCBmdW5jdGlvbihrZXkpIHsgcmV0dXJuIHZhbHVlW2tleV07IH0uYmluZChudWxsLCBrZXkpKTtcbiBcdFx0cmV0dXJuIG5zO1xuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCJcIjtcblxuXG4gXHQvLyBMb2FkIGVudHJ5IG1vZHVsZSBhbmQgcmV0dXJuIGV4cG9ydHNcbiBcdHJldHVybiBfX3dlYnBhY2tfcmVxdWlyZV9fKF9fd2VicGFja19yZXF1aXJlX18ucyA9IDApO1xuIiwidmFyIFBJWEVMU0lHTlMgPSBQSVhFTFNJR05TIHx8IHt9O1xyXG5cclxuKGZ1bmN0aW9uICgkKSB7XHJcblxyXG4gICAgLyohLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxyXG4gICAgXHQjIFRoaXMgYmVhdXRpZnVsIGNvZGUgd3JpdHRlbiB3aXRoIGhlYXJ0XHJcbiAgICBcdCMgYnkgTW9taW51bCBJc2xhbSA8aGVsbG9AbW9taW51bC5tZT5cclxuICAgIFx0IyBJbiBEaGFrYSwgQkQgYXQgdGhlIFBpeGVsU2lnbnMgVGhlbWUgd29ya3N0YXRpb24uXHJcbiAgICBcdC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLSovXHJcblxyXG4gICAgLy8gVVNFIFNUUklDVFxyXG4gICAgXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4gICAgUElYRUxTSUdOUy5pbml0aWFsaXplID0ge1xyXG5cclxuICAgICAgICBpbml0OiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIFBJWEVMU0lHTlMuaW5pdGlhbGl6ZS5nZW5lcmFsKCk7XHJcbiAgICAgICAgICAgIFBJWEVMU0lHTlMuaW5pdGlhbGl6ZS5zZWN0aW9uQmFja2dyb3VuZCgpO1xyXG4gICAgICAgICAgICBQSVhFTFNJR05TLmluaXRpYWxpemUudGFiKCk7XHJcbiAgICAgICAgICAgIFBJWEVMU0lHTlMuaW5pdGlhbGl6ZS5zZWN0aW9uU3dpdGNoKCk7XHJcbiAgICAgICAgICAgIFBJWEVMU0lHTlMuaW5pdGlhbGl6ZS5wb3J0Zm9saW8oKTtcclxuICAgICAgICAgICAgUElYRUxTSUdOUy5pbml0aWFsaXplLnN3aXBlclNsaWRlcigpO1xyXG4gICAgICAgICAgICBQSVhFTFNJR05TLmluaXRpYWxpemUuY291bnRVcCgpOyAgICAgICAgIFxyXG4gICAgICAgICAgICBQSVhFTFNJR05TLmluaXRpYWxpemUuZ29vZ2xlTWFwKCk7XHJcbiAgICAgICAgICAgIFBJWEVMU0lHTlMuaW5pdGlhbGl6ZS5jb250YWN0RnJvbSgpO1xyXG4gICAgICAgIH0sXHJcblxyXG4gICAgICAgIC8qPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT0qL1xyXG4gICAgICAgIC8qPSAgICAgICAgICAgQ29sbGVjdGlvbiBvZiBzbmlwcGV0IGFuZCB0d2Vha3MgICAgICAgICAgID0qL1xyXG4gICAgICAgIC8qPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT0qL1xyXG5cclxuICAgICAgICBnZW5lcmFsOiBmdW5jdGlvbiAoKSB7XHJcblxyXG4gICAgICAgICAgICAvL1BvcHVwIFNlYXJjaFxyXG4gICAgICAgICAgICAkKCcjc2VhcmNoLW1lbnUtd3JhcHBlcicpLnJlbW92ZUNsYXNzKCd0b2dnbGVkJyk7XHJcblxyXG4gICAgICAgICAgICAkKCcjc2VhcmNoLWljb24nKS5vbignY2xpY2snLCBmdW5jdGlvbihlKSB7XHJcbiAgICAgICAgICAgICAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xyXG4gICAgICAgICAgICAgICAgJCgnI3NlYXJjaC1tZW51LXdyYXBwZXInKS50b2dnbGVDbGFzcygndG9nZ2xlZCcpO1xyXG4gICAgICAgICAgICAgICAgJChcIiNwb3B1cC1zZWFyY2hcIikuZm9jdXMoKTtcclxuICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICAkKCcjc2VhcmNoLW1lbnUtd3JhcHBlciBpbnB1dCcpLm9uKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcclxuICAgICAgICAgICAgICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XHJcbiAgICAgICAgICAgIH0pO1xyXG5cclxuICAgICAgICAgICAgJCgnI3NlYXJjaC1tZW51LXdyYXBwZXIsIGJvZHknKS5vbignY2xpY2snLCBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgICAgICQoJyNzZWFyY2gtbWVudS13cmFwcGVyJykucmVtb3ZlQ2xhc3MoJ3RvZ2dsZWQnKTtcclxuICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICAvKiBXb3cgSnMgSW5pdCAqL1xyXG5cclxuICAgICAgICAgICAgdmFyIHdvdyA9IG5ldyBXT1coe1xyXG4gICAgICAgICAgICAgICAgYm94Q2xhc3M6ICd3b3cnLFxyXG4gICAgICAgICAgICAgICAgYW5pbWF0ZUNsYXNzOiAnYW5pbWF0ZWQnLFxyXG4gICAgICAgICAgICAgICAgb2Zmc2V0OiAwLFxyXG4gICAgICAgICAgICAgICAgbW9iaWxlOiBmYWxzZSxcclxuICAgICAgICAgICAgICAgIGxpdmU6IHRydWUsXHJcbiAgICAgICAgICAgICAgICBzY3JvbGxDb250YWluZXI6IG51bGwsXHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICB3b3cuaW5pdCgpO1xyXG5cclxuICAgICAgICAgICAgLyogQm9vdHN0cmFwIEFjY29yZGlvbiAgKi9cclxuICAgICAgICAgICAgJCgnLmZhcSAuY2FyZCcpLmVhY2goZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgdmFyICR0aGlzID0gJCh0aGlzKTtcclxuICAgICAgICAgICAgICAgICR0aGlzLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgdmFyIGhhcyA9ICR0aGlzLmhhc0NsYXNzKCdhY3RpdmUnKTtcclxuICAgICAgICAgICAgICAgICAgICAkKCcuZmFxIC5jYXJkJykucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xyXG4gICAgICAgICAgICAgICAgICAgIGlmIChoYXMpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xyXG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICR0aGlzLmFkZENsYXNzKCdhY3RpdmUnKTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICAvKiBNYWduZWZpYyBQb3B1cCAqL1xyXG4gICAgICAgICAgICAkKCcucG9wdXAtdmlkZW8nKS5lYWNoIChmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgICAgICQoJy5wb3B1cC12aWRlbycpLm1hZ25pZmljUG9wdXAoe1xyXG4gICAgICAgICAgICAgICAgICAgIHR5cGU6ICdpZnJhbWUnXHJcbiAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIFxyXG5cclxuICAgICAgICAgICAgLyoqIFByaWNpbmcgVGFicyAqL1xyXG4gICAgICAgICAgICAkKCcucHJpY2luZy10YWItc3dpdGNoZXIsIC50YWItYnRuJykub24oJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgJCgnLnByaWNpbmctdGFiLXN3aXRjaGVyLCAudGFiLWJ0bicpLnRvZ2dsZUNsYXNzKCdhY3RpdmUnKTtcclxuICAgICAgICAgICAgICAgICQoXCIucHJpY2luZy10YWJcIikudG9nZ2xlQ2xhc3MoJ3NlbGVjZXRlZCcpO1xyXG5cclxuICAgICAgICAgICAgICAgICQoJy5wcmljaW5nLWFtb3VudCcpLnRvZ2dsZUNsYXNzKCdjaGFuZ2Utc3Vicy1kdXJhdGlvbicpO1xyXG4gICAgICAgICAgICB9KTtcclxuXHJcblxyXG4gICAgICAgICAgICBpZiAoJCgnLnRhYnMtYm94JykubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICAgICAkKCcudGFicy1ib3ggLnByaWNpbmctdGFiICAudGFiLWJ0bicpLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgICAgICAgICAgICAgIHZhciB0YXJnZXQgPSAkKCQodGhpcykuYXR0cignZGF0YS10YWInKSk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIGlmICgkKHRhcmdldCkuaXMoJzp2aXNpYmxlJykpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xyXG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHRhcmdldC5wYXJlbnRzKCcudGFicy1ib3gnKS5maW5kKCcucHJpY2luZy10YWIgJykuZmluZCgnLnRhYi1idG4nKS5yZW1vdmVDbGFzcygnYWN0aXZlLWJ0bicpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLmFkZENsYXNzKCdhY3RpdmUtYnRuJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHRhcmdldC5wYXJlbnRzKCcudGFicy1ib3gnKS5maW5kKCcudGFicy1jb250ZW50JykuZmluZCgnLnRhYicpLmZhZGVPdXQoMCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHRhcmdldC5wYXJlbnRzKCcudGFicy1ib3gnKS5maW5kKCcudGFicy1jb250ZW50JykuZmluZCgnLnRhYicpLnJlbW92ZUNsYXNzKCdhY3RpdmUtdGFiIGFuaW1hdGVkIGZhZGVJbicpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAkKHRhcmdldCkuZmFkZUluKDMwMCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICQodGFyZ2V0KS5hZGRDbGFzcygnYWN0aXZlLXRhYiBhbmltYXRlZCBmYWRlSW4nKTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgfVxyXG4gICBcclxuICAgICAgICAgICAgJCgnLnBpeC10YWJzJykuZWFjaChmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAkKCcjcGl4LXRhYnMtbmF2IGxpIGEnKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIC8vQ2hlY2sgaWYgdGhlIHRhYnMgbWVudSBoYXMgYWN0aXZlIGNsYXNzXHJcbiAgICAgICAgICAgICAgICAgICAgJCgnI3BpeC10YWJzLW5hdiBsaScpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcclxuICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLnBhcmVudCgpLmFkZENsYXNzKCdhY3RpdmUnKTsgICAgICAgICAgICBcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgLy8gRGlzcGxheSBhY3RpdmUgdGFiXHJcbiAgICAgICAgICAgICAgICAgICAgdmFyIGN1cnJlbnRUYWIgPSAkKHRoaXMpLmF0dHIoJ2hyZWYnKTtcclxuICAgICAgICAgICAgICAgICAgICAkKCcjcGl4LXRhYnMtY29udGVudCAuY29udGVudCcpLmZhZGVPdXQoNTAwKS5oaWRlKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgJChjdXJyZW50VGFiKS5mYWRlSW4oNTAwKS5zaG93KCk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIHJldHVybiBmYWxzZTtcclxuICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgIC8qICBBY3RpdmUgTWVudSAqL1xyXG4gICAgICAgICAgICAkKCcuc2l0ZS1tYWluLW1lbnUgbGkgYScpLmVhY2goZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgaWYgKCQodGhpcykuYXR0cignaHJlZicpID09IGxvY2F0aW9uLmhyZWYuc3BsaXQoXCIvXCIpLnNsaWNlKC0xKSkge1xyXG4gICAgICAgICAgICAgICAgICAgICQodGhpcykuYWRkQ2xhc3MoJ2N1cnJlbnRfcGFnZScpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgIGlmICgkKFwiI3dwYWRtaW5iYXJcIikubGVuZ3RoICYmICQod2luZG93KS53aWR0aCgpIDwgNzY4KSB7XHJcbiAgICAgICAgICAgICAgICAkKFwiI3dwYWRtaW5iYXJcIikuY3NzKHtcclxuICAgICAgICAgICAgICAgICAgICBwb3NpdGlvbjogXCJmaXhlZFwiLFxyXG4gICAgICAgICAgICAgICAgICAgIHRvcDogXCIwXCJcclxuICAgICAgICAgICAgICAgIH0pXHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgfSxcclxuXHJcbiAgICAgICAgLyo9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT0qL1xyXG4gICAgICAgIC8qPSAgICAgICAgICAgU3dpcGVyIFNsaWRlciAgICAgICAgICA9Ki9cclxuICAgICAgICAvKj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PSovXHJcblxyXG4gICAgICAgIHN3aXBlclNsaWRlcjogZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAkKCcjcmVsYXRlZC1wb3J0Zm9saW8nKS5lYWNoKGZ1bmN0aW9uICgpIHsgICBcclxuXHJcbiAgICAgICAgICAgICAgICB2YXIgaWQgPSAkKHRoaXMpLmF0dHIoJ2lkJyk7XHJcbiAgICAgICAgICAgICAgICB2YXIgcGVycGFnZSA9ICQodGhpcykuZGF0YSgncGVycGFnZScpIHx8IDE7XHJcbiAgICAgICAgICAgICAgICB2YXIgbG9vcCA9ICQodGhpcykuZGF0YSgnbG9vcCcpIHx8IHRydWU7XHJcbiAgICAgICAgICAgICAgICB2YXIgc3BlZWQgPSAkKHRoaXMpLmRhdGEoJ3NwZWVkJykgfHwgNzAwO1xyXG4gICAgICAgICAgICAgICAgdmFyIGF1dG9wbGF5ID0gJCh0aGlzKS5kYXRhKCdhdXRvcGxheScpIHx8IDUwMDAwO1xyXG4gICAgICAgICAgICAgICAgdmFyIHNwYWNlID0gJCh0aGlzKS5kYXRhKCdzcGFjZScpIHx8IDA7XHJcbiAgICAgICAgICAgICAgICB2YXIgZWZmZWN0ID0gJCh0aGlzKS5kYXRhKCdlZmZlY3QnKTtcclxuICAgICAgICAgICAgICAgIHZhciBkaXJlY3Rpb24gPSAkKHRoaXMpLmRhdGEoJ2RpcmVjdGlvbicpIHx8ICdob3Jpem9udGFsJztcclxuICAgICAgICAgICAgICAgIHZhciBicmVha3BvaW50cyA9ICQodGhpcykuZGF0YSgnYnJlYWtwb2ludHMnKTtcclxuXHJcbiAgICAgICAgICAgICAgICB2YXIgc3dpcGVyID0gbmV3IFN3aXBlcigkKHRoaXMpLCB7XHJcbiAgICAgICAgICAgICAgICAgICAgc2xpZGVzUGVyVmlldzogcGVycGFnZSxcclxuICAgICAgICAgICAgICAgICAgICBzcGFjZUJldHdlZW46IHNwYWNlLCAgICAgICAgICAgICAgICAgIFxyXG4gICAgICAgICAgICAgICAgICAgIGxvb3A6IHRydWUsXHJcbiAgICAgICAgICAgICAgICAgICAgc3BlZWQ6IHNwZWVkLCBcclxuICAgICAgICAgICAgICAgICAgICBlZmZlY3Q6IGVmZmVjdCwgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgICAgICAgICAgYnJlYWtwb2ludHM6IGJyZWFrcG9pbnRzLFxyXG4gICAgICAgICAgICAgICAgICAgIGF1dG9wbGF5OiBhdXRvcGxheSwgICAgICAgICAgICAgICAgICAgICBcclxuICAgICAgICAgICAgICAgICAgICBwYWdpbmF0aW9uOiBcIi5zd2lwZXItcGFnaW5hdGlvblwiLFxyXG4gICAgICAgICAgICAgICAgICAgIHBhZ2luYXRpb25DbGlja2FibGU6IHRydWUsXHJcbiAgICAgICAgICAgICAgICAgICAgbmF2aWdhdGlvbjoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBuZXh0RWw6ICcuc3dpcGVyLWJ1dHRvbi1uZXh0JyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgcHJldkVsOiAnLnN3aXBlci1idXR0b24tcHJldicsXHJcbiAgICAgICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgICAgICBmYWRlRWZmZWN0OiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNyb3NzRmFkZTogdHJ1ZVxyXG4gICAgICAgICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgXHJcbiAgICAgICAgfSxcclxuXHJcbiAgICAgICAgLyo9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT0qL1xyXG4gICAgICAgIC8qPSAgICAgICAgICAgUG9ydGZvbGlvICAgICAgICAgID0qL1xyXG4gICAgICAgIC8qPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09Ki9cclxuXHJcbiAgICAgICAgcG9ydGZvbGlvOiBmdW5jdGlvbiAoKSB7XHJcblxyXG4gICAgICAgICAgICBpZiAoKHR5cGVvZiAkLmZuLmltYWdlc0xvYWRlZCAhPT0gJ3VuZGVmaW5lZCcpICYmICh0eXBlb2YgJC5mbi5pc290b3BlICE9PSAndW5kZWZpbmVkJykpIHtcclxuXHJcbiAgICAgICAgICAgICAgICAkKFwiLnBpeHNhc3MtcG9ydGZvbGlvLWl0ZW1zXCIpLmltYWdlc0xvYWRlZChmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgdmFyIGNvbnRhaW5lciA9ICQoXCIucGl4c2Fzcy1wb3J0Zm9saW8taXRlbXNcIik7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIGNvbnRhaW5lci5pc290b3BlKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgaXRlbVNlbGVjdG9yOiAnLnBpeHNhc3MtcG9ydGZvbGlvLWl0ZW0nLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAvLyBwZXJjZW50UG9zaXRpb246IHRydWUsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8vIHRyYW5zaXRpb25EdXJhdGlvbjogJzAuNXMnLFxyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vIGNvbHVtbldpZHRoOiAnLmdyaWQtc2l6ZXInLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgbGF5b3V0TW9kZTogJ21hc29ucnknLFxyXG5cclxuICAgICAgICAgICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgJCgnLnBpeHNhc3MtaXNvdG9wZS1maWx0ZXIgYScpLm9uKCdjbGljaycsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgJCgnLnBpeHNhc3MtaXNvdG9wZS1maWx0ZXInKS5maW5kKCcuY3VycmVudCcpLnJlbW92ZUNsYXNzKCdjdXJyZW50Jyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICQodGhpcykucGFyZW50KCkuYWRkQ2xhc3MoJ2N1cnJlbnQnKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhciBzZWxlY3RvciA9ICQodGhpcykuYXR0cihcImRhdGEtZmlsdGVyXCIpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb250YWluZXIuaXNvdG9wZSh7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBmaWx0ZXI6IHNlbGVjdG9yXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xyXG4gICAgICAgICAgICAgICAgICAgIH0pO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAkKHdpbmRvdykucmVzaXplKGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgY29udGFpbmVyLmlzb3RvcGUoKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgYmxvZ0NvbnRhaW5lci5tYXNvbnJ5KCk7XHJcbiAgICAgICAgICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICAgICAgdmFyIGJsb2dDb250YWluZXIgPSAkKFwiLnNhYXNwaWstbWFzb25yeVwiKTtcclxuXHJcbiAgICAgICAgICAgICAgICBibG9nQ29udGFpbmVyLm1hc29ucnkoe1xyXG4gICAgICAgICAgICAgICAgICAgIGl0ZW1TZWxlY3RvcjogJy5ncmlkLWl0ZW0nLFxyXG4gICAgICAgICAgICAgICAgICAgIHBlcmNlbnRQb3NpdGlvbjogdHJ1ZVxyXG4gICAgICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSxcclxuXHJcbiAgICAgICAgLyo9PT09PT09PT09PT09PT09PT09PT09PT09PT09Ki9cclxuICAgICAgICAvKj0gICAgICAgICAgIFRhYnMgICAgICAgICAgID0qL1xyXG4gICAgICAgIC8qPT09PT09PT09PT09PT09PT09PT09PT09PT09PSovXHJcbiAgICAgICAgdGFiOiBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgJChcIi50YWItbmF2LWl0ZW0gPiAuYWNjLWJ0blwiKS5vbihcImNsaWNrXCIsIGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICAgICAgaWYgKCQodGhpcykuaGFzQ2xhc3MoXCJhY3RpdmVcIikpIHtcclxuICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLnJlbW92ZUNsYXNzKFwiYWN0aXZlXCIpO1xyXG4gICAgICAgICAgICAgICAgICAgICQodGhpcylcclxuICAgICAgICAgICAgICAgICAgICAgICAgLnNpYmxpbmdzKFwiLmNvbnRlbnRcIilcclxuICAgICAgICAgICAgICAgICAgICAgICAgLnNsaWRlVXAoNDAwKTtcclxuICAgICAgICAgICAgICAgICAgICAkKFwiLnRhYi1uYXYtaXRlbSA+IC5hY2MtYnRuIGlcIilcclxuICAgICAgICAgICAgICAgICAgICAgICAgLnJlbW92ZUNsYXNzKFwiZmEtbWludXNcIilcclxuICAgICAgICAgICAgICAgICAgICAgICAgLmFkZENsYXNzKFwiZmEtcGx1c1wiKTtcclxuICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgJChcIi50YWItbmF2LWl0ZW0gPiAuYWNjLWJ0biBpXCIpXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC5yZW1vdmVDbGFzcyhcImZhLW1pbnVzXCIpXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC5hZGRDbGFzcyhcImZhLXBsdXNcIik7XHJcbiAgICAgICAgICAgICAgICAgICAgJCh0aGlzKVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAuZmluZChcImlcIilcclxuICAgICAgICAgICAgICAgICAgICAgICAgLnJlbW92ZUNsYXNzKFwiZmEtcGx1c1wiKVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAuYWRkQ2xhc3MoXCJmYS1taW51c1wiKTtcclxuICAgICAgICAgICAgICAgICAgICAkKFwiLnRhYi1uYXYtaXRlbSA+IC5hY2MtYnRuXCIpLnJlbW92ZUNsYXNzKFwiYWN0aXZlXCIpO1xyXG4gICAgICAgICAgICAgICAgICAgICQodGhpcykuYWRkQ2xhc3MoXCJhY3RpdmVcIik7XHJcbiAgICAgICAgICAgICAgICAgICAgJChcIi5jb250ZW50XCIpLnNsaWRlVXAoNDAwKTtcclxuICAgICAgICAgICAgICAgICAgICAkKHRoaXMpXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC5zaWJsaW5ncyhcIi5jb250ZW50XCIpXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC5zbGlkZURvd24oNDAwKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSk7XHJcblxyXG5cclxuXHJcbiAgICAgICAgICAgIHZhciB0YWJJdGVtcyA9ICQoJy5ncC10YWJzLW5hdmlnYXRpb24gbGknKSxcclxuICAgICAgICAgICAgICAgIHRhYkNvbnRlbnRXcmFwcGVyID0gJCgnLmdwLXRhYnMtY29udGVudCcpO1xyXG5cclxuICAgICAgICAgICAgdGFiSXRlbXMub24oJ2NsaWNrJywgZnVuY3Rpb24oZXZlbnQpIHtcclxuICAgICAgICAgICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgICAgICAgICB2YXIgc2VsZWN0ZWRJdGVtID0gJCh0aGlzKTtcclxuICAgICAgICAgICAgICAgIGlmICghc2VsZWN0ZWRJdGVtLmhhc0NsYXNzKCdhY3RpdmUtdGFiJykpIHtcclxuICAgICAgICAgICAgICAgICAgICB2YXIgc2VsZWN0ZWRUYWIgPSBzZWxlY3RlZEl0ZW0uZGF0YSgnY29udGVudCcpLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBzZWxlY3RlZENvbnRlbnQgPSB0YWJDb250ZW50V3JhcHBlci5maW5kKCcucGl4LXRhYi1pdGVtW2RhdGEtY29udGVudD1cIicgKyBzZWxlY3RlZFRhYiArICdcIl0nKSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgc2xlY3RlZENvbnRlbnRIZWlnaHQgPSBzZWxlY3RlZENvbnRlbnQuaW5uZXJIZWlnaHQoKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgdGFiSXRlbXMucmVtb3ZlQ2xhc3MoJ2FjdGl2ZS10YWInKTtcclxuICAgICAgICAgICAgICAgICAgICBzZWxlY3RlZEl0ZW0uYWRkQ2xhc3MoJ2FjdGl2ZS10YWInKTtcclxuICAgICAgICAgICAgICAgICAgICBzZWxlY3RlZENvbnRlbnQuYWRkQ2xhc3MoJ2FjdGl2ZS10YWInKS5zaWJsaW5ncygnLnBpeC10YWItaXRlbScpLnJlbW92ZUNsYXNzKCdhY3RpdmUtdGFiJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgLy9hbmltYXRlIHRhYkNvbnRlbnRXcmFwcGVyIGhlaWdodCB3aGVuIGNvbnRlbnQgY2hhbmdlc1xyXG4gICAgICAgICAgICAgICAgICAgIHRhYkNvbnRlbnRXcmFwcGVyLmFuaW1hdGUoe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAnaGVpZ2h0Jzogc2xlY3RlZENvbnRlbnRIZWlnaHRcclxuICAgICAgICAgICAgICAgICAgICB9LCA1MDApO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgIC8vaGlkZSB0aGUgLmdwLXRhYnM6OmFmdGVyIGVsZW1lbnQgd2hlbiB0YWJiZWQgbmF2aWdhdGlvbiBoYXMgc2Nyb2xsZWQgdG8gdGhlIGVuZCAobW9iaWxlIHZlcnNpb24pXHJcbiAgICAgICAgICAgIGNoZWNrU2Nyb2xsaW5nKCQoJy5ncC10YWJzIG5hdicpKTtcclxuICAgICAgICAgICAgJCh3aW5kb3cpLm9uKCdyZXNpemUnLCBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgICAgIGNoZWNrU2Nyb2xsaW5nKCQoJy5ncC10YWJzIG5hdicpKTtcclxuICAgICAgICAgICAgICAgIHRhYkNvbnRlbnRXcmFwcGVyLmNzcygnaGVpZ2h0JywgJ2F1dG8nKTtcclxuICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICAkKCcuZ3AtdGFicyBuYXYnKS5vbignc2Nyb2xsJywgZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgICAgICBjaGVja1Njcm9sbGluZygkKHRoaXMpKTtcclxuICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICBmdW5jdGlvbiBjaGVja1Njcm9sbGluZyh0YWJzKSB7XHJcbiAgICAgICAgICAgICAgICB2YXIgdG90YWxUYWJXaWR0aCA9IHBhcnNlSW50KHRhYnMuY2hpbGRyZW4oJy5ncC10YWJzLW5hdmlnYXRpb24nKS53aWR0aCgpKSxcclxuICAgICAgICAgICAgICAgICAgICB0YWJzVmlld3BvcnQgPSBwYXJzZUludCh0YWJzLndpZHRoKCkpO1xyXG4gICAgICAgICAgICAgICAgaWYgKHRhYnMuc2Nyb2xsTGVmdCgpID49IHRvdGFsVGFiV2lkdGggLSB0YWJzVmlld3BvcnQpIHtcclxuICAgICAgICAgICAgICAgICAgICB0YWJzLnBhcmVudCgnLmdwLXRhYnMnKS5hZGRDbGFzcygnaXMtZW5kZWQnKTtcclxuICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgdGFicy5wYXJlbnQoJy5ncC10YWJzJykucmVtb3ZlQ2xhc3MoJ2lzLWVuZGVkJyk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9LFxyXG4gICAgICAgIC8qPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09Ki9cclxuICAgICAgICAvKj0gICAgICAgICAgIFNlY3Rpb24gQmFja2dyb3VuZCAgICAgICAgICAgPSovXHJcbiAgICAgICAgLyo9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT0qL1xyXG5cclxuICAgICAgICBzZWN0aW9uQmFja2dyb3VuZDogZnVuY3Rpb24gKCkge1xyXG5cclxuICAgICAgICAgICAgLy8gU2VjdGlvbiBCYWNrZ3JvdW5kIEltYWdlXHJcbiAgICAgICAgICAgICQoJ1tkYXRhLWJnLWltYWdlXScpLmVhY2goZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgdmFyIGltZyA9ICQodGhpcykuZGF0YSgnYmctaW1hZ2UnKTtcclxuICAgICAgICAgICAgICAgICQodGhpcykuY3NzKHtcclxuICAgICAgICAgICAgICAgICAgICBiYWNrZ3JvdW5kSW1hZ2U6ICd1cmwoJyArIGltZyArICcpJyxcclxuICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICAvKj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT0qL1xyXG4gICAgICAgIC8qPSAgICAgICAgICAgU2VjdGlvbiBTd2l0Y2ggICAgICAgICAgPSovXHJcbiAgICAgICAgLyo9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09Ki9cclxuXHJcbiAgICAgICAgc2VjdGlvblN3aXRjaDogZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAkKCdbZGF0YS10eXBlPVwic2VjdGlvbi1zd2l0Y2hcIl0sICNtZW51LWhvbWUgbGkgYSwgLnNjcm9sbC1idG4nKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICBpZiAobG9jYXRpb24ucGF0aG5hbWUucmVwbGFjZSgvXlxcLy8sICcnKSA9PSB0aGlzLnBhdGhuYW1lLnJlcGxhY2UoL15cXC8vLCAnJykgJiYgbG9jYXRpb24uaG9zdG5hbWUgPT0gdGhpcy5ob3N0bmFtZSkge1xyXG4gICAgICAgICAgICAgICAgICAgIHZhciB0YXJnZXQgPSAkKHRoaXMuaGFzaCk7XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHRhcmdldC5sZW5ndGggPiAwKSB7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICB0YXJnZXQgPSB0YXJnZXQubGVuZ3RoID8gdGFyZ2V0IDogJCgnW25hbWU9JyArIHRoaXMuaGFzaC5zbGljZSgxKSArICddJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICQoJ2h0bWwsYm9keScpLmFuaW1hdGUoe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgc2Nyb2xsVG9wOiB0YXJnZXQub2Zmc2V0KCkudG9wXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0sIDEwMDApO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICByZXR1cm4gZmFsc2U7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICAvKj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PSovXHJcbiAgICAgICAgLyo9ICAgICAgICAgICBDb3VudHVwICAgICAgICAgID0qL1xyXG4gICAgICAgIC8qPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09Ki9cclxuXHJcbiAgICAgICAgY291bnRVcDogZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICB2YXIgb3B0aW9ucyA9IHtcclxuICAgICAgICAgICAgICAgIHVzZUVhc2luZzogdHJ1ZSxcclxuICAgICAgICAgICAgICAgIHVzZUdyb3VwaW5nOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgc2VwYXJhdG9yOiAnLCcsXHJcbiAgICAgICAgICAgICAgICBkZWNpbWFsOiAnLicsXHJcbiAgICAgICAgICAgICAgICBwcmVmaXg6ICcnLFxyXG4gICAgICAgICAgICAgICAgc3VmZml4OiAnJ1xyXG4gICAgICAgICAgICB9O1xyXG5cclxuICAgICAgICAgICAgdmFyIGNvdW50ZUVsID0gJCgnW2RhdGEtY291bnRlcl0nKTtcclxuXHJcbiAgICAgICAgICAgIGlmIChjb3VudGVFbCkge1xyXG4gICAgICAgICAgICAgICAgY291bnRlRWwuZWFjaChmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgdmFyIHZhbCA9ICQodGhpcykuZGF0YSgnY291bnRlcicpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICB2YXIgY291bnR1cCA9IG5ldyBDb3VudFVwKHRoaXMsIDAsIHZhbCwgMCwgMi41LCBvcHRpb25zKTtcclxuICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLmFwcGVhcihmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvdW50dXAuc3RhcnQoKTtcclxuICAgICAgICAgICAgICAgICAgICB9LCB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGFjY1g6IDAsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGFjY1k6IDBcclxuICAgICAgICAgICAgICAgICAgICB9KVxyXG4gICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICAvKj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PSovXHJcbiAgICAgICAgLyo9ICAgICAgICAgICBHb29nbGUgTWFwICAgICAgICAgID0qL1xyXG4gICAgICAgIC8qPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09Ki9cclxuXHJcbiAgICAgICAgZ29vZ2xlTWFwOiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICQoJy5nbWFwMy1hcmVhJykuZWFjaChmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICB2YXIgJHRoaXMgPSAkKHRoaXMpLFxyXG4gICAgICAgICAgICAgICAgICAgIGtleSA9ICR0aGlzLmRhdGEoJ2tleScpLFxyXG4gICAgICAgICAgICAgICAgICAgIGxhdCA9ICR0aGlzLmRhdGEoJ2xhdCcpLFxyXG4gICAgICAgICAgICAgICAgICAgIGxuZyA9ICR0aGlzLmRhdGEoJ2xuZycpLFxyXG4gICAgICAgICAgICAgICAgICAgIG1ya3IgPSAkdGhpcy5kYXRhKCdtcmtyJyksXHJcbiAgICAgICAgICAgICAgICAgICAgem9vbSA9ICR0aGlzLmRhdGEoJ3pvb20nKSxcclxuICAgICAgICAgICAgICAgICAgICBzY3JvbGx3aGVlbCA9ICR0aGlzLmRhdGEoJ3Njcm9sbHdoZWVsJykgfHwgZmFsc2U7XHJcblxyXG4gICAgICAgICAgICAgICAgJHRoaXMuZ21hcDMoe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBjZW50ZXI6IFtsYXQsIGxuZ10sXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHpvb206IHpvb20sXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHNjcm9sbHdoZWVsOiBzY3JvbGx3aGVlbCxcclxuICAgICAgICAgICAgICAgICAgICAgICAgbWFwVHlwZUlkOiBnb29nbGUubWFwcy5NYXBUeXBlSWQuUk9BRE1BUCxcclxuICAgICAgICAgICAgICAgICAgICAgICAgc3R5bGVzOiBbe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgXCJmZWF0dXJlVHlwZVwiOiBcImFkbWluaXN0cmF0aXZlLmNvdW50cnlcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwiZWxlbWVudFR5cGVcIjogXCJnZW9tZXRyeS5maWxsXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBcInN0eWxlcnNcIjogW3tcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBcInZpc2liaWxpdHlcIjogXCJvblwiXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XVxyXG4gICAgICAgICAgICAgICAgICAgIH0pXHJcbiAgICAgICAgICAgICAgICAgICAgLm1hcmtlcihmdW5jdGlvbiAobWFwKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHJldHVybiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBwb3NpdGlvbjogbWFwLmdldENlbnRlcigpLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWNvbjogbXJrclxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9O1xyXG4gICAgICAgICAgICAgICAgICAgIH0pXHJcblxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICAvKj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PSovXHJcbiAgICAgICAgLyo9ICAgICAgICAgICBDb250YWN0IEZvcm0gICAgICAgICAgPSovXHJcbiAgICAgICAgLyo9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT0qL1xyXG5cclxuICAgICAgICBjb250YWN0RnJvbTogZnVuY3Rpb24gKCkge1xyXG5cclxuICAgICAgICAgICAgJCgnW2RhdGEtc2Fhc3Bpay1mb3JtXScpLmVhY2goZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgdmFyICR0aGlzID0gJCh0aGlzKTtcclxuICAgICAgICAgICAgICAgICQoJy5mb3JtLXJlc3VsdCcsICR0aGlzKS5jc3MoJ2Rpc3BsYXknLCAnbm9uZScpO1xyXG5cclxuICAgICAgICAgICAgICAgICR0aGlzLnN1Ym1pdChmdW5jdGlvbiAoKSB7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICQoJ2J1dHRvblt0eXBlPVwic3VibWl0XCJdJywgJHRoaXMpLmFkZENsYXNzKCdjbGlja2VkJyk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIC8vIENyZWF0ZSBhIG9iamVjdCBhbmQgYXNzaWduIGFsbCBmaWVsZHMgbmFtZSBhbmQgdmFsdWUuXHJcbiAgICAgICAgICAgICAgICAgICAgdmFyIHZhbHVlcyA9IHt9O1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAkKCdbbmFtZV0nLCAkdGhpcykuZWFjaChmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhciAkdGhpcyA9ICQodGhpcyksXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAkbmFtZSA9ICR0aGlzLmF0dHIoJ25hbWUnKSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICR2YWx1ZSA9ICR0aGlzLnZhbCgpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWVzWyRuYW1lXSA9ICR2YWx1ZTtcclxuICAgICAgICAgICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgLy8gTWFrZSBSZXF1ZXN0XHJcbiAgICAgICAgICAgICAgICAgICAgJC5hamF4KHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdXJsOiAkdGhpcy5hdHRyKCdhY3Rpb24nKSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgdHlwZTogJ1BPU1QnLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBkYXRhOiB2YWx1ZXMsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uIHN1Y2Nlc3MoZGF0YSkge1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmIChkYXRhLmVycm9yID09IHRydWUpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKCcuZm9ybS1yZXN1bHQnLCAkdGhpcykuYWRkQ2xhc3MoJ2FsZXJ0LXdhcm5pbmcnKS5yZW1vdmVDbGFzcygnYWxlcnQtc3VjY2VzcyBhbGVydC1kYW5nZXInKS5mYWRlSW4oMjAwKS5zaG93KCkuZmFkZU91dCgyMDAwKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJCgnLmZvcm0tcmVzdWx0JywgJHRoaXMpLmFkZENsYXNzKCdhbGVydC1zdWNjZXNzJykucmVtb3ZlQ2xhc3MoJ2FsZXJ0LXdhcm5pbmcgYWxlcnQtZGFuZ2VyJykuZmFkZUluKDIwMCkuc2hvdygpLmZhZGVPdXQoMjAwMCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKCcuZm9ybS1yZXN1bHQgPiAuY29udGVudCcsICR0aGlzKS5odG1sKGRhdGEubWVzc2FnZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKCdidXR0b25bdHlwZT1cInN1Ym1pdFwiXScsICR0aGlzKS5yZW1vdmVDbGFzcygnY2xpY2tlZCcpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMudHJpZ2dlcihcInJlc2V0XCIpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBlcnJvcjogZnVuY3Rpb24gZXJyb3IoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKCcuZm9ybS1yZXN1bHQnLCAkdGhpcykuYWRkQ2xhc3MoJ2FsZXJ0LWRhbmdlcicpLnJlbW92ZUNsYXNzKCdhbGVydC13YXJuaW5nIGFsZXJ0LXN1Y2Nlc3MnKS5jc3MoJ2Rpc3BsYXknLCAnYmxvY2snKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICQoJy5mb3JtLXJlc3VsdCA+IC5jb250ZW50JywgJHRoaXMpLmh0bWwoJ1NvcnJ5LCBhbiBlcnJvciBvY2N1cnJlZC4nKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICQoJ2J1dHRvblt0eXBlPVwic3VibWl0XCJdJywgJHRoaXMpLnJlbW92ZUNsYXNzKCdjbGlja2VkJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICByZXR1cm4gZmFsc2U7XHJcbiAgICAgICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICB9O1xyXG5cclxuICAgIFBJWEVMU0lHTlMuZG9jdW1lbnRPblJlYWR5ID0ge1xyXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgUElYRUxTSUdOUy5pbml0aWFsaXplLmluaXQoKTtcclxuXHJcbiAgICAgICAgfSxcclxuICAgIH07XHJcblxyXG4gICAgUElYRUxTSUdOUy5kb2N1bWVudE9uTG9hZCA9IHtcclxuICAgICAgICBpbml0OiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICQoXCIjcHJlbG9hZGVyXCIpLmZhZGVPdXQoXCJzbG93XCIpO1xyXG4gICAgICAgIH0sXHJcbiAgICB9O1xyXG5cclxuICAgIFBJWEVMU0lHTlMuZG9jdW1lbnRPblJlc2l6ZSA9IHtcclxuICAgICAgICBpbml0OiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIGlmICgkKFwiI3dwYWRtaW5iYXJcIikubGVuZ3RoICYmICQod2luZG93KS53aWR0aCgpIDwgNzY4KSB7XHJcbiAgICAgICAgICAgICAgICAkKFwiI3dwYWRtaW5iYXJcIikuY3NzKHtcclxuICAgICAgICAgICAgICAgICAgICBwb3NpdGlvbjogXCJmaXhlZFwiLFxyXG4gICAgICAgICAgICAgICAgICAgIHRvcDogXCIwXCJcclxuICAgICAgICAgICAgICAgIH0pXHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9LFxyXG4gICAgfTtcclxuXHJcbiAgICBQSVhFTFNJR05TLmRvY3VtZW50T25TY3JvbGwgPSB7XHJcbiAgICAgICAgaW5pdDogZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICBQSVhFTFNJR05TLmluaXRpYWxpemUuc2VjdGlvbkJhY2tncm91bmQoKTtcclxuXHJcbiAgICAgICAgICAgIGlmICgkKHdpbmRvdykuc2Nyb2xsVG9wKCkgPiAzMDApIHtcclxuICAgICAgICAgICAgICAgICQoJy5yZXR1cm4tdG8tdG9wJykuYWRkQ2xhc3MoJ2JhY2stdG9wJyk7XHJcbiAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAkKCcucmV0dXJuLXRvLXRvcCcpLnJlbW92ZUNsYXNzKCdiYWNrLXRvcCcpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSxcclxuICAgIH07XHJcblxyXG4gICAgLy8gSW5pdGlhbGl6ZSBGdW5jdGlvbnNcclxuICAgICQoZG9jdW1lbnQpLnJlYWR5KFBJWEVMU0lHTlMuZG9jdW1lbnRPblJlYWR5LmluaXQpO1xyXG4gICAgJCh3aW5kb3cpLm9uKCdsb2FkJywgUElYRUxTSUdOUy5kb2N1bWVudE9uTG9hZC5pbml0KTtcclxuICAgICQod2luZG93KS5vbigncmVzaXplJywgUElYRUxTSUdOUy5kb2N1bWVudE9uUmVzaXplLmluaXQpO1xyXG4gICAgJCh3aW5kb3cpLm9uKCdzY3JvbGwnLCBQSVhFTFNJR05TLmRvY3VtZW50T25TY3JvbGwuaW5pdCk7XHJcblxyXG59KShqUXVlcnkpOyJdLCJzb3VyY2VSb290IjoiIn0=