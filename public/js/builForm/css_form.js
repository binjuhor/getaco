(function($){
	"use trict";
	/**
     * Form step 2
     * 
     * @author kakarevert - kakarevert@gmail.com 
     * @version 1.0.0
     */

//closer form edit css
$('.cancel_edit_css').on('click',function () {
	var this_field = $('#this_field').val();
	$('#form_field').css('display','none');
	$('#form_field .form-group').removeClass('hidden');
	$('#form_field .ckeditor').addClass('hidden');
	var type = $('#formBackend .'+this_field+'').data('type');
	if (type == "html") {
		var data = CKEDITOR.instances['editor1'].getData();
		$('#frontend .'+this_field+'').html(data);
	}	
});
// css detail step 3
$('#content').on('click', '.setting', function (e) {
	$('.button_form_css').remove();
    $('#form_field').css({ "display": "block" });
    var label = $(this).closest('.card').find('.editable b').text();
    var placeholder = $(this).closest('.card').find('.edit_placeholder span').text();
    $('#form_field .label_field').find('input').val(label);
    $('#form_field .placeholder_field').find('input').val(placeholder);
    var a = $(this).closest('.card').attr('class');
    var field = a.split(' ');
    $('#this_field').val(field[2]);
    var b = $(this).closest('.card').data('type');
    if(b == "submit"){
    	$('.placeholder_field').css('display','none');
    	$('#form_field .setting_submit').removeClass('hidden');
    }else{
    	$('#form_field .setting_submit').addClass('hidden');
    }
    if (b == "checkbox" || b == "radio") {
    	$('#form_field .append_here .col_option').remove();
    	$('#form_field .append_here').append(
    		`<select name="" class="col_option form-control" >
				<option value="1">1 columns</option>
				<option value="2">2 columns</option>
				<option value="3">3 columns</option>
				<option value="4">4 columns</option>
				<option value="5">5 columns</option>
			</select>`
    	);
    }else if (b == 'html') {
    	var this_field = $('#this_field').val();
    	create_html(this_field);
    }
    else{
    	$('#form_field .append_here .col_option').remove();
    }
    

});
// update change
	// label
	$('#content').on('blur','.label_field input',function () {
		// data update
		var label = $('.label_field input').val() // label
		// update css
		var a = $('#this_field').val();
		var b = $('.'+a+'').data('type');
		if (b == "submit") {
			$('#formBackend .'+a+' .editable b').text(label);
			$('#frontend .'+a+' button').text(label);
		}
		else{
			$('#formBackend .'+a+' .editable b').text(label);
			$('#frontend .'+a+' label').text(label);
		}
		
	});
	$('#content').on('change','#form_field .append_here select',function () {
		var col = $(this).val();
		var a = $('#this_field').val();
		var __width = 100/col ;
		$('#frontend .'+a+' .option').css('width',''+__width+'%').css('float','left');
	});
	// placeholder
	$('#content').on('blur','.placeholder_field input',function () {
		// data update
		var placeholder = $('.placeholder_field input').val() // label
		// update css
		var a = $('#this_field').val();
		$('#formBackend .'+a+' .edit_placeholder span').text(placeholder);
		$('#frontend .'+a+' input').attr('placeholder',''+placeholder+'');
	});
	// border
	$('#content').on('blur','.border_field input',function () {
		// data update
		var border = $('.border_field input').val() // label
		// update css
		var a = $('#this_field').val();
		$('#frontend .'+a+' input').css('border-width',''+border+'px').css('border-style','solid');
		$('#frontend .'+a+' textarea').css('border-width',''+border+'px').css('border-style','solid');
		$('#frontend .'+a+' select').css('border-width',''+border+'px').css('border-style','solid');
	});
	// border color
	$('#content').on('click','.border_color_field input',function () {
		$('#content').on('blur','.border_color_field input',function () {
			var a = $('#this_field').val();
			var color = $(this).val();
			$('#frontend .'+a+' .field_content').children().css('border-color','#'+color+'');
		});
	});
	// border-radius
	$('#content').on('blur','.border_radius_field input',function () {
		// data update
		var radius = $('.border_radius_field input').val() // label
		// update css
		var a = $('#this_field').val();
		$('#frontend .'+a+' input').css('border-radius',''+radius+'px');
		$('#frontend .'+a+' textarea').css('border-radius',''+radius+'px');
		$('#frontend .'+a+' select').css('border-radius',''+radius+'px');
	});
	// button css bg
	$('#content').on('click','.button_bg_field .col-md-6 input',function () {
		$('#content').on('blur','.button_bg_field .col-md-6 input',function () {
			var bg = $(this).val();
			var a = $('#this_field').val();
			$('#frontend .'+a+' button').css('background-color','#'+bg+'');
		});
	});
	// button color text
	$('#content').on('click','.button_text_field .col-md-6 input',function () {
		$('#content').on('blur','.button_text_field .col-md-6 input',function () {
			var bg = $(this).val();
			var a = $('#this_field').val();
			$('#frontend .'+a+' button').css('color','#'+bg+'');
		});
	});
	// // width button
	// $('#content').on('blur','.width_button_field input',function () {
	// 	var value = $('.width_button_field input').val();
	// 	var a = $('#this_field').val();
	// 	$('#frontend .'+a+' button').css('width',''+value+'px');
	// });
	// // height button
	// $('#content').on('blur','.height_button_field input',function () {
	// 	var value = $('.height_button_field input').val();
	// 	var a = $('#this_field').val();
	// 	$('#frontend .'+a+' button').css('height',''+value+'px');
	// });
	// position button
	$('#content').on('click','.button_field div',function () {
		$(this).parent().find('div').css('background-color','#ddd');
		$(this).css('background-color','gray');
		var value = $(this).data('loca');
		var a = $('#this_field').val();
		if (value == "center") {
			$('#frontend .'+a+' ').css('float','none');	
			$('#frontend .'+a+' ').css('display','table');	
			$('#frontend .'+a+' ').css('margin','10px auto');	
		}
		else{
			$('#frontend .'+a+' button').closest('.field_frontend').css('float',''+value+'');
		}	
	});
	// chia col option dc chon
	function columns_options() {
		
	}
	function create_html(this_field) {
		$('#form_field .form-group').addClass('hidden');
		$('.ckeditor').removeClass('hidden');
		var data_old = $('#form_frontend .'+this_field+'').html();
		CKEDITOR.instances['editor1'].setData(data_old);
	}

// end
})(jQuery)