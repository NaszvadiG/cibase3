$(function(){

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
    $('<div id="my-mediamanager" class="uk-modal"><div class="uk-modal-dialog uk-modal-dialog-large"><a class="uk-modal-close uk-close"></a><ul class="uk-tab" data-uk-tab> <li class="my-pictures uk-active"><a href="#">obrazki</a><div>content</div></li><li class="my-galleries"><a href="#">galerie</a></li></ul></div></div>').appendTo('body');

    var modal = UIkit.modal("#my-mediamanager");

    var progressbar = $("#progressbar"),
        bar = progressbar.find('.uk-progress-bar'),

        settings = {
            action: '/admin/ajax/add_picture', // upload url
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

                var content=tinymce.activeEditor.getContent();
                tinymce.activeEditor.setContent(content+'<p><img src="/images/'+response.file_name+'"/></p><p>tutaj pisz dalej</p>');
                modal.hide();
            }
        };

    var select = $.UIkit.uploadSelect($("#upload-select"), settings),
        drop   = $.UIkit.uploadDrop($("#upload-drop"), settings);

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


});
