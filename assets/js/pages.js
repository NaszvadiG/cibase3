(function($,UIkit,tinymce){
    'use strict';

    //datatables
    var tables = $('.uk-table');
    if (tables.length>0) {
        $('.uk-table').DataTable({
            "language": { "url": "http://cdn.datatables.net/plug-ins/1.10.6/i18n/Polish.json" }
        });
    };

    //tinymce
    tinymce.init({
        language : 'pl',
        language_url : '/assets/js/pl.js',
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

    //my picture uploader
    //1 - create button
    var myButton=$('<div class="uk-form-row"><a href="#my-mediamanager" class="uk-button uk-button-success" data-uk-modal>DODAJ MEDIA</a></div>').insertAfter('div.uk-form-row:has(input[name=desc])');

    //2 - create modal
    $('<div id="my-mediamanager" class="uk-modal"><div class="uk-modal-dialog uk-modal-dialog-large"><a class="uk-modal-close uk-close"></a>' +
            '<div id="upload-drop" class="uk-placeholder uk-margin-top"> możesz tutaj wrzucić obrazek... <a class="uk-form-file">Select a file<input id="upload-select" type="file"></a>.  </div><div id="progressbar" class="uk-progress uk-hidden"> <div class="uk-progress-bar" style="width: 0%;">...</div> </div>'+
            '<ul class="uk-tab" data-uk-switcher="{connect:\'#my-media\'}"> <li><a href="#">obrazki</a></li> <li><a href="#">galerie</a></li> </ul><ul id="my-media" class="uk-switcher"> <li class="my-pictures">obrazki</li> <li class="my-galleries">galerie</li> </ul>'+
            '</div></div>').appendTo('body');

    //insert into my-pictures
    var pictures = {
  html: function() {
    return $.getJSON('/admin/pictures/get_pictures').then(function(data) {
      return data.text;
    });
  }
};
    pictures.html().done(function(html) {
      $(".my-pictures").append(html);
    }).fail(function(){alert('something went wrong');});

    var modal = UIkit.modal("#my-mediamanager");


    var progressbar = $("#progressbar"),
        bar = progressbar.find('.uk-progress-bar'),

        settings = {
            action: '/admin/pictures/add_ajax', // upload url
            param: 'userfile',
            type: 'json',
            allow : '*.(jpg|gif|png)', // allow only images

            loadstart: function() {
                bar.css("width", "0%").text("0%");
                progressbar.removeClass("uk-hidden");
            },
            progress: function(percent) {
                percent = Math.ceil(percent);
                bar.css("width", percent+"%").text(percent+"%");
            },
            allcomplete: function(response) {
                bar.css("width", "100%").text("100%");
                setTimeout(function(){
                    progressbar.addClass("uk-hidden");
                }, 250);

                //get all images and put into pictures again

                var content=tinymce.activeEditor.getContent();
                tinymce.activeEditor.setContent(content+'<p><img src="/images/'+response.file_name+'"/></p><p>tutaj pisz dalej</p>');
            }
        };

    var select = $.UIkit.uploadSelect($("#upload-select"), settings),
        drop   = $.UIkit.uploadDrop($("#upload-drop"), settings);

    //media gallery insert - TODO
    $('#my-mediamanager-insert-gallery').on('click',function(e){
        e.preventDefault();
        var gallery_id=$('select').val();
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "/admin/ajax/insert_gallery",
            data: "gallery_id="+gallery_id,
            dataType: "json",
            cache: false,
            success: function(response){

                var content=tinymce.activeEditor.getContent();

                tinymce.activeEditor.setContent(content+response.gallery+'<p>tutaj pisz dalej</p>');
                modal.hide();

            },
            error: function(msg){
                alert(msg);
            }
        });
    });


})(jQuery,UIkit,tinymce);
