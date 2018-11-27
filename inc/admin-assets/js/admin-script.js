/**Media Uploader---*/
(function($){
	var mediaUploader_a;
	$('#upload_logo_a').on('click', function(e){
		e.preventDefault;

		if (mediaUploader_a) {
			mediaUploader_a.open();
			return;
		}
		mediaUploader_a = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Logo',
			button: {
				text: 'Choose Logo'
			},
			multiple: false
		});
		mediaUploader_a.on('select',function(){
			attachment = mediaUploader_a.state().get('selection').first().toJSON();
			$('#match_logo_a').val(attachment.url);
			$('#logo_wrap_a').attr('src',attachment.url);

		});
		mediaUploader_a.open();
	});

	var mediaUploader_b;
	$('#upload_logo_b').on('click', function(e){
		e.preventDefault;

		if (mediaUploader_b) {
			mediaUploader_b.open();
			return;
		}
		mediaUploader_b = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Logo',
			button: {
				text: 'Choose Logo'
			},
			multiple: false
		});
		mediaUploader_b.on('select',function(){
			attachment = mediaUploader_b.state().get('selection').first().toJSON();
			$('#match_logo_b').val(attachment.url);
			$('#logo_wrap_b').attr('src',attachment.url);

		});
		mediaUploader_b.open();
	});

	var mediaUploader_c;
	$('#upload_logo_c').on('click', function(e){
		e.preventDefault;

		if (mediaUploader_c) {
			mediaUploader_c.open();
			return;
		}
		mediaUploader_c = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Logo',
			button: {
				text: 'Choose Logo'
			},
			multiple: false
		});
		mediaUploader_c.on('select',function(){
			attachment = mediaUploader_c.state().get('selection').first().toJSON();
			$('#match_logo_c').val(attachment.url);
			$('#logo_wrap_c').attr('src',attachment.url);

		});
		mediaUploader_c.open();
	});

	/*$('#matches_status').on('change', function(){
	    var optionSelected = $("option:selected", this);
	    var valueSelected = this.value;
	    if ( valueSelected == 'match_a' ) {
	    	//$('#dateMatchWrap').html('Hello A');
	    	$('#dateMatchWrap').find( 'input' ).attr({ id: 'matches_a_date', name:'matches_a_date'});
	    }else{
	    	//$('#dateMatchWrap').html('Hello B');
	    	$('#dateMatchWrap').find( 'input' ).attr({ id: 'matches_b_date', name:'matches_b_date'});
	    }
	    console.log(valueSelected);
	});*/

	//find the th tag and add sr-only class
	$('.vm-general-form > table.form-table tbody tr').each(function(index){
		$(this).find('th').addClass('sr-only');
	});
	$('.qqlanding-slider-settings table.form-table tbody tr').each(function(index){
		$(this).find('th').addClass('sr-only');
	});

	$('input#match_title_a').on('keyup',function(e){
		e.preventDefault;
		var value = $(this).val();
		//console.log(value);
		$('.vm-wrapper-a #admin_match_title_a').text(value);
	});

	$('input#match_title_b').on('keyup',function(e){
		e.preventDefault;
		var value = $(this).val();
		$('.vm-wrapper-b #admin_match_title_b').text(value);
	});

	$('input#match_title_c').on('keyup',function(e){
		e.preventDefault;
		var value = $(this).val();
		$('.vm-wrapper-c #admin_match_title_c').text(value);
	});


	/*-Tab-pane*/
	window.addEventListener('load', function(){
		var tabs = document.querySelectorAll( 'ul.nav-tabs .nav-link' );

		for(i = 0; i < tabs.length; i++){
			tabs[i].addEventListener('click', magpalit);
		}

		function magpalit(event){
			event.preventDefault();

			document.querySelector(".nav-link.active").classList.remove("active");
			document.querySelector(".tab-pane.active").classList.remove("active");

			var clickedTab = event.currentTarget;
			var anchor = event.target;
			var activePaneId = anchor.getAttribute('href');

			clickedTab.classList.add("active");
			document.querySelector(activePaneId).classList.add("active");
			
		}
	});

	/*-Preset*/
	$('#preset').on('change', function(){
		var opt = $(this).val();
		switch(opt){
			case'default': 
				$('#image_post_wrap').addClass('sr-only');
				$('#repeat_image_wrap').addClass('sr-only');
				$('#scroll_wrap').addClass('sr-only');
				$('#image_size_wrap').addClass('sr-only');
			break;
			case'fill_screen': 
				$('#image_post_wrap').removeClass('sr-only');
				$('#repeat_image_wrap').addClass('sr-only');
				$('#scroll_wrap').addClass('sr-only');
				$('#image_size_wrap').addClass('sr-only');
			break;
			case'fit_screen': 
				$('#image_post_wrap').removeClass('sr-only');
				$('#repeat_image_wrap').removeClass('sr-only');
				$('#scroll_wrap').addClass('sr-only');
				$('#image_size_wrap').addClass('sr-only');
			break;
			case'repeat': 
				$('#image_post_wrap').removeClass('sr-only');
				$('#repeat_image_wrap').addClass('sr-only');
				$('#scroll_wrap').removeClass('sr-only');
				$('#image_size_wrap').addClass('sr-only');
			break;
			default:
				$('#image_post_wrap').removeClass('sr-only');
				$('#repeat_image_wrap').removeClass('sr-only');
				$('#scroll_wrap').removeClass('sr-only');
				$('#image_size_wrap').removeClass('sr-only');
		}
	});
})(jQuery);