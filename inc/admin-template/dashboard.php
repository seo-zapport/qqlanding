<?php settings_errors(); ?>
<div class="vm-preview clearfix">
	<div class="vm-sidebar vm-wrapper-a">
		<?php
			$title_a = esc_attr( get_option( 'match_title_a' ) );
			$date_a = esc_attr( get_option( 'match_date_a' ) );
			$logo_a = esc_attr( get_option( 'match_logo_a' ) );

			$ac_date =  date('Y-m-d');
			$dash_vm_today = '';
			$dash_display = '';

			if ( $date_a == $ac_date ): $dash_vm_today = 'vm--text'; $dash_display = 'class="d-none"';
			elseif ( $date_a <= $ac_date ): $dash_display = 'class="d-none"'; $dash_vm_today = 'vm--text';
			else: $dash_vm_today = ''; $dash_display = '';
			endif;
		?>
		
		<div class="prev-img-wrap <?php echo $dash_vm_today; ?>"><img src="<?php echo $logo_a; ?>" id="logo_wrap_a"></div>
		<div class="prev-details-wrap <?php echo $dash_vm_today; ?>">
			<h2><?php echo $title_a; ?></h2>
			<?php if ( $date_a == $ac_date ): ?>
				<p class="text-matches">Today's match</p>
			<?php elseif ( $date_a <= $ac_date ): ?>
				<p class="text-matches">No Match Available.</p>
			<?php else: ?>
				<span id="dateAStrtoInteger" data-dateA="<?php echo strtotime($date_a); ?>"></span>
				<div id="dateAWrap"></div>
			<?php endif; ?>
		</div>
	</div>
	<div class="vm-sidebar vm-wrapper-b">

		<?php
			$title_b = esc_attr( get_option( 'match_title_b' ) );
			$date_b = esc_attr( get_option( 'match_date_b' ) );
			$logo_b = esc_attr( get_option( 'match_logo_b' ) );

			$bc_date =  date('Y-m-d');
			$dash_vm_today = '';
			$dash_display = '';

			if ( $date_b == $bc_date ): $dash_vm_today = 'vm--text'; $dash_display = 'class="d-none"';
			elseif ( $date_b <= $bc_date ): $dash_display = 'class="d-none"'; $dash_vm_today = 'vm--text';
			else: $dash_vm_today = ''; $dash_display = '';
			endif;
		?>
		<div class="prev-img-wrap <?php echo $dash_vm_today; ?>"><img src="<?php echo $logo_b; ?>" id="logo_wrap_b"></div>
		<div class="prev-details-wrap <?php echo $dash_vm_today; ?>">
			<h2><?php echo $title_b; ?></h2>
			<?php if ( $date_b == $bc_date ): ?>
				<p class="text-matches">Today's match</p>
			<?php elseif ( $date_b <= $bc_date ): ?>
				<p class="text-matches">No Match Available.</p>
			<?php else: ?>
				<span id="dateBStrtoInteger" data-dateB="<?php echo strtotime($date_b); ?>"></span>
				<div id="dateBWrap" <?php echo $dash_display; ?>></div>
			<?php endif; ?>
		</div>
	</div>
	<div class="vm-sidebar vm-wrapper-c">
		<?php
			$title_c = esc_attr( get_option( 'match_title_c' ) );
			$date_c = esc_attr( get_option( 'match_date_c' ) );
			$logo_c = esc_attr( get_option( 'match_logo_c' ) );

			$cc_date =  date('Y-m-d');
			$dash_vm_today = '';
			$dash_display = '';

			if ( $date_c == $cc_date ): $dash_vm_today = 'vm--text'; $dash_display = 'class="d-none"';
			elseif ( $date_c <= $cc_date ): $dash_display = 'class="d-none"'; $dash_vm_today = 'vm--text';
			else: $dash_vm_today = ''; $dash_display = '';
			endif;
		?>
		<div class="prev-img-wrap <?php echo $dash_vm_today; ?>" ><img src="<?php echo $logo_c; ?>" id="logo_wrap_c"></div>
		<div class="prev-details-wrap <?php echo $dash_vm_today; ?>" >
			<h2><?php echo $title_c; ?></h2>
			<?php if ( $date_c == $bc_date ): ?>
				<p class="text-matches">Today's match</p>
			<?php elseif ( $date_c <= $bc_date ): ?>
				<p class="text-matches">No Match Available.</p>
			<?php else: ?>
				<span id="dateCStrtoInteger" data-dateC="<?php echo strtotime($date_c); ?>"></span>
				<div id="dateCWrap"></div>
			<?php endif; ?>
		</div>
	</div>
	<div class="vm-sidebar vm-wrapper-d item-no-avail">
		<div class="prev-details-wrap">
			<h2>No Match Available</h2>
		</div>
	</div>
</div>
<form method="post" action="options.php" class="vm-general-form clearfix">
	<?php settings_fields( 'match-settings-group' ); ?>
	<?php do_settings_sections( 'vm_settings' ); ?>
	<span class="clearfix"></span>
	<?php submit_button(); ?>
</form>