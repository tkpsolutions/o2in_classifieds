/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', 'PasteCode', 'spellchecker', '-', 'Undo', 'Redo' ],

	
	if (window.innerWidth > 1000) //laptop or desktop screen
	{
	
			config.toolbar = [
			{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
			{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
			{ name: 'media', items: [ 'Image'] },
			{ name: 'container', items: [ 'btgrid'] },
			
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
			{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
			{ name: 'links', items: [ 'Link', 'Unlink' ] },
			{ name: 'insert', items: [ 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'PageBreak', 'Iframe' ] },
			
			{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize'] },
			{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
			{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
			{ name: 'others', items: [ '-' ] },
			{ name: 'about', items: [ 'About' ] }
		];
		
		// Toolbar groups configuration.
		config.toolbarGroups = [
			{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
			{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
			{ name: 'container' },
			{ name: 'forms' },
			'/',
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
			{ name: 'links' },
			{ name: 'insert' },
			'/',
			{ name: 'styles' },
			{ name: 'colors' },
			{ name: 'tools' },
			{ name: 'others' },
			{ name: 'about' }
		];
		
	}
	else //for mobile and tablet
	{
		config.toolbar = [
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
			{ name: 'media', items: [ 'Image'] },
			
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
			{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
			{ name: 'links', items: [ 'Link', 'Unlink' ] },
			
			{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize'] },
			{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
		];
		
		// Toolbar groups configuration.
		config.toolbarGroups = [
			{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
			{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
			{ name: 'container' },
			{ name: 'forms' },
			'/',
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
			{ name: 'links' },
			{ name: 'insert' },
			'/',
			{ name: 'styles' },
			{ name: 'colors' },
			{ name: 'tools' },
			{ name: 'others' },
			{ name: 'about' }
		];
	}


	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	
	config.removeButtons = '';
	config.removePlugins = 'youtube';

	// Set the most common block elements.
	//config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
	
	//config.extraPlugins = 'pastecode','clipboard','notification','toolbar','button','contextmenu','menu','floatpanel','panel','fakeobjects','slideshow';
	config.extraPlugins = 'pastecode,clipboard,notification,toolbar,button,contextmenu,menu,floatpanel,panel,fakeobjects,imagebrowser,basewidget';
	//config.toolbar = [{ name: 'CKAwesome', items: ['Image', 'ckawesome']}];
	//config.fontawesomePath = <?php echo $systemHostlink; ?> . 'cpanel/assets/font-aw/css/font-awesome.min.css';
	config.filebrowserImageBrowseUrl = "theme/kcfinder/browse.php?opener=ckeditor&type=images";
	config.filebrowserBrowseUrl = "theme/kcfinder/browse.php?opener=ckeditor&type=files";
	
	config.layoutmanager_loadbootstrap = "../theme/bs/css/bootstrap.min.css";
	config.layoutmanager_buttonboxWidth = 40;
	
};
