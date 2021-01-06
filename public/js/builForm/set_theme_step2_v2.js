(function($){
	"use trict";
$('#content .step2').on('click','.theme',function () {
	$('.themes .select_hidden').css('top','230px').css('trasition','0.4s');
	$(this).closest('.themes').find('.select_hidden').css('top','0').css('trasition','0.4s');
	var name = $(this).find('p').text();
	var image = $(this).find('img').attr('src');
	$('#modalStep2').find('h4').text(name);
	$('#modalStep2').find('img').attr('src',image);
	var theme = $(this).data('style');
	$('#theme_form_v2').val(theme);
	$('#this_theme').val(theme);
	$('#data_display').val(theme);
	var id = "all";
	theme_add(id);
});
})(jQuery)
