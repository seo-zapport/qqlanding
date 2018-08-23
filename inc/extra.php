<?php
/**
 * Display some functions that are somehow needed.
 *
 * @package QQLanding
 */


if (! function_exists( 'qqlanding_social_media' ) ) {
	function qqlanding_social_media(){
		if ( get_theme_mod( 'qqlanding_display_smedia_icon', false ) == true ) : ?>
				<ul id="social_media" class="float-md-right">
					<?php if ( get_theme_mod( 'facebook_url', '' ) ) : ?>
						<li><a href="<?php echo esc_url ( get_theme_mod( 'facebook_url', '' ) ) ?>" target="_blank"><i class=" fab fa-facebook-square"></i></a></li> <!--facebook-->
					<?php endif; ?>
					<?php if ( get_theme_mod( 'twitter_url', '' ) ) : ?>
						<li><a href="<?php echo esc_url ( get_theme_mod( 'twitter_url', '' ) ) ?>" target="_blank"><i class="fab fa-twitter-square"></i></a></li> <!--twitter-->
					<?php endif; ?>
					<?php if ( get_theme_mod( 'instagram_url', '' ) ) : ?>
						<li><a href="<?php echo esc_url ( get_theme_mod( 'instagram_url', '' ) ) ?>" target="_blank"><i class="fab fa-instagram"></i></a></li> <!--instagram-->
					<?php endif; ?>
					<?php if ( get_theme_mod( 'linkedin_url', '' ) ) : ?>
						<li><a href="<?php echo esc_url ( get_theme_mod( 'linkedin_url', '' ) ) ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li> <!--linkedin-->
					<?php endif; ?>
					<?php if ( get_theme_mod( 'youtube_url', '' ) ) : ?>
						<li><a href="<?php echo esc_url ( get_theme_mod( 'youtube_url', '' ) ) ?>" target="_blank"><i class="fab fa-youtube-square"></i></a></li> <!--youtube-->
					<?php endif; ?>
					<?php if ( get_theme_mod( 'googleplus_url', '' ) ) : ?>
						<li><a href="<?php echo esc_url ( get_theme_mod( 'googleplus_url', '' ) ) ?>" target="_blank"><i class="fab fa-google-plus-square"></i></a></li> <!--googleplus-->
					<?php endif; ?>
					<?php if ( get_theme_mod( 'pinterest_url', '' ) ) : ?>
						<li><a href="<?php echo esc_url ( get_theme_mod( 'pinterest_url', '' ) ) ?>" target="_blank"><i class="fab fa-pinterest-square"></i></a></li> <!--pinterest-->
					<?php endif; ?>
					<?php if ( get_theme_mod( 'rss_url', '' ) ) : ?>
						<li><a href="<?php echo esc_url ( get_theme_mod( 'rss_url', '' ) ) ?>" target="_blank"><i class="fas fa-rss-square"></i></a></li> <!--rss-->
					<?php endif; ?>
					<?php if ( get_theme_mod( 'flickr_url', '' ) ) : ?>
						<li><a href="<?php echo esc_url ( get_theme_mod( 'flickr_url', '' ) ) ?>" target="_blank"><i class="fab fa-flickr"></i></a></li> <!--flickr-->
					<?php endif; ?>
				</ul>
				<span class="clearfix"></span>
		<?php endif;
	}
}

