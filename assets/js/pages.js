(function($,UIkit,tinymce){
    'use strict';

    //tinymce
    tinymce.init({
        language : 'pl',
        language_url : '/assets/js/pl.js',
        convert_urls: false,
        selector: "textarea",
        plugins: [
        "advlist autolink lists link image charmap print preview anchor textcolor colorpicker",
        "searchreplace code fullscreen  wordcount",
        "insertdatetime media table contextmenu paste"
        ],
        image_advtab : true,
        menubar : false,
        statusbar : true,
        toolbar: "undo redo | styleselect | bold italic  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media code | forecolor backcolor",
    });

    

})(jQuery,UIkit,tinymce);
