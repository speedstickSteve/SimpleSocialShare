<?php

if ( is_admin() ) {
	add_action( 'admin_menu', 'socialshare_menu' );
	add_action( 'admin_init', 'register_socialshare_settings' );
}

function register_socialshare_settings() {
	register_setting( 'socialshare_options_group', 'show_count' );
	register_setting( 'socialshare_options_group', 'show_facebook' );
	register_setting( 'socialshare_options_group', 'show_twitter' );
	register_setting( 'socialshare_options_group', 'show_google' );
	register_setting( 'socialshare_options_group', 'show_single' );
}

function socialshare_menu() {
	add_options_page( 'Social Share Options', 'Social Sharing', 'manage_options', 'social-share-options', 'socialshare_options' );
}

function socialshare_options() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2>Social Share Plugin Options</h2>

		<form method="post" action="options.php">
			<?php
			settings_fields( 'socialshare_options_group' );
			do_settings_fields( 'socialshare_options_group', '' );
			?>

			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row">
							<label>Share Stats:</label>
						</th>
						<td>
							<input type="checkbox" value="1" name="show_count" <?php checked( 1 == get_option( 'show_count' ) ); ?>></input>
							Show count boxes
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label>Social Networks:</label>
						</th>
						<td>
							<input type="checkbox" value="1" name="show_facebook" <?php checked( 1 == get_option( 'show_facebook' ) ); ?>></input>
							Facebook <br>
							<input type="checkbox" value="1" name="show_twitter" <?php checked( 1 == get_option( 'show_twitter' ) ); ?>></input>
							Twitter <br>
							<input type="checkbox" value="1" name="show_google" <?php checked( 1 == get_option( 'show_google' ) ); ?>></input>
							Google+ <br>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label>Display Locations:</label>
						</th>
						<td>
							<input type="checkbox" value="1" name="show_single" <?php checked( 1 == get_option( 'show_single' ) ); ?>></input>
							Show at the end of single posts
						</td>
					</tr>
				</tbody>
			</table>

			<?php submit_button(); ?>
		</form>
	</div>
	<?
}

?>