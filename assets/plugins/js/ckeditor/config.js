/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	var link_url = $('base').attr('href');
    config.filebrowserImageBrowseUrl = link_url+'assets/plugins/js/ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl =link_url+'assets/plugins/js/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserBrowseUrl = link_url+'assets/plugins/js/ckfinder/ckfinder.html';
    config.filebrowserUploadUrl = link_url+'assets/plugins/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl =link_url+'assets/plugins/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl =link_url+'assets/plugins/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
