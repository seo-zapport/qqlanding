<?php $pvs_title = get_field( 'pvs_title', 'option' ); // providers custom repeater ?>
<section id="Fproviders" class="py-3">
	<div class="container">
		<h3 class="sec-entry-title"><?php esc_html_e( $pvs_title , 'qqlanding' ) ?></h3> <!--Nhà cung cấp-->
		<?php
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