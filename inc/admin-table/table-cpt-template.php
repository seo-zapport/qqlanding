<table id="repeatable_fieldset" class="table table-striped table-match-list">
	<thead>
		<tr>
			<th scope="col" style="width:31.33%;">Home Team</th>
			<th scope="col" style="width:31.33%;">Away Team</th>
			<th scope="col" style="width:31.33%;">Date Matches</th>
			<th scope="col" style="width:50px;">Action</th>
		</tr>
	</thead>
	<tbody id ="item">
		<?php
			$i = 1;
			foreach ($repeatable_fields as $fields) : ?>
			<tr class="single-list-row" id="single_row_<?php echo $i; ?>">
				<td style="width:31.33%;">
					<input type="text" id="_list[<?php echo $i; ?>][home]" name="_list[<?php echo $i; ?>][home]" value="<?php echo esc_attr(  $fields['home'] ); ?>">
				</td>
				<td style="width:31.33%;">
					<input type="text" id="_list[<?php echo $i; ?>][away]" name="_list[<?php echo $i; ?>][away]" value="<?php echo esc_attr(  $fields['away'] ); ?>">
				</td>
				<td style="width:31.33%;">
					<input type="date" id="_list[<?php echo $i; ?>][dateMatch]" name="_list[<?php echo $i; ?>][dateMatch]" value="<?php echo esc_attr(  $fields['dateMatch'] ); ?>">
				</td>
				<td style="width:50px;"><a href="javascript:;" class="remove-item" id="_list[<?php echo $i; ?>][remove]" name="_list[<?php echo $i; ?>][remove]" data-item="<?php echo $i; ?>"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>
				
			</tr>
		<?php $i++; endforeach; ?>
		<tr class="empty-row screen-reader-text single-list-row" id="single_row_0">
			<td style="width:31.33%;">
				<input type="text" id="_list[%s][home]" name="_list[%s][home]" value="">
			</td>
			<td style="width:31.33%;">
				<input type="text" id="_list[%s][away]" name="_list[%s][away]" value="">
			</td>
			<td style="width:31.33%;">
				<input type="date" id="_list[%s][dateMatch]" name="_list[%s][dateMatch]" value="">
			</td>
			<td>
				<a href="javascript:;" class="remove-item" id="_list[%s][remove]" name="_list[%s][remove]" data-item="0"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
			</td>
		</tr>
	</tbody>
</table>
<a href="javascript:void(0)" id="addRow" class="button button-primary button-large">Add List</a>
<script type="text/javascript">
	(function($){
		$('#addRow').on('click', function(e){
			e.preventDefault();
			var row_count = $('#repeatable_fieldset').find('.single-list-row').not(':last-child').size();
			var new_row_count = row_count + 1;
			var empty = $( '.empty-row.screen-reader-text' ).clone(true);

			//if ( $('tr').hasClass('empty-row') ) {

				empty.find('input, a').each(function(){
					if ( !! $(this).attr('id') ) 
						$(this).attr('id',  $(this).attr('id').replace('[%s]', '[' + new_row_count + ']') );

					if ( !! $(this).attr('name') ) 
						$(this).attr('name',  $(this).attr('name').replace('[%s]', '[' + new_row_count + ']') );
				});

			//}

			empty.removeClass( 'empty-row screen-reader-text' );
			empty.insertBefore( '.empty-row' );
			return false;
		});

		$('.remove-item').on('click', function(){
			var num = $(this).attr('data-item');
			$('#single_row_' + num).remove();
			return false;
		});
	})(jQuery);
</script>
<?php
wp_nonce_field( 'qqlanding_save_list_data', 'qqlanding_list_meta_box_nonce' );