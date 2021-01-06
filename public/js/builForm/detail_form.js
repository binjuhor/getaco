	$('.btn-detail').click(function () {
		 console.log('ok')
		var id = $(this).data('id');
		var typeForm = $(this).data('setting');
		if (typeForm == true) {
				var b= `__getAcoPopup`+id+``;
				$('#detail_form .class_js').val(b);
				$('#detail_form .class_button').show();
			}
			else{
				$('#detail_form .class_button').hide();
			}
		$.ajax({
			method: "GET",
			url: url_detail,
			data: { id: id}
		})
		.done(function(data) {
			$('#detail_form .content_detail').html(data).css('height','auto');
			$('#detail_form .content_detail .content_form').removeClass('col-md-8').removeClass('col-sm-offset-2').css({'margin':'0','min-height':'0'});
			$('#detail_form .content_detail .step_form').removeClass('step_form');
			var link = $('.code_embed').attr('href');
			var a= `<script id="__geTaco`+id+`" src="`+link+`?id=`+id+`"></script>`;
			$('#detail_form .text_js').val(a);
			if($('.getacoEmbed .field_frontend').size() != 0){
				$('.getacoEmbed').css('padding','30px');
			}
			
		});
	});
	var id_show = $('#id_form_show').val();
	$('.btn-detail, .btn-popup').each(function () {
		$(this).data('id') == id_show?$(this).click():'';
	});
	$('.btn-delete-form').click(function(){

		var id = $(this).data('id');
		var type = $(this).data('form');
		var text = type =="form"?"Bạn có chắc muốn xoá form ?":"Bạn có chắc muốn xoá template ?";
		$('#note_form .content_note .text_content').text(text);
		$('button.btn-yes').click(function () {
			$('#form_'+id+'').remove();
			$.ajax({
				method: "GET",
				url: url_form,
				data: { id: id}
			})
			.done(function(data) {
				$(this).closest('tr.form').remove();
				$('.btn-no').click();
			});
		});
	});
	// javascript copy embed link
	// template
	$('.formPreview__action .preview').click(function () {
		var id = $(this).data('id');
		$.ajax({
			method: "GET",
			url: url_preview_form,
			data: { id: id}
		})
		.done(function(data) {
			$('#previewTemplate .modal-body').html(data);
		});
	})
