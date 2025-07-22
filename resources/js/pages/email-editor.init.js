/*
Template Name: webadmin - Admin & Dashboard Template
Author:Muestraz
Website: https://Themesdesign.com/
Contact:Muestraz@gmail.com
File: Email summernote Js File
*/

ClassicEditor
    .create( document.querySelector( '#email-editor' ) )
    .then( function(editor) {
        editor.ui.view.editable.element.style.height = '200px';
    })
    .catch( function(error) {
        console.error( error );
    });