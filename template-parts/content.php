<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package QQLanding
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('qqland-post'); ?> itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php echo get_permalink(); ?>"/>
	<header class="entry-header">
		<div class="qqland-entry-wrapper">
			<?php
			if ( is_singular() ) :
				the_title( '<h2 class="entry-title" itemprop="headline">', '</h2>' );
			else :
				the_title( '<h3 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			endif; ?>
		</div>
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				qqlanding_posted_on();
				qqlanding_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	
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
	
	<div class="entry-excerpt" itemprop="articleBody">
		<?php
		the_excerpt();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'qqlanding' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php qqlanding_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
