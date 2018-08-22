<<<<<<< HEAD
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
=======
window.onscroll = (e) => {
	console.log('this is the test');
}
>>>>>>> b6d2702... initial commit
