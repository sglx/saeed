
/////img1///////////
$(document).on('click', '#close-preview', function(){
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
            $('.image-preview').popover('show');
        },
        function () {
            $('.image-preview').popover('hide');
        }
    );
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>پیش نمایش</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("بارگذاری");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function (){
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("تغییر");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
    });
});

///////////img2/////////////////
$(document).on('click', '#close-preview-2', function(){
    $('.image-preview-2').popover('hide');
    // Hover befor close the preview
    $('.image-preview-2').hover(
        function () {
            $('.image-preview-2').popover('show');
        },
        function () {
            $('.image-preview-2').popover('hide');
        }
    );
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview-2',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview-2').popover({
        trigger:'manual',
        html:true,
        title: "<strong>پیش نمایش</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear-2').click(function(){
        $('.image-preview-2').attr("data-content","").popover('hide');
        $('.image-preview-filename-2').val("");
        $('.image-preview-clear-2').hide();
        $('.image-preview-input-2 input:file').val("");
        $(".image-preview-input-title-2").text("بارگذاری");
    });
    // Create the preview image
    $(".image-preview-input-2 input:file").change(function (){
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title-2").text("تغییر");
            $(".image-preview-clear-2").show();
            $(".image-preview-filename-2").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview-2").attr("data-content",$(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
    });
});

///////////img3/////////////////
$(document).on('click', '#close-preview-3', function(){
    $('.image-preview-3').popover('hide');
    // Hover befor close the preview
    $('.image-preview-3').hover(
        function () {
            $('.image-preview-3').popover('show');
        },
        function () {
            $('.image-preview-3').popover('hide');
        }
    );
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview-3',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview-3').popover({
        trigger:'manual',
        html:true,
        title: "<strong>پیش نمایش</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear-3').click(function(){
        $('.image-preview-3').attr("data-content","").popover('hide');
        $('.image-preview-filename-3').val("");
        $('.image-preview-clear-3').hide();
        $('.image-preview-input-3 input:file').val("");
        $(".image-preview-input-title-3").text("بارگذاری");
    });
    // Create the preview image
    $(".image-preview-input-3 input:file").change(function (){
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title-3").text("تغییر");
            $(".image-preview-clear-3").show();
            $(".image-preview-filename-3").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview-3").attr("data-content",$(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
    });
});

///////////img4/////////////////
$(document).on('click', '#close-preview-4', function(){
    $('.image-preview-4').popover('hide');
    // Hover befor close the preview
    $('.image-preview-4').hover(
        function () {
            $('.image-preview-4').popover('show');
        },
        function () {
            $('.image-preview-4').popover('hide');
        }
    );
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview-4',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview-4').popover({
        trigger:'manual',
        html:true,
        title: "<strong>پیش نمایش</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear-4').click(function(){
        $('.image-preview-4').attr("data-content","").popover('hide');
        $('.image-preview-filename-4').val("");
        $('.image-preview-clear-4').hide();
        $('.image-preview-input-4 input:file').val("");
        $(".image-preview-input-title-4").text("بارگذاری");
    });
    // Create the preview image
    $(".image-preview-input-4 input:file").change(function (){
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title-4").text("تغییر");
            $(".image-preview-clear-4").show();
            $(".image-preview-filename-4").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview-4").attr("data-content",$(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
    });
});




$(document).ready(function(){

    $("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });

    $("[data-toggle=tooltip]").tooltip();
});


$(document).ready(function(){

   $(".show_img").click(function(){
       var id = $(this).data("id");
       $("#hidden_id").val(id);
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       $.ajax(
           {
               type : "GET",
               url: 'product/get_img'+'/'+ id,
               dataType: 'JSON',
               data: {
                   "id": id

               },
               success: function (data)
               {
                   if(data.img_defualt != null) {
                       $("#img_defualt").attr("src", "upload/photo/" + data.img_defualt);
                   }
                   else {
                       $("#img_defualt").attr("src", "upload/photo/noimage.png");

                   }
                   if(data.img1 != null) {
                       $("#img1").attr("src", "upload/photo/" + data.img1);
                   }
                   else {
                       $("#img1").attr("src", "upload/photo/noimage.png");

                   }
                   if(data.img2 != null) {
                       $("#img2").attr("src", "upload/photo/" + data.img2);
                   }
                   else {
                       $("#img2").attr("src", "upload/photo/noimage.png");

                   }
                   if(data.img3 != null) {
                       $("#img3").attr("src", "upload/photo/" + data.img3);
                   }
                   else {
                       $("#img3").attr("src", "upload/photo/noimage.png");

                   }
               }
           });

       $('#modal_picture').modal('show');

   });
});

$(document).ready(function(){
    $('.ui.dropdown')
        .dropdown({
            allowAdditions: false
        });

$(".remove_img").click(function(){
    var token = $('input[name="_token"]').val();
    var selected_column = $(this).data("id");
    var id = $("#hidden_id").val();
    $('#'+ selected_column).attr("src","upload/photo/noimage.png");
    console.log(selected_column);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax(
        {
            type : "POST",
            url: 'product/del_img',
            dataType: 'JSON',
            data: {
                "_token": token,
                "id": id,
                "column" : selected_column

            },
            success: function (data)
            {
                console.log(data);


            }
        });

    //$('#modal_picture').modal('show');

    });
});


$(document).ready(function () {
    $('#categories_id').treeselect();
    $('.upload-hidden').change(function(){
        var curElement = $(this).parent().parent().find('.image');
        console.log(curElement);
        var reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            curElement.attr('src', e.target.result);
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
});


$(function(){
    var $uploadCrop;

    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                });
            }

            reader.readAsDataURL(input.files[0]);
        }
        else {
            alert("Sorry - you're browser doesn't support the FileReader API");
        }
    }

    $uploadCrop = $('#upload-demo').croppie({
        viewport: {
            width: 500,
            height: 500,
        },
        boundary: {
            width: 800,
            height: 800
        }
    });

    $('#upload').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });

        }
        reader.readAsDataURL(this.files[0]);
    });





    $('.upload-result').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var pic_num = $('#pic').val();
            $.ajax({
                url: "/product/editor/upload",
                type: "POST",
                data: {
                    "image":resp,
                    "picnum":pic_num
                },
                success: function (data) {
                    html = '<img src="' + resp + '" />';
                    $("#result").html(html);
                }
            });
        });
    });
});



