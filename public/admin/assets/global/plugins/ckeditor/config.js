/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	config.uiColor = '#AADC6E';
 	config.filebrowserBrowseUrl = HOT + '/admin/assets/global/plugins/ckfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = HOT + '/admin/assets/global/plugins/ckfinder/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl = HOT + '/admin/assets/global/plugins/ckfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = HOT + '/admin/assets/global/plugins/ckfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = HOT + '/admin/assets/global/plugins/ckfinder/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl = HOT + '/admin/assets/global/plugins/ckfinder/upload.php?opener=ckeditor&type=flash';

   config.extraPlugins = 'filebrowser';

   config.extraPlugins = 'removeformat';

	config.extraPlugins = 'youtube';
	config.allowedContent = true;
	config.youtube_responsive = true;
	config.youtube_older = false;
	config.youtube_privacy = false;
	config.youtube_autoplay = false;
	config.youtube_controls = true;
   //config.youtube_disabled_fields = ['txtEmbed', 'chkAutoplay'];

   config.extraPlugins = 'lineheight';
};
