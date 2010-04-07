<?php

/**
 * Function is called by wordpress to inject content to it
 */
function wp_synhighlight_head() {
	$wp_sh_use_theme = get_option('wp_synhighlight_use_theme');
	$themeDir = get_bloginfo("wpurl") . '/' . ($wp_sh_use_theme ? ($wp_sh_use_theme) : ('wp-content/plugins/wp-synhighlight/themes/default'));
	
	//Injecting CSS
	if (file_exists(TEMPLATEPATH . "/wp-synhighlighter.css")) {
		$css_url = get_bloginfo("template_url") . "/wp-synhighlighter.css";
	} else {
		$css_url = $themeDir . '/' . 'wp-synhighlighter.css';
	}
	echo "\n" . '<link rel="stylesheet" href="' . $css_url . '" type="text/css" media="screen" />' .
			 "\n";
		
		//Injecting JS
		$js_url = $themeDir . '/' . 'wp-synhighlighter.js';
		if (file_exists(TEMPLATEPATH . "/wp-synhighlighter.js")) {
			$js_url = get_bloginfo("template_url") . "/wp-synhighlighter.css";
		} else {
			$js_url = $themeDir . "/wp-synhighlighter.js";
		}
		echo "\n" . '<script src="' . $js_url . '"></script>' . "\n";
	}
	
	?>