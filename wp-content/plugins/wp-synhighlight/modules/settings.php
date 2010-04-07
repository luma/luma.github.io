<?php
//Processing option values


//Process comments
if (get_option('wp_synhighlight_process_comments')) {
	$o_wp_synhighlight_process_comments = 'checked="checked"';
} else {
	$o_wp_synhighlight_process_comments = '';
}

//Process comments
if (get_option('wp_synhighlight_disable_editarea')) {
	$o_wp_synhighlight_disable_editarea = 'checked="checked"';
} else {
	$o_wp_synhighlight_disable_editarea = '';
}

//Theme to use
$o_wp_sh_use_theme = (get_option('wp_synhighlight_use_theme') and (is_dir(
		get_option('wp_synhighlight_use_theme')))) ? (get_option('wp_synhighlight_use_theme')) : ('wp-content/plugins/wp-synhighlight/themes/default');

//Code block title
$o_wp_synhighlight_default_codeblock_title = get_option('wp_synhighlight_default_codeblock_title') ? (get_option(
		'wp_synhighlight_default_codeblock_title')) : (_e('Source code', 'wp-synhighlighter'));

//Line numbers
switch (get_option('wp_synhighlight_default_lines')) {
	case 'no' :
		$o_wp_sh_synhighlight_default_lines_default = '';
		$o_wp_sh_synhighlight_default_lines_no = 'selected="selected"';
		$o_wp_sh_synhighlight_default_lines_normal = '';
		$o_wp_sh_synhighlight_default_lines_fancy = '';
		break;
	
	case 'normal' :
		$o_wp_sh_synhighlight_default_lines_default = '';
		$o_wp_sh_synhighlight_default_lines_no = '';
		$o_wp_sh_synhighlight_default_lines_normal = 'selected="selected"';
		$o_wp_sh_synhighlight_default_lines_fancy = '';
		break;
	
	case 'fancy' :
		$o_wp_sh_synhighlight_default_lines_default = '';
		$o_wp_sh_synhighlight_default_lines_no = '';
		$o_wp_sh_synhighlight_default_lines_normal = '';
		$o_wp_sh_synhighlight_default_lines_fancy = 'selected="selected"';
		break;
	case false :
	case 'default' :
	default :
		$o_wp_sh_synhighlight_default_lines_default = 'selected="selected"';
		$o_wp_sh_synhighlight_default_lines_no = '';
		$o_wp_sh_synhighlight_default_lines_normal = '';
		$o_wp_sh_synhighlight_default_lines_fancy = '';
		break;

}

//Lines start with by default
$o_wp_sh_default_lines_start_with = get_option('wp_synhighlight_default_lines_start_with') ? (get_option(
		'wp_synhighlight_default_lines_start_with')) : ("0");

//Container
switch (get_option('wp_synhighlight_default_container')) {
	case 'none' :
		$o_wp_sh_default_container_default = '';
		$o_wp_sh_default_container_none = 'selected="selected"';
		$o_wp_sh_default_container_div = '';
		$o_wp_sh_default_container_pre = '';
		$o_wp_sh_default_container_prevalid = '';
		$o_wp_sh_default_container_pretable = '';
		break;
	case 'div' :
		$o_wp_sh_default_container_default = '';
		$o_wp_sh_default_container_none = '';
		$o_wp_sh_default_container_div = 'selected="selected"';
		$o_wp_sh_default_container_pre = '';
		$o_wp_sh_default_container_prevalid = '';
		$o_wp_sh_default_container_pretable = '';
		break;
	case 'pre' :
		$o_wp_sh_default_container_default = '';
		$o_wp_sh_default_container_none = '';
		$o_wp_sh_default_container_div = '';
		$o_wp_sh_default_container_pre = 'selected="selected"';
		$o_wp_sh_default_container_prevalid = '';
		$o_wp_sh_default_container_pretable = '';
		break;
	case 'pre_valid' :
		$o_wp_sh_default_container_default = '';
		$o_wp_sh_default_container_none = '';
		$o_wp_sh_default_container_div = '';
		$o_wp_sh_default_container_pre = '';
		$o_wp_sh_default_container_prevalid = 'selected="selected"';
		$o_wp_sh_default_container_pretable = '';
		break;
	case 'pre_table' :
		$o_wp_sh_default_container_default = '';
		$o_wp_sh_default_container_none = '';
		$o_wp_sh_default_container_div = '';
		$o_wp_sh_default_container_pre = '';
		$o_wp_sh_default_container_prevalid = '';
		$o_wp_sh_default_container_pretable = 'selected="selected"';
		break;
	case false :
	case 'default' :
	default :
		$o_wp_sh_default_container_default = 'selected="selected"';
		$o_wp_sh_default_container_none = '';
		$o_wp_sh_default_container_div = '';
		$o_wp_sh_default_container_pre = '';
		$o_wp_sh_default_container_prevalid = '';
		$o_wp_sh_default_container_pretable = '';
		break;
}

//Capitalize keywords by default
switch (get_option('wp_synhighlight_default_capitalize_keywords')) {
	case 'no' :
		$o_wp_sh_default_capitalize_keywords_default = 'selected="selected"';
		$o_wp_sh_default_capitalize_keywords_no = '';
		$o_wp_sh_default_capitalize_keywords_upper = '';
		$o_wp_sh_default_capitalize_keywords_lower = '';
		break;
	case 'upper' :
		$o_wp_sh_default_capitalize_keywords_default = '';
		$o_wp_sh_default_capitalize_keywords_no = '';
		$o_wp_sh_default_capitalize_keywords_upper = 'selected="selected"';
		$o_wp_sh_default_capitalize_keywords_lower = '';
		break;
	case 'lower' :
		$o_wp_sh_default_capitalize_keywords_default = '';
		$o_wp_sh_default_capitalize_keywords_no = '';
		$o_wp_sh_default_capitalize_keywords_upper = '';
		$o_wp_sh_default_capitalize_keywords_lower = 'selected="selected"';
		break;
	case false :
	case "default" :
	default :
		$o_wp_sh_default_capitalize_keywords_default = 'selected="selected"';
		$o_wp_sh_default_capitalize_keywords_no = '';
		$o_wp_sh_default_capitalize_keywords_upper = '';
		$o_wp_sh_default_capitalize_keywords_lower = '';
		break;
}
//Default tab width
$o_wp_sh_default_tab_width = get_option('wp_synhighlight_default_tab_width') ? (get_option(
		'wp_synhighlight_default_tab_width')) : ("4");

//Default strict mode
switch (get_option('wp_synhighlight_default_strict_mode')) {
	case 'always' :
		$o_wp_sh_default_strict_mode_default = '';
		$o_wp_sh_default_strict_mode_always = 'selected="selected"';
		$o_wp_sh_default_strict_mode_never = '';
		$o_wp_sh_default_strict_mode_maybe = '';
		break;
	case 'never' :
		$o_wp_sh_default_strict_mode_default = '';
		$o_wp_sh_default_strict_mode_always = '';
		$o_wp_sh_default_strict_mode_never = 'selected="selected"';
		$o_wp_sh_default_strict_mode_maybe = '';
		break;
	case 'maybe' :
		$o_wp_sh_default_strict_mode_default = '';
		$o_wp_sh_default_strict_mode_always = '';
		$o_wp_sh_default_strict_mode_never = '';
		$o_wp_sh_default_strict_mode_maybe = 'selected="selected"';
		break;
	case false :
	case "default" :
	default :
		$o_wp_sh_default_strict_mode_default = 'selected="selected"';
		$o_wp_sh_default_strict_mode_always = '';
		$o_wp_sh_default_strict_mode_never = '';
		$o_wp_sh_default_strict_mode_maybe = '';
		break;
}
//Default block state
switch (get_option('wp_synhighlight_default_blockstate')) {
	case 'expanded' :
		$o_wp_sh_default_blockstate_default = '';
		$o_wp_sh_default_blockstate_expanded = 'selected="selected"';
		$o_wp_sh_default_blockstate_collapsed = '';
		break;
	case 'collapsed' :
		$o_wp_sh_default_blockstate_default = '';
		$o_wp_sh_default_blockstate_expanded = '';
		$o_wp_sh_default_blockstate_collapsed = 'selected="selected"';
		break;
	case false :
	case 'default' :
	default :
		$o_wp_sh_default_blockstate_default = 'selected="selected"';
		$o_wp_sh_default_blockstate_expanded = '';
		$o_wp_sh_default_blockstate_collapsed = '';
		break;
}

//Styling type
switch (get_option("wp_synhighlight_styling_type")) {
	case 'embedbody' :
		$o_wp_sh_css_inline_styles = '';
		$o_wp_sh_css_theme_styles = '';
		$o_wp_sh_css_embedbody_styles = 'selected="selected"';
		break;
	case 'theme' :
		$o_wp_sh_css_inline_styles = '';
		$o_wp_sh_css_theme_styles = 'selected="selected"';
		$o_wp_sh_css_embedbodystyles = '';
		break;
	case false :
	case 'default' :
	default :
	case 'inline' :
		$o_wp_sh_css_inline_styles = 'selected="selected"';
		$o_wp_sh_css_theme_styles = '';
		$o_wp_sh_css_embedbody_styles = '';
		break;
}

//Lines start with by default
$o_wp_sh_override_css_height = get_option('wp_synhighlight_override_css_height') ? (get_option(
		'wp_synhighlight_override_css_height')) : ("0");

?>

<div class="wrap">
<h2>
    <?php
				_e('WP-SynHighlighter Settings', 'wp-synhighlighter');
				?>
  </h2>
<p align="center"><?php
_e(
		'If you like this plugin, you can make a donation with WebMoney (R704473788938, Z590997805426), Yandex.Money (41001122895969), MoneyBookers (FractalizeR@yandex.ru) or just send a special donation SMS directly <a href="http://www.fractalizer.ru" target="_blank">from my website</a> (just click that read SMS Donate button and follow instructions)', 
		'wp-synhighlighter');
?></p>
<form method="post" action="options.php">
    <?php
				wp_nonce_field('update-options');
				?>
    <table class="form-table">
	<tr valign="top">
		<th valign="middle" scope="row"><?php
		_e('Enable code highlighting in comments', 'wp-synhighlighter');
		?></th>
		<td valign="middle"><label> <input
			name="wp_synhighlight_process_comments" type="checkbox"
			id="wp_synhighlight_process_comments" value="1"
			<?php
			echo $o_wp_synhighlight_process_comments;
			?> /> </label></td>
	</tr>
	<tr valign="top">
		<th valign="middle" scope="row"><?php
		_e('Disable EditArea (realtime code highlighting in GUI)', 'wp-synhighlighter');
		?></th>
		<td valign="middle"><label> <input
			name="wp_synhighlight_disable_editarea" type="checkbox"
			id="wp_synhighlight_disable_editarea" value="1"
			<?php
			echo $o_wp_synhighlight_disable_editarea;
			?> /> </label></td>
	</tr>
	<tr valign="top">
		<th valign="middle" scope="row"><?php
		_e('Use this theme folder', 'wp-synhighlighter');
		?></th>
		<td valign="middle"><label
			title="<?php
			_e('The theme folder to use for block styling', 'wp-synhighlighter');
			?>"> <input name="wp_synhighlight_use_theme" type="text"
			id="wp_synhighlight_use_theme" size=80
			value="<?php
			echo $o_wp_sh_use_theme;
			?>" /> </label></td>
	</tr>
	<tr valign="top">
		<th valign="middle" scope="row">&nbsp;</th>
		<td valign="middle">&nbsp;</td>
	</tr>
	<tr valign="top">
		<th valign="middle" scope="row"><?php
		_e('Default code block title', 'wp-synhighlighter');
		?></th>
		<td valign="middle"><input type="text"
			name="wp_synhighlight_default_codeblock_title"
			id="wp_synhighlight_default_codeblock_title"
			value="<?php
			echo $o_wp_synhighlight_default_codeblock_title;
			?>" /></td>
	</tr>
	<tr valign="top">
		<th valign="middle" scope="row"><?php
		_e('Default line numbering style', 'wp-synhighlighter');
		?></th>
		<td valign="middle"><select name="wp_synhighlight_default_lines"
			id="wp_synhighlight_default_lines">
			<option value="default"
				<?php
				echo $o_wp_sh_synhighlight_default_lines_default;
				?>>
            <?php
												_e('Geshi default', 'wp-synhighlighter');
												?>
            </option>
			<option value="no"
				<?php
				echo $o_wp_sh_synhighlight_default_lines_no;
				?>>
            <?php
												_e('no', 'wp-synhighlighter');
												?>
            </option>
			<option value="normal"
				<?php
				echo $o_wp_sh_synhighlight_default_lines_normal;
				?>>
            <?php
												_e('normal', 'wp-synhighlighter');
												?>
            </option>
			<option value="fancy"
				<?php
				echo $o_wp_sh_synhighlight_default_lines_fancy;
				?>>
            <?php
												_e('fancy', 'wp-synhighlighter');
												?>
            </option>
		</select></td>
	</tr>
	<tr valign="top">
		<th valign="middle" scope="row"><?php
		_e('Line numbers by default start with', 'wp-synhighlighter');
		?></th>
		<td valign="middle"><input type="text"
			name="wp_synhighlight_default_lines_start_with"
			id="wp_synhighlight_default_lines_start_with"
			value="<?php
			echo $o_wp_sh_default_lines_start_with;
			?>" /></td>
	</tr>
	<tr valign="top">
		<th valign="middle" scope="row"><?php
		_e('Default container', 'wp-synhighlighter');
		?></th>
		<td valign="middle"><select name="wp_synhighlight_default_container"
			id="wp_synhighlight_default_container">
			<option value="default"
				<?php
				echo $o_wp_sh_default_container_default;
				?>>
            <?php
												_e('Geshi default', 'wp-synhighlighter');
												?>
            </option>
			<option value="none"
				<?php
				echo $o_wp_sh_default_container_none;
				?>>
            <?php
												_e('none', 'wp-synhighlighter');
												?>
            </option>
			<option value="div"
				<?php
				echo $o_wp_sh_default_container_div;
				?>>
            <?php
												_e('DIV tag', 'wp-synhighlighter');
												?>
            </option>
			<option value="pre"
				<?php
				echo $o_wp_sh_default_container_pre;
				?>>
            <?php
												_e('PRE tag', 'wp-synhighlighter');
												?>
            </option>
			<option value="pre_valid"
				<?php
				echo $o_wp_sh_default_container_prevalid;
				?>>
            <?php
												_e('valid PRE tag', 'wp-synhighlighter');
												?>
            </option>
			<option value="pre_table"
				<?php
				echo $o_wp_sh_default_container_pretable;
				?>>
            <?php
												_e('PRE and TABLE', 'wp-synhighlighter');
												?>
            </option>
		</select></td>
	</tr>
	<tr valign="top">
		<th valign="middle" scope="row"><?php
		_e('Change case of keywords by default', 'wp-synhighlighter');
		?></th>
		<td valign="middle"><select
			name="wp_synhighlight_default_capitalize_keywords"
			id="wp_synhighlight_default_capitalize_keywords">
			<option value="default"
				<?php
				echo $o_wp_sh_default_capitalize_keywords_default;
				?>>
            <?php
												_e('Geshi default', 'wp-synhighlighter');
												?>
            </option>
			<option value="no"
				<?php
				echo $o_wp_sh_default_capitalize_keywords_no;
				?>>
            <?php
												_e('no', 'wp-synhighlighter');
												?>
            </option>
			<option value="upper"
				<?php
				echo $o_wp_sh_default_capitalize_keywords_upper;
				?>>
            <?php
												_e('convert to uppercase', 
														'wp-synhighlighter');
												?>
            </option>
			<option value="lower"
				<?php
				echo $o_wp_sh_default_capitalize_keywords_lower;
				?>>
            <?php
												_e('convert to lowercase', 
														'wp-synhighlighter');
												?>
            </option>
		</select></td>
	</tr>
	<tr valign="top">
		<th valign="middle" scope="row"><?php
		_e('Default tab width', 'wp-synhighlighter');
		?></th>
		<td valign="middle"><input type="text"
			name="wp_synhighlight_default_tab_width"
			id="wp_synhighlight_default_tab_width"
			value="<?php
			echo $o_wp_sh_default_tab_width;
			?>" /></td>
	</tr>
	<tr valign="top">
		<th valign="middle" scope="row"><?php
		_e('Strict mode by default', 'wp-synhighlighter');
		?></th>
		<td valign="middle"><select name="wp_synhighlight_default_strict_mode"
			id="wp_synhighlight_default_strict_mode">
			<option value="default"
				<?php
				echo $o_wp_sh_default_strict_mode_default;
				?>>
            <?php
												_e('Geshi default', 'wp-synhighlighter');
												?>
            </option>
			<option value="always"
				<?php
				echo $o_wp_sh_default_strict_mode_always;
				?>>
            <?php
												_e('always', 'wp-synhighlighter');
												?>
            </option>
			<option value="never"
				<?php
				echo $o_wp_sh_default_strict_mode_never;
				?>>
            <?php
												_e('never', 'wp-synhighlighter');
												?>
            </option>
			<option value="maybe"
				<?php
				echo $o_wp_sh_default_strict_mode_maybe;
				?>>
            <?php
												_e('maybe', 'wp-synhighlighter');
												?>
            </option>
		</select></td>
	</tr>
	<tr valign="top">
		<th valign="middle" scope="row"><?php
		_e('Default block state', 'wp-synhighlighter');
		?></th>
		<td valign="middle"><select name="wp_synhighlight_default_blockstate"
			id="wp_synhighlight_default_blockstate">
			<option value="default"
				<?php
				echo $o_wp_sh_default_blockstate_default;
				?>>
            <?php
												_e('default', 'wp-synhighlighter');
												?>
            </option>
			<option value="expanded"
				<?php
				echo $o_wp_sh_default_blockstate_expanded;
				?>>
            <?php
												_e('expanded', 'wp-synhighlighter');
												?>
            </option>
			<option value="collapsed"
				<?php
				echo $o_wp_sh_default_blockstate_collapsed;
				?>>
            <?php
												_e('collapsed', 'wp-synhighlighter');
												?>
            </option>
		</select></td>
	</tr>
	<tr valign="top">
		<th valign="middle" scope="row"><?php
		_e('Styling type', 'wp-synhighlighter');
		?></th>
		<td valign="middle"><select name="wp_synhighlight_styling_type"
			id="wp_synhighlight_styling_type">
			<option value="inline"
				<?php
				echo $o_wp_sh_css_inline_styles;
				?>>
            <?php
												_e('use inline styles', 
														'wp-synhighlighter');
												?>
            </option>
			<option value="theme"
				<?php
				echo $o_wp_sh_css_theme_styles;
				?>>
            <?php
												_e('use theme bundled css files', 
														'wp-synhighlighter');
												?>
            </option>
			<option value="embedbody"
				<?php
				echo $o_wp_sh_css_embedbody_styles;
				?>>
            <?php
												_e(
														'embed styles into BODY (makes HTML invalid, browser-slow; see docs)', 
														'wp-synhighlighter');
												?>
            </option>
		</select></td>
	</tr>
	<tr valign="top">
		<th valign="middle" scope="row"><?php
		_e('Code box height in pixels. 0 = use value from CSS', 'wp-synhighlighter');
		?></th>
		<td valign="middle"><label
			title="<?php
			_e('Code box height in pixels. 0 = use value from CSS', 'wp-synhighlighter');
			?>"> <input name="wp_synhighlight_override_css_height" type="text"
			id="wp_synhighlight_override_css_height" size=80
			value="<?php
			echo $o_wp_sh_override_css_height;
			?>" /> </label></td>
	</tr>

</table>
<input type="hidden" name="action" value="update" /> <input
	type="hidden" name="page_options"
	value="wp_synhighlight_maxlines_wo_scrollbar,wp_synhighlight_process_comments,wp_synhighlight_use_theme,wp_synhighlight_default_codeblock_title,wp_synhighlight_default_lines,wp_synhighlight_default_lines_start_with,wp_synhighlight_default_container,wp_synhighlight_default_capitalize_keywords,wp_synhighlight_default_tab_width,wp_synhighlight_default_strict_mode,wp_synhighlight_default_blockstate,wp_synhighlight_disable_editarea,wp_synhighlight_styling_type,wp_synhighlight_override_css_height" />
<p class="submit"><input type="submit" name="Submit"
	value="<?php
	_e('Save Changes')?>" /></p>
</form>
</div>
