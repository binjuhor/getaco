(function($){
	"use trict";
	
	/**
     * Form step 1
     * 
     * @author kakarevert - kakarevert@gmail.com 
     * @version 1.0.0
     */
     $(".form_demo").on('click', function () {
     	$('#note_form_select').empty();
     	$('.template .select_hidden').css('top','100%');
     	$(this).closest('.frames').find('.select_hidden').css('top','0');

		// lay data
		var name = $(this).find('.name_form').val();
		var source = $(this).find('.source_form').val();
		var id = $(this).find('.id_template').val();
		// add id form_demo
		$('#id_form_demo').val(id);
		// end
		// detail show
		var edit_id = $('#edit_id').val();
		$('#name_form_select').text(name);
		$('#form_select').html(source);
		// data modal
		var name = $(this).data('name');
		var image = $(this).data('image');
		$('#myModal').find('h4').text(name);
		$('#myModal').find('img').attr('src',image);

		// add data
		if (id != 0) {
			$('.step3 .step_form .content_form .first_content').remove();
			$('.step3 .step_form .content_form').html(source);
		}

		// add theme
		var theme = $(this).find('.theme_template').val();
		$('#this_theme').val(theme);

		$('.step2 .theme').each(function(){
			var type = $(this).data('style');
			type==theme?$(this).parent().find('.select_hidden').css('top','0px'):'';
		});
		
		
		// end show detail

	});
	//click other
	$('.form_other').on('click', function () {
		if(!$('.first_content').lenght){
			$('.content_form').empty();
		}
	});
	$('.form_subscribe').on('click',function(){
		$('.content_form').empty();
		create_field("email","Email Address");
		create_field("button","Subscribe");
	});
	$('#btn_skip').on('click', function () {
		$('#id_form_demo').val(0);
	});
	// button cancel 
	$('#btn_cancel').on('click', function () {
		$('#black').css("display", "none");
		$('#form_demo').css("display", "none");
	});
	// click select button next steps
	$('.btn_select').on('click',function(){
		$('#black').css("display", "none");
		$('#form_demo').css("display", "none");
		next(1);
	});

	//end
	// click black hidden detail form
	$('#black').on('click', function () {
		$('#black').css("display", "none");
		$('#form_demo').css("display", "none");
	});

	// form step
	var id_edit = $('#edit_id').val();
	if (id_edit == undefined) {
		status = 0;
	}
	else{
		var id = "all";
		theme_add(id);
		status = 2;
	}
	var step = $('.step');
	// heading form 
	var heading_form = $('#form-heading .heading div');
	show(status, step);
	// this tab show
	function show(n) {
		$(step).css("display", "none");
		$(step[n]).css("display", "block");
		if (n == 0) {
			$('#step_pre').css("display", "none");
			$('#form-heading').css("display", "none");
		}else {
			$('#step_pre').css("display", "block");
			$('#form-heading').css("display", "block");
		}
		if (n==2) {
			$('#element_type_group').css('right','0').css('display','block');
			$('#content .build_form').css('margin-right','240px');
			$('.button_step .preview_form').show();
		}
		else{
			$('#element_type_group').css('right','-240px').css('display','block');
			$('#content .build_form').removeAttr('style');
			$('.button_step .preview_form').hide();
		}
		if(n == 3){
			var edit = $('#edit_id').val();
			if (edit == undefined) {
				$('#step_next').text('DONE');
			}
			else{
				$('#step_next').text('UPDATE');
			}
		}
		else{
			$('#step_next').text('NEXT');
		}
		// heading form
		$(heading_form).hide();
		$(heading_form[n]).show();
		if (n > 1) {
			$('#btn_preview').closest('.preview').removeClass('hidden');
			$('#style_build_form').show();
		}else{
			$('#btn_preview').closest('.preview').addClass('hidden');
		}
	}
	function next(n) {
		var id = $('#id_form_demo').val(); // lay id form demo
		if (id == '' && status == 0) { // kiem tra da chon template
			$('#notify p.text').text('Please select template');
			$('.btn-info').click();
			return false;
		}; 
		// check name
		var d = $('#name_form').val();
		if (status == 2 && d == '') {
			$('#name_form').val('undefined');
		}
	   	// step 3 // if 2 > submit or lenght.submit =0 return
	   	if (status == 2) {
	   		add_form_html();
	   		var length_a = 0;
	   		var length_b = 0;
	   		var type = $('.step3 .element_build .form_field');
	   		$(type).each(function () {
	   			var a = $(this).data('type');
	   			if (a == 'button') {
	   				length_a = parseInt(length_a)+1;

	   			}
	   		});
	   		// check phien ban cu
	   		$('.step3 #form_frontend .field_frontend').each(function () {
	   			var b = $(this).data('type');
	   			if (b == 'submit') {
	   				length_b = parseInt(length_b)+1;

	   			}
	   		});
	   		if (length_a == 0 && length_b == 0) {
	   			$('#notify p.text').text('No submit button');
				$('.btn-info').click();
	   			return false;
	   		}
	   		if(length_a == 2 || length_b == 2){
	   			$('#notify p.text').text('Only submit button');
				$('.btn-info').click();
	   			return false;
	   		}
	   		var preview = $('#frontend').html();
	   		var id_form_demo = $('#id_form_demo').val();
	   		if (id_form_demo == -1) {
	   			$('#preview .modal-body').html(preview);
	   		}
	   		else{
	   			$('#preview .add_field').html(preview);	
	   		}
	   	}
	   	// add form to effect
	   	if(status == 2){
	   		var html = $('.step3 .step_form').html();
	   		$('#formDemoAnimated').html(html);
	   		$('#formDemoAnimated .setting_form').remove();
	   		$('.step3 .content_form').css('min-height','0');
	   		$('#formDemoAnimated .content_form').removeClass('col-md-8 col-sm-offset-2').css('min-height','0');
	   	}
	   	status = parseInt(status) + n;
	   	$(step).css("display", "none");

	   	show(status);

      // end
  };
	// button next
	$('.step_next').on('click', function (e) {
		if (status == 3) {
			submit_form(e);
		}
		else{
			next(1);
		}
	});
	// button pre
	$('#step_pre').on('click', function () {
		status = parseInt(status) - 1;
		$(step).css("display", "none");
		show(status);
	});
	function submit_form(e) {
		$('.step3 .setting_form').remove();
		var name = $( "input[name='name_form']" ).val();
		name == ''?$( "input[name='name_form']").val('form '+$('#num_field').val()+''):'';
		var template_flag = $('#status_template').val();
		var source = template_flag == 0?$('.step3 .content_form').html():$('.step3').html();
		e.preventDefault();
		$('#attributejson').val(processAttributes());
		// check starlake
		var id = $( "input[name='id']" ).val();
		var check = $('.field_content').size();
		if (check != 0) {
			source = $('#preview .modal-body').html();
		}
		// end
		$('input#input_html').val(source);
		$('#form_html').submit();
	}
	var processAttributes = function () {
		var fields = new Array();
		$('.step3 .content_form .fieldCustom').each(function (i, e) {
			var input         = new Object();
			var label         = new Array();
			var data          = new Array();
			var name          = new Array();
			var value         = new Array();
			var inputName     = $(this).data('name');
			var attributeName = $(this).data('input');
			var inputID       = $(this).attr('id');
			var labelInput    = $(this).find('label').first().text(); 
			var inputType     = $(this).data('type');
			input.name        = '' + attributeName + '';
			input.type        = '' + inputType + '';
			input.label       = '' + labelInput + '';
			$(this).removeClass('fieldCustom');
			switch (inputType) {
				case 'radio':
				$('.step3 #'+inputID+' .option').each(function (n, v) {
					data[n] = '' + $(v).find('.op label').text();
				})
				input.values = data;
				break;

				case 'checkbox':
				$('.step3 #'+inputID+' .option').each(function (n, v) {
					data[n] = '' + $(v).find('.op label').text();
				})
				input.values = data;
				break;

				case 'select':
				var optionSl = $(this).find('option');
				optionSl.each(function (n, v) {
					var optionVal = $(this).attr('value');
					value[n] = '' + optionVal + '';
				})
				input.values = value;
				break;

				default:
				fields.value = "";
				break;
			}
			fields[i] = input;

		});
		return JSON.stringify(fields);
	}
	
	
})(jQuery)

