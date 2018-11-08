<?php settings_errors(); ?>
<div class="vm-preview clearfix">
	<div class="vm-sidebar vm-wrapper-a">
		<?php
			$title_a = esc_attr( get_option( 'match_title_a' ) );
			$date_a = esc_attr( get_option( 'match_date_a' ) );
			$logo_a = esc_attr( get_option( 'match_logo_a' ) );
		?>
		
		<div id="prev-img-wrap"><img src="<?php echo $logo_a; ?>" id="logo_wrap_a"></div>
		<div id="prev-details-wrap">
			<h2><?php echo $title_a; ?></h2>
			<span id="dateAStrtoInteger" data-dateA="<?php echo strtotime($date_a); ?>"></span>
			<div id="dateAWrap"></div>
		</div>
	</div>
	<div class="vm-sidebar vm-wrapper-b">
		<?php
			$title_b = esc_attr( get_option( 'match_title_b' ) );
			$date_b = esc_attr( get_option( 'match_date_b' ) );
			$logo_b = esc_attr( get_option( 'match_logo_b' ) );
		?>
		<div id="prev-img-wrap"><img src="<?php echo $logo_b; ?>" id="logo_wrap_b"></div>
		<div id="prev-details-wrap">
			<h2><?php echo $title_b; ?></h2>
			<span id="dateBStrtoInteger" data-dateB="<?php echo strtotime($date_b); ?>"></span>
			<div id="dateBWrap"></div>
		</div>
	</div>
	<div class="vm-sidebar vm-wrapper-c">
		<?php
			$title_c = esc_attr( get_option( 'match_title_c' ) );
			$date_c = esc_attr( get_option( 'match_date_c' ) );
			$logo_c = esc_attr( get_option( 'match_logo_c' ) );
		?>
		<div id="prev-img-wrap"><img src="<?php echo $logo_c; ?>" id="logo_wrap_c"></div>
		<div id="prev-details-wrap">
			<h2><?php echo $title_c; ?></h2>
			<span id="dateCStrtoInteger" data-dateC="<?php echo strtotime($date_c); ?>"></span>
			<div id="dateCWrap"></div>
		</div>
	</div>
	<div class="vm-sidebar vm-wrapper-d item-no-avail">
		<div id="prev-details-wrap">
			<h2>No Time Available</h2>
		</div>
	</div>
</div>
<form method="post" action="options.php" class="vm-general-form clearfix">
	<?php settings_fields( 'match-settings-group' ); ?>
	<?php do_settings_sections( 'vm_settings' ); ?>
	<span class="clearfix"></span>
	<?php submit_button(); ?>
</form>