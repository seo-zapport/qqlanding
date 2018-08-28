<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package QQLanding
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'qqland-post' ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
	<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php echo get_permalink(); ?>"/>
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

	<?php qqlanding_post_thumbnail(); ?>

	<div itemprop="articleBody" class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'qqlanding' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
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
</article><!-- #post-<?php the_ID(); ?> -->
