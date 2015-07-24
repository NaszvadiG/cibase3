$(function(){
    //get_html
    $.ajax(
        {
            url: '/admin/mediamanager/index',
    dataType: "html",
    success: function(data) {
        $('body').append(data);
        modal = UIkit.modal(".mediamanager__modal");
        prepareUpload();
        UIkit.grid('.mediamanager__grid', { gutter:20});
    },
    error: function(e) 
    {
        alert('Error: ' + e);
    }
        });

    //set array
    var selected = [];
    //get modal

    //click thumb and thumb--active
    $('body').on('click', '.mediamanager__thumb', function(){
        $( this ).addClass( "mediamanager__thumb--active" ).removeClass("mediamanager__thumb");
        var picId = $(this).data('id');
        selected.push(picId);
        console.log(selected);
    });
    $('body').on('click', '.mediamanager__thumb--active', function(){
        $( this ).addClass( "mediamanager__thumb" ).removeClass("mediamanager__thumb--active");
        var picId = $(this).data('id');
        selected.splice( $.inArray(picId, selected), 1 );
        console.log(selected);
    });

    //click insert
    $('body').on('click', '.mediamanager__insert-picture', function(){
        if(selected.length==0) {
            UIkit.notify('Nie zaznaczyłeś obrazków', 'warning');
        } else if (selected.length==1) {

            //make ajax call and insert one picture
            $.ajax(
                {
                    url: '/admin/mediamanager/insert_one',
                dataType: "html",
                type: "POST",
                data: {selected : selected},
                success: function(data) {
                    var ed = tinymce.activeEditor;
                    ed.execCommand( 'mceInsertContent', false, data );
                    //clear selected
                    selected = [];
                    $('.mediamanager__thumb--active').addClass('mediamanager__thumb').removeClass('mediamanager__thumb--active');
                    modal.hide();
                },
                error: function(e) 
            {
                alert('Error: ' + e);
            }
                });
        } else {
            //make ajax call and insert gallery
            $.ajax(
                    {
                        url: '/admin/mediamanager/insert',
                dataType: "html",
                type: "POST",
                data: {selected : selected},
                success: function(data) {
                    var ed = tinymce.activeEditor;
                    ed.execCommand( 'mceInsertContent', false, data );
                    //clear selected
                    selected = [];
                    $('.mediamanager__thumb--active').addClass('mediamanager__thumb').removeClass('mediamanager__thumb--active');
                    modal.hide();
                },
                error: function(e) 
            {
                alert('Error: ' + e);
            }
                    });

        }
    });

    function prepareUpload(){

var progressbar = $(".mediamanager__progress"),
    bar         = progressbar.find('.mediamanager__progress-bar'),
    settings    = {

        action: '/admin/mediamanager/upload', // upload url
        param : 'userfile',
        type : 'json',
        allow : '*.(jpg|jpeg|gif|png)', // allow only images

        loadstart: function() {
            bar.css("width", "0%").text("0%");
            progressbar.removeClass("uk-hidden");
        },

        progress: function(percent) {
            percent = Math.ceil(percent);
            bar.css("width", percent+"%").text(percent+"%");
        },

        error : function(response) {
                    UIkit.notify(response.error)
        },

        allcomplete: function(response) {

            bar.css("width", "100%").text("100%");

            setTimeout(function(){
                progressbar.addClass("uk-hidden");
                if (response.error) {
                    UIkit.notify(response.error)
                } else {
                    $('.mediamanager__grid').prepend(response.image); 
                }

            }, 250);

        }
    };

var select_image = UIkit.uploadSelect($(".mediamanager__upload-select"), settings),
    drop_image   = UIkit.uploadDrop($(".mediamanager__upload-drop"), settings);
    }

});
