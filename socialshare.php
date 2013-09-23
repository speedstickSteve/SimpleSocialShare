<?php
/*
	Plugin name: Simple Social Shares
	Author: Steve Vaughan
	Description: A plugin to show like buttons for Facebook, Twitter & Google+ with button counts too.
*/

$plugins_url = plugins_url();

wp_register_style( 'share-css', $plugins_url . '/socialshare/css/style.css','','', 'screen' );
wp_enqueue_style( 'share-css' );

add_action( 'wp_footer', 'add_social_scripts', 20 );
function add_social_scripts() {
	echo '<script src="' . get_home_url() . '/wp-content/plugins/socialshare/js/socialscripts.js"></script>';
}

if ( is_single() ) {
	add_action( 'the_content', 'add_social_buttons' );
	function add_social_buttons( $content ) {
		global $post;
		$content .=
		  '<div id="fb-root"></div>
			<div class="social-shares">
				<div class="share-box fb-share">
				<fb:like layout="button_count" width="450" show_faces="false" send="false"></fb:like>
				</div>
				<div class="share-box tw-share">
					<a href="https://twitter.com/share" class="twitter-share-button" data-dnt="true">Tweet</a>
				</div>
				<div class="share-box gplus-share">
					<div class="g-plusone" data-size="medium"></div>
				</div>
			</div>';
		return $content;
	}
}

add_shortcode( 'social_share', 'add_social_shortcode' );
function add_social_shortcode() {
	$content .=
	  '<div id="fb-root"></div>
		<div class="social-shares">
			<div class="share-box fb-share">
			<fb:like layout="button_count" width="450" show_faces="false" send="false"></fb:like>
			</div>
			<div class="share-box tw-share">
				<a href="https://twitter.com/share" class="twitter-share-button" data-dnt="true">Tweet</a>
			</div>
			<div class="share-box gplus-share">
				<div class="g-plusone" data-size="medium"></div>
			</div>
		</div>';
	return $content;
}
?>