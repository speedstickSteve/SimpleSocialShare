<?php
/*
	Plugin name: Simple Social Shares
	Author: Steve Vaughan
	Author URI: http://www.svcreative.co.uk
	Description: A plugin to show like buttons for Facebook, Twitter & Google+ with button counts too.
	Version: 1.01
*/

include 'inc/socialoptions.php';

//wp_register_style( 'share-css', plugins_url( 'css/style.css', __FILE__ ) ,'','', 'screen' );
//wp_enqueue_style( 'share-css' );

add_action( 'wp_footer', 'add_social_scripts', 20 );
function add_social_scripts() {
	echo '<script src="' . plugins_url( 'js/socialscripts.js', __FILE__ ) . '"></script>';
}

add_action( 'wp_head', 'add_social_styles' );
function add_social_styles() {
	echo '<link rel="stylesheet" href="' . plugins_url( 'css/style.css', __FILE__ ) . '" />';
}

function grab_facebook() {
	$count = get_option( 'show_count' );
	$class = '';
	if ( $count == 1 ) {
		$layout = 'button_count';
	} 
	else {
		$layout = 'standard';
		$class = 'fb-no-count';
	}
	$markup = '';
	$markup .=
   '<div class="share-box fb-share ' . $class . '">
		<fb:like layout="' . $layout . '" show_faces="false" send="false"></fb:like>
	</div>';
	return $markup;
}

function grab_twitter() {
	$count = get_option( 'show_count' );
	$class = '';
	if ( $count == 1 ) {
		$layout = '';
	}
	else {
		$layout = 'data-count="none"';
		$class = 'no-count';
	}
	$markup = '';
	$markup .=
   '<div class="share-box tw-share ' . $class . '">
		<a href="https://twitter.com/share" class="twitter-share-button" ' . $layout . '></a>
	</div>';
	return $markup;
}

function grab_google() {
	$count = get_option( 'show_count' );
	$class = '';
	if ( $count == 1 ) {
		$layout = '';
	}
	else {
		$layout = 'data-annotation="none"';
		$class = 'no-count';
	}
	$markup = '';
	$markup .=
   '<div class="share-box gplus-share ' . $class . '">
		<div class="g-plusone" data-size="medium" ' . $layout . '></div>
	</div>';
	return $markup;
}

add_shortcode( 'social_share', 'add_social_shortcode' );
function add_social_shortcode() {
	$content = '';
	$content .= '<div id="fb-root"></div><div class="social-shares">';
	if ( get_option( 'show_facebook' ) == 1 ) {
		$content .= grab_facebook();
	}
	if ( get_option( 'show_twitter' ) == 1 ) {
		$content .= grab_twitter();
	}
	if ( get_option( 'show_google' ) == 1 ) {
		$content .= grab_google();
	}
	$content .=	'</div>';
	return $content;
}

if ( get_option( 'show_single' ) == 1 ) {
	add_action( 'the_content', 'add_social_buttons' );
	function add_social_buttons( $content ) {
		if ( is_single() ) {
			$content .= '<div id="fb-root"></div><div class="social-shares">';
			if ( get_option( 'show_facebook' ) == 1 ) {
				$content .= grab_facebook();
			}
			if ( get_option( 'show_twitter' ) == 1 ) {
				$content .= grab_twitter();
			}
			if ( get_option( 'show_google' ) == 1 ) {
				$content .= grab_google();
			}
			$content .=	'</div>';
			return $content;
		}
		return $content;
	}
}
?>