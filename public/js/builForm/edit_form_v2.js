(function($){
	"use trict";
	var theme = $('#this_theme').val();
	$('.step2 .theme').each(function () {
		if (theme == $(this).data('style')) {
			$(this).closest('.style').find('.select_hidden').css('top','0px');
			return;
		}
	});
	$('.step1 .form_demo').each(function () {
		var template = $('#id_form_demo').val();
		if (template == $(this).find('input').val()) {
			$(this).closest('.template').find('.select_hidden').css('top','0px');
		}
	});

})(jQuery)
