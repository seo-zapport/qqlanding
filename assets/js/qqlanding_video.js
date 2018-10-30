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
})(jQuery);