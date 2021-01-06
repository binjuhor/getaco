$('#btn_apply_coupon').on('click',function () {
	var cp = $('#coupon').val();
	var price = $('#origon_price').attr("name");
	var url = $("#btn_apply_coupon").attr("name");
	$.post(url, {
                 _token: $('meta[name=csrf-token]').attr('content'),
                 coupon: cp, price: price
             }
            )
            .done(function(data) {
               if(data == "err"){
               		$("#result").html("Sorry, this discount code has no effect. Please check the code again .");
               		$("#result").attr("style", "color : red;");
               }
               else{
               		$("#result").html("Apply the coupon success !");
               		$("#result").attr("style", "color : #05F70B;");
               		$("#amount_payment").html(data);
                  $("#total_pay").val(data);
               	}
            })
            .fail(function() {
                alert( "error" );
            });
});