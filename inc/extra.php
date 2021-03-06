<?php
/**
 * Display some functions that are somehow needed.
 *
 * @package QQLanding
 */
if ( ! defined('ABSPATH')) exit;


/**
 * Load More Videos
 */
function more_post_ajax(){

	//global $post;
	$card_settings = get_field( 'video_cards_settings', 'option' ); //Card Setting
    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    $off = (isset($_POST['off'])) ? $_POST['off'] : 3;
    header("Content-Type: text/html");
    $args = array(
    	'post_type' 		=> 'aiovg_videos',
    	'post_status'		=> 'publish',
    	'posts_per_page'	=> $ppp,
    	'offset'    		=> $off,
    	'paged'				=> $page
    );
    $new_args = new WP_Query($args);
    $out = '';
    echo $off;
    if ( $new_args->have_posts() ) : $counter = 1;
    	while( $new_args->have_posts() ): $new_args->the_post();
    		//echo $post->ID;
	    	if ( $counter > 1 && $counter < 3) {
	    		$grid_class = 'col-md-6 col-xl-6';
	    		$card_class = 'vgrid-2';
	    	}else if ($counter >= 3) {
	    		$grid_class = 'col-md-4 col-xl-4';
	    		$card_class = 'vgrid-3';
	    	}else{
	    		$grid_class = '';
	    		$card_class = 'vgrid-1';
	    	} ?>
	    	<div class="col-12 col-md-4 col-xl-4 mb-4">
	    		<div class="vid-card vgrid-3">
					<div class="vid-img-wrap">
						<a href="<?php echo get_the_permalink(); ?>" rel="nofollow" target="_blank">
							<span id="vid-oflow"><i class="far fa-play-circle fa-7x"></i></span>
							<?php 
							// if ( has_post_thumbnail()) :
								// the_post_thumbnail( 'fp-featured', array('class' => 'img-fluid vid-img') );
							$image = get_post_meta( get_the_ID() , 'image', true );
							if ( $image ) : ?>
								<img src="<?php echo $image; ?>" class="img-fluid vid-img">
							<?php else : ?>
								<img src="<?php echo get_first_image(); ?>" class="img-fluid vid-img">
							<?php endif; ?>
						</a>
					</div>
					<div class="position-absolute w-100 vid-pos-abs">
						<div class="vid-body">
							<h3 class="vid-title"><a href="<?php echo get_the_permalink(); ?>" rel="nofollow" target="_blank"><?php the_title(); ?></a></h3>
						</div>
						<div class="vid-footer">
							<?php if ( $card_settings['_showhide_time'] == true ): ?>
								<span class="vid-clock"><i class="far fa-clock"></i><small class="muted"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></small></span>
							<?php endif; ?>
							<?php if ( $card_settings['_showhide_views'] == true ): ?>
								<span class="float-right vid-views"><i class="fa fa-eye" aria-hidden="true"></i>
								<?php $view_count = get_post_meta( get_the_ID(), 'views', true ); printf(__( '%d','qqlanding' ), $view_count ); ?></span>
							<?php endif; ?>
						</div>
	    			</div>
	    		</div>
	    	</div>
    	<?php endwhile;
    	wp_reset_postdata();
    else:
    	$out .= 'uala na ';
    endif;
    //echo $out;
    die($out);
}
add_action( 'wp_ajax_nopriv_more_post_ajax','more_post_ajax' );
add_action( 'wp_ajax_more_post_ajax','more_post_ajax' );


if (! function_exists( 'qqlanding_social_media' ) ) {
	function qqlanding_social_media(){
		if ( get_theme_mod( 'qqlanding_display_smedia_icon', false ) == true ) : 
			if ( get_field( 'sm_icon_shape', 'option' ) === 'circle' ) : $sm_shape = 'sm-circle'; 
			elseif ( get_field( 'sm_icon_shape', 'option' ) === 'square' ) : $sm_shape = 'sm-square';
			else: $sm_shape = 'sm-no-shape'; endif;
			?>
				<ul id="social_media" class="float-md-right <?php echo $sm_shape; ?>" itemscope itemtype='http://schema.org/SiteNavigationElement'>
					<?php if ( get_theme_mod( 'facebook_url', '' ) ) : ?>
						<li itemprop="name"><a href="<?php echo esc_url ( get_theme_mod( 'facebook_url', '' ) ) ?>" target="_blank" itemprop="url" class="sm-icon-facebook"><i class=" fab fa-<?php echo ( get_field( 'sm_icon_shape', 'option' ) === 'square' ) ? 'facebook-square' : 'facebook-f'; ?>"></i></a></li> <!--facebook-->
					<?php endif; ?>
					<?php if ( get_theme_mod( 'twitter_url', '' ) ) : ?>
						<li itemprop="name"><a href="<?php echo esc_url ( get_theme_mod( 'twitter_url', '' ) ) ?>" target="_blank" itemprop="url" class="sm-icon-twitter"><i class="fab fa-<?php echo ( get_field( 'sm_icon_shape', 'option' ) === 'square' ) ? 'twitter-square' : 'twitter'; ?>"></i></a></li> <!--twitter-->
					<?php endif; ?>
					<?php if ( get_theme_mod( 'instagram_url', '' ) ) : ?>
						<li itemprop="name"><a href="<?php echo esc_url ( get_theme_mod( 'instagram_url', '' ) ) ?>" target="_blank" itemprop="url" class="sm-icon-instagram"><i class="fab fa-instagram"></i></a></li> <!--instagram-->
					<?php endif; ?>
					<?php if ( get_theme_mod( 'linkedin_url', '' ) ) : ?>
						<li itemprop="name"><a href="<?php echo esc_url ( get_theme_mod( 'linkedin_url', '' ) ) ?>" target="_blank" itemprop="url" class="sm-icon-linkedin"><i class="fab fa-<?php echo ( get_field( 'sm_icon_shape', 'option' ) === 'square' ) ? 'linkedin' : 'linkedin-in'; ?>"></i></a></li> <!--linkedin-->
					<?php endif; ?>
					<?php if ( get_theme_mod( 'youtube_url', '' ) ) : ?>
						<li itemprop="name"><a href="<?php echo esc_url ( get_theme_mod( 'youtube_url', '' ) ) ?>" target="_blank" itemprop="url" class="sm-icon-youtube"><i class="fab fa-<?php echo ( get_field( 'sm_icon_shape', 'option' ) === 'square' ) ? 'youtube-square' : 'youtube'; ?>"></i></a></li> <!--youtube-->
					<?php endif; ?>
					<?php if ( get_theme_mod( 'googleplus_url', '' ) ) : ?>
						<li itemprop="name"><a href="<?php echo esc_url ( get_theme_mod( 'googleplus_url', '' ) ) ?>" target="_blank" itemprop="url" class="sm-icon-google-plus"><i class="fab fa-<?php echo ( get_field( 'sm_icon_shape', 'option' ) === 'square' ) ? 'google-plus-square' : 'google-plus-g'; ?>"></i></a></li> <!--googleplus-->
					<?php endif; ?>
					<?php if ( get_theme_mod( 'pinterest_url', '' ) ) : ?>
						<li itemprop="name"><a href="<?php echo esc_url ( get_theme_mod( 'pinterest_url', '' ) ) ?>" target="_blank" itemprop="url" class="sm-icon-pinterest"><i class="fab fa-<?php echo ( get_field( 'sm_icon_shape', 'option' ) === 'square' ) ? 'pinterest-square' : 'pinterest-p'; ?>"></i></a></li> <!--pinterest-->
					<?php endif; ?>
					<?php if ( get_theme_mod( 'rss_url', '' ) ) : ?>
						<li itemprop="name"><a href="<?php echo esc_url ( get_theme_mod( 'rss_url', '' ) ) ?>" target="_blank" itemprop="url" class="sm-icon-rss"><i class="fas fa-<?php echo ( get_field( 'sm_icon_shape', 'option' ) === 'square' ) ? 'rss-square' : 'rss'; ?>"></i></a></li> <!--rss-->
					<?php endif; ?>
					<?php if ( get_theme_mod( 'flickr_url', '' ) ) : ?>
						<li itemprop="name"><a href="<?php echo esc_url ( get_theme_mod( 'flickr_url', '' ) ) ?>" target="_blank" itemprop="url" class="sm-icon-flickr"><i class="fab fa-flickr"></i></a></li> <!--flickr-->
					<?php endif; ?>
				</ul>
				<span class="clearfix"></span>
		<?php endif;
	}
}

/**
 * Breadcrumbs Lists
 * Allow visitors to quickly navigate back to a previous section or the root page.
 *
 * Addopted from tierone layout
 */

if ( ! function_exists('qqlanding_breadcrumb_list') ) :

	function qqlanding_breadcrumb_list(){

		/**
		 * Settings
		 *----------*/
		$breadcrumb__grp_class = 'breadcrumb';
		$breadcrumb__item_class = 'breadcrumb-item';
		$breadcrumb__id = 'breadcrumb';


		/**
		 * Options
		 *----------*/
		$text['home']		= __('Home','qqlanding'); //text for the 'Home' link 
		$text['category'] 	= __( 'Archive for %s', 'qqlanding' ); // text for a category page
		$text['search']   	= __( 'Search results for: ', 'qqlanding' ); // text for a search results page
		$text['tag']      	= __( 'Posts tagged %s', 'qqlanding' ); // text for a tag page
		$text['author']   	= __( 'View all posts by %s', 'qqlanding' ); // text for an author page
		$text['404']      	= __( 'Error 404', 'qqlanding' ); // text for the 404 page

		$show['current'] 	= 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$show['home']    	= 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$show['search']  	= 0; // 1 - show breadcrumbs on the search page, 0 - don't show

		/* === END OF OPTIONS === */

		$custom_taxonomy			=  __('product_cat','qqlanding'); // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
		$home_url			=  home_url('/');
		$schema_url			=  __('http://schema.org','qqlanding');
		$schema_item		=  __('item','qqlanding');
		$schema_name		=  __('name','qqlanding');
		$schema_item_elem	=  __('itemListElement','qqlanding');
		$separator			=  '<span class="fa fa-chevron-right"></span>';
		$post        		= get_queried_object();
		$post_type 			= get_post_type(); // If post is a custom post type
		$parent_id  		= isset( $post->post_parent ) ? $post->post_parent : '';
		//$singular_video		= ( ! is_singular( 'video' ) ) ? ' mt-4' : ' mt-5';


		$html_output		= '';

		global $wp_query; // Get the query & post information

		if ( ! is_front_page() ) :
			$html_output		.= '<nav class="' . $breadcrumb__grp_class . '" itemprop="breadcrumb" itemscope itemtype="' . $schema_url . '/BreadcrumbList">';
				$html_output .= '<li class="' . $breadcrumb__item_class . '" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem">';
					$html_output .= '<meta itemprop="position" content="1">';
					$html_output .= '<a href="' . $home_url . '" itemprop="' . $schema_item . '"><span itemprop="' . $schema_name . '">'. $text['home'] . '</span></a>';
				$html_output .= '</li>';

				
				if ( is_home() ) :
					if ( 1 == $show['current'] ) :
						$html_output .= '<li class="' . $breadcrumb__item_class . ' active" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="2"><span itemprop="' . $schema_name . '">' . get_the_title( get_option( 'page_for_posts', true ) ) .  '</span></li>';
					endif;
				
				elseif ( is_day() ) :
					$html_output .= sprintf('<li class="' . $breadcrumb__item_class . '" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="2"><a title="' . get_the_time( 'Y' ) . '" href="%1$s" itemprop="' . $schema_item . '"><span itemprop="' . $schema_name . '">%2$s</span></a>',get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ,'</li>');	 //Yearly

					$html_output .= sprintf('<li class="' . $breadcrumb__item_class . '" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="3"><a title="' . get_the_time( 'F' ) . '" href="%1$s" itemprop="' . $schema_item . '"><span itemprop="' . $schema_name . '">%2$s</span></a>',get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ) ,'</li>'); //Monthly

					$html_output .= sprintf('<li class="' . $breadcrumb__item_class . ' active" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="4"><a title="' . get_the_time( 'd' ) . '" href="'.get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' )).'" itemprop="' . $schema_item . '"><span itemprop="' . $schema_name . '">' . get_the_time( 'd' ) . '</span></a></li>');
				
				elseif ( is_month() ) :
					$html_output .= sprintf('<li class="' . $breadcrumb__item_class . '" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="2"><a title="' . get_the_time( 'Y' ) . '" href="%1$s" itemprop="' . $schema_item . '"><span itemprop="' . $schema_name . '">%2$s</span></a>',get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) );	 //Yearly

					$html_output .= '<li class="' . $breadcrumb__item_class . ' active" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="3"><a href="'.get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ).'" itemprop="item" title="' . get_the_time( 'F' ) . '" ><span itemprop="' . $schema_name . '">' . get_the_time( 'F' ) . '<span></a></li>';
				
				elseif ( is_year() ) :

					$html_output .= '<li class="' . $breadcrumb__item_class . ' active" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="2"><a href="'.get_year_link( get_the_time( 'Y' ) ).'" itemprop="item"><span itemprop="' . $schema_name . '">' . get_the_time( 'Y' ) . '</span></a></li>';


				elseif ( is_archive() && is_tax() && !is_category() && !is_tag() ) :

					if ( $post_type != 'post' ) : // If post is a custom post type
						$post_type_object = get_post_type_object($post_type);
						$post_type_archive = get_post_type_archive_link($post_type);
					
						$html_output .= sprintf('<li class="' . $breadcrumb__item_class . '" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="2"><a href="%1$s" itemprop="' . $schema_item . '"><span itemprop="' . $schema_name . '">%2$s</span></a>',$post_type_archive, $post_type_object->labels->name );
					endif;
					$custom_tax_name = get_queried_object()->name;

					$html_output .= sprintf('<li class="' . $breadcrumb__item_class . ' active" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="3"><a href="%1$s" itemprop="' . $schema_item . '"><span itemprop="' . $schema_name . '">%2$s</span></a>',$post_type_archive, $custom_tax_name);

				elseif( is_single() && ! is_attachment() ):
					if ( $post_type != 'post' ) {
						$post_type_object = get_post_type_object($post_type);
						$post_type_archive = get_post_type_archive_link($post_type);
						
						$html_output .= sprintf('<li class="' . $breadcrumb__item_class . '" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="3"><a href="%1$s" itemprop="' . $schema_item . '"><span itemprop="' . $schema_name . '">%2$s</span></a>', $post_type_archive , $post_type_object->labels->singular_name);
					}else{
						$category = get_the_category(); // Get post category info
						if ( !empty( $category ) ) {

							// Get last category post is in
			                $last_category = array_values($category);
			                $last_category = end($last_category);

			                 // Get parent any categories and create array
			                 $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
			                 $cat_parents = explode(',',$get_cat_parents);

			                 // Loop through parent categories and store in variable $cat_display
			                $cat_display = '';
			                foreach ( $cat_parents as $parents ) {
			                	$parents = preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1"><span itemprop="name">$2</span></a>', $parents);
			                	$parents = str_replace( '<a', '<li class="' . $breadcrumb__item_class . '" itemprop="itemListElement" itemscope itemtype="' . $schema_url . '/ListItem">
                                                    	 <meta itemprop="position" content="2" />
                                                   	 	 <a itemprop="' . $schema_item . '" ', $parents );
			                	$parents = str_replace( '</a>', '</a></li>', $parents );
			                	$cat_display = $parents;
			                }
						}

						$taxonomy_exists = taxonomy_exists($custom_taxonomy);  // If it's a custom post type within a custom taxonomy

			            if( empty( $last_category ) && !empty( $custom_taxonomy ) && $taxonomy_exists ) {
			                   
			                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
			                $cat_id         = $taxonomy_terms[0]->term_id;
			                $cat_nicename   = $taxonomy_terms[0]->slug;
			                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
			                $cat_name       = $taxonomy_terms[0]->name;
			            }
			            // Check if the post is in a category
						 if ( !empty( $last_category ) ) {
						 	 $html_output .= $cat_display;

							$html_output .= '<li class="' . $breadcrumb__item_class . ' active" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="3"><a href="'.get_permalink().'" itemprop="item" title="'.get_the_title().'"><span itemprop="' . $schema_name . '">' . get_the_title() . '</span></a></li>';

						 }elseif(!empty( $cat_id )){

							$html_output .= sprintf('<li class="' . $breadcrumb__item_class . '" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="3"><a href="%1$s" title="' . $cat_name . '" itemprop="' . $schema_item . ' ><span itemprop="' . $schema_name . '">%2$s</span></a>', $cat_link , $cat_name);

							$html_output .= '<li class="' . $breadcrumb__item_class . ' active" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="4"><span itemprop="' . $schema_name . '">' . get_the_title() . '</span></li>';
						 }else{

							$html_output .= '<li class="' . $breadcrumb__item_class . ' active" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="3"><span itemprop="' . $schema_name . '">' . get_the_title() . '</span></li>';
						 }
					}
				elseif ( is_category() ) :

					$html_output .= '<li class="' . $breadcrumb__item_class . ' active" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="2"><a href="'.get_category_link(get_cat_ID(single_cat_title( '', false ))).'" itemprop="item" title="'.single_cat_title( '', false ).'"><span itemprop="' . $schema_name . '">' . single_cat_title( '', false ) . '</span></a></li>';

				elseif ( is_page() ) :
					// Standard page
					if ( $post->post_parent ) {
						$anc = get_post_ancestors( $post->ID ); // If child page, get parents
						$anc = array_reverse($anc); // Get parents in the right order
						if ( !isset( $parents ) ) $parents = null; // Parent page loop
						foreach ( $anc as $ancestor ) {
	                    	$parents .= '<li class="' . $breadcrumb__item_class . '" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem">
	                                    <meta itemprop="position" content="2" />
	                                    <a itemprop="' . $schema_item . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '"><span itemprop="name">' . get_the_title($ancestor) . '</span></a></li>';
						}
						$html_output .= $parents;// Display parent pages
						$html_output .= '<li class="' . $breadcrumb__item_class . ' active" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="3"><span itemprop="' . $schema_name . '">' . get_the_title() . '</span></li>';
					}else{

						$html_output .= '<li class="' . $breadcrumb__item_class . ' active" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="2"><a href="' . get_permalink() . '" itemprop="' . $schema_item . '"><span itemprop="' . $schema_name . '">' . get_the_title() . '</span></a></li>';
					}
				elseif ( is_tag() ) :

					// Get tag information
		            $term_id        = get_query_var('tag_id');
		            $taxonomy       = 'post_tag';
		            $args           = 'include=' . $term_id;
		            $terms          = get_terms( $taxonomy, $args );
		            $get_term_id    = $terms[0]->term_id;
		            $get_term_slug  = $terms[0]->slug;
		            $get_term_name  = $terms[0]->name;

					$html_output .= '<li class="' . $breadcrumb__item_class . ' active" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="2"><span itemprop="' . $schema_name . '">' . $get_term_name  . '</span></li>';
				elseif ( is_author() ) :

					$user_id = get_query_var( 'author' );
					$userdata = get_the_author_meta( 'display_name', $user_id );

					$html_output .= '<li class="' . $breadcrumb__item_class . ' active" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="2"><span itemprop="' . $schema_name . '">' . sprintf( $text['author'], $userdata ) . '</span></li>';

				elseif ( get_query_var( 'paged' ) || get_query_var( 'page' ) ) :
					
					$html_output .= '<li class="' . $breadcrumb__item_class . ' active" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="2"><span itemprop="' . $schema_name . '">'. __('Page %s', 'qqlanding') . ' ' . get_query_var('paged')  . '</span></li>';

				elseif ( is_search() ) :

					$html_output .= '<li class="' . $breadcrumb__item_class . ' active" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="2"><span itemprop="' . $schema_name . '">'. $text['search'] . ' ' . get_search_query()  . '</span></li>';

				elseif ( is_404() ) :

					$html_output .= '<li class="' . $breadcrumb__item_class . ' active" itemprop="' . $schema_item_elem . '" itemscope itemtype="' . $schema_url . '/ListItem"><meta itemprop="position" content="2"><span itemprop="' . $schema_name . '">'. $text['404']  . '</span></li>';

				endif;

			$html_output		.= '</nav>';

		endif;

		echo $html_output;
	}
endif;


function qqlanding_preload_item(){

	if ( get_theme_mod( 'qqlanding_display_preloading_settings', false ) != false ) : ?>
	<div id="qqpreload">
		<div id="qqpreload_center">
			<?php
			$loader = get_theme_mod('qqlanding_loader_item_settings');
			$loader_item = ''; 
			switch ($loader) {
				case 'five': $loader_class = 'animate_five'; 
					$loader_item = '<div class="qqpreload_object" id="qqpreload_four"></div><div class="qqpreload_object" id="qqpreload_five"></div><div class="qqpreload_object" id="qqpreload_six"></div><div class="qqpreload_object" id="qqpreload_seven"></div><div class="qqpreload_object" id="qqpreload_eight"></div><div class="qqpreload_object" id="qqpreload_nine"></div>'; 
					break;
				case 'seven': $loader_class = 'animate_seven';
					$loader_item = '<div class="qqpreload_object" id="qqpreload_four"></div>'; 
					break;
				case 'eleven': $loader_class = 'animate_eleven';
					break;
				case 'sixteen': $loader_class = 'animate_sixteen';
					$loader_item = '<div class="qqpreload_object" id="qqpreload_four"></div>'; 
					break;
				case 'twenty': $loader_class = 'animate_twenty'; 
					$loader_item = '<div class="qqpreload_object" id="qqpreload_four"></div><div class="qqpreload_object" id="qqpreload_five"></div><div class="qqpreload_object" id="qqpreload_six"></div><div class="qqpreload_object" id="qqpreload_seven"></div><div class="qqpreload_object" id="qqpreload_eight"></div>'; 
					break;
				case 'twenty_four': $loader_class = 'animate_twenty_four'; 
					$loader_item = '<div class="qqpreload_object" ></div><div class="qqpreload_object" ></div><div class="qqpreload_object" ></div><div class="qqpreload_object" ></div><div class="qqpreload_object" ></div><div class="qqpreload_object" ></div><div class="qqpreload_object" ></div><div class="qqpreload_object" ></div>'; 
					break;
				default:
					$loader_class = 'animate_two';
					$loader_item = '<div class="qqpreload_object" id="qqpreload_four"></div><div class="qqpreload_object" id="qqpreload_five"></div><div class="qqpreload_object" id="qqpreload_six"></div><div class="qqpreload_object" id="qqpreload_seven"></div><div class="qqpreload_object" id="qqpreload_eight"></div><div class="qqpreload_object" id="qqpreload_big"></div>';
					break;
			} ?>
			<div id="qqpreload_center_absolute" class="<?php echo $loader_class; ?>">
				<div class="qqpreload_object" id="qqpreload_one"></div>
				<div class="qqpreload_object" id="qqpreload_two"></div>
				<div class="qqpreload_object" id="qqpreload_three"></div>
				<?php echo $loader_item; ?>
			</div>
		</div> 
	</div>
<?php endif;
}