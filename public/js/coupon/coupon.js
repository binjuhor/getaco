var type = $('.coupon_type input');
$(type).on('change',function (argument) {
	var a = $(this).closest('span').text();
	if (a == "Free") {
		a = "day";
	}
	$('#show_type_coupon').text(a);
});
