<?php
/*
Plugin Name: Stretch Block Editor (Gutenberg)
Plugin URI: https://stephanventer.com/stretch-block-editor-gutenberg
Description: Plugin to stretch the new block editor (Gutenberg) in WordPress 
Version: 1.0
Author: Stephan Venter
Author URI: https://stephanventer.com/
License: GPLv2 or later
Text Domain: stretchblockeditor
*/

function admin_style_editor_width() {
    /** https://developer.wordpress.org/block-editor/developers/themes/theme-support/#changing-the-width-of-the-editor **/
	echo '
        <style>
			/* Main column width */
			.wp-block {
				/*max-width: 720px;*/
				max-width: 800px;
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
    ';
}

add_action('admin_head', 'admin_style_editor_width');