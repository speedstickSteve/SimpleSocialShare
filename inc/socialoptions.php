<?php
add_action( 'admin_menu', 'socialshare_menu' );

function socialshare_menu() {
	add_options_page( 'Social Share Options', 'Social Share', 'manage_options', 'social-share-options', 'socialshare_options' );
}

function socialshare_option() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}

?>