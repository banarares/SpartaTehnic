/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
CKEDITOR.stylesSet.add( 'my_styles', [
    // Block-level styles.
    { name: 'Blue Title', element: 'h1', styles: { color: '#3ea4f8' },  attributes: { 'class': 'targeted' } },
    { name: 'Black Title',  element: 'h1', styles: { color: '#000' } },

    // Inline styles.
    { name: 'Marker: Blue', element: 'span', styles: { 'color': '#3ea4f8' } },
    { name: 'Marker: Black', element: 'span', styles: { 'color': '#000' } },
    { name: 'Marker: White', element: 'span', styles: { 'color': '#fff' } }
]);
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

    // Toolbar configuration generated automatically by the editor based on config.toolbarGroups.
    config.toolbar = [
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Scayt' ] },
        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
        { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar',  '-', 'Audio', 'oembed'] },
        { name: 'tools', items: [ 'Maximize' ] },
        { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source' ] },
        { name: 'others', items: [ '-' ] },
        '/',
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
        { name: 'styles', items: [ 'Styles', 'Format' ] },
        { name: 'about', items: [ 'About' ] }
    ];

// Toolbar groups configuration.
    config.toolbarGroups = [
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
        { name: 'links' },
        { name: 'insert' },
        { name: 'forms' },
        { name: 'tools' },
        { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'others' },
        '/',
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
        { name: 'styles' },
        { name: 'colors' },
        { name: 'about' }
    ];
    /*config.filebrowserBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=flash';*/

    config.extraPlugins = 'popup';
    config.extraPlugins = 'filebrowser';
    config.extraPlugins = 'imagebrowser';

    //config.extraPlugins = 'audio';
    //config.extraPlugins = 'audio,youtube';
    config.extraPlugins = 'lineutils';
    config.extraPlugins = 'clipboard';
    config.extraPlugins = 'widget';
    config.extraPlugins = 'audio,oembed';

    //config.extraPlugins = 'audio';




    // For inline style definition.
    config.stylesSet = 'my_styles';

    config.allowedContent = true;

    config.filebrowserBrowseUrl = '/admin-1000/browse.php?type=files&source=ckeditor';
    config.filebrowserImageBrowseUrl = '/admin-1000/browse.php?type=images&source=ckeditor';
    config.filebrowserAudioBrowseUrl = '/admin-1000/browse.php?type=sounds&source=ckeditor';
        //config.filebrowserUploadUrl = '/uploader/upload.php',
        //config.filebrowserImageUploadUrl = '/uploader/upload.php?type=Images'

};
