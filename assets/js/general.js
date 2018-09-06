 var toggleAffix = function(affixElement, wrapper, scrollElement) {

    var height = affixElement.outerHeight(),
        top = wrapper.offset().top;

    if (scrollElement.scrollTop() >= top){
        wrapper.height(height);
        affixElement.addClass("affix");
    }
    else {
        affixElement.removeClass("affix");
        wrapper.height('auto');
    }

  };

(function($){

    if ( $('body').hasClass('qqland-affix') ) {
      $('[data-toggle="affix"]').each(function() {
        var ele = $(this),
            wrapper = $('<div></div>');

        ele.before(wrapper);
        $(window).on('scroll resize', function() {
            toggleAffix(ele, wrapper, $(this));
        });
        // init
        toggleAffix(ele, wrapper, $(window));
      }); 
    }

    /**
     * Post
     *------------------*/
    var owlPost = $('.owl-post'),
        owlBanner = $('.banner-slider');

    owlPost.children().each( function( index ) { $(this).attr( 'data-position', index ); /* NB: .attr() instead of .data()*/ });
    //owlBanner.children().each( function( index ) { $(this).attr( 'data-position', index ); /* NB: .attr() instead of .data()*/ });

    owlPost.owlCarousel({
        center:true,
        loop:true,
        item:3,
        margin:10,
        autoplay:autoplay,
        autoplayTimeout: 1800,
        nav:nav,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        dots:dots,
        dotsEach: true,
        lazyLoad:true,
        responsive:{
            0:{
                items: 1,
                dotsEach: 1,
            },
            600:{
                items:2,
                dotsEach: 2,
            },
            1000:{
                items: 3,
                dotsEach: true,
            }
        }
    });

    $(document).on('click', '.owl-item>div', function() {
      owlPost.trigger('to.owl.carousel', $(this).data( 'position' ) );
    });

    owlBanner.owlCarousel({
        center:true,
        loop:true,
        item:4,
        margin:0,
        autoplay:_autoplay,
        autoplayTimeout: 1900,
        nav:_nav,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        dots:_dots,
        dotsEach: true,
        lazyLoad:true,
        responsive:{
            0:{
                items: 1,
                dotsEach: 1,
            },
            600:{
                items:2,
                dotsEach: 2,
            },
            1000:{
                items: 4,
                dotsEach: true,
            }
        }
    });

    /*$(document).on('click', '.owl-item>div', function() {
      owlBanner.trigger('to.owl.carousel', $(this).data( 'position' ) );
    });*/

   $('.carousel').carousel({
        interval: _interval
    });
    /**
     * Float classic
     *------------------*/
    var myBool = true;
    $('.float-classic .btn-pangclose').on('click', function() {
        if (myBool) {
            $('#qqgroup-wrap').stop(true,false).animate({left : "-178px"},500);
            $(this).find('i.fa').removeClass('fa-angle-double-left').addClass('fa-angle-double-right');
            
        }else {
            $('#qqgroup-wrap').stop(true,false).animate({left : "0px"},500);
            $(this).find('i.fa').removeClass('fa-angle-double-right').addClass('fa-angle-double-left');
        }
        myBool = !myBool;
    });
    /**
     * Float Flat
     *------------------*/
    $('.btn-pangclose').click(function() {
        var toggle = $.data(this, 'clickToggle') == null ? true : $.data(this, 'clickToggle');
        if ( toggle ) {
            $('.boxWrap').stop(true,false).animate({marginLeft : "0px"},500);
            $(this).find('i.fa').removeClass('fa-arrow-right').addClass('fa-arrow-left');
        } else {
            $('.boxWrap').stop(true,false).animate({marginLeft : "-178px"},500);
            $(this).find('i.fa').removeClass('fa-arrow-left').addClass('fa-arrow-right');      
        }
        $.data(this, 'clickToggle', ! toggle);
    });

    $('.m-button-ad').click( function(){
        $('.m-banner-ad').slideToggle('70');
        $('.m-button-ad i').toggleClass('fa-chevron-down fa-chevron-up');
    });

    // function init_carousel() {
    //     H = +($(window).height() /* -height here  */); // or $('.carousel-inner') as you want ...

    //     if(H <= 768){
    //         $('.carousel-item').css('height', H+200 + 'px');    
    //     }
    // }
    // window.onload = init_carousel;
    // init_carousel();


})(jQuery);