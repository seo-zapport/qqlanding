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

if ( jQuery('body').hasClass('qqland-affix') ) {
  jQuery('[data-toggle="affix"]').each(function() {
    var ele = jQuery(this),
        wrapper = jQuery('<div></div>');

    ele.before(wrapper);
    jQuery(window).on('scroll resize', function() {
        toggleAffix(ele, wrapper, jQuery(this));
    });

    // init
    toggleAffix(ele, wrapper, jQuery(window));
  }); 
}


/**
 * Post
 *------------------*/
var $owl = jQuery('.owl-post');

$owl.children().each( function( index ) {
  jQuery(this).attr( 'data-position', index ); // NB: .attr() instead of .data()
});

$owl.owlCarousel({
    center: true,
    items: 3,
    loop: true,
    margin: 10,
    autoplay: true,
    pagination:true,
    autoplayTimeout: 2500,
    responsiveClass:true,
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
            dotsEach: 3,
        }
    }
});

jQuery(document).on('click', '.owl-item>div', function() {
  $owl.trigger('to.owl.carousel', jQuery(this).data( 'position' ) );
});



function init_carousel() {
            H = +(jQuery(window).height() /* -height here  */); // or $('.carousel-inner') as you want ...
            
            if(H <= 768){
                jQuery('.carousel-item').css('height', H+200 + 'px');    
            }
  

        }
window.onload = init_carousel;
init_carousel();

/**
 * Banner
 *------------------*/

var $owl = jQuery('.banner-slider');

$owl.children().each( function( index ) {
  jQuery(this).attr( 'data-position', index ); // NB: .attr() instead of .data()
});

$owl.owlCarousel({
    center: true,
    items: 5,
    loop: true,
    margin: 10,
    autoplay: true,
    pagination:true,
    autoplayTimeout: 2500,
    responsiveClass:true,
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
            items: 5,
            dotsEach: 5,
        }
    }
});

jQuery(document).on('click', '.owl-item>div', function() {
  $owl.trigger('to.owl.carousel', jQuery(this).data( 'position' ) );
});




/**
 * Float A
 *------------------*/
var myBool = true;
jQuery('.float-classic .btn-pangclose').on('click', function() {
    if (myBool) {
        jQuery('#qqgroup-wrap').stop(true,false).animate({left : "-178px"},500);
        jQuery(this).find('i.fa').removeClass('fa-angle-double-left').addClass('fa-angle-double-right');
        
    }else {
        jQuery('#qqgroup-wrap').stop(true,false).animate({left : "0px"},500);
        jQuery(this).find('i.fa').removeClass('fa-angle-double-right').addClass('fa-angle-double-left');
    }
    myBool = !myBool;
});


/**
 * Float B
 *------------------*/
jQuery('.btn-pangclose').click(function() {
    var toggle = jQuery.data(this, 'clickToggle') == null ? true : jQuery.data(this, 'clickToggle');
    if ( toggle ) {
        jQuery('.boxWrap').stop(true,false).animate({marginLeft : "0px"},500);
        jQuery(this).find('i.fa').removeClass('fa-arrow-right').addClass('fa-arrow-left');
    } else {
        jQuery('.boxWrap').stop(true,false).animate({marginLeft : "-178px"},500);
        jQuery(this).find('i.fa').removeClass('fa-arrow-left').addClass('fa-arrow-right');      
    }
    jQuery.data(this, 'clickToggle', ! toggle);
});

jQuery('.m-button-ad').click( function(){
    jQuery('.m-banner-ad').slideToggle('70');
    jQuery('.m-button-ad i').toggleClass('fa-chevron-down fa-chevron-up');
});

