
(function($){
	"use trict";
	/**
     * Form step 2
     * 
     * @author kakarevert - kakarevert@gmail.com 
     * @version 1.0.0
     */
	var status_label = 0;
	jQuery('.btn_label').on('click', function () {
		if (status_label == 0) {
			status_label = 1;
			hiddenLabel();
		}
		else {
			status_label = 0;
			showLabel();
		}
	});

	$(".theme").on('click',function () {
		// set style
		var style = $(this).data('style');
		$('#this_theme').val(style);
		add_theme_form(style);
		//popup modal
		$('.themes .select_hidden').css('top','230px').css('trasition','0.4s');
		$(this).closest('.themes').find('.select_hidden').css('top','0').css('trasition','0.4s');
		var name = $(this).find('label').text();
		var image = $(this).find('img').attr('src');
		$('#modalStep2').find('h4').text(name);
		$('#modalStep2').find('img').attr('src',image);
	});
})(jQuery)

function add_theme_form(style) {
	switch (style) {
		case "bootstrap_1":
			bootstrap_1();
			break;
		case 'template_2':
			green_2();
			break;
		case 'template_3':
			red_1();
			break;
	};
}
function bootstrap_1() {
	jQuery('#frontend').css('border', '1px solid #ddd');
	var allField = jQuery('#frontend .field_content');
	jQuery(allField).each(function () {
		jQuery(this).children().removeAttr('class');
		jQuery(this).children().removeAttr('style');
		var type = jQuery(this).children().attr('type');
		if (type == "submit") {
			jQuery(this).children().addClass('btn btn-primary btn-block');
		} else {
			jQuery(this).children().addClass('form-control');
		}
	});
	// showLabel();
};
function green_2() {
	hiddenLabel();
	var allField = jQuery('#frontend .field_content');
	jQuery(allField).each(function () {
		var type = jQuery(this).find('input').attr('type');
		if (type == "checkbox" || type == "radio") {
			jQuery(this).find('input').addClass('beauvn_input_green_checkbox').css('width', '16px');
			jQuery(this).css('color', '#aeaeae').css('font-size', '16px').css('color', '#aeaeae').css('font-family', 'SFUFutura');
		}
		else {
			jQuery(this).find('input').addClass('beauvn_input_green_theme');
			jQuery(this).find('select').addClass('beauvn_input_green_theme');
			jQuery(this).find('textarea').addClass('beauvn_input_green_theme').css('height', '100px');
		}

	});
	jQuery('#frontend .field_content button').removeAttr('class').addClass('beauvn_button_green_theme');
};
function red_1() {
	hiddenLabel();
	var allField = jQuery('#frontend .field_content');
	jQuery(allField).each(function () {
		var type = jQuery(this).find('input').attr('type');
		if (type == "checkbox" || type == "radio") {
			jQuery(this).find('input').addClass('beauvn_input_red_checkbox').css('width', '16px');
			jQuery(this).css('color', '#aeaeae').css('font-size', '16px').css('color', '#aeaeae').css('font-family', 'SFUFutura');
		}
		else {
			jQuery(this).find('input').addClass('beauvn_input_red_theme');
			jQuery(this).find('select').addClass('beauvn_input_red_theme');
			jQuery(this).find('textarea').addClass('beauvn_input_red_theme').css('height', '100px');
		}

	});
	jQuery('#frontend .field_content button').removeAttr('class').addClass('beauvn_button_red_theme');
}
function showLabel() {
	jQuery('#frontend').find('.col-sm-4').removeClass('hidden');
	jQuery('#frontend').find('.field_content').addClass('col-sm-8');
}
function hiddenLabel() {
	jQuery('#frontend').find('.col-sm-4').addClass('hidden');
	jQuery('#frontend').find('.field_content').removeClass('col-sm-8');
}
