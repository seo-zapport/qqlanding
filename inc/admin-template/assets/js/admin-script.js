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

	$('#matches_status').on('change', function(){
	    var optionSelected = $("option:selected", this);
	    var valueSelected = this.value;
	    /*if ( valueSelected == 'match_a' ) {
	    	//$('#dateMatchWrap').html('Hello A');
	    	$('#dateMatchWrap').find( 'input' ).attr({ id: 'matches_a_date', name:'matches_a_date'});
	    }else{
	    	//$('#dateMatchWrap').html('Hello B');
	    	$('#dateMatchWrap').find( 'input' ).attr({ id: 'matches_b_date', name:'matches_b_date'});
	    }*/
	    console.log(valueSelected);
	});

})(jQuery);