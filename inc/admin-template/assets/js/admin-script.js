var clock;

$(document).ready(function() {
	var clock;
	var dateToInteger = $('#dateAStrtoInteger').attr('data-date');
	console.log( ((new Date().getTime())/1000) + dateToInteger );
	FlipClock.Lang.Custom = { days:'Days', hours:'Hours', minutes:'Minutes', seconds:'Seconds' };
	var opts = {
		clockFace: 'DailyCounter',
		countdown: true,
		language: 'Custom'
	};  

	var countdown = dateToInteger - ((new Date().getTime())/1000); // from: 11/01/2018 08:31 am +0800
	//var countdown = dateToInteger - ((new Date().getTime())/1000); // from: 11/01/2018 08:31 am +0800
	countdown = Math.max(1, countdown);
	$('#dateAWrap').FlipClock(countdown, opts);
});

/**Media Uploader---*/
(function($){
	var mediaUploader;
	$('#upload_logo_a').on('click', function(e){
		e.preventDefault;

		if (mediaUploader) {
			mediaUploader.open();
			return;
		}
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Logo',
			button: {
				text: 'Choose Logo'
			},
			multiple: false
		});
		mediaUploader.on('select',function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#match_logo_a').val(attachment.url);
			$('#logo_wrap_a').attr('src',attachment.url);

		});
		mediaUploader.open();
	});

})(jQuery);