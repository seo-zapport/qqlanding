<?php settings_errors(); ?>
<div class="vm-preview clearfix">
	<div class="vm-sidebar-a">
		<?php
			$title_a = esc_attr( get_option( 'match_title_a' ) );
			$date_a = esc_attr( get_option( 'match_date_a' ) );
			$logo_a = esc_attr( get_option( 'match_logo_a' ) );
		?>
		
		<div id="prev-img-wrap"><img src="<?php echo $logo_a; ?>" id="logo_wrap_a"></div>
		<div id="prev-details-wrap">
			<h2><?php echo $title_a; ?></h2>
			<span id="dateAStrtoInteger" data-date="<?php echo strtotime($date_a); ?>"></span>
			<div id="dateAWrap"></div>
		</div>
	</div>
	<div class="vm-sidebar-b">
		<?php
			$title_b = esc_attr( get_option( 'match_title_b' ) );
			$date_b = esc_attr( get_option( 'match_date_b' ) );
			$logo_b = esc_attr( get_option( 'match_logo_b' ) );
		?>
		
		<div id="prev-img-wrap"><img src="<?php echo $title_b; ?>"></div>
		<div id="prev-details-wrap">
			<h2><?php echo $title_b; ?></h2>
			<span id="dateBStrtoInteger" data-date="<?php echo strtotime($date_b); ?>"></span>
			<div id="dateAWrap"></div>
		</div>
	</div>
</div>
<form method="post" action="options.php" class="vm-general-form clearfix">
	<?php //settings_fields( 'match-settings-group-a' ); ?>
	<?php settings_fields( 'match-settings-group-a' ); ?>
	<?php do_settings_sections( 'vm_settings' ); ?>
	<span class="clearfix"></span>
	<?php submit_button(); ?>
</form>


<?php
/*function vm_admin_footer(){ ?>
	<script type="text/javascript">
		var sampleDate = '<?= echo $date_a; ?>';
		console.log('hello sdfsdf sdfas fsadf' + sampleDate);
	</script>
<?php }
add_action( 'admin_footer', 'vm_admin_footer' );*/