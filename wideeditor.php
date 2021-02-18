<?php
/*
Plugin Name: Wide Editor (Gutenberg)
Plugin URI: https://stephanventer.com/wide-editor-gutenberg
Description: Plugin to widen the new WordPress post/page editor (Gutenberg) 
Version: 1.0
Author: Stephan
Author URI: https://stephanventer.com/
License: GPLv2 or later
Text Domain: wideeditor
*/

function admin_style_gb_editor_width() {
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

add_action('admin_head', 'admin_style_gb_editor_width');