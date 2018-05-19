/**
 * Global variables
 */
"use strict";

var userAgent = navigator.userAgent.toLowerCase(),
  initialDate = new Date(),

  $document = $(document),
  $window = $(window),
  $html = $("html"),

  isDesktop = $html.hasClass("desktop"),
  isIE = userAgent.indexOf("msie") != -1 ? parseInt(userAgent.split("msie")[1]) : userAgent.indexOf("trident") != -1 ? 11 : userAgent.indexOf("edge") != -1 ? 12 : false,
  isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
  isTouch = "ontouchstart" in window,

  plugins = {
    smoothScroll: $html.hasClass("use--smoothscroll") ? "js/smoothscroll.min.js" : false,
    rdParallax: $(".cws-parallax"),
    rdGoogleMaps: $("#cws-google-map"),
    rdNavbar: $(".cws-navbar"),
    owl: $(".owl-carousel"),
    swiper: $(".swiper-slider"),
    rdMailForm: $(".cws-mailform")
  };

/**
 * Initialize All Scripts
 */
$document.ready(function () {

  /**
   * isScrolledIntoView
   * @description  check the element whas been scrolled into the view
   */
  function isScrolledIntoView(elem) {
    var $window = $(window);
    return elem.offset().top + elem.outerHeight() >= $window.scrollTop() && elem.offset().top <= $window.scrollTop() + $window.height();
  }

  /**
   * initOnView
   * @description  calls a function when element has been scrolled into the view
   */
  function lazyInit(element, func) {
    var $win = jQuery(window);
    $win.on('load scroll', function () {
      if ((!element.hasClass('lazy-loaded') && (isScrolledIntoView(element)))) {
        func.call(element);
        element.addClass('lazy-loaded');
      }
    });
  }

  /**
   * makeParallax
   * @description  create swiper parallax scrolling effect
   */
  function makeParallax(el, speed, wrapper, prevScroll) {
    var scrollY = window.scrollY || window.pageYOffset;

    if (prevScroll != scrollY) {
      prevScroll = scrollY;
      el.addClass('no-transition');
      el[0].style['transform'] = 'translate3d(0,' + -scrollY * (1 - speed) + 'px,0)';
      el.height();
      el.removeClass('no-transition');

      if (el.attr('data-fade') === 'true') {
        var bound = el[0].getBoundingClientRect(),
          offsetTop = bound.top * 2 + scrollY,
          sceneHeight = wrapper.outerHeight(),
          sceneDevider = wrapper.offset().top + sceneHeight / 2.0,
          layerDevider = offsetTop + el.outerHeight() / 2.0,
          pos = sceneHeight / 6.0,
          opacity;
        if (sceneDevider + pos > layerDevider && sceneDevider - pos < layerDevider) {
          el[0].style["opacity"] = 1;
        } else {
          if (sceneDevider - pos < layerDevider) {
            opacity = 1 + ((sceneDevider + pos - layerDevider) / sceneHeight / 3.0 * 5);
          } else {
            opacity = 1 - ((sceneDevider - pos - layerDevider) / sceneHeight / 3.0 * 5);
          }
          el[0].style["opacity"] = opacity < 0 ? 0 : opacity > 1 ? 1 : opacity.toFixed(2);
        }
      }
    }

    requestAnimationFrame(function () {
      makeParallax(el, speed, wrapper, prevScroll);
    });
  }

  /**
   * Smooth scrolling
   * @description  Enables a smooth scrolling for Google Chrome (Windows)
   */
  if (plugins.smoothScroll) {
    $.getScript(plugins.smoothScroll);
  }

  /**
   * RD Google Maps
   * @description Enables RD Google Maps plugin
   */
  if (plugins.rdGoogleMaps.length) {
    $.getScript("http://maps.google.com/maps/api/js?key=AIzaSyBI4AiTiGQV6JuBHVpkeMJk5D3WDIfBEdw&sensor=false&libraries=geometry&v=3.7", function () {
      var head = document.getElementsByTagName('head')[0],
        insertBefore = head.insertBefore;

      head.insertBefore = function (newElement, referenceElement) {
        if (newElement.href && newElement.href.indexOf('//fonts.googleapis.com/css?family=Roboto') != -1 || newElement.innerHTML.indexOf('gm-style') != -1) {
          return;
        }
        insertBefore.call(head, newElement, referenceElement);
      };

      lazyInit(plugins.rdGoogleMaps, function () {
        var styles = plugins.rdGoogleMaps.attr("data-styles");

        plugins.rdGoogleMaps.googleMap({
          styles: styles ? JSON.parse(styles) : {}
        })
      });
    });
  }

  /**
   * Owl carousel
   * @description Enables Owl carousel plugin
   */
  /*if (plugins.owl.length) {
    var k;
    for (k = 0; k < plugins.owl.length; k++) {
      var c = $(plugins.owl[k]),
        responsive = {};

      var aliaces = ["-", "-xs-", "-sm-", "-md-", "-lg-"],
        values = [0, 480, 768, 992, 1200],
        i, j;

      for (i = 0; i < values.length; i++) {
        responsive[values[i]] = {};
        for (j = i; j >= -1; j--) {
          if (!responsive[values[i]]["items"] && c.attr("data" + aliaces[j] + "items")) {
            responsive[values[i]]["items"] = j < 0 ? 1 : parseInt(c.attr("data" + aliaces[j] + "items"));
          }
          if (!responsive[values[i]]["stagePadding"] && responsive[values[i]]["stagePadding"] !== 0 && c.attr("data" + aliaces[j] + "stage-padding")) {
            responsive[values[i]]["stagePadding"] = j < 0 ? 0 : parseInt(c.attr("data" + aliaces[j] + "stage-padding"));
          }
          if (!responsive[values[i]]["margin"] && responsive[values[i]]["margin"] !== 0 && c.attr("data" + aliaces[j] + "margin")) {
            responsive[values[i]]["margin"] = j < 0 ? 30 : parseInt(c.attr("data" + aliaces[j] + "margin"));
          }
          if (!responsive[values[i]]["dotsEach"] && responsive[values[i]]["dotsEach"] !== 0 && c.attr("data" + aliaces[j] + "dots-each")) {
            responsive[values[i]]["dotsEach"] = j < 0 ? false : parseInt(c.attr("data" + aliaces[j] + "dots-each"));
          }
        }
      }

      // Create custom Pagination
      if (c.attr('data-dots-custom')) {
        c.on("initialized.owl.carousel", function (event) {
          var carousel = $(event.currentTarget),
            customPag = $(carousel.attr("data-dots-custom")),
            active = 0;

          if (carousel.attr('data-active')) {
            active = parseInt(carousel.attr('data-active'));
          }

          carousel.trigger('to.owl.carousel', [active, 300, true]);
          customPag.find("[data-owl-item='" + active + "']").addClass("active");

          customPag.find("[data-owl-item]").on('click', function (e) {
            e.preventDefault();
            carousel.trigger('to.owl.carousel', [parseInt(this.getAttribute("data-owl-item")), 300, true]);
          });

          carousel.on("translate.owl.carousel", function (event) {
            customPag.find(".active").removeClass("active");
            customPag.find("[data-owl-item='" + event.item.index + "']").addClass("active")
          });
        });
      }

      // Create custom Navigation
      if (c.attr('data-nav-custom')) {
        c.on("initialized.owl.carousel", function (event) {
          var carousel = $(event.currentTarget),
            customNav = $(carousel.attr("data-nav-custom"));

          customNav.find("[data-owl-prev]").on('click', function (e) {
            e.preventDefault();
            carousel.trigger('prev.owl.carousel', [300]);
          });

          customNav.find("[data-owl-next]").on('click', function (e) {
            e.preventDefault();
            carousel.trigger('next.owl.carousel', [300]);
          });
        });
      }

      c.owlCarousel({
        autoplay: c.attr("data-autoplay") === "true",
        loop: c.attr("data-loop") === "true",
        items: 1,
        autoplaySpeed: 600,
        autoplayTimeout: 3000,
        dotsContainer: c.attr("data-pagination-class") || false,
        navContainer: c.attr("data-navigation-class") || false,
        mouseDrag: c.attr("data-mouse-drag") === "true",
        nav: c.attr("data-nav") === "true",
        dots: c.attr("data-dots") === "true",
        dotsEach: c.attr("data-dots-each") ? parseInt(c.attr("data-dots-each")) : false,
        responsive: responsive,
        animateOut: c.attr("data-animation-out") || false,
        navText: $.parseJSON(c.attr("data-nav-text")) || [],
        navClass: $.parseJSON(c.attr("data-nav-class")) || ['owl-prev', 'owl-next']
      });

    }
  }*/

  $("#blog .owl-carousel").owlCarousel({
    items: 2,
    loop:true,
    responsiveClass:true,
    margin: 60,
    dots: false,
    nav: true,
    navText: ['<i class="fa fa-arrow-left fa-2x"></i>','<i class="fa fa-arrow-right fa-2x"></i>'],
    responsive:{
      0:{
        items:1
      },
      767:{
        items:2
      },
      1200:{
        items:2
      }
    }
  });

  // Superslides

  $('#slider').superslides({
    play: 6000,
    animation: 'fade',
    animation_speed: 2000
  });

  /**
   * UI To Top
   * @description Enables ToTop Button
   */
  if (isDesktop) {
    $().UItoTop({
      easingType: 'easeOutQuart',
      containerClass: 'ui-to-top icon icon-xs icon-circle icon-darker-filled mdi mdi-chevron-up'
    });
  }


  /**
   * RD Parallax
   * @description Enables RD Parallax plugin
   */
  if (plugins.rdParallax.length) {
    var i;
    $.RDParallax();

    if (!isIE && !isMobile) {
      $(window).on("scroll", function () {
        for (i = 0; i < plugins.rdParallax.length; i++) {
          var parallax = $(plugins.rdParallax[i]);
          if (isScrolledIntoView(parallax)) {
            parallax.find(".cws-parallax-inner").css("position", "fixed");
          } else {
            parallax.find(".cws-parallax-inner").css("position", "absolute");
          }
        }
      });
    }

    $("a[href='#']").on("click", function (e) {
      setTimeout(function () {
        $(window).trigger("resize");
      }, 300);
    });
  }
});