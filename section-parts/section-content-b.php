<section id="Fcontent" class="content-last py-3">
	<div class="container">
		<div class="flexwrap flex-just-center row">
		<?php 
			if( have_rows('content_item', 'option') ): 
					if(get_sub_field('fp_app_set')['ca_hide_image'] == "yes"){
						$hidemob = "d-none d-sm-block";
					}else{
						$hidemob = "col-xs-12 col-sm-12";
					}
				while(have_rows('content_item', 'option') ) : the_row();

					if(get_sub_field('fp_position') == "default"):
		?>
				<div class="col-xs-12 col-sm-12 col-md-12 text-white text-justify">
					
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'qqland-post' ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
						<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php echo get_permalink(); ?>"/>						
						<header class="entry-header">
						<h3 itemprop="headline"><?php echo get_field('fa_title');?></h3>
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
						</header>
						<div itemprop="articleBody" class="entry-content">
								<?php  echo the_field('fa_content'); ?>
						</div><!-- .entry-content -->

				</div>

			<?php else: ?>
				
				<div class="<?php if(get_sub_field('fp_position') == "left"): echo $hidemob; else: echo 'col-xs-12 col-sm-12'; endif ?> col-md-6 text-white">
					<?php 
						if(get_sub_field('fp_position') == "left"):	
							echo fpcontent_img_position(get_sub_field('fp_images'),'last');
						else:
							echo fpcontent_content_position(get_field('fb_title'),get_field('fb_content'));
							//echo fpcontent_content_position_b();
						endif; 
					?>
				</div>
	
				<div class="<?php if(get_sub_field('fp_position') == "right"): echo $hidemob; else: echo 'col-xs-12 col-sm-12'; endif ?> col-md-6 text-white">
						<?php 
							if(get_sub_field('fp_position') == "left"):	
								echo fpcontent_content_position(get_field('fb_title'),get_field('fb_content'));
								//echo fpcontent_content_position_b();
							else:
								echo fpcontent_img_position(get_sub_field('fp_images'),'last');
							endif; 
						?>
				</div>
				
			<?php 
					endif;
				endwhile;		
			endif;
		?>
	 </div>
   </div>


</section>
