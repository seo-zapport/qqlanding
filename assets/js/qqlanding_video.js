(function($){
	 $(window).on('load', function(){
	 	var find =  $('#videoTitle');
	 	var title = find.text().toLowerCase();
	 	const qqarray = ["qq288","qq188","qq101","qq1x2","qq724","qq801","qq828","qq882","qq802","qq820","qq808"];
	 	const qqfreearray = ["free bonus",'bonus gratis','Tiền Thưởng Miễn Phí'];
	 	var qqfind = "";
	 	var qqfindfree = "";
	 	var pathArray = window.location.pathname;
	 	var path_replace = pathArray.replace('/','');
	 	var strpath = path_replace.substring(0,3);
	 	var another = strpath.replace('/','');
	 	var  image_title = '';

	 		if (another == 'id') {
	 			const qqfreearray = ["bonus gratis"];
	 			var  image_title = 'bonus-gratis';
	 			var  image_src = 'bonus-gratis';
	 		}
	 		else if(another == 'vi'){
	 			const qqfreearray = ["Tiền Thưởng Miễn Phí"];
	 			var  image_title = 'tiền-thưởng miễn-phí';
	 			var  image_src = 'bonus-vn';
	 		}else if(another == 'th'){
	 			const qqfreearray = ["โบนัสฟรี"];
	 			var  image_title = 'โบนัสฟรี';
	 			var  image_src = 'bonus-th';
	 		}else if(another == 'zh'){
	 			const qqfreearray = ["免費獎金"];
	 			var  image_title = '免費獎金';
	 			var  image_src = 'bonus-china';
	 		}else{
	 			const qqfreearray = ["free bonus"];
	 			var  image_title = 'free-bonus';
	 			var  image_src = 'free-bonus';
	 		}

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
		//console.log(freeval);
		//console.log(val[0] + "<span><img src='" + urlBase + "/assets/images/brands/QQ" + qqfind.split('qq')[1] + ".png'></span>" + val[1].split(freeval)[0] + "<span><img src='" + urlBase + "/assets/images/videos/" + freeval.replace(' ' , '-') + ".png'></span>");
		find.html(val[0] + "<span><img src='" + urlBase + "/assets/images/brands/QQ" + qqfind.split('qq')[1] + ".png'></span>" + val[1].split(freeval)[0] + "<span><img src='" + urlBase + "/assets/images/videos/" + image_src + ".png'></span>");
	 });

	var clock;

	$(document).ready(function() {
		var clock;
		var dateToIntegerA = $('#dateAStrtoInteger').attr('data-dateA');
		var dateToIntegerB = $('#dateBStrtoInteger').attr('data-dateB');
		var dateToIntegerC = $('#dateCStrtoInteger').attr('data-dateC');

		//console.log( ((new Date().getTime())/1000) + dateToInteger );
		FlipClock.Lang.Custom = { days:'Days', hours:'Hours', minutes:'Minutes', seconds:'Seconds' };
		var opts = {
			clockFace: 'DailyCounter',
			countdown: true,
			language: 'Custom'
		};  

		var countdownA = dateToIntegerA - ((new Date().getTime())/1000); // from: 11/01/2018 08:31 am +0800
		var countdownB = dateToIntegerB - ((new Date().getTime())/1000); // from: 11/01/2018 08:31 am +0800
		var countdownC = dateToIntegerC - ((new Date().getTime())/1000); // from: 11/01/2018 08:31 am +0800

		//var countdown = dateToInteger - ((new Date().getTime())/1000); // from: 11/01/2018 08:31 am +0800
		countdownA = Math.max(1, countdownA);
		countdownB = Math.max(1, countdownB);
		countdownC = Math.max(1, countdownC);

		//countdownB = Math.max(1, countdownB);
		$('#timeWRapA').FlipClock(countdownA, opts);
		$('#timeWRapB').FlipClock(countdownB, opts);
		$('#timeWRapC').FlipClock(countdownC, opts);
	});

	/**find the parent then add new class------*/
	$('#timeWRapA, #timeWRapB, #timeWRapC').addClass( 'd-flex justify-content-center' );
})(jQuery);