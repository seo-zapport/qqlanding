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

    /**
     * Check the width
     *------------------*/
    if( layout == 'box' ){
        $(window).on( 'load resize', function(e){
            e.preventDefault();
            var page_w = $('#page').innerWidth();
            $('#site-navigation').css({'width': page_w + 'px', 'margin' : 'auto'});
        } );
    }

    /**
     * Add height the extra div element when it
     * have the class of qqland-affix
     *------------------------------------------*/
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
        autoplay: autoplay,
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
    /*var myBool = true;
    $('.float-classic .btn-pangclose').on('click', function() {
        if (myBool) {
            //$('#qqgroup-wrap').stop(true,false).animate({left : "-178px"},500);
            $(this).find('i.fa').removeClass('fa-angle-double-left').addClass('fa-angle-double-right');
            
        }else {
            //$('#qqgroup-wrap').stop(true,false).animate({left : "0px"},500);
            $(this).find('i.fa').removeClass('fa-angle-double-right').addClass('fa-angle-double-left');
        }
        myBool = !myBool;
    });*/
    /**
     * Float Flat
     *------------------*/
    $('.btn-pangclose').click(function() {
        var toggle = $.data(this, 'clickToggle') == null ? true : $.data(this, 'clickToggle');
        if ( toggle ) {
            $('.boxWrap').stop(true,false).animate({marginLeft : "-178px"},500);
            $(this).find('i.fa').removeClass('fa-angle-double-left').addClass('fa-angle-double-right');
        } else { 
            $('.boxWrap').stop(true,false).animate({marginLeft : "0px"},500);
            $(this).find('i.fa').removeClass('fa-angle-double-right').addClass('fa-angle-double-left');
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

    /**
     * Back to Top
     *------------------*/
     $(window).scroll(function () {
        if ( $(this).scrollTop() > 50) {
            $('#site_back_top').addClass('show');
            $('.modal-btn').css({ 'bottom' : '10%' });
        }else{
            $('#site_back_top').removeClass('show');
            $('.modal-btn').css({ 'bottom' : '0.75%' });
        }
     });
     $('#site_back_top').on('click',function(e){
        e.preventDefault();
         $('html,body').animate({
            scrollTop: 0
         }, 600);
     });


    function qqland_resize(){
        var body_h = $(window).height(),
            wrap_innerh = $('#qqgroup-wrap').innerHeight(),
            body_w = $(window).width();
        var new_height = ( body_h / 2 ) - 80;
        var s_h = (new_height / 2) + 42;

        if( window.matchMedia("(min-width: 1024px)").matches && window.matchMedia("(max-width: 1266px)").matches ){
            if (body_w === 1024) {
                var nee_h =  wrap_innerh - 150;
                $('#qqgroup-wrap').css({ 'height' : nee_h });
            }
            $('#qqgroup-wrap').css({ 'height' : wrap_innerh });

        }else if ( window.matchMedia("(min-width: 768px)").matches ) {
            $('#qqgroup-wrap').css({ 'height' : new_height });
            //console.log('true || ' + wrap_innerh);
        }else{
            $('#qqgroup-wrap').css({ 'height' : 'auto' });
             //console.log('else || ' + wrap_innerh);
        } 
    }
    $(window).on('load resize', function(){
        qqland_resize();
    });

    /**
     * Preload
     *------------------*/
    $(window).load(function(){
        // $("#qqpreload").fadeOut(500);
        $('#qqpreload').fadeOut('slow',function(){$(this).remove();});

        if ( $('body').hasClass('qqlayout-overlay') ) {
            $('.breadcrumb').addClass('mt-4');
        }
    });


})(jQuery);