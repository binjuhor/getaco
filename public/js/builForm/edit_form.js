(function($){
	"use trict";
var backend = $('#edit_backend').val();
var frontend = $('#edit_frontend').val();
$('#formBackend').html(backend);
$('#frontend').html(frontend);

var edit_form = $('#edit_form_frontend').val();
$('#preview .modal-body').html(edit_form);
// thong bao khi chon template khac khi edit
var edit = $('#edit_id').val();
var id_form_demo = $('#id_form_demo').val();
if (edit != undefined ) {
	$('.form_demo').on('click',function () {
		var id_demo = $(this).find('.id_template').val();
		if (id_demo != id_form_demo) {
			var comfirm = comfirm('field in the form is deleted');
			
		}
	});
}
})(jQuery)
