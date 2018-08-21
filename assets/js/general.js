<<<<<<< HEAD
window.onscroll = (e) => {
	console.log('this is the test');
}
=======
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
>>>>>>> 6eedb7e33fed81627fc5e71554e1754b0b749547
