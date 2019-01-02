<?php settings_errors(); ?>
<div class="wrap">
	<h2 class="nav-tab-wrapper">
	<?php
		$settings_url = admin_url( 'edit.php?post_type=qqlanding-matchx&page=matchx_settings' );
		foreach ( $this->tabs as $tab => $title ) {
	        $class = ( $tab == $active_tab ) ? 'nav-tab nav-tab-active' : 'nav-tab';
	        printf( '<a href="%s" class="%s">%s</a>', esc_url( add_query_arg( 'tab', $tab, $settings_url ) ), $class, $title );
	    } ?>
	</h2>

	<form method="post" action="options.php">
		<?php 
			settings_fields( "qqlanding_{$active_tab}_settings");
			do_settings_sections( "qqlanding_{$active_tab}_settings" );
			submit_button();
		?>
	</form>
</div>
