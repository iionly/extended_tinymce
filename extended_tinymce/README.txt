Elgg Extended Tinymce plugin for Elgg 1.9
Latest Version: 4.0.21 r35
Released: 2014-04-02
Contact: iionly@gmx.de
License: GNU General Public License version 2
Copyright: (c) iionly 2012-2014, (C) Curverider 2008-2014

The TinyMCE editor is licensed under
GNU Lesser General Public License version 2.1
(c) 2003-2014 Moxiecode Systems AB.
Website: http://www.tinymce.com/



An extended tinymce plugin based on the jquery version 4.0.21 of the TinyMCE editor. This release of the Extended Tinymce plugin is for Elgg 1.9 only.

For backward compatibility with version 3 of the editor the folder extended_tinymce/vendor/tinymce/jscripts/tiny_mce/plugins/emotions/img contains the emoticons images at the location where they were available before.


Instructions:

(0.) If you have a previous version of the Extended Tinymce plugin installed, disable it and then remove the extended_tinymce from your mod directory before copying the new version on the server,

1. Copy/extract the extended_tinymce archive into the mod folder,

2. Disable the Elgg core ckeditor plugin,

3. Enable the extended_tinymce plugin.



Creating your own custom skin:

1. Configure your custom skin at http://skin.tinymce.com/ and download it,

2. Copy your skin folder into the extended_tinymce/vendor/tinymce/js/tinymce/skins directory,

3. Change the skin name of the skin option in extended_tinymce/views/default/js/extended_tinymce.php to the name of your skin.



Adding a language for the tinymce editor (not to be mixed up with adding an Elgg language file for the plugin):

1. Download the language pack from http://www.tinymce.com/i18n/index.php?ctrl=lang&act=download,

2. Extract the language files from the zip file,

3. Copy the language files into the  mod/extended_tinymce/vendor/tinymce/js/tinymce/langs/ directory,

4. Flush the Elgg caches via the admin dashboard on your site.
