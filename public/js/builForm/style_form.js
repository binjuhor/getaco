(function($){
	"use trict";
	$('#btn_style_form').on('click',function () {
		$('#style_all_form').css('display','block');
		$('#style_all_form').attr('data-status','1');
		var a = $('#frontend button').first().css('background-color');
		$('#menu_button .set_color').val(a);
	});

	$('#style_all_form .close_tab').on('click',function () {
		$('#style_all_form').css('display','none');
		changeStyle();
	});

	$('#content').on('blur','#style_all_form input',function () {
		changeStyle();
	});
	$('#remove').on('click',function () {
		$('#style_all_form').css('display','none');
		removeStyle();
	})
	// add value
	$('#style_all_form .add_value span').on('click',function () {
		var value = $(this).text();
		$(this).closest('.add_value').find('input').val(value);
	});
	// drag drop #style_all_form
	$(function(){
		$('#style_all_form').draggable();
	});
	$('#form_field .width_field').on('click','span',function () {
		var width = $(this).data('width');
		var class_this = $('#this_field').val();
		$('#frontend .'+class_this+'').css('width',''+width+'%').css('float','left');
	});
	$('#preview').on('click','.text_edit',function (e) {
		var text = $(this).text();
		$(this).addClass('hidden');
		$(this).closest('div').find('.input_demo').removeClass('hidden').val(text);	
	});
	$('#preview').on('blur','.text input',function () {
		$(this).addClass('hidden');
		var text = $(this).val();
		$(this).closest('div').find('span').removeClass('hidden').text(text);
	});

})(jQuery)

function removeStyle() {
	var object = jQuery('#form_frontend input');
	var object2 = jQuery('#form_frontend button');
	jQuery(object).each(function () {
		jQuery(this).removeAttr('style');
	});
	jQuery(object2).each(function () {
		jQuery(this).removeAttr('style');
	});
}
function changeStyle(class_this) {
	var status = jQuery('#style_all_form').attr('data-status');
	if (status == 1) {
		var a = jQuery('#style_all_form input');
		jQuery(a).each(function () {
			var value = jQuery(this).val();
			var key = jQuery(this).closest('.form-group').data('key');
			var object = jQuery(this).closest('.tab-pane').data('menu');
			var type = jQuery(this).data('type');
			switch (type) {
				case 'px': {
					value = value + 'px';
					break;
				};
				case 'color': {
					value = '#' + value;
					break;
				};
			};
			if (type == "input") {
				jQuery('#frontend .field_frontend select').css(key, value);
				jQuery('#frontend .field_frontend textarea').css(key, value);
			}
			if (type == "other" && value != '') {
				jQuery('#frontend .field_frontend ' + object + '').closest('.field_frontend').css(key, value);
				jQuery(this).val(''); //reset value
			} else {
				jQuery('#frontend .field_frontend ' + object + '').css(key, value);
			}

		});
	}
}
