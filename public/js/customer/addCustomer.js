
// check trung customer
$(".add_customer_input").blur(function(){
    var input_data = $(this).val();
    $.ajax({
        type:"POST",
        cache:false,
        dataType: "json",
        url: url_check_customer,
        data:{
            _token: $('meta[name=csrf-token]').attr('content'),
            key: input_data,
        },    // multiple data sent using ajax
        success: function (result) {
            if(result != 0){
                var url_detail = detail_url+'?id='+result[0];
                $('#btn_yes').show();
                $('#leave_detail').attr("href",url_detail);
                $('#text_notification').html('Có khách hàng đã sử dụng thông tin này !');
                $('#text_question').html('Chúng tôi sẽ chuyển hướng bạn đến chi tiết khách hàng đó. </br>Bạn có thể bỏ qua thông báo này để tiếp tục thêm như khách hàng mới.');
                $('#customer_modal').modal({backdrop: 'static', keyboard: false},'show');
            }
        }
    });
});


$('#btn_cancel').on('click',function(){
    $('#err_code').val(0);
});

    //select attr input
    $('.label_attr').on('click',function(){
        var a = $(this).attr("for");
        var id_attr = document.getElementById(a).value;
        var stt_attr = "";
        if(document.getElementById(a).checked) {
            stt_attr = "unselect_attr";
        } else {
            stt_attr = "select_attr";
        }
        var token = $('meta[name="csrf-token"]').attr('content')
        $.ajax({
            url : url_set_attr,
            type : "post",
            dataType:"JSON",
            data : {
                _token : token,
                id_attr : id_attr,
                stt_attr : stt_attr,
                add : 'add',
                column:'select',
            },
            success : function (result){
                if (result.status_attr == 'select_attr') {
                    $('#select_input_attr').append(result.html_input);
                }else{
                    $('div#'+result.input_id+'').remove();
                }
            }
        });

    });

    $('.icon_menu_attr').find('svg').on('click',function(){
        $('#popup_attr').addClass( "open" );
    });


    $('body').click(function(e){
        if (!$(e.target).closest("#popup_attr").length && !$(e.target).closest(".icon_menu_attr").length) {
            $('#popup_attr').removeClass( "open" );
        }
    });
    //end select attr input
        // load content comment
        var comment = $('#comment .comment_content');
        $(comment).each(function () {
            var type = $(this).data('type');
            var content = $(this).data('content');
            if (type == 1){
                $(this).find('p').html(content);
            }else{
                $(this).find('p').text(content);
            }
        });
        // end
        // add color tag
        var tag = $('#tag div.tag');
        $(tag).each(function () {
            var check = $(this).find('input').val();
            if(check == 1){
                var color = $(this).find('label').data('color');
                $(this).find('label').removeAttr('class').addClass(color);
            }
        });
        // end
       
        $(window).load(function(){
            $('#tag input[type="checkbox"]').each(function(e){
                if ($(this).is(':checked')) {
                    let idField = $(this).attr('id');
                    let labelForInput = 'label[for="'+idField +'"]';
                    let classChecked = $(labelForInput).data('color');
                    $(labelForInput).addClass(classChecked);
                }
            });

            $('#tag .tag label').not('.disable').click(function(){
                let inputID = $(this).attr('for');
                let classColor = $(this).data('color');
                console.log('ok');
                if (!$('#'+inputID).is(':checked')) {
                    $(this).attr('data-status',1);
                    $(this).css({'background':classColor,'color':'white'});
                }else {
                    $(this).attr('data-status', 0);
                    $(this).css({'background':'#e9e9e9','color':'gray'});
                }
            });
            $('body').on('click','#tag .tag label',function(){
                let inputID = $(this).attr('for');
                let classColor = $(this).data('color');
                if (!$('#'+inputID).is(':checked')) {
                    $(this).attr('data-status',1);
                    $(this).css({'background':classColor,'color':'white'});
                }else {
                    $(this).attr('data-status', 0);
                    $(this).css({'background':'#e9e9e9','color':'gray'});
                }
            })
        });

        $('#comment').on('click','#btn-edit' , function () {
            $(this).addClass('hidden');
            $(this).closest('.panel-body').find('#btn-tag').removeClass('hidden');
            var a = $(this).closest('.comment');
            var text = a.find('p.comment_content').text();
            let wraPPer = $(this).closest('.panel-body ');
            wraPPer.find('.comment_content').addClass('hidden');
            $(this).closest('.panel-body').find('.text_edit_comment').removeClass('hidden');
            $(this).closest('.panel-body').find('.btn_save_comment').removeClass('hidden');
            a.find('textarea.text_edit_comment').val(text);
        });
        $('.btn_save_comment').on('click',function () {
            var id = $(this).data('id');
            var text = $(this).closest('.comment_1').find('textarea.text_edit_comment').val();
            $('#id_comment').val(id);
            $('#txt_comment').val(text);
            $('#edit_comment').submit();
        });
$('.write_comment_content .show_status').click(function (e) {
    if (!$(e.target).closest("label.label").length) {
        $('.write_comment_content .group_status').fadeIn(200);
        $(this).css("transform", "rotate(90deg)");
        $(this).find('label.label').hide();
    }
    else{
        $(this).find('label').remove();
        $('input#tag_comment').val(0);
    }
});

$('#content').click(function(e) {
    if (!$(e.target).closest(".show_status").length && !$(e.target).closest(".group_status").length) {
        $('.write_comment_content .group_status').fadeOut(200);
        $('.write_comment_content .show_status').css("transform", "rotate(0deg)");
        $(this).find('label.label').show();
    }
});
$('.write_comment_content .group_status div.tag label').click(function () {
    $('.write_comment_content .show_status label').remove();
    $(this).clone().prependTo(".write_comment_content .show_status");
    $('.write_comment_content .show_status label').append(`
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 16 16" class="cancel">
                <path fill="#ffffff" fill-rule="nonzero" d="M16 1.617L14.383 0 8 6.383 1.617 0 0 1.617 6.383 8 0 14.383 1.617 16 8 9.617 14.383 16 16 14.383 9.617 8z"/>
            </svg>
        `);
    var id = $(this).data('id');
    $('input#tag_comment').val(id);

});





