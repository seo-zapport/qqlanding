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