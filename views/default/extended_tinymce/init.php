<?php
/**
 * Initialize the TinyMCE script
 */

elgg_require_js('jquery');
elgg_require_js('elgg');
elgg_require_js('extended_tinymce');
elgg_require_js('elgg/extended_tinymce_init');

if (elgg_in_context('ajax')) {
	$inline_code = <<<___JS
<script>
	require(['jquery', 'elgg', 'extended_tinymce', 'elgg/extended_tinymce_init'], function() {});
</script>
___JS;

	echo $inline_code;
}