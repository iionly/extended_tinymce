<?php
/**
 * Extended TinyMCE - a wysiwyg editor
 *
 */

elgg_register_event_handler('init', 'system', 'extended_tinymce_init');

function extended_tinymce_init() {
	elgg_extend_view('elgg.css','extended_tinymce/extended_tinymce.css');
	elgg_extend_view('admin.css','extended_tinymce/extended_tinymce.css');

	elgg_define_js('extended_tinymce', [
		'src' => 'mod/extended_tinymce/vendor/tinymce/js/tinymce/jquery.tinymce.min.js',
		'deps' => ['jquery', 'elgg'],
	]);

	elgg_extend_view('input/longtext', 'extended_tinymce/init');

	// extend allowed styles for tinymce editor as filtered by htmlawed
	elgg_register_plugin_hook_handler('allowed_styles', 'htmlawed', 'extended_tinymce_allowed_styles');
	// textarea id
	elgg_register_plugin_hook_handler('view_vars', 'input/longtext', 'extended_tinymce_longtext_id');
}

function extended_tinymce_allowed_styles($hook, $type, $items, $vars) {
	$allowed_styles = [
		'color', 'cursor', 'text-align', 'vertical-align', 'font-size', 'font-family',
		'font-weight', 'font-style', 'border', 'border-top', 'border-color', 'background-color',
		'border-bottom', 'border-left', 'border-right',
		'margin', 'margin-top', 'margin-bottom', 'margin-left',
		'margin-right', 'padding', 'float', 'text-decoration', 'list-style-type'
	];

	return $allowed_styles;
}

function extended_tinymce_get_site_language() {
	if ($site_language = elgg_get_config('language')) {
		$path = elgg_get_plugins_path() . "extended_tinymce/vendor/tinymce/js/tinymce/langs";
		if (file_exists("$path/$site_language.js")) {
			return $site_language;
		}
	}

	return 'en';
}

function extended_tinymce_get_user_language() {
	$user_language = get_current_language();

	$path = elgg_get_plugins_path() . "extended_tinymce/vendor/tinymce/js/tinymce/langs";

	if (!file_exists("$path/$user_language.js")) {
		return extended_tinymce_get_site_language();
	}

	return $user_language;
}

/**
 * Set an id on input/longtext
 *
 * @param string $hook   'view_vars'
 * @param string $type   'input/longtext'
 * @param array  $vars   current return value
 * @param array  $params supplied params
 *
 * @return void|array
 */
function extended_tinymce_longtext_id($hook, $type, $vars, $params) {
	$id = elgg_extract('id', $vars);
	if ($id !== null) {
		return;
	}

	// input/longtext view vars need to contain an id for editors to be initialized
	// random id generator is the same as in input/longtext
	$vars['id'] = 'elgg-input-' . base_convert(mt_rand(), 10, 36);

	return $vars;
}
