var clock;

$(document).ready(function() {
	var clock;
	var dateToIntegerA = $('#dateAStrtoInteger').attr('data-dateA');
	var dateToIntegerB = $('#dateBStrtoInteger').attr('data-dateB');
	//console.log( ((new Date().getTime())/1000) + dateToInteger );
	FlipClock.Lang.Custom = { days:'Days', hours:'Hours', minutes:'Minutes', seconds:'Seconds' };
	var opts = {
		clockFace: 'DailyCounter',
		countdown: true,
		language: 'Custom'
	};  

	var countdownA = dateToIntegerA - ((new Date().getTime())/1000); // from: 11/01/2018 08:31 am +0800
	var countdownB = dateToIntegerB - ((new Date().getTime())/1000); // from: 11/01/2018 08:31 am +0800
	//var countdown = dateToInteger - ((new Date().getTime())/1000); // from: 11/01/2018 08:31 am +0800
	countdownA = Math.max(1, countdownA);
	countdownB = Math.max(1, countdownB);
	$('#dateAWrap').FlipClock(countdownA, opts);
	$('#dateBWrap').FlipClock(countdownB, opts);
});

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

})(jQuery);