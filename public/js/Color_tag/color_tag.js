(function($){
    "use trict";
$('.add_status .color').click(function () {
    var color = $(this).data('color');
    $('input[name="id_color"]').val(color);
    $('.add_status .color').html(' ');
    $(this).append(`<svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12">
          <path fill="#FFF" fill-rule="nonzero" d="M5.085 9.468L1.293 5.736 0 7.008 5.085 12 16 1.26 14.707 0z"/>
    </svg>`);
});
$('#btn_add_tag').click(function(){
    var val = $("input[name='id_color']").val();
    if (val == "") {
        $('#notification').text('Bạn chưa chọn màu');
        return false;
    }
    else if(!$("input[name='tag_name']").val()){
        $('#notification').text('Bạn chưa tạo tên tag');
        return false;
    }
    else{
        $('#form_sub_tag').submit();
    }

});
$('input[name="tag_name"]').keypress(function(event) {
    if (event.keyCode == 13) {
          var val = $("input[name='id_color']").val();
        if (val == "") {
            $('#notification').text('Bạn chưa chọn màu');
            return false;
        }
        else if(!$("input[name='tag_name']").val()){
            $('#notification').text('Bạn chưa tạo tên tag');
            return false;
        }
        else{
            $('#form_sub_tag').submit();
        }

    }
});

})(jQuery);

