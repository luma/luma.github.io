<?php
/**
 * Function to control whether to process [codesyntax] bbcode in comments 
 *
 */
function wp_synhighlighter_comments_setup() {
	if(get_option('wp_synhighlight_process_comments')) {
		add_filter('comment_text', 'wp_synhighlighter_comments_filter');
		add_filter('comment_text', 'wp_synhighlighter_comments_anti_mangle', 1000);
	}
}

/**
 * Function that serves as a filter for comment text to process [codesyntax] bbcode
 *
 * @param string $content
 * @return string
 */
function wp_synhighlighter_comments_filter($content) {
	$regexp = '\[(codesyntax)\b(.*?)(?:(\/))?\](?:(.+?)\[\/\1\])?';
	$content = preg_replace_callback('/' . $regexp . '/s', 'wp_synhighlight_do_shortcode_tag', 
			$content);
	return ('<code>'.$content.'</code>');
}

/**
 * Function to process [codesyntax] tag in comments
 *
 * @param array $m
 * @return string
 */
function wp_synhighlight_do_shortcode_tag($m) {
	$attr = shortcode_parse_atts($m [2]);
	
	if(isset($m [4])) {
		// enclosing tag - extra parameter
		return fr_codesyntax_handler($attr, $m [4], false);
	} else {
		// self-closing tag
		return fr_codesyntax_handler($attr, NULL, false);
	}
}

/**
 * Function to unmangle comments (Wordpress likes to insert newlines where they are not needed at all)
 *
 * @param string $content
 * @return string
 */
function wp_synhighlighter_comments_anti_mangle($content) {
	return preg_replace_callback('#\s*(\<code.*?\>.*?\</code\>)\s*#si', 'wp_synhighlighter_comments_do_anti_mangle', $content);
}

/**
 * Function to remove unnecessary newlines from code
 *
 * @param string $data
 * @return string
 */
function wp_synhighlighter_comments_do_anti_mangle($data) {
	return preg_replace('/\r?\n/', '', $data[0]);
}
?>