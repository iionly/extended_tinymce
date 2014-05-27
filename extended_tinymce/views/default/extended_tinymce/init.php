<?php
/**
 * Initialize the TinyMCE script
 */
?>

<script>
$(document).ready(function(){
	$(".elgg-input-longtext").tinymce({
		script_url : elgg.config.wwwroot + '/mod/extended_tinymce/vendor/tinymce/js/tinymce/tinymce.min.js',
		selector: ".elgg-input-longtext",
		theme: "modern",
		skin : "lightgray",
		language : "<?php echo extended_tinymce_get_site_language(); ?>",
		relative_urls : false,
		remove_script_host : false,
		document_base_url : elgg.config.wwwroot,
		plugins: "advlist autolink charmap code emoticons fullscreen hr image insertdatetime link lists paste preview print searchreplace table textcolor wordcount",
		menubar: false,
		toolbar_items_size: "small",
		toolbar1: "newdocument preview fullscreen print | searchreplace | styleselect | fontselect | fontsizeselect",
		toolbar2: "undo redo | bullist numlist | outdent indent | bold italic underline | alignleft aligncenter alignright alignjustify",
		toolbar3: "inserttime | charmap | hr | table | forecolor backcolor | link unlink | image | emoticons | blockquote" + (elgg.is_admin_logged_in() ? " | code" : ""),
		width : "99%",
		browser_spellcheck : true,
		image_advtab: true,
		paste_data_images: false,
		insertdate_formats: ["%I:%M:%S %p", "%H:%M:%S", "%Y-%m-%d", "%d.%m.%Y"],
		content_css: elgg.config.wwwroot + 'mod/extended_tinymce/css/elgg_extended_tinymce.css'
	})
});
</script>
