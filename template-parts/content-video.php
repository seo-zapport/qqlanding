<?php
/**
 * Template part for displaying page content in videos.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package QQLanding
 */
if ( ! is_front_page() ) {
	$after_wrap  = '<article id="' . the_ID() . '"' .  post_class( 'qqland-post' )  . ' itemscope="itemscope" itemtype="http://schema.org/BlogPosting">';
	$before_wrap  = '</article>';
}else{
	$after_wrap  = '<section id="video">';
	$before_wrap  = '</section>';
}
echo $after_wrap; ?>
	<div class="container">
		<?php  if ( ! is_front_page() ) : ?>
			<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php echo get_permalink(); ?>"/>
		<?php endif; ?>
		<?php if (! is_front_page()): ?>
			<header class="entry-header">
				<div class="qqland-entry-wrapper">
					<?php the_title( '<h1 itemprop="headline" class="entry-title">', '</h1>' ); ?>
				</div>
				<?php $logo = get_theme_mod( 'site_logo', '' ); 
						if ( !empty( $logo ) ) : 
						list($width, $height, $type, $attr) = getimagesize($logo);
				?>
					<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
					   <meta itemprop="url" content="<?php echo esc_url( $logo ); ?>"/>
					   <meta itemprop="width" content="<?php echo $width; ?>"/>
			    	   <meta itemprop="height" content="<?php echo $height; ?>"/>
					</div>
				<?php
						endif;		
				?>
				 <!-- .AMP  -->
				 <meta itemprop="author" content="<?php the_author();?>">
				 <meta itemprop="datePublished" content="<?php the_time('c'); ?> ">
				 <meta itemprop="dateModified" content="<?php the_modified_time('c'); ?>">
				 <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
				    <meta itemprop="name" content="<?php echo get_permalink(); ?>"/>
				    <?php $logo = get_theme_mod( 'site_logo', '' ); 
				    		if ( !empty( $logo ) ) : 
				    		list($width, $height, $type, $attr) = getimagesize($logo);
				    ?>
			    	<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
			    	   <meta itemprop="url" content="<?php echo esc_url( $logo ); ?>"/>
			    	   <meta itemprop="width" content="<?php echo $width; ?>"/>
			    	   <meta itemprop="height" content="<?php echo $height; ?>"/>
			    	</div>
				    <?php
				    endif;		
				    ?>
				</div> 
		</header><!-- .entry-header -->
		<?php qqlanding_post_thumbnail() //set Thumbnail;?>
		<?php else: ?>
			<h3 class="sec-entry-title text-center"><?php the_title(); ?></h3>
		<?php endif; ?>
		<div itemprop="articleBody" class="entry-content">
			<?php
				the_content();
				if ( ! is_front_page()) {
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'qqlanding' ),
						'after'  => '</div>',
					) );
				}
			?>

			<?php 
			$match_args_a = array(
				'post_type' 		=> 'qqlanding-matches',
				'post_status'		=> 'post',
				'posts_per_page'	=> 6,
				'meta_key'			=>  '_type_matches_key',
				'meta_value'		=>  'match_a',
				'meta_compare' 		=> '=',
			);
			$match_args_b = array(
				'post_type' 		=> 'qqlanding-matches',
				'post_status'		=> 'post',
				'posts_per_page'	=> 6,
				'meta_key'			=>  '_type_matches_key',
				'meta_value'		=>  'match_b',
				'meta_compare' 		=> '=',
			);
			$match_a = new WP_Query($match_args_a);
			$match_b = new WP_Query($match_args_b);?>
			<div class="row mb-4">
				<?php if ( $match_a->have_posts() ) : ?>
					<div class="col-12 col-lg-6">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Date</th>
									<th scope="col">Home Team</th>
									<th scope="col">Away Team</th>
								</tr>
							</thead>
							<tbody>
								<?php while($match_a->have_posts()) : $match_a->the_post(); ?>
								<tr>
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_date_matches_key', true ) ); ?></td>
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_home_matches_key', true ) ); ?></td>
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_away_matches_key', true ) ); ?></td>
								</tr>
								<?php endwhile;
				    			wp_reset_postdata(); ?>
							</tbody>
						</table>
					</div>
				<?php endif; //Match A end ?>
				<?php if ($match_b->have_posts()) : ?>
					<div class="col-12 col-lg-6">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Date</th>
									<th scope="col">Home Team</th>
									<th scope="col">Away Team</th>
								</tr>
							</thead>
							<tbody>
								<?php while($match_b->have_posts()) : $match_b->the_post(); ?>
								<tr>
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_date_matches_key', true ) ); ?></td>
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_home_matches_key', true ) ); ?></td>
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_away_matches_key', true ) ); ?></td>
								</tr>
								<?php endwhile;
				    			wp_reset_postdata(); ?>
							</tbody>
						</table>
					</div>
				<?php endif; //Match B end ?>
			</div>
			<!-- Start of Embeded Videos -->
			<div class="row aritcle-content-img mb-5" id="appendItem">
			<?php

				$args = array(
					'post_type'			=> 'video',
					'post_status'		=> 'post',
					'posts_per_page'	=> 3,
				);
				$video = new WP_Query($args);

				if ( $video->have_posts() ):
					$counter = 0;
					while ( $video->have_posts() ) : $video->the_post();
					$counter++;
					endwhile;
				endif;
				//if ( $counter > 1 ):
					// check if the repeater field has rows of data
					if ( $video->have_posts() ): $checker = 1;

					 	// loop through the rows of data
					    while ( $video->have_posts() ) : $video->the_post();
					    	if ( $checker <= 6 ) :
						    		# code...
						    	if ( $counter > 1 && $counter < 3) {
						    		$grid_class = 'col-md-6 col-xl-6';
						    		$card_class = 'vgrid-2';
						    	}else if ($counter >= 3) {
						    		$grid_class = 'col-md-4 col-xl-4';
						    		$card_class = 'vgrid-3';
						    	}else{
						    		$grid_class = '';
						    		$card_class = 'vgrid-1';
						    	}
					    	?>
								<div class="col-12 <?php /*echo ( $counter > 1 ) ? 'col-12 col-xl-4' : 'col-12 col-xl-12';*/ echo $grid_class; ?> mb-4">
									<!-- <div class="row"> -->
									<div class="vid-card <?php echo $card_class; ?>">
										<div class="vid-img-wrap">
											<a href="<?php echo get_the_permalink(); ?>" rel="nofollow" target="_blank">
												<span id="vid-oflow"><i class="far fa-play-circle fa-7x"></i></span>
												<?php if ( has_post_thumbnail()) :
													the_post_thumbnail( 'fp-featured', array('class' => 'img-fluid vid-img') );
												else : ?>
													<img src="<?php echo get_first_image(); ?>" class="img-fluid vid-img">
												<?php endif; ?>
											</a>
										</div>
										<div class="vid-body">
											<h3 class="vid-title"><a href="<?php echo get_the_permalink(); ?>" rel="nofollow" target="_blank"><?php the_title(); ?></a></h3>
											<?php //echo custom_field_excerpt(); ?>
										</div>
										<div class="vid-footer">
											<i class="far fa-clock"></i><small class="muted"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></small>
										</div>
								
									</div>
								</div>
					    <?php
						endif; //checker
					    $checker++;
					endwhile;
   	 				wp_reset_postdata(); ?>
					<div class="col-12 d-block text-center mb-5">
						<button id="qqlandingLoadMoreVideo" class="btn btn-lg btn-primary">Please Load new Things here</button>
					</div>
				<?php endif; ?>
			</div><!-- End of Embeded Videos -->
			<!-- <div id="appendItem"></div> -->

			<!-- Start of Matches with Modal -->
		<?php if ( ! is_front_page() && get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'qqlanding' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
		</div>
	</div>
<?php echo $before_wrap; ?>
