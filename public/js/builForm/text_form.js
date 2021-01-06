(function($){
	"use trict";
$('.backend').on('click','.edit_text_form',function () {
	var class_this = $(this).data('text');
	var text = $('#preview .beauvn_'+class_this+' span').text();
	var a = $('.backend .edit_text');
	a.removeClass('hidden');
	$('.backend .edit_text textarea').val(text);
	$('.backend .edit_text input').val(class_this);

});
$('.backend .edit_text button').on('click',function () {
		$('.backend .edit_text').addClass('hidden');
		var class_this2 = $('.backend .edit_text input').val();
		text2 = $('.backend .edit_text textarea').val();
		update_text_form(class_this2,text2);
});

function update_text_form(class_this2,text2) {
	$('#preview .beauvn_'+class_this2+' span').text(text2);
};
})(jQuery)