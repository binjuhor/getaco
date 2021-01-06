(function($){
	"use trict";
$('#content').on('click','.add_column',function (e) {
	var a = $(this).closest('.card').find('input');
	var num = a.val();
	num = parseInt(num) + 1;
	a.val(num);
	var col = 100/num - 2;
	$(this).closest('.card').find('.column_edit div').remove();
	for (var i = num - 1; i >= 0; i--) {
		$(this).closest('.card').find('.column_edit').append(
			`<div class="column_form" data-column="`+i+`" style="width:`+col+`%;float:left;margin:5px 1%;"></div>`
		);
	}
});

})(jQuery)