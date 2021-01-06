(function($){
	"use trict";
	$('#content').on('click','.form_demo',function () {
		var url = $(this).find('input.url_form').val();
		var flag = $(this).find('input.id_template').val();
		if (flag<0) {
			$('#preview .modal-body div').remove();
			$('#preview .modal-body').load(url);	
		}
		
	});
	$('#btn_preview').on('click',function() {
		add_form_html();
	});
	$('.template .preview').click(function () {
		var id = $(this).data('id');
		var id = $(this).data('id');
		$.ajax({
			method: "GET",
			url: url_preview_form,
			data: { id: id}
		})
		.done(function(data) {
			$('#myModal .modal-body').html(data).css('padding-left','50px');
		});
	})
})(jQuery)

function add_form_html() {
	var preview = jQuery('#frontend').html();
	var id_form_demo = jQuery('#id_form_demo').val();
	if (id_form_demo == -1) {
		jQuery('#preview .modal-body').html(preview);
	}
	else {
		jQuery('#preview .add_field').html(preview);
	}
}
