

(function ($) {
	"use Strict";
/*---------------------------------
    1. Mean Menu Active
-----------------------------------*/
jQuery('.mobile-menu-area nav').meanmenu({
    meanMenuContainer: '.mobile-menu',
    meanScreenWidth: "991"
});
/*---------------------------------
    2. Sticky Menu Active
-----------------------------------*/
$(window).scroll(function() {
if ($(this).scrollTop() >150){
    $('.header-sticky').addClass("sticky");
  }
  else{
    $('.header-sticky').removeClass("sticky");
  }
});
/*--------------------------
	3. Category Menu Active
---------------------------- */
 $('.rx-parent').on('click', function(){
    $('.rx-child').slideToggle();
    $(this).toggleClass('rx-change');
});
$(".embed-responsive iframe").addClass("embed-responsive-item");
$(".carousel-inner .item:first-child").addClass("active");
//    category heading
$('.category-heading').on('click', function(){
    $('.category-menu-list').slideToggle(300);
});

/*----------------------------------
    4. Nivo slider Active
-----------------------------------*/
 $('#slider').nivoSlider({
     manualAdvance:true,
     directionNav: false,
     controlNav: false,
     effect: 'random',
     slices: 18,
     pauseTime: 5000,
     controlNav: true,
     pauseOnHover: false,
     prevText: '<i class="ion-chevron-left"></i>',
     nextText: '<i class="ion-chevron-right"></i>',
 });
/*==================================
   5. Owl Carousel Active
====================================*/


/*-----------------------------------
  5.1 All Product Slider Active
----------------------------------*/
 $('.all-product')
        .on('changed.owl.carousel initialized.owl.carousel', function (event) {
            $(event.target)
                .find('.owl-item').removeClass('last')
                .eq(event.item.index + event.page.size - 1).addClass('last');
        }).owlCarousel({
        smartSpeed: 1000,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            600: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    })
/*-----------------------------------
  5.2 Related Product slider Active
----------------------------------*/
 $('.related-products')
        .on('changed.owl.carousel initialized.owl.carousel', function (event) {
            $(event.target)
                .find('.owl-item').removeClass('last')
                .eq(event.item.index + event.page.size - 1).addClass('last');
        }).owlCarousel({
        smartSpeed: 1000,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            600: {
                items: 3
            },
            992: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    })
/*-----------------------------------
  5.3 All-List-Product Slider Active
----------------------------------*/
 $('.all-list-product')
     .on('changed.owl.carousel initialized.owl.carousel', function (event) {
            $(event.target)
                .find('.owl-item').removeClass('last')
                .eq(event.item.index + event.page.size - 1).addClass('last');
        }).owlCarousel({
        smartSpeed: 1000,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    })
/*-----------------------------------
  5.4 Brand Active
----------------------------------*/
 $('.brand-active').owlCarousel({
        smartSpeed: 1000,
        nav: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        autoplay: true,
        loop: true,
        responsive: {
            0: {
                items: 2
            },
            450: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
/*-----------------------------------
  5.5 Our Blog Active Home 2
----------------------------------*/
 $('.our-blog-active').owlCarousel({
        smartSpeed: 1000,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
 /*-----------------------------------
  5.6 Hot Deal Product  Home 3
----------------------------------*/
 $('.hot-deal-of-product')
     .on('changed.owl.carousel initialized.owl.carousel', function (event) {
            $(event.target)
                .find('.owl-item').removeClass('last')
                .eq(event.item.index + event.page.size - 1).addClass('last');
        }).owlCarousel({
        smartSpeed: 1000,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    })
/*--------------------------------------
  5.7 Bestseller Product3 Active Home 3
---------------------------------------*/
 $('.bestseller-product3')
        .on('changed.owl.carousel initialized.owl.carousel', function (event) {
            $(event.target)
                .find('.owl-item').removeClass('last')
                .eq(event.item.index + event.page.size - 1).addClass('last');
        }).owlCarousel({
        smartSpeed: 1000,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            600: {
                items: 2
            },
            992: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    })
/*----------------------------------------------
  5.8 New Arrival List Product Active Home 3
------------------------------------------------*/
 $('.new-arrival-list-product')
     .on('changed.owl.carousel initialized.owl.carousel', function (event) {
            $(event.target)
                .find('.owl-item').removeClass('last')
                .eq(event.item.index + event.page.size - 1).addClass('last');
        }).owlCarousel({
        smartSpeed: 1000,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            600: {
                items: 2
            },
            992: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    })
/*---------------------------------------
  5.9 Electronic Product3 Active Home 3
-----------------------------------------*/
 $('.electronic-product3')
        .on('changed.owl.carousel initialized.owl.carousel', function (event) {
            $(event.target)
                .find('.owl-item').removeClass('last')
                .eq(event.item.index + event.page.size - 1).addClass('last');
        }).owlCarousel({
        smartSpeed: 1000,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            600: {
                items: 2
            },
            992: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    })
 /*-----------------------------------
  5.10 Latest Blog Active Home 3
----------------------------------*/
 $('.latest-blog-active').owlCarousel({
        smartSpeed: 1000,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 2
            }
        }
    })
/*------------------------------
    5.11 Blog Post Slider Active
-------------------------------- */
 $('.post-slider').owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        loop: true,
        nav: true,
        navText: ['<i class="ion-arrow-left-b"></i>', '<i class="ion-arrow-right-b"></i>'],
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
/*-----------------------------------
    5.12 Product Tab Menu Active
----------------------------------*/
 $('.single-product-tab-menu').owlCarousel({
        smartSpeed: 1000,
        margin: 20,
        loop: true,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 2
            },
            450: {
                items: 4
            },
            600: {
                items: 4
            },
            1000: {
                items: 4
            }
        }
    })
/*==================================
   6. Slick Slider Active
====================================*/


/*-----------------------------------
  6.1 hot deal Slider Active
-------------------------------------*/
$('.slide-active').slick({
        vertical: true,
		prevArrow: '<i class="fa fa-angle-left"></i>',
		nextArrow: '<i class="fa fa-angle-right slick-next-btn"></i>',
        slidesToShow: 2,
        responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
	});
/*-----------------------------------------
  6.2 Slide Active2 Left Side Slider Active
-------------------------------------------*/
$('.slide-active2').slick({
		rows: 5,
        vertical: false,
		prevArrow: '<i class="fa fa-angle-left"></i>',
		nextArrow: '<i class="fa fa-angle-right slick-next-btn"></i>',
        responsive: [
            {
              breakpoint: 1200,
              settings: {
                rows: 5,
              }
            },
            {
              breakpoint: 991,
              settings: {
                rows: 3,
              }
            },
            {
              breakpoint: 480,
              settings: {
                rows: 2,
              }
            }
          ]
	});
/*-----------------------------------
  6.3 Slide Active3 Slider Active
----------------------------------*/
$('.slide-active3').slick({
		slidesToShow: 3,
        vertical: true,
		prevArrow: '<i class="fa fa-angle-left"></i>',
		nextArrow: '<i class="fa fa-angle-right slick-next-btn"></i>',
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
	});
/*-----------------------------------
  6.4 Slide Active Home 2
----------------------------------*/
$('.slide-active-home-2').slick({
		slidesToShow: 1,
		prevArrow: '<i class="fa fa-angle-left"></i>',
		nextArrow: '<i class="fa fa-angle-right slick-next-btn"></i>',
	});
/*-----------------------------------
  6.5 Modal Slider Active
----------------------------------*/
$('.modal-tab-menu-active').slick({
		slidesToShow: 4,
		arrows: false,
        dots: true
	});
$('.modal').on('shown.bs.modal', function (e) {
    $('.modal-tab-menu-active').resize();
})
/*-----------------------------------
  7. Count Down Active
----------------------------------*/
$('[data-countdown]').each(function() {
	var $this = $(this), finalDate = $(this).data('countdown');
	$this.countdown(finalDate, function(event) {
		$this.html(event.strftime('<div class="single-count"><span>%D</span>Days</div><div class="single-count"><span>%H</span>Hours</div><div class="single-count"><span>%M</span>Mins</div><div class="single-count"><span>%S</span>Secs</div>'));
	});
});
/*---------------------------------
   8. Tooltip Active
-----------------------------------*/
$('.product-action a,.product-price a,.socil-icon li a,.blog-social-icon li a').tooltip({
        animated: 'fade',
        placement: 'top',
        container: 'body'
});
/*----------------------------------
   9. ScrollUp Active
-----------------------------------*/
$.scrollUp({
    scrollText: '<i class="ion-chevron-up"></i>',
    easingType: 'linear',
    scrollSpeed: 900,
    animation: 'fade'
});
/*--------------------------
    10. Counter Up
---------------------------- */
    $('.counter').counterUp({
        delay: 70,
        time: 5000
    });
/* ---------------------------
	11. FAQ Accordion Active
* ---------------------------*/
  $('.card-header a').on('click', function() {
    $('.card').removeClass('active');
    $(this).parents('.card').addClass('active');
  });
/*--------------------------
   12.  Wow Active
---------------------------- */
new WOW().init();
/*--------------------------
   13. Isotope Active
---------------------------- */
$('.protfolio-active').imagesLoaded( function() {
// images have loaded
    // init Isotope
    var $grid = $('.protfolio-active').isotope({
      // options
    });
    // filter items on button click
    $('.protfolio-menu-active').on( 'click', 'li', function() {
      var filterValue = $(this).attr('data-filter');
      $grid.isotope({ filter: filterValue });

          $(this).siblings('.active').removeClass('active');
          $(this).addClass('active');
          event.preventDefault();
    });
});

/*--------------------------
    14. Fancybox Active
---------------------------- */
$(".fancybox").fancybox({
     padding: 0,
});
/*==================================
   15. All Toggle Active
====================================*/
/*---------------------------------
	15.1 Showlogin Toggle Function
-----------------------------------*/
$( '#showlogin' ).on('click', function() {
    $( '#checkout-login' ).slideToggle(900);
});
/*----------------------------------
	15.2 Showcoupon Toggle Function
------------------------------------*/
$( '#showcoupon' ).on('click', function() {
    $( '#checkout_coupon' ).slideToggle(600);
});
/*------------------------------------------
	15.3 Create An Account Toggle Function
--------------------------------------------*/
 $( '#cbox' ).on('click', function() {
    $( '#cbox_info' ).slideToggle(900);
 });
/*------------------------------------------
	15.4 Create An Account Toggle Function
---------------------------------------------*/
 $( '#ship-box' ).on('click', function() {
    $( '#ship-box-info' ).slideToggle(1000);
 });
/*------------------------------------------
	15.5 Pyment Toggle Function
---------------------------------------------*/
$(".payment_method_cheque-li").on('click', function(){
  $(".payment_method_cheque").show(500);
  $(".payment_method_paypal").hide(500);
});
$(".payment_method_paypal-li").on('click', function(){
  $(".payment_method_paypal").show(500);
  $(".payment_method_cheque").hide(500);
});
/*----------------------------------
	16. Chosen Active
------------------------------------*/
$(".chosen-select").chosen({disable_search_threshold: 10});
/*----------------------------------
	17. Instafeed active
------------------------------------*/
if($('#Instafeed').length) {
    var feed = new Instafeed({
        get: 'user',
        userId: 7093388560,
        accessToken: '7093388560.1677ed0.8e1a27120d5a4e979b1ff122d649a273',
        target: 'Instafeed',
        resolution: 'thumbnail',
        limit: 6,
        template: '<li><a href="{{link}}" target="_new"><img src="{{image}}" /></a></li>',
    });
    feed.run();
}
/*----------------------------------
    18. Price Slider Active
------------------------------------*/
$( "#slider-range" ).slider({
      range: true,
      min:  33,
      max: 145,
      values: [ 33, 145 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
/*----------------------------------
    19. EasyZoom Active
------------------------------------*/
var $easyzoom = $('.easyzoom').easyZoom();

})(jQuery);
