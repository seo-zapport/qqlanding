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

			<!-- Start of Embeded Videos -->
			<div class="row aritcle-content-img mb-5">
			<?php
				if( have_rows('videos','option') ):
					$counter = 0;
					while ( have_rows('videos','option') ) : the_row();
					$counter++;
					endwhile;
				endif;

				//if ( $counter > 1 ):
					// check if the repeater field has rows of data
					if( have_rows('videos','option') ):

					 	// loop through the rows of data
					    while ( have_rows('videos','option') ) : the_row();?>

						<div class="<?php echo ( $counter > 1 ) ? 'col-12 col-xl-6' : 'col-12 col-xl-12'; ?> mb-4">
							<!-- <div class="row"> -->
						
								<div class="col-12 embed-container m-auto"><?php the_sub_field('video_url'); ?></div>
							    <div class="col-12"><h2 class="text-center text-capitalize"><?php the_sub_field('video_title'); ?></h2></div>
							    <div class="col-12"><?php echo custom_field_excerpt(); ?></div><hr>
						
							<!-- </div> -->
						</div>

					    <?php endwhile;

					endif;
				?>
			</div><!-- End of Embeded Videos -->
			<!-- Start of Matches with Modal -->
		<?php if( get_theme_mod( 'qqlanding_video_page_display_settings' ) == 1 ): ?>

			<!-- Large modal -->
			<!-- <button type="button" class="btn btn-primary modal-btn" data-toggle="modal" data-target=".bd-example-modal-lg">View Matches</button> -->
			<img class="modal-btn" title="Kontes SEO QQLIGA TERBESAR SEASIA 2018" src="http://via.placeholder.com/150x150" alt="Kontes SEO QQLIGA TERBESAR SEASIA 2018" data-toggle="modal" data-target=".bd-example-modal-lg">

			<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">

				<?php endif; ?>

			    	<!-- Table -->
					<div class="col-12">

						<?php if( get_theme_mod( 'qqlanding_video_page_display_settings' ) == 1 ): ?>
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						<?php endif; ?>

						<h1 class="text-center mb-2">Next Matches</h1>
						<h3>Select Number of Rows</h3>
						<div class="form-group">
							<select name="state" id="maxRows" class="form-control">
								<option value="5000">Show all</option>
								<option value="5">5</option>
								<option value="10">10</option>
								<option value="15">15</option>
							</select>
						</div>
						<table id="mytable" class="table table-responsive-xl table-striped">
						  <thead>
						    <tr>
						      <th scope="col">Matches</th>
						      <th scope="col">Country</th>
						      <th scope="col">TV</th>
						      <th scope="col">Date</th>
						    </tr>
						  </thead>
						  <tbody>
							<?php

							// check if the repeater field has rows of data
							if( have_rows('matches', 'option') ) : $item_tb = '';

							 	// loop through the rows of data
							    while ( have_rows('matches', 'option') ) : the_row();
							    	$item_tb .= '<tr>';
								    	$item_tb .= '<td class="text-capitalize">' . get_sub_field('match') . '</td>'; // display a sub field value
								    	$item_tb .= '<td class="text-capitalize">' . get_sub_field('country') . '</td>'; // display a sub field value
								    	$item_tb .= '<td ><a href="' . get_sub_field('tv') . '" target="_blank">Watch Here!</a></td>'; // display a sub field value
								    	$item_tb .= '<td >' . get_sub_field('date') . '</td>'; // display a sub field value
							    	$item_tb .= '</tr>';

							    	echo $item_tb;

							    endwhile;

							else :

							    Echo "<h4>No matches yet!</h4>";

							endif;

							?>
						  </tbody>
						</table>
						<div class="pagination-container">
							<nav>
								<ul class="pagination"></ul>
							</nav>
						</div>
					</div>
					<!-- End of Table -->
				<?php if( get_theme_mod( 'qqlanding_video_page_display_settings' ) == 1 ): ?>
			    </div>
			  </div>
			</div>
		<?php endif; ?><!-- End of Matches with Modal -->


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