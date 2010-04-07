<?php

/**
 * Function to be called upon plugin activation.
 *
 */
function wp_synhighlight_on_install() {
	//Creating options
	add_option('wp_synhighlight_process_comments', 1);
	add_option('wp_synhighlight_use_theme', 'wp-content/plugins/wp-synhighlight/themes/default');
	add_option('wp_synhighlight_disable_editarea', 0);
	add_option('wp_synhighlight_default_codeblock_title', _e('Source code', 'wp-synhighlighter'));
	add_option('wp_synhighlight_default_lines', 'default');
	add_option('wp_synhighlight_default_lines_start_with', "0");
	add_option('wp_synhighlight_default_container', 'default');
	add_option('wp_synhighlight_default_capitalize_keywords', 'default');
	add_option('wp_synhighlight_default_tab_width', '4');
	add_option('wp_synhighlight_default_strict_mode', 'default');
	add_option('wp_synhighlight_default_blockstate', 'default');
	add_option('wp_synhighlight_styling_type', 'theme');
}
?>