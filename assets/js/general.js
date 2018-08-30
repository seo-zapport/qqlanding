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



var $owl = jQuery('.owl-carousel');

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