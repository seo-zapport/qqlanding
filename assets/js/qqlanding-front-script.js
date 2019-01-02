(function($){
	$(window).on('load', function(){
		if ( _tag_alignment == 'top' && _tag_display == true ) {
			var find =  $('#' + _tag_id );
			// console.log(find);
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
			var val = '';


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
			   val = title.split(qqfind);
			});

			qqfreearray.forEach(qqfreearray=>{  
				if(qqfind.length > 0){
				  splitfindfree = val[1].match(qqfreearray);	
				} else {
				  splitfindfree = title.match(qqfreearray);	
				} 
		
				  if(splitfindfree != null){
				  	 qqfindfree = splitfindfree['0'];
				   }
			});

			if(qqfind.length > 0)
			{
			  val = title.split(qqfind);
			}else {
			  val = title.split(qqfindfree);
			}
			  var freeval = qqfindfree;

			//console.log(freeval);
			//find.html(val[0] + "<span><img src='" + urlBase + "/assets/images/brands/QQ" + qqfind.split('qq')[1] + ".png'></span>" + val[1].split(freeval)[0] + "<span><img src='" + urlBase + "/assets/images/videos/" + image_src + ".png'></span>");
			
			if ( qqfind.length > 0 && freeval.length == 0 ) {
				console.log(' qqfind >  0 && qqfindfree == 0 ');
				find.html(val[0] + "<span><img src='" + urlBase + "/assets/images/brands/QQ" + qqfind.split('qq')[1] + ".png'></span>" + val[1] );
			}else if( qqfind.length == 0 && freeval.length > 0 ){
				console.log(' qqfind == 0 && qqfindfree > 0 ');
				find.html(val[0] + "<span><img src='" + urlBase + "/assets/images/videos/" + image_src + ".png'></span>");
			}else if( qqfind.length > 0 && freeval.length > 0 ){
				console.log(' qqfind >  0 && qqfindfree > 0 ');
				find.html(val[0] + "<span><img src='" + urlBase + "/assets/images/brands/QQ" + qqfind.split('qq')[1] + ".png'></span>" + val[1].split(freeval)[0] + "<span><img src='" + urlBase + "/assets/images/videos/" + image_src + ".png'></span>");
			}
			else{
				console.log(' else ');
				find.text(title);
			}
		}
	});
	
	$(document).ready(function() {
		var clock;
		var num = _table_col;
		var timer_wrap_id = '#timeWrap_';

		var result = [];
		var dateToInteger = '';
		for (var i = 0; i < num; i++) {
			dateToInteger = $('#date_'+ i +'_StrtoInteger').attr('data-date');
			result.push(dateToInteger);
		}

		if ( _table_style == 'text' ) {

			var timer = [];
			var new_date = new Date();
			var new_wrap = '';

			/**-Check the timer format to display.*/
			var clock_face = '%D days %H:%M:%S';
			if ( _table_format == 'HourCounter' ) {
				clock_face = '%H:%M:%S';
			}

			for (var i = 0; i < result.length; i++) {
				new_wrap = new_date.setTime(result[i]*1000); // from: 12/29/2018 11:00 am +0800
				timer.push(new_wrap);
			}
			for (var i = 0; i < timer.length; i++) {
				$(timer_wrap_id + i).countdown(timer[i], function(event) {
					$(this).html(event.strftime(clock_face));
				});

				$( timer_wrap_id + i ).addClass( 'timer-text' ); //Add some class
			}

		}else{

			/**-Check the timer format to display.*/
			var clock_face = 'DailyCounter';
			if ( _table_format == 'HourCounter' ) {
				clock_face = 'HourCounter';
			}

			FlipClock.Lang.Custom = { days:'Days', hours:'Hours', minutes:'Minutes', seconds:'Seconds' };
			var opts = {
				clockFace: clock_face,
				countdown: true,
				language: 'Custom'
			};

			var count_result = [];
			var countdown = '';
			for (var i = 0; i < result.length; i++) {
				countdown = result[i] - ((new Date().getTime())/1000);
				count_result.push(countdown);
			}

			var math_result = [];
			var math_count = '';
			for (var i = 0; i < count_result.length; i++) {
				math_count = Math.max(1, count_result[i]);
				math_result.push(math_count);
			}
						
			for (var i = 0; i < math_result.length; i++) {
				$( timer_wrap_id + i ).FlipClock(math_result[i], opts);

				/**find the parent then add new class------*/
				$( timer_wrap_id + i ).addClass( 'd-flex justify-content-center' );
			}
		}
		
		var ppp = 6,
		pageNumber = 1,
		offset = 1;

		$('#qqlandingLoadMoreVideo').on( 'click',function(e){
			e.preventDefault();
			var off = pageNumber * 6;
			var item = '&pageNumber=' + pageNumber + '&off=' + off + '&ppp=' + ppp + '&action=more_post_ajax';
			pageNumber++;			
			var button = $(this);
			e.preventDefault;
			//console.log(item);
			$.ajax({
				type: 'POST',
				dataType: 'html',
				url: ajax_post.ajaxurl,
				data: item,
				beforeSend:function(xhr){
					button.html('<i class="fas fa-spinner fa-pulse"></i> loading..');
				},
				success: function(data){
					var data = $(data);
					//console.log(data);
					if ( data.length > 0 ) {
						$('#appendItem').append(data);
						$(this).attr("disabled",true);
					}
					else{
						$(this).attr("disabled",true);
					}
				},
		        error : function(xhr, textStatus, errorThrown) {
		            $loader.html(xhr + " :: " + textStatus + " :: " + errorThrown);
		        },
		        complete: function(data){
					var data = $(data);
		        	if (data.length > 0) {
		        		button.text('Load more');
		        	}else{
		        		button.attr("disabled",true);
		        	}		        	
		        }
			});
			return false;
		});
	});	
})(jQuery);