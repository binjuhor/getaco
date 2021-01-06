//choose attribute
$('.btn_add_attr_edit').on('click',function(){
    $('.popup_select_attr').fadeIn();
});

$("body").on('click', function (e) {
    if ($(e.target).closest(".box_popup_select_attr").length === 0) {
        $(".popup_select_attr").fadeOut();
    }
});

$('input[name="ajax_attr"]').on('change',function () {
    var id = $(this).closest('.ajax_attr').data('id');
    var id_attr = $(this).val();
    if ($('#'+id+'').size() == 1) {
        var status = 'disable';
        $('#'+id+'').remove();
    }
    else{
        var status = 'select_attr';
    }
     var id_customer = $('input[name="id_customer"]').val();
     console.log(id_attr);
    $.ajax({
        url : url_set_attr,
        type : "get",
        dataType:'json',
        data : {
            id_attr : id_attr,
            stt_attr : status,
            id_customer : id_customer,
            column : 'show_edit',
        },
        success : function (result){
         $('.attribute_group').append(result.html_input);
         $('#'+id+'').addClass('info_customer');
     }
 });
});

//end choose attribute

var comment = $('#comment .comment_content');
$(comment).each(function () {
    var type = $(this).data('type');
    var content = $(this).data('content');
    if (type == 1){
        $(this).closest('.comment').find('.user_comment .user_tag').html(content);
    }else{
        $(this).find('p').text(content);
    }
});

        $('#comment').on('click','#btn-edit' , function () {
            $(this).addClass('hidden');
            $(this).closest('.comment').find('.comment_content').addClass('hidden');
            $(this).closest('.panel-body').find('#btn-tag').removeClass('hidden');
            var a = $(this).closest('.comment');
            var text = a.find('p.comment_content').text();
            let wraPPer = $(this).closest('.panel-body ');
            wraPPer.find('.comment_content').addClass('hidden');
            $(this).closest('.comment').find('.text_edit_comment').removeClass('hidden');
            $(this).closest('.comment').find('.btn_save_comment').removeClass('hidden');
            a.find('textarea.text_edit_comment').val(text);
        });
        $('.btn_save_comment').on('click',function () {
            var id = $(this).data('id');
            var text = $(this).closest('.comment_1').find('textarea.text_edit_comment').val();
            $('#id_comment').val(id);
            $('#txt_comment').val(text);
            $('#edit_comment').submit(); 
        });


        $(document).ready(function() {
            $(".del").click(function () {
                if (!confirm("Do you want to delete")) {
                    return false;
                }
            });
        });
        $(document).ready(function () {
            $('.input-group-btn').addClass('open');
        });
        $(window).load(function(){
            $('#tag input[type="checkbox"]').each(function(e){
                if ($(this).is(':checked')) {
                    let idField = $(this).attr('id');
                    let labelForInput = 'label[for="'+idField +'"]';
                    let classChecked = $(labelForInput).data('color');
                    $(labelForInput).addClass(classChecked);
                }
            })
        });

        $('#comment').on('click','#btn-edit' , function () {
            $(this).addClass('hidden');
            $(this).closest('.panel-body').find('#btn-tag').removeClass('hidden');
            $(this).closest('.comment').find('.comment_content').addClass('hidden');
            var a = $(this).closest('.comment');
            var text = a.find('p.comment_content').text();
            let wraPPer = $(this).closest('.panel-body ');
            wraPPer.find('.comment_content').addClass('hidden');
            $(this).closest('.comment').find('.text_edit_comment').removeClass('hidden');
            $(this).closest('.comment').find('.btn_save_comment').removeClass('hidden');
            a.find('textarea.text_edit_comment').val(text);
        });
        $('.btn_save_comment').on('click',function () {
            var id = $(this).data('id');
            var text = $(this).closest('.comment_1').find('textarea.text_edit_comment').val();
            $('#id_comment').val(id);
            $('#txt_comment').val(text);
            $('#edit_comment').submit();
        });

        $(document).ready(function() {
            $(".del").click(function () {
                if (!confirm("Do you want to delete")) {
                    return false;
                }
            });
        });

        $('.btn_edit_information').click(function(){
            $('.info_cus .tab_detail').hide();
            $('.info_cus .tab_edit').fadeIn(200);
            $('.info_cus .button_acction').fadeIn(200);
            $('.info_cus .tab_edit').height('auto');
            $('.info_cus .tab_edit .info_content').height('auto');
        });
        $('.btn_cancel').click(function(){
            $('.info_cus .tab_edit').hide();
            $('.info_cus .tab_detail').fadeIn(200);
            $('.info_cus .button_acction').fadeOut(100);
        });
        $('.comment .user_tag span').each(function () {
            if ($(this).text() == "Removed") {
                $(this).closest('.user_tag').find('label').removeClass().addClass('label tag_label_default_2');
                $(this).empty();
            }
            else{
                $(this).empty();
            }
        });
        $('.show_comment').click(function(){
            if ($(this).find('input').val() ==0) {
                $(this).closest('.log_customer').css('height','auto').find('div#comment').css('max-height','none');
                $(this).css('transform','rotate(180deg)');
                $(this).find('input').val(1);
            }
            else{
                $(this).closest('.log_customer').find('div#comment').css('max-height','625px');
                $(this).css('transform','rotate(0deg)');
                $(this).find('input').val(0);
            }

        });
        $(document).ready(function () {
            var status = $('#check_page_detail').val();
            if (status == 1) {
               $('.info_cus .tab_detail').hide();
               $('.info_cus .tab_edit').show();
               $('.info_cus .tab_edit').height('auto');
               $('.info_cus .tab_edit').height('auto');
               $('.info_cus .tab_edit .info_content').height('auto');
           }
           else{
            $('.info_cus .tab_edit').hide();
            $('.info_cus .tab_detail').show();
            $('.info_cus .button_acction').hide();
        }
    });
    $('#comment').on('mouseover','.comment',function() {
        $(this).find('.action_comment a').fadeIn(50);
    });
    $('#comment').on('mouseleave','.comment',function() {
        $(this).find('.action_comment a').fadeOut(50);
    });

    $('#content').on('mouseover','.field',function (e) {
        $(this).find('.info_customer').css('border-bottom-color','transparent');
        $(this).prev().find('.info_customer').css('border-bottom-color','transparent');
    });
    $('#content').on('mouseleave','.field',function() {
         $(this).find('.info_customer').css('border-bottom','1px solid #e9e9e9');
         $(this).prev().find('.info_customer').css('border-bottom','1px solid #e9e9e9');
    });
    $("#comment").on('click','.btn-sticky',function() { 
        var status = $(this).closest('.comment').is('.comment_sticky');
        
        $('.comment').removeClass('comment_sticky');
        var id = $(this).closest('.comment').attr('id');
        var id_customer = $('#comment').data('idcustomer');
        var a = $(this).closest('.comment').clone();
        $('#comment').prepend(a);
        $(this).closest('.comment').remove();
        $('#'+id+'').find('.action_comment a').fadeOut();
        var id_comment = $(this).closest('.comment').data('id');
        if (status == true) {
            $(this).closest('.comment').removeClass('comment_sticky');
            var value = 0;
        }
        else{
             $('#'+id+'').addClass('comment_sticky');
             var value = 1;
        }
        $.ajax({
            method: "GET",
            url: url_comment_sticky,
            data: { 
                id: id_comment,
                id_customer: id_customer,
                value: value
            }
        });
    });  




