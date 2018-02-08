
  (function ($) {

    $(window).load(function () {
        $("#pre-loader").delay(500).fadeOut();
        $(".loader-wrapper").delay(1000).fadeOut("slow");
    });

    $(document).ready(function () {
        $('.navbar li>a').addClass('hvr-underline-from-left');
        $('.navbar li li>a').removeClass('hvr-underline-from-left');
        $('.testimonial-section').find('.item').first().addClass('active');
        $('.quick-links .links li a').prepend("<i class='fa fa-angle-double-right'></i>");
        $('.blog .image').find('img').addClass('img-responsive');       
        /*-- page builder --*/
        $('.panel-layout > div .panel-row-style').wrapInner('<div class="container"></div>'); 
        $('.panel-layout > div.panel-no-style').wrapInner('<div class="container"></div>');         
        /*--woocommerce--*/
        $('.woocommerce .woocommerce-ordering select').wrap('<div class="dropdown"></div>'); 
        $('.navbar-nav .widget.woocommerce.widget_shopping_cart').wrap('<li class="right"></li>'); 
        $('.navbar-nav .mini_cart_item a').removeClass('hvr-underline-from-left');

        /* menu hover */
        var limit = 767;
        var window_width = window.innerWidth;
        if(window_width>limit){
            $('.navbar-nav .wc-cart-menu').hover(function(){
            $('.navbar-nav .widget.woocommerce.widget_shopping_cart').css('display', 'block');
            } ,function(){         
            $('.navbar-nav .widget.woocommerce.widget_shopping_cart').css('display', 'none');
          });  
        }    
        else{
            $('.navbar li>a').removeClass('hvr-underline-from-left');
            $('#navigation .navbar-nav > .active > a').css('box-shadow', 'none');
        }
        $('.navbar-nav .widget.woocommerce.widget_shopping_cart').hover(function(){
            $('.navbar-nav .widget.woocommerce.widget_shopping_cart').css('display', 'block');
        },function(){         
            $('.navbar-nav .widget.woocommerce.widget_shopping_cart').css('display', 'none');
        });        
       
       /*-- Background image--*/
        var clientHeight = $( window ).height();        
        $('#slider #slider-inner').css('height', clientHeight);        

        /*-- adding sidebar class to page having sidebar --*/
        if (!document.contains(document.getElementById('secondary'))) {
          document.body.classList.add('no-sidebar');
        }
        else{
          document.body.classList.add('has-sidebar'); 
        }

        /*-- button up --*/
        var btnUp = $('<div/>', { 'class': 'btntoTop' });
        btnUp.appendTo('body');
        $(document)
        .on('click', '.btntoTop', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 700);
        });
        $(window)
        .on('scroll', function () {
            if ($(this).scrollTop() > 200)
                $('.btntoTop').addClass('active');
            else
                $('.btntoTop').removeClass('active');
        });

        /*-- scroll fix Sticky Header
        $(window).scroll(function(e){ 
            var $el = $('.scroll-fix'); 
            var isPositionFixed = ($el.css('position') == 'fixed');
            if ($(this).scrollTop() > 200 && !isPositionFixed){ 
                $('.scroll-fix').css({'position': 'fixed', 'top': '0px','border-bottom':'1px solid #ececec','z-index':'2','animation':'menu_sticky 1.0s ease-in-out'});             
                $(window).trigger('resize.px.parallax');
            }
            if ($(this).scrollTop() < 200 && isPositionFixed){
                $('.scroll-fix').css({'position': 'inherit', 'top': '0px','border':'0','animation':'initial'});             
                $(window).trigger('resize.px.parallax');
            } 
        });--*/

        /*-- Counters --*/
        var timer = $('.timer');  
        timer.appear(function () {
            timer.countTo();
        }) 

        /*-- wow js initialize --*/
        new WOW().init();        

        /*-- Magnific Popup --*/
        $('.image-popup-link').magnificPopup({
            type: 'image',
            closeOnBgClick: true,
            fixedContentPos: false,              
        });
        $('.video-popup-link').magnificPopup({
            type: 'iframe',
            closeOnBgClick: true,
            fixedContentPos: false,              
        });
        $('.gallery-item').magnificPopup({
          type: 'image',
          closeOnBgClick: true,
          fixedContentPos: false,              
          gallery:{
            enabled:true
          }
        });                
        
    });
})(this.jQuery);