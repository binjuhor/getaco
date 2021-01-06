$('#btn_check_null').on('click',function () {
		var option_payment = $('#option_payment').val();
		var time_order = $('#time_order').val();
		var buy_phone = $('#buy_phone').val();
		$('#phone_erro').html("");
		$('#package_erro').html("");
		$('#pay_erro').html("");
		if(buy_phone == ""){
			$('#phone_erro').html('Bạn chưa nhập số điện thoại !');
		}else if(time_order == null){
			$('#package_erro').html('Bạn chưa chọn thời hạn !');
		}else if(option_payment == null){
			$('#pay_erro').html('Bạn chưa phương thức thanh toán !');
		}else{
			$('#btn_pay_submit').click();
		}
		
	});
	function hide_option() {
		$('#NL').hide();
		$('#ATM_ONLINE').hide();
		$('#IB_ONLINE').hide();
		$('#ATM_OFFLINE').hide();
		$('#NH_OFFLINE').hide();
		$('#VISA').hide();
		$('#btn_pay_submit').hide();
	}
	hide_option();
	$("#option_payment").change(function(){
		hide_option();
    	var select = $("#option_payment").val();
    	$('#'+select).show();
		$('#pay_erro').html("");
	});

    $('.bank-online-methods').on('click',function () {
    	$('.icon_cc').remove();
    	$('.bank-online-methods').find("input").prop('checked', false);
    	$(this).find("label").prepend(`<div class="icon_cc">&nbsp</div>`);
    	// $(this).find("input").attr('checked', true);
    	$(this).find("input").prop('checked', true);
    });



	$('#code_coupon').attr('disabled',true);

	$('#time_order').on('change',function(){
    	$('#package_erro').html("");
        var url = $('#url_check_vari').val();
        var id_variable = $(this).val();
        var token = $('meta[name=csrf-token]').attr('content');
        $.post(url, {
                     _token: $('meta[name=csrf-token]').attr('content'),
                     id_variable: id_variable,
                 }
                )
                .done(function(data) {
                	var obj = JSON.parse(data);
                	$('#amount_payment').html(obj.variable);
                	$('#thoi_han').html(obj.lim);
                	$('#package_price').val(id_variable);
                	$('#code_coupon').attr('disabled',false);
                	$('#apply_status').html("");
                	$('#code_coupon').val("");
                })
                .fail(function() {
                    alert( "error" );
                });
    }); 



    $('.btn_apply_coupon').on('click',function(){
        var url = $(this).attr('data');
        var coupon = $('#code_coupon').val();
        var id_variable = $('#package_price').val();
        var token = $('meta[name=csrf-token]').attr('content');
        $.post(url, {
                     _token: $('meta[name=csrf-token]').attr('content'),
                     id_variable: id_variable,
                     coupon: coupon,
                 }
                )
                .done(function(data) {
                	$('#apply_status').html("");
                	if (data == 'err') {
                		$('#apply_status').append(`<b style="color: #ff4669;" >Coupon không tồn tại hoặc đã hết .</b>`);
                	}else{
                		var obj = JSON.parse(data);
                		$('#apply_status').append(`<b style="color: #38C600;" >Bạn được giảm `+obj.coupon+` đ.</b>`);
                		$('#amount_payment').html(obj.price_new);
                	}
                })
                .fail(function() {
                    alert( "error" );
                });
    }); 