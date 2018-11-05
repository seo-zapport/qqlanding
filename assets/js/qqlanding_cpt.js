(function($){
	$(document).ready(function(){
		var ppp = 6,
		pageNumber = 1,
		offset = 1;

		$('#qqlandingLoadMoreVideo').on('click', function(e){
			var off = pageNumber * 6;
			var item = '&pageNumber=' + pageNumber + '&off=' + off + '&ppp=' + ppp + '&action=more_post_ajax';
			pageNumber++;			
			var button = $(this);
			e.preventDefault;
			console.log(item);
			/*$.ajax({
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
			});*/
			return false;
		});

	});
})(jQuery);