<?php
/*
Plugin Name: Stretch Block Editor
Plugin URI: https://stephanventer.com/stretch-block-editor
Description: Plugin to stretch the new block editor (Gutenberg) in WordPress 
Version: 1.0
Author: Stephan Venter
Author URI: https://stephanventer.com/
License: GPLv2 or later
Text Domain: stretchblockeditor
*/

function stretchblockeditor_set_editor_width() {
	
	$width = get_option( 'stretchblockeditor_width' );
	
    /** https://developer.wordpress.org/block-editor/developers/themes/theme-support/#changing-the-width-of-the-editor **/
	?>
	<style>
		/* Main column width */
		.wp-block {
			max-width: <?php echo $width?>px;
		}

		/* Width of "wide" blocks */
		.wp-block[data-align="wide"] {
			max-width: 1080px;
		}

		/* Width of "full-wide" blocks */
		.wp-block[data-align="full"] {
			max-width: none;
		}
	</style>
	<?php
}

add_action('admin_head', 'stretchblockeditor_set_editor_width');

#Register settings
function stretchblockeditor_register_settings() {
   	add_option( 'stretchblockeditor_width', '720');
   	register_setting( 'stretchblockeditor_options_group', 'stretchblockeditor_width', 'stretchblockeditor_callback' );
}
add_action( 'admin_init', 'stretchblockeditor_register_settings' );

#Create options page
function stretchblockeditor_register_options_page() {
  	add_options_page('Stretch Block Editor', 'Stretch Block Editor', 'manage_options', 'stretchblockeditor', 'stretchblockeditor_options_page');
}
add_action('admin_menu', 'stretchblockeditor_register_options_page');

function stretchblockeditor_options_page()
{
	?>
  	<div class="wrap">
		<h1>Stretch Block Editor Settings</h1>
		<br>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'stretchblockeditor_options_group' );
			?>
			<h2>Block Editor Width</h2>
			<p>Enter the width that you would like the block editor here.</p>
			<input class="small-text" type="text" id="stretchblockeditor_width" name="stretchblockeditor_width" value="<?php echo get_option('stretchblockeditor_width'); ?>" /><span> <b>px</b> (pixels)</span>
			<?php
			submit_button();
			?>
		</form>
  	</div>
	<?php
}
