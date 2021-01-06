$('.btn-edit').click(function () {
        var id = $(this).data('id');
        $('.modal-body').html("");
        $('#modal-segment .modal-body').load('edit?id='+id+'');
        $('#btn_segment').delay(5000).click();
    });

    $('.btn-addsegment').click(function(){
        $('.modal-body').html("");
        $('#modal-segment .modal-body').load('add');
        $('#btn_segment').delay(5000).click();
    });

    $('body').on('click','.add_from',function(){
        $('.list_from').fadeIn();
    });

    $(document).on('click', function (e) {
        if ($(e.target).closest(".add_from").length === 0 && $(e.target).closest(".list_from").length === 0) {
            $('.list_from').fadeOut();
        }
    });

    $('body').on('click','.from_label',function(){
        var text = $(this).html();
        var id_label = $(this).attr('for');
        if($('#'+id_label+'').is(":checked")){
            $('#label'+id_label+'').remove();
        }else{
            $( ".from_feild" ).append( `<label id='label`+id_label+`' class='label tag_label_default_2'>`+text+`</label>` );
        }
    });

    $(".segment_item").hover(function(){
        $(this).css({"background-color":"#f5f5f5","cursor": "pointer"});
        }, function(){
        $(this).css("background-color", "#fff");
    });
    $(".segment_item").on('click',function(e){
        var action = $(this).attr('url_action');
        if ($(e.target).closest(".btn-action").length === 0) {
            $(location).attr('href', action);
        }
    });