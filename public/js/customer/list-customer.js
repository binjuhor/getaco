//thêm attr vao fillter
function attr_fillter(label){
    var a = $(label).attr("for");
    var id_attr = document.getElementById(a).value;
    var stt_attr = "";
    if(document.getElementById(a).checked) {
       var class_name =  $(label).attr("for");
       $('.'+class_name).remove();
    } else {
        $.ajax({
            url : url_attr_fillter,
            type : "post",
            dataType:"text",
            data : {
                _token : $('meta[name="csrf-token"]').attr('content'),
                id_attr : id_attr,
                stt_attr : stt_attr,
            },
            success : function (result){
                $('.attribute_fillter').append(result);
                 if (typeof fillter == 'object') {
                     $.each(fillter,function (index,value) {
                           if (index == 'text') {
                                $.each(value,function (index2,value2) {
                                    $('#attr_fillter'+value2+'').prop('checked',true);
                                })
                           }
                           else if(index == 'checkbox'|| index == 'radio'){
                                $.each(value,function (index2,value2) {
                                    $.each(value2,function (index3,value3) {
                                        $('input[name="attr_fillter_'+index+'['+index2+'][]"]').each(function () {
                                            $(this).val()== value3?$(this).prop('checked',true):'';
                                        })
                                    })
                                })
                           }
                        });
                 }
            }
        });
    }
};
$('body').on('click','#popup_fillter .attr_fillter',function(){
    attr_fillter($(this));
});
//end thêm attr vao fillter
//export
$('#export').on('click',function(){
    var url = $(this).attr('data_url');
    $('#list_customer_form').attr('action',url);
    $('#list_customer_form').submit();
    var heigh_screen = $(window).height()*4/10;
    $('.lds-spinner').css('top',heigh_screen);
    // $('.loading_export').show();
});

//end export
// add html return
var attr_search = $('#html_return').val();
$('.attribute_fillter').append(``+attr_search+``);
if ($(attr_search).size() > 0) {
    showFillterAttr();
}
//end

//submit form fillter
    $('#btn_fillter_submit').on('click',function(){
        var url = $(this).attr('data_url');
        $('#list_customer_form').attr('action',url);
        // remove html
        $('.attribute_fillter div').each(function () {
            $(this).find('input[type="checkbox"]:checked').size()==0?$(this).remove():'';
        });
        //
        var attr = $('.attribute_fillter').html();
        $('input[name="html_attr_search"]').val(attr);
        $('#list_customer_form').submit();
    });
    $('#btn_create_fillter').on('click',function(){
        var url = $(this).attr('data_url');
        $('#list_customer_form').attr('action',url);
        if ($('#save_fillter_name').val() == ""){
            $('.err_fillter').html(`Tên đang trống !`);
        }
        else
            $('#list_customer_form').submit();
    });

    //popup form name create fillter
    $('#show_form_save_fillter').on('click',function(){
        $('#form_save_fillter').fadeIn();
    });

    $('#hide_form_save_fillter').on('click',function(){
        $('#form_save_fillter').fadeOut();
        $('.err_fillter').html("");
    });
    //end popup form name create fillter
//end submit form fillter
        $('.label_attr').on('click',function(){
            var a = $(this).attr("for");
            var id_attr = document.getElementById(a).value;
            var stt_attr = "";
            if(document.getElementById(a).checked) {
                stt_attr = "disable";
            } else {
                stt_attr = "enable";
            }
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url : $('#url_update_attr').val(),
                type : "post",
                dataType:"text",
                data : {
                    _token : token,
                     id_attr : id_attr,
                     stt_attr : stt_attr,
                },
                success : function (result){
                    location.reload();
                    // alert(result);
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
        // // add color tag
        // var tag = $('#tag div');
        // $(tag).each(function () {
        //     var check = $(this).find('input').val();
        //     if(check == 1){
        //         var color = $(this).find('label').data('color');
        //         $(this).find('label').removeAttr('class').addClass(color);
        //     }else{
        //         $(this).find('label').addClass('hidden');
        //     }
        // });
        // // end



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

        $(document).ready(function() {
            $(".del").click(function () {
                if (!confirm("Do you want to delete")) {
                    return false;
                }
            });
        });



        $(document).ready(function () {
                var become = $('#success_become').val();
                if (become == 1) {
                    $("#modalbecome").modal('show');
                }
            });
        $(document).ready(function() {
            $(".popup").hide();

            $("#button1").click(function(e) {
                openPopup();
            });

            $(".close").click(function (e) {
                closePopup();
                e.preventDefault();
            });

            $("#background").click(function () {
                closePopup();
            });

        });

        function openPopup(){
            var dheight = document.body.clientHeight;
            var dwidth = document.body.clientWidth;

            $("#background").width(dwidth).height(dheight);
            var b = $('body').width();
            if (b <= 768) {
                $("#background").css("left",(0));
            }else{
                $("#background").css("left",(-1000));
            }

            $("#background").fadeTo("slow",0.8);

            var $popup1=$("#popup1");
            $popup1.css("top", '85px');
            $popup1.css("right",(dwidth-$popup1.width())/7);

            $popup1.fadeIn();
        }
        function closePopup(){
            $("#background").fadeOut();
            $(".popup").hide();
        }




 
  $('tr.customer_detail td:not(.action_click)').click(function(){
    var href = $(this).closest('tr').find('a.terms').attr('href');

    location.href = href;
    });
  // effect become customer
  $('.btn-become').click(function (e) {//addClass('animated bounceOutRight')
    $(this).closest('tr').css({
      'transform': 'translateX(101%)'
    ,'transition':'transform 0.2s'});
    $(this).closest('tr').fadeOut(350);
    var url = $(this).data('url');
    var id = $(this).data('id');
     $.ajax({
        method: "GET",
        url: url,
        data: { id: id}
    })
    .done(function(data) {
         var a = $('.total_customers').text();
        a = parseInt(a) - 1;
        $('.total_customers').html(a);
    });
});
    $('#table_format .status .tag label').hover(function() {
        $(this).closest('.tag').find('.label_hover').fadeIn(100);
    }, function() {
        $(this).closest('.tag').find('.label_hover').fadeOut(100);
    });

 $('.show_advan').on('click',function(){
        showFillterAttr();
    });
 function showFillterAttr() {
    $('#box_fillter').css({'width':'850px','transition':'width 0.4s'});
        $('.scroll_fillter').removeClass('col-md-12');
        $('.scroll_fillter').addClass('col-md-9');
        $('.scroll_fillter').css('border-left','1px solid #b2b2b2');
        $('.advan_fillter').show();
        $('.hide_advan').show();
        $('.show_advan').hide();
 }
    $('.hide_advan').on('click',function(){
        $('.advan_fillter').hide();
        $('.show_advan').show();
        $('.scroll_fillter').removeClass('col-md-9');
        $('.scroll_fillter').addClass('col-md-12');
        $('.scroll_fillter').css('border','none');
        $(this).hide();
        $('#box_fillter').css({'width':'600px','transition':'width 0.4s'});
    });
