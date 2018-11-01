(function($){
	 $(window).on('load', function(){
	 	var find =  $('#videoTitle');
	 	var title = find.text().toLowerCase();
	 	const qqarray = ["qq288","qq188","qq101","qqfortuna"];
	 	const qqfreearray = ["free bonus"];
	 	var qqfind = "";
	 	var qqfindfree = "";

		qqarray.forEach(qqarray=>{  
		  splitfind = title.match(qqarray);
          if(splitfind != null){
		  	 qqfind = splitfind['0'];
		   }
		});
		var val = title.split(qqfind);

		qqfreearray.forEach(qqfreearray=>{  
		  splitfindfree = val[1].match(qqfreearray);
          if(splitfindfree != null){
		  	 qqfindfree = splitfindfree['0'];
		   }
		});
		var freeval = qqfindfree;
		//console.log(val[0] + "<span><img src='" + urlBase + "/assets/images/brands/QQ" + qqfind.split('qq')[1] + ".png'></span>" + val[1].split(freeval)[0] + "<span><img src='" + urlBase + "/assets/images/videos/" + freeval.replace(' ' , '-') + ".png'></span>");
		find.html(val[0] + "<span><img src='" + urlBase + "/assets/images/brands/QQ" + qqfind.split('qq')[1] + ".png'></span>" + val[1].split(freeval)[0] + "<span><img src='" + urlBase + "/assets/images/videos/" + freeval.replace(' ' , '-') + ".png'></span>");
	 });

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
		//countdownB = Math.max(1, countdownB);
		$('#timeWRapA').FlipClock(countdownA, opts);
		$('#timeWRapB').FlipClock(countdownB, opts);
	});
})(jQuery);