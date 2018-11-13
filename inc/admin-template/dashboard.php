<?php settings_errors();
$current_date =  date('Y-m-d');
$dash_vm_today = '';
$dash_display = '';

//$post_title_a = '';
$post_title_b = '';
$post_title_c = '';
?>
<div class="vm-preview clearfix">
	<div class="vm-sidebar vm-wrapper-a">
		<?php
			$title_a = esc_attr( get_option( 'match_title_a' ) );
			$date_a = esc_attr( get_option( 'match_date_a' ) );
			$logo_a = esc_attr( get_option( 'match_logo_a' ) );

			/*-Group-A--**/
			$get_item_a = array(
				'post_type'			=> 'qqlanding-matches',
				'post_status'		=> array( 'post','publish' ),
				'posts_per_page'	=> 1,
				'meta_query'		=> array(
					array(
						'relation'	=> 'OR',
						array('key' => '_date_matches_key','value' => $current_date,'type' => 'date','compare' => '=='),
						'upcoming_date_a' => array('key' => '_date_matches_key','value' => $current_date,'type' => 'date','compare' => '>' )
					),
					array( 'key' => '_type_matches_key','value' => 'match_a','compare' => '==')
				),
				'orderby'			=> 'upcoming_date_a',
				'order'				=> 'ASC'
			);
			$query_match_a = new WP_Query($get_item_a);
			if ( $query_match_a->have_posts() ) {
				while( $query_match_a->have_posts() ) : $query_match_a->the_post();
					$set_new_date_a = get_post_meta(  get_the_ID(), '_date_matches_key', true );
					if ( $set_new_date_a == $current_date ): $dash_vm_today = 'vm--text'; $dash_display = 'class="d-none"';
					elseif ( $set_new_date_a <= $current_date ): $dash_display = 'class="d-none"'; $dash_vm_today = 'vm--text';
					else: $dash_vm_today = ''; $dash_display = '';
					endif; ?>
					<div class="prev-img-wrap <?php echo $dash_vm_today; ?>"><img src="<?php echo $logo_a; ?>" id="logo_wrap_a"></div>
					<div class="prev-details-wrap <?php echo $dash_vm_today; ?>">
						<h2 id="admin_match_title_a"><?php echo $title_a; ?></h2>
						<?php if ( $set_new_date_a == $current_date ): ?>
							<p class="text-matches">Today's match <span><?php echo ( ! empty( get_the_title() ) ) ? get_the_title() : ''; ?></span></p>
						<?php elseif ( $set_new_date_a <= $current_date ): ?>
							<p class="text-matches">No Match Available.</p>
						<?php else: ?>
							<span id="dateAStrtoInteger" data-dateA="<?php echo strtotime($set_new_date_a); ?>"></span>
							<div id="dateAWrap"></div>
						<?php endif; ?>
					</div>
				<?php 
				endwhile;
				wp_reset_postdata();
			}
		?>
	</div>
	<div class="vm-sidebar vm-wrapper-b">

		<?php
			$title_b = esc_attr( get_option( 'match_title_b' ) );
			$date_b = esc_attr( get_option( 'match_date_b' ) );
			$logo_b = esc_attr( get_option( 'match_logo_b' ) );

			/*-Group-B--**/
			$get_item_b = array(
				'post_type'		=> 'qqlanding-matches',
				'post_status'	=> array( 'post','publish' ),
				'posts_per_page'	=> 1,
				'meta_query'	=> array(
					array(
						'relation'	=> 'OR',
						array('key' => '_date_matches_key','value' => $current_date,'type' => 'date','compare' => '==' ),
						'upcoming_date_b' => array('key' => '_date_matches_key','value' => $current_date,'type' => 'date','compare' => '>' )
					),
					array( 'key' => '_type_matches_key','value' => 'match_b','compare' => '==')
				),
				'orderby'	=> 'upcoming_date_b',
				'order'		=> 'ASC'
			);
			$query_match_b = new WP_Query($get_item_b);
			if ( $query_match_b->have_posts() ) {
				while( $query_match_b->have_posts() ) : $query_match_b->the_post();
					$set_new_date_b = get_post_meta(  get_the_ID(), '_date_matches_key', true );

					if ( $set_new_date_b == $current_date ): $dash_vm_today = 'vm--text'; $dash_display = 'class="d-none"';
					elseif ( $set_new_date_b <= $current_date ): $dash_display = 'class="d-none"'; $dash_vm_today = 'vm--text';
					else: $dash_vm_today = ''; $dash_display = '';
					endif; ?>
					<div class="prev-img-wrap <?php echo $dash_vm_today; ?>"><img src="<?php echo $logo_b; ?>" id="logo_wrap_b"></div>
					<div class="prev-details-wrap <?php echo $dash_vm_today; ?>">
						<h2 id="admin_match_title_b"><?php echo $title_b; ?></h2>
						<?php if ( $set_new_date_b == $current_date ): ?>
							<p class="text-matches">Today's match <span><?php echo ( ! empty( get_the_title() ) ) ? get_the_title() : ''; ?></span></p>
						<?php elseif ( $set_new_date_b <= $current_date ): ?>
							<p class="text-matches">No Match Available.</p>
						<?php else: ?>
							<span id="dateBStrtoInteger" data-dateB="<?php echo strtotime($set_new_date_b); ?>"></span>
							<div id="dateBWrap" <?php echo $dash_display; ?>></div>
						<?php endif; ?>
					</div>
				<?php
				endwhile;
				wp_reset_postdata();
			}
		?>
	</div>
	<div class="vm-sidebar vm-wrapper-c">
		<?php
			$title_c = esc_attr( get_option( 'match_title_c' ) );
			$date_c = esc_attr( get_option( 'match_date_c' ) );
			$logo_c = esc_attr( get_option( 'match_logo_c' ) );

			/*-Group-C--**/
			$get_item_c = array(
				'post_type'			=> 'qqlanding-matches',
				'post_status'		=> array( 'post','publish' ),
				'posts_per_page'	=> 1,
				'meta_query'		=> array(
					array(
						'relation'	=> 'OR',
						array('key' => '_date_matches_key','value' => $current_date,'type' => 'date','compare' => '==' ),
						'upcoming_date_c' => array('key' => '_date_matches_key','value' => $current_date,'type' => 'date','compare' => '>' )
					),
					array( 
						'key' => '_type_matches_key',
						'value' => 'match_c',
						'compare' => '=='
					)
				),
				'orderby'	=> 'upcoming_date_c',
				'order'		=> 'ASC'
			);
			$query_match_c = new WP_Query($get_item_c);
			if ( $query_match_c->have_posts() ) {
				while( $query_match_c->have_posts() ) : $query_match_c->the_post();
					$set_new_date_c = get_post_meta(  get_the_ID(), '_date_matches_key', true );

					if ( $set_new_date_c == $current_date ): $dash_vm_today = 'vm--text'; $dash_display = 'class="d-none"';
					elseif ( $set_new_date_c <= $current_date ): $dash_display = 'class="d-none"'; $dash_vm_today = 'vm--text';
					else: $dash_vm_today = ''; $dash_display = '';
					endif; ?>
					<div class="prev-img-wrap <?php echo $dash_vm_today; ?>" ><img src="<?php echo $logo_c; ?>" id="logo_wrap_c"></div>
					<div class="prev-details-wrap <?php echo $dash_vm_today; ?>" >
						<h2 id="admin_match_title_c"><?php echo $title_c; ?></h2>
						<?php if ( $set_new_date_c == $current_date ): ?>
							<p class="text-matches">Today's match <span><?php echo ( ! empty( get_the_title() ) ) ? get_the_title() : ''; ?></span></p>
						<?php elseif ( $set_new_date_c <= $current_date ): ?>
							<p class="text-matches">No Match Available.</p>
						<?php else: ?>
							<span id="dateCStrtoInteger" data-dateC="<?php echo strtotime($set_new_date_c); ?>"></span>
							<div id="dateCWrap"></div>
						<?php endif; ?>
					</div>
				<?php
				endwhile;
				wp_reset_postdata();
			}
		?>
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