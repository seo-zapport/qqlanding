<?php 
//$disable = sanitize_text_field( get_field( 'pvs_enable_section', 'option' ) ); //Banner Enable/Disable
$disable = get_field( 'pvs_enable_section', 'option' ); //Provider Enable/Disable
$pvs_title = get_field( 'pvs_title', 'option' ); // providers custom repeater
$heading_attr = get_field( 'pvs_heading_settings', 'option' );

if ( acf_selective_refresh($disable) ) return $disable = false;

if ($disable) : ?>
<section id="Fproviders" class="py-5">
	<div class="container">
		<?php

		/*$heading_attr = array(
			'tags'			=> $pvs_tags,
			'class'			=> 'sec-entry-title text-center',
			'id'			=> 'id',
			'itemprop'		=> 'headline',
			'alignment'		=> 'default',
		);*/
		echo acf_the_header_tag_injection($pvs_title, $heading_attr ); //Header tags

		if ( have_rows( 'pvs_settings', 'option' ) ) :
			while ( have_rows( 'pvs_settings', 'option' ) ) : the_row();
				$pvs_layout = get_sub_field( 'pvs_icons_colors', 'option' );
				switch ( $pvs_layout ) {
					case 'colored': $pvs_class = 'category'; break;
					case 'white': $pvs_class = 'default white'; break;
					default: $pvs_class = 'default gray'; break;
				}
			endwhile;
		endif;
		?>
		<div class="d-flex flex-wrap">
			<?php if ( have_rows( 'pvs_items', 'options' ) ): ?>
				<?php while ( have_rows( 'pvs_items', 'option' ) ) : the_row(); ?>

					<div class="provider-group prov-<?php echo $pvs_class; ?>">
						<p class="provider-title"><?php the_sub_field('pvs_pi_title', 'option') ?></p>
						<?php if ( have_rows( 'pvs_pi_icon_item', 'option' ) ):  // check for rows (sub repeater) ?>
							<div class="provider-wrap">
								<?php while ( have_rows( 'pvs_pi_icon_item', 'option' ) ) : the_row(); // loop through rows (sub repeater)?>
								<?php // display each item as a span list ?>
								<span class="provider-item "><i class="<?php the_sub_field('pvs__icons_logo'); ?>"><?php the_sub_field('pvs__icons_title'); ?></i></span>
								<?php endwhile; ?>
							</div>
						<?php endif; //if( get_sub_field('pvs_pi_icon_item') ): ?>
					</div>

				<?php endwhile; // while( has_sub_field('pvs_settings') ): ?>
			<?php endif;  //if( get_field('pvs_items') ): ?>
		</div>
	</div>
</section>
<?php endif;?>

<?php if ( empty( get_field('pvs_settings','option') ) ) {
	qqlanding_load_section('default');
} ?>