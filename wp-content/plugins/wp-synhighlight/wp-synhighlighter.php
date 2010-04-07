<?php
/*
Plugin Name: WP-SynHighlight
Plugin URI: http://www.fractalizer.ru/freeware-projects/wordpress-plugins/wp-synhighlight/
Description: Source code Syntax highlighting plugin with full GUI support. Please see README.txt and screenshots for more information. I'd love to get feature sugesstions and bug reports to my email. <a href="options-general.php?page=wp-synhighlight/modules/settings.php">Plugin settings</a> | <a href="http://wordpress.org/tags/wp-synhighlight?forum_id=10">Support forum</a>
Version: 2.2.1
Author: Vladislav "FractalizeR" Rastrusny
Author URI: http://www.fractalizer.ru
*/

/*  Copyright 2008  Vladislav "FractalizeR" Rastrusny (email : FractalizeR@yandex.ru)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//Loading jQuery
wp_enqueue_script("jquery");

//Setting some vars
$wp_sh_use_theme = get_option('wp_synhighlight_use_theme');
$wp_sh_themeURL = get_bloginfo("wpurl") . '/' . ($wp_sh_use_theme ? ($wp_sh_use_theme) : ('wp-content/plugins/wp-synhighlight/themes/default'));

$wp_sh_styling_type = get_option("wp_synhighlight_styling_type");
$wp_sh_styling_type = $wp_sh_styling_type ? $wp_sh_styling_type : 'inline';

//Registering highlighter
require_once 'modules/highlighter.php';
add_shortcode('codesyntax', 'fr_codesyntax_handler');

//Registering post parser which inserts CSS styles into page depending on shortcodes
if ($wp_sh_styling_type == 'theme') {
	require_once 'modules/post_parser.php';
	add_filter('the_posts', 'wp_synhighlight_parse_posts');
}

//Making post-installation routines
require_once 'modules/on_install.php';
register_activation_hook(__FILE__, 'wp_synhighlight_on_install');

//Adding Geshi styles if needed
require_once 'modules/styles.php';
add_action('wp_head', 'wp_synhighlight_head');

//Loading localization
load_plugin_textdomain('wp-synhighlighter', str_replace(ABSPATH, '', dirname(__FILE__)), 
		dirname(plugin_basename(__FILE__)));

//Setting comments processing style
require_once 'modules/comments.php';
wp_synhighlighter_comments_setup();

//Loading editor plugin
require_once 'modules/richeditor.php';
add_action('init', 'wp_synhighlighter_addbuttons');

//Adding options page
add_action('admin_menu', 'wp_synhighlight_settings');

function wp_synhighlight_settings() {
	add_options_page('WP-SynHighlight Settings', 'WP-SynHighlight', 'activate_plugins', 
			dirname(__FILE__) . '/modules/settings.php');
}
?>
