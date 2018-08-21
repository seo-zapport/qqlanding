<?php
/**
 * ACF Style Editor
 */

if ( have_rows( 'th_fonts', 'option' ) ) :
	while ( have_rows( 'th_fonts', 'option' ) ) : the_row();
		$font_family = get_sub_field('thr_font_family');
		$font_size = get_sub_field('thr_font_size');
		$font_style = get_sub_field('thr_font_style');
		$font_weight = get_sub_field('thr_font_weight');

		/*if ( get_sub_field('th_entry_item') == 'body' ) : ?>
			body.qqlanding-sites{ font-family: <?php echo $font_family[0]; ?>; font-size: <?php echo $font_size; ?>px; font-style: <?php echo $font_style; ?>; font-weight: <?php echo $font_weight; ?>; }
		<?php elseif( get_sub_field('th_entry_item') == 'content' ): ?>
			.page-content,.entry-content,.entry-summary,.comment-content{ font-family: <?php echo $font_family[0]; ?>; font-size: <?php echo $font_size; ?>; font-style: <?php echo $font_style; ?>; font-weight: <?php echo $font_weight; ?>; }
		<?php elseif( get_sub_field('th_entry_item') == 'meta' ): ?>
			.genpost-entry-meta,.single-entry-meta,.genpost-entry-footer{ font-family: <?php echo $font_family[0]; ?>; font-size: <?php echo $font_size; ?>; font-style: <?php echo $font_style; ?>; font-weight: <?php echo $font_weight; ?>; }
		<?php elseif( get_sub_field('th_entry_item') == 'link' ): ?>
			a, .page-links{ font-family: <?php echo $font_family[0]; ?>; font-size: <?php echo $font_size; ?>; font-style: <?php echo $font_style; ?>; font-weight: <?php echo $font_weight; ?>; }
		<?php else: ?>
			.page-entry-title,.archive-page-title,.search-page-title,.entry-title{ font-family: <?php echo $font_family[0]; ?>; font-size: <?php echo $font_size; ?>; font-style: <?php echo $font_style; ?>; font-weight: <?php echo $font_weight; ?>; }
		<?php endif;*/ ?>	

		<?php if ( get_sub_field('th_entry_item') == 'body' ) : ?>
			body.qqlanding-sites{
		<?php elseif( get_sub_field('th_entry_item') == 'content' ): ?>
			.page-content,.entry-content,.entry-summary,.comment-content{
		<?php elseif( get_sub_field('th_entry_item') == 'meta' ): ?>
			.genpost-entry-meta,.single-entry-meta,.genpost-entry-footer{
		<?php elseif( get_sub_field('th_entry_item') == 'link' ): ?>
			a, .page-links{
		<?php else: ?>
			.page-entry-title,.archive-page-title,.search-page-title,.entry-title{
		<?php endif; ?>
		font-family:
		<?php foreach ($font_family as $val) {
			echo $val . ' ,';
		} ?> ;
		font-size: <?php echo $font_size; ?>px; font-style: <?php echo $font_style; ?>; font-weight: <?php echo $font_weight; ?>; }	
	<?php endwhile;
endif;