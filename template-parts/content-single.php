<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package QQLanding
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'qqland-single-post' ); ?> itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<header class="single-entry-header">
		<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" href="<?php echo esc_url( get_permalink() );?>" />
	
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

		<div class="qqland-entry-wrapper">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="single-entry-title" itemprop="headline">', '</h1>' );
			else :
				the_title( '<h2 class="single-entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>
		 </div>
		<div class="single-entry-meta">
			<?php qqlanding_posted_on() . qqlanding_posted_by(); ?>
		</div>
	</header>
	<?php  if ( get_theme_mod( 'qqlanding_single_featured_img_display' ,true ) ) qqLanding_post_thumbnails(); //Display featured image  ?>
	<div class="entry-content mb-4" itemprop="articleBody">
		<?php the_content(); ?>
		<?php 
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tiervpn' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<footer class="entry-footer">
		<?php qqlanding_entry_footer(); ?>
	</footer>
</article>