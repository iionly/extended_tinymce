<?php
/**
 * Initialize the TinyMCE script
 */

echo elgg_view_field([
	'#type' => 'hidden',
	'name' => 'extendedtinymcelang',
	'value' => extended_tinymce_get_user_language(),
]);

?>

<script>
	require(['jquery', 'elgg', 'extended_tinymce', 'elgg/embed'], function($, elgg, EXTENDED_TINYMCE, EMBED) {

		var tinymceLanguage = $('input:hidden[name=extendedtinymcelang]').val();

		function isiPadoriPhone() {
			return ((navigator.userAgent.match(/iPad/i) != null) || (navigator.platform.indexOf("iPhone") != -1) || (navigator.platform.indexOf("iPod") != -1));
		}

		$(".elgg-input-longtext").tinymce({
			script_url : elgg.config.wwwroot + 'mod/extended_tinymce/vendor/tinymce/js/tinymce/tinymce.min.js',
			selector: ".elgg-input-longtext",
			theme: "modern",
			skin : "lightgray",
			language : tinymceLanguage,
			relative_urls : false,
			remove_script_host : false,
			document_base_url : elgg.config.wwwroot,
			plugins: "advlist autolink autoresize charmap code colorpicker emoticons fullscreen hr image insertdatetime link lists paste preview print searchreplace table textcolor textpattern wordcount",
			menubar: false,
			toolbar_items_size: "small",
			toolbar: [
				"newdocument preview fullscreen print | undo redo | searchreplace | pastetext | styleselect | fontselect | fontsizeselect | bold italic underline | removeformat | bullist numlist | outdent indent | align | insertdatetime | charmap | hr | table | forecolor backcolor | link unlink | image | emoticons | blockquote" + (elgg.is_admin_logged_in() ? " | code" : "")
			],
			browser_spellcheck : true,
			image_advtab: true,
			paste_data_images: false,
			branding: false,
			autoresize_min_height: 200,
			autoresize_max_height: 450,
			insertdate_formats: ["%I:%M:%S %p", "%H:%M:%S", "%Y-%m-%d", "%d.%m.%Y"],
			content_css: elgg.config.wwwroot + 'mod/extended_tinymce/css/elgg_extended_tinymce.css',
			init_instance_callback: function(e) {
				elgg.register_hook_handler('embed', 'editor', function(hook, type, params, value) {
					if (e.id == params.textAreaId) {
						var content = params.content;
						try {
							e.insertContent(content);
							return false;
						} finally {
						}
					}
				});
			},
			setup: function(e) {
				e.on('SetContent', function(e) {
					tinymce.triggerSave();
					return true;
				});
				e.on('Blur', function(e) {
					tinymce.triggerSave();
					return true;
				});
				e.on('MouseOut', function(e) {
					if (isiPadoriPhone()) {
						tinymce.triggerSave();
					}
					return true;
				});
			}
		});
	});
</script>
