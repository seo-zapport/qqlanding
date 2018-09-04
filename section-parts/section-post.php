<?php
$layout = get_field('fp_layout', 'option'); // layout of the page
$item_layout = get_field('fp_ts_layout', 'option'); // Item Layout
$card_layout = get_field('fp_ts_cards_layout', 'option'); // Cards Theme
?>
<section id="Fpost" class="py-3">
	<div class="container">
		<h3 class="sec-entry-title"><?php the_field( 'fp_post_title' ); ?></h3>
		<div class="<?php echo ( $layout == 'static' ) ? 'card-deck' : 'owl-post owl-carousel'; ?>">
			<?php if ( have_rows( 'fp_post_post' ) ): ?>
				<?php while( have_rows( 'fp_post_post' ) ) : the_row() ?>
					<?php
						$post_fields = get_sub_field('fp_post_p_object');
						$fp_excerpt = get_field( 'fp_post_excerpt_length' );
						if ($post_fields) :
							$post = $post_fields;
							$post_fields = setup_postdata($post);
							
							if (  $layout == 'static' && $item_layout == 'card' && $card_layout == 'overlay' ) {
								$card_class = 'position-relative card-overlay';
							}elseif($layout == 'slider'){
								$card_class = 'position-relative slider-item';
							}else{
								$card_class = '';
							}
						?>
						<div <?php echo ( $layout == 'static' ) ? 'class="col-12 col-md-4 col-lg-4 p-0"' : ''; ?> >
							
							<div class="card <?php echo $card_class;  ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting"><!-- schema edited -->
								<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php echo get_permalink(); ?>"/><!-- schema edited -->
								<?php echo qqLanding_post_img(); ?>

								<div class="card-body <?php echo ( $item_layout == 'card' && $card_layout == 'overlay'  ) ? 'position-absolute card-o-btm' : '' ?>">
									<h5 class="card-title" itemprop="headline"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h5><!-- schema edited -->
									<?php if ( $item_layout == 'card' && $card_layout == 'overlay' ): ?>
										<div class="entry-meta">
											<small class="text-muted"><?php the_date( 'F j, Y' ); ?></small>
										</div>
									<?php endif; //show the meta in the top when overlay is output. ?>
									
									<!-- schema edited -->
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
									<!-- schema edited-->

									<?php if ($layout == 'static'): ?>
										<p class="card-text" itemprop="description"><?php qqlanding_excerpt_max_charlength( $fp_excerpt, '...' ); ?></p><!-- schema edited -->
									<?php endif;?>										
								</div>
								<?php if ($layout == 'static'): ?>
									<div class="card-footer <?php echo ( $item_layout == 'card' && $card_layout == 'overlay'  ) ? 'd-none' : '' ?>">
										<small class="text-muted"><?php the_date( 'F j, Y' ); ?></small>
									</div>
								<?php endif;?>
							</div>
						</div>
					<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>