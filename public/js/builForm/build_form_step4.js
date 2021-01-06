(function($){
	"use trict";

	var a = $('.step4 .style').width();
	var b = a*1.618;
	var c = b-63;
	var d = c/2;
	var e = b + 37;
	$('.step4 .style').height(b);
	$('.step4 .style .theme').height(b);
	$('.step4 .display .style .select_hidden').css('padding-top',''+d+'px').css('top',''+b+'px');
	$('.step4 .display').height(e);
	$('.step4 .display .style').on('click',function () {
		var height = $(this).height() +5;
		$('.step4 .display .style .select_hidden').css('top',''+height+'px');
		$(this).find('.select_hidden').css('top','0px');
	});

	$('.step4').on('click','.display',function (argument) {
		var display = $(this).data('display');
		$('#formType option').removeAttr('selected');
		$('#formType option').each(function(){
			$(this).val() == display?$(this).attr('selected','selected'):'';
		});
	});
	// search effect
	$('.menu_animation .text_search input').keypress(function () {
		var text = $(this).val();
		$('.menu_animation .effect li').each(function () {
				text==""?$('.menu_animation .effect li').show():'';
				var text2 = $(this).text();
				var status = text2.indexOf(text);
				if (status < 0 ) {
					$(this).closest('li').hide();
				}
				else{
					$(this).closest('li').show();
				}
			});
	});

	$('#effect_in li .text').click(function(){
		$('#effect_in li').removeClass('active_effect');
		var parentE = $(this).closest('li');
		appplyEffect(parentE);
		$(parentE).addClass('active_effect');
		$('#input_setting_effect').val($(parentE).data('effect'));
	});

	$('.wtfEffect .view').click(function () { appplyEffect(this); });

	function appplyEffect(element) {
		let effectClass = $(element).data('effect');
		$('#formDemoAnimated').addClass('animated').addClass(effectClass);
		setTimeout(function () { $('#formDemoAnimated').removeClass(); }, 3000);
	}
	
})(jQuery)