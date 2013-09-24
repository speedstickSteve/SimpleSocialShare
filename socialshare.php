<?php
/*
	Plugin name: Simple Social Shares
	Author: Steve Vaughan
	Author URI: http://www.svcreative.co.uk
	Description: A plugin to show like buttons for Facebook, Twitter & Google+ with button counts too.
	Version: 1.01
*/

wp_register_style( 'share-css', plugins_url( 'css/style.css', __FILE__ ) ,'','', 'screen' );
wp_enqueue_style( 'share-css' );

add_action( 'wp_footer', 'add_social_scripts', 20 );
function add_social_scripts() {
	echo '<script src="' . plugins_url( 'js/socialscripts.js', __FILE__ ) . '"></script>';
}

add_shortcode( 'social_share', 'add_social_shortcode' );
function add_social_shortcode() {
	$content = '';
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

add_action( 'the_content', 'add_social_buttons' );
function add_social_buttons( $content ) {
	if ( is_single() ) {
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
	}
	return $content;
}
?>