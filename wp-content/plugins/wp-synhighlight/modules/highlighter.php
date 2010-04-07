<?php
if (! class_exists('GeSHi')) {
	require_once (dirname(__FILE__) . '/../geshi/geshi.php');
}

//Attaching block_template.php from selected theme 
$wp_sh_use_theme = get_option('wp_synhighlight_use_theme');
$themeDir = ABSPATH . '/' . ($wp_sh_use_theme ? ($wp_sh_use_theme) : ('wp-content/plugins/wp-synhighlight/themes/default'));

require_once ($themeDir . '/block_template.php');

/**
 * Function handler for ShortCode [codesyntax]
 *
 * @param string $atts
 * @param string $content
 * @return string
 */
function fr_codesyntax_handler($atts, $content = null, $cleanHTML = true) {
	global $wp_sh_styling_type;
	if (empty($content)) {
		return ('<font color="red"><b>' . __(
				'WP-SYNHIGHLIGHT PLUGIN: NOTHING TO HIGHLIGHT! PLEASE READ README.TXT IN PLUGIN FOLDER!', 
				'wp-synhighlighter') . '</b></font>');
	}
	
	//Parsing paramters
	$params = shortcode_atts(
			array(
					'title' => get_option('wp_synhighlight_default_codeblock_title') ? get_option(
							'wp_synhighlight_default_codeblock_title') : __("Code block", 
							'wp-synhighlighter'), 'bookmarkname' => '', 'lang' => 'pascal', 
					'lines' => get_option('wp_synhighlight_default_lines') ? get_option(
							'wp_synhighlight_default_lines') : 'fancy', 
					'lines_start' => get_option('wp_synhighlight_default_lines_start_with') ? get_option(
							'wp_synhighlight_default_lines_start_with') : '1', 
					'container' => get_option('wp_synhighlight_default_container') ? get_option(
							'wp_synhighlight_default_container') : 'pre', 
					'capitalize' => get_option('wp_synhighlight_default_capitalize_keywords') ? get_option(
							'wp_synhighlight_default_capitalize_keywords') : 'no', 
					'tab_width' => get_option('wp_synhighlight_default_tab_width') ? get_option(
							'wp_synhighlight_default_tab_width') : 4, 
					'strict' => get_option('wp_synhighlight_default_strict_mode') ? get_option(
							'wp_synhighlight_default_strict_mode') : 'always', 
					'blockstate' => get_option('wp_synhighlight_default_blockstate') ? get_option(
							'wp_synhighlight_default_blockstate') : 'default', 
					'highlight_lines' => ""), $atts);
	
	if ($cleanHTML) {
		//Replacing allowed tags
		$find[] = '/<br\s*\\?>/i';
		$replace[] = "\r\n";
		
		//Replacing invalidly formatted quotes and other unicode tags
		$find[] = '/&#822(0|1|2);/';
		$replace[] = '"';
		
		$find[] = '/&#8243;/';
		$replace[] = '"';
		
		$find[] = '/&#8242;/';
		$replace[] = "'";
		
		$find[] = '/&#821(6|7);/';
		$replace[] = "'";
		
		$find[] = '/&#8211;/';
		$replace[] = "--";
		
		$find[] = '/&#8230;/';
		$replace[] = "...";
		
		$content = preg_replace($find, $replace, $content);
		
		//Clearing all other HTML code
		$content = strip_tags($content);
		
		//Converting HTML entities
		$content = html_entity_decode($content, ENT_QUOTES);
		
		//Trimming first and last incorrect newlines 
		$content = trim($content);
	}
	
	//Windows Live Writer patch
	foreach($params as &$param) {
		$param = trim(html_entity_decode($param, ENT_QUOTES), '"');
	}
	
	//Highlighting
	$geshi = new GeSHi($content, $params['lang']);
	if (($wp_sh_styling_type == 'theme') or ($wp_sh_styling_type == 'embedbody')) {
		$geshi->enable_classes();
	}
	
	//Setting Geshi options
	

	//Lines
	switch ($params['lines']) {
		case 'normal' :
			$geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
			break;
		case 'fancy' :
			$geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS);
			break;
		case 'no' :
			$geshi->enable_line_numbers(GESHI_NO_LINE_NUMBERS);
			break;
	}
	
	$geshi->start_line_numbers_at($params[lines_start]);
	
	//Container
	switch ($params['container']) {
		case 'pre' :
			$geshi->set_header_type(GESHI_HEADER_PRE);
			break;
		case 'div' :
			$geshi->set_header_type(GESHI_HEADER_DIV);
			break;
		case 'pre_valid' :
			$geshi->set_header_type(GESHI_HEADER_PRE_VALID);
			break;
		case 'pre_table' :
			$geshi->set_header_type(GESHI_HEADER_PRE_TABLE);
			break;
		case 'none' :
			$geshi->set_header_type(GESHI_HEADER_NONE);
			break;
	}
	
	//Keywords capitalization
	switch ($params['capitalize']) {
		case 'no' :
			$geshi->set_case_keywords(GESHI_CAPS_NO_CHANGE);
			break;
		case 'upper' :
			$geshi->set_case_keywords(GESHI_CAPS_UPPER);
			break;
		case 'lower' :
			$geshi->set_case_keywords(GESHI_CAPS_LOWER);
			break;
	
	}
	
	//Tab width
	$geshi->set_tab_width($params['tab_width']);
	
	//Strict mode
	switch ($params['strict']) {
		case 'always' :
			$geshi->enable_strict_mode(GESHI_ALWAYS);
			break;
		case 'maybe' :
			$geshi->enable_strict_mode(GESHI_MAYBE);
			break;
		case 'never' :
			$geshi->enable_strict_mode(GESHI_NEVER);
			break;
	}
	
	//Block state
	switch ($params['blockstate']) {
		case 'collapsed' :
			$initiallyHidden = true;
			break;
		case 'default' :
		case 'expanded' :
		default :
			$initiallyHidden = false;
			break;
	}
	
	static $instanceNumber = 0;
	$instanceNumber ++;
	$bookmarkName = (empty($params['bookmarkname']) ? ("codesyntax_" . $instanceNumber) : ($params['bookmarkname']));
	
	//Highlighting lines
	if (! empty($params['highlight_lines'])) {
		$geshi->highlight_lines_extra(explode(',', $params['highlight_lines']));
	}
	
	//Checking for geshi errors
	if ($geshi->error()) {
		return ('<font color="red"><b>' . $geshi->error() . '</b></font>');
	}
	
	//Styling codeblock
	$header = wp_synhighlight_get_tpl_header($instanceNumber, $params['title'], $bookmarkName, 
			$initiallyHidden);
	
	//Embedding only one copy of each used language style
	static $embeddedStylesheets = array();
	if ($wp_sh_styling_type == 'embedbody' and (! in_array($params['lang'], $embeddedStylesheets))) {
		$header = '<style type="text/css"><!--' . "\r\n" . $geshi->get_stylesheet() . "\r\n" . '-->' .
				 "\r\n" . '</style>' . $header;
		$embeddedStylesheets[] = $params['lang'];
	}
	
	$footer = wp_synhighlight_get_tpl_footer();
	
	$result = $header . $geshi->parse_code() . $footer;
	return ($result);
}
?>