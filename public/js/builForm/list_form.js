(function($){
	"use trict";
	
$('#list_form .form_detail').on('click', function () {
	var source = $(this).find('input').val();
	var name = $(this).text();
	var id = $(this).data('id');
	$('#name_form_detail').text(name);
	$('#body_form').html(source);
	$('#id_form_customer').val(id);
	 status = 1;
});
$('#list_form .delete_form i.fa-ban').on('click',function (e) {
	var id = $(this).data("id");
	$('#getDelete').attr('href','form/delete?id='+id+'');
});
})(jQuery)
