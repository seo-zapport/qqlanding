
(function($){
	'use strict';
	
	function qqlanding_render_media_upload( $elem, form ){

		var file_frame, attachment;

		// If an instance of file_frame already exists, then we can open it rather than creating a new instance
		if (file_frame) {
			file_frame.open();
		}

		// Use the wp.media library to define the settings of the media uploader
		file_frame = wp.media.frames.file_frame = wp.media({
			frame: 'post',
			state: 'insert',
			multiple: false
		});

		// Setup an event handler for what to do when a media has been selected
		file_frame.on('insert', function(){

			// Read the JSON data returned from the media uploader
			attachment = file_frame.state().get( 'selection' ).first().toJSON();

			// First, make sure that we have the URL of the media to display
			if (0 > $.trim( attachment.url.length ) ) { return; };

			//Set the data
			switch(form){
				case 'videos' :
					var id = $elem.data( 'format' );
					$( '#qqlanding-' + id ).val( attachment.url );
					$( '#display_logo' ).attr('src',attachment.url);
					$( '#qqlanding-upload-image' ).text('Replace Media');
					$( '#remove-image' ).removeClass('d-none');
				break;
			}
		});

		// Now display the actual file_frame
		file_frame.open();

	}

	// $( '#qqlanding-video-type' ).on('change',function(e){
	// 	e.preventDefault();

	// 	var type = $(this).val();
	// 	$('.qqlanding-toggle-fields').hide();
	// 	$('.qqlanding-type-' + type).show(300);

	// }).trigger('change');

	//Videos: Display the media uploader when "Upload Media" button clicke.
	$('.qqlanding-upload-media').on( 'click', function( e ) {
		e.preventDefault();
		qqlanding_render_media_upload(  $( this ), 'videos' );
	});

	$('#remove-image').on('click',function(e){
		e.preventDefault();
		$( '#qqlanding-image' ).val('');
		$( '#display_logo' ).attr('src','');
		$( '#qqlanding-upload-image' ).text('Upload Media');
		$( '#remove-image' ).addClass('d-none');
	});

})(jQuery);