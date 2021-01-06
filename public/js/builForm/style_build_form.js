(function($){
	"use trict";
	var setting_tab = $('#style_build_form .setting_style');
	var menu_tab = $('#style_build_form .menu_style .bf_menu');
	$(menu_tab).hide();
	$('#style_build_form').css('right','-380px');
	function show_tab(n) {
		$(setting_tab).hide();
		$(setting_tab[n]).show();
	// $(menu_tab[n]).css('display','block');
	$(menu_tab).removeClass('bf_style_active');
	$(menu_tab[n]).addClass('bf_style_active');
	var id = $('#object_style').val();
	var type = $('#'+id+'').data('type');
	if (type=="html") {
		var n = $('#'+id+' .label').data('type2');
	}
	else if(type === undefined){
		var n = "all";
	}
	else{
		var n = "body";
	}
	disable_menu_tab2(n);

	// var attr = $('#style_build_form .menu_style .bf_style_active').data('object');
	// var a = $(setting_tab[n]).find('.bf_style_active').data('attr');
}
function show_menu_tab(n) {
	$(menu_tab).hide();
	$(n).each(function () {
		var a = $(this);
		$(menu_tab[this]).show();
		show_tab([this]);
	});
	if (n == 2) {
		var text = $('.tool_edit').closest('.element_build').find('button').text();
		$('#style_build_form .label_button input').val(text);
	}

}
function disable_menu_tab2(n) {
	if (n != "all") {
		$('.setting_text').find('.select_first div').removeClass('bf_style_active');
		$('.setting_text').find('.select_first div').addClass('disable');
		$('.setting_text').find('.select_first .'+n+'').removeClass('disable').addClass('bf_style_active');
	}
	else{
		$('.setting_text').find('.select_first div').removeClass('disable');
		$('.setting_text').find('.select_first div:first-child').addClass('bf_style_active');
	}

}
$(menu_tab).click(function () {
	var n = $(this).data('child');
	show_tab(n);
});
$('.select_first').on('click','div:not(.disable)',function () {
	$(this).parent().find('div').removeClass('bf_style_active');
	$(this).addClass('bf_style_active');
});
$('.bf_align div').click(function () {
	$(this).parent().find('div').removeClass('bf_style_active');
	$(this).addClass('bf_style_active');
});

$('#style_build_form input').on('blur',function () {
	var object3 = $(this);
	if ($(object3).data('type') =="text") {
		var newText = $(this).val();
		$('.tool_edit').closest('.element_build').find('button').text(newText);
	}
	else{
		set_value(object3);
	}
});
$('#style_build_form select').on('change',function () {
	var object3 = $(this);
	set_value(object3);
});
$('#style_build_form .bf_align div').on('click',function () {
	var value = $(this).data('value');
	var id = $('#object_style').val();
	var object = $('#'+id+' .form_field .label');
	value=="center"?$(object).css('text-align','center'):$(object).css('text-align',''+value+'');
});
function set_value(object3) {
	var key = $(object3).data('key');
	var val = $(object3).val();
	switch($(object3).data('type')){
		case "px":
		var value = ''+val+'px';
		break;
		case "color":
		var value = '#'+val+'';
		break;
		case "other":
		var value = val;
		break;
	}
	var n = $(object3).closest('#style_build_form').find('.menu_style .bf_style_active').data('child');
	var id = $('#object_style').val();
	var object = $(setting_tab[n]).data('object'); // text field button ..
	var object2 = $(setting_tab[n]).find('.bf_style_active').data('attr');
	$(object3).data('type')=="color"?$(object3).closest('.bf_color').find('input').val(val):'';
	if ($(object3).data('shadow')==true) {
		setting_shadow(object2,id,object3);
		return;
	}
	switch(object){
		case "text":
		change_setting_text(object2,id,key,value);
		break;
		case "field":
		change_setting_field(object2,id,key,value);
		break;
		case "button":
		change_setting_button(object2,id,key,value);
		break;
		case "size":
		change_setting_size(object2,id,key,value);
		break;
		case "form-background":
		change_setting_background(object2,id,key,value);
		break;
	}	
}

function setting_shadow(object2,id,object3) {
	var group = $(object3).closest('.bf_shadow');
	var shadow_x = $(group).find('.bf_size input').val();
	var shadow_y = $(group).find('.bf_line input').val();
	var shadow_blur = $(group).find('.bf_kerning input').val();
	var shadow_color = $(group).find('.bf_color input.color').val();
	var type = $('#'+id+'').data('type');
	if (type == "button" || type == "textarea" || type == "select") {
		type = $('#'+id+'').data('type');
	}else{
		type = "input";
	}
	if (object2 == "normal") {
		$('#'+id+' '+type+'').css('box-shadow',''+shadow_x+'px '+shadow_y+'px '+shadow_blur+'px '+shadow_color+'');
	}
	else if(object2 == undefined){
		$('#'+id+' .content_form').css('box-shadow',''+shadow_x+'px '+shadow_y+'px '+shadow_blur+'px '+shadow_color+'');
	}
	else{
		$('#'+id+' style').append(
			`#`+id+` `+type+`:`+object2+`{ box-shadow:`+shadow_x+`px `+shadow_y+`px `+shadow_blur+`px `+shadow_color+`}`
			);

	}
}
function change_setting_text(object2,id,key,value) {
	$('#'+id+' .beauvn_form_'+object2+'').css(''+key+'',''+value+'');
	if (object2 == "body") {
		$('.form_field .label label').css(''+key+'',''+value+'');
	}
}
function change_setting_field(object2,id,key,value){
	object2=='normal'?$('#'+id+'').find('input').css(''+key+'',''+value+''):setting_hover_typing(object2,id,key,value);
	object2=='normal'?$('#'+id+'').find('textarea').css(''+key+'',''+value+''):'';
	object2=='normal'?$('#'+id+'').find('select').css(''+key+'',''+value+''):'';

}
function change_setting_button(object2,id,key,value) {
	object2=='normal'?$('#'+id+'').find('button').css(''+key+'',''+value+''):setting_hover_typing(object2,id,key,value);
}
function setting_hover_typing(object2,id,key,value) {
	$('#'+id+' style').append(
		`#`+id+` input:`+object2+`{`+key+`:`+value+`;}`
		);
}
function change_setting_background(object2,id,key,value) {
	switch(key){
		case "background-color":
		$('#'+id+' .content_form').css(''+key+'',''+value+'');
		$('#'+id+' .element_build').css(''+key+'',''+value+'');
		break;
		case "border-width":
		$('#'+id+' .content_form').css('border',''+value+' solid #d8d8d8');
		default:
		$('#'+id+' .content_form').css(''+key+'',''+value+'');
		break;
	}
	
}
$('.step3').on('click','.edit_style',function () {
	var id = $(this).closest('.element_build').attr('id');
	var right = $('#style_build_form').css('right');
	right=="0px"?hidden_style_form():show_style_form();
	$('#object_style').val(id);
	var type = $(this).closest('.element_build').data('type');
	if (type == "button") {
		var n = 2;
	}
	else if(type =="html"){
		var n = [0];
	}
	else{
		n = [0,1];
	}
	show_menu_tab(n);
	
});
$('.step3').on('click','.style_background',function () {
	var right = $('#style_build_form').css('right');
	var n = [0,4,2,3,1];
	show_menu_tab(n);
	var id = $(this).closest('.step_form').attr('id');
	right=="0px"?hidden_style_form():show_style_form();
	$('#object_style').val(id);
});
var tab_size = $('.setting_size .select_first div');
var size = $('.setting_size .bf_setting_attribute');
$(tab_size).click(function (e) {
	var stt = $(this).data('stt');
	$(size).hide();
	$(size[stt]).show();
});
// set size form
$('.setting_size .bf_size_form').click(function () {
	var value = $(this).data('value');
	$('.setting_size .bf_size_form').removeClass('bf_style_active');
	$(this).addClass('bf_style_active');
	$('.step3 .content_form').css('width',''+value+'');
	$('.setting_size .bf_size_note').text('Preview form để xem kích thước').show().addClass('fadeInDown animated');
	setTimeout(function () { 
		$('.setting_size .bf_size_note').removeClass('fadeInDown animated'); 
	}, 1000);
	setTimeout(function () { 
		$('.setting_size .bf_size_note').hide(); 
	}, 1500);
	
});
$('.bf_setting_size input').blur(function () {
	var v = $(this).val();
	$('.step3 .content_form').width(''+v+'px');
	$('.setting_size .bf_size_note').text('Preview form để xem kích thước').show().addClass('fadeInDown animated');
	setTimeout(function () { 
		$('.setting_size .bf_size_note').removeClass('fadeInDown animated'); 
	}, 1000);
	setTimeout(function () { 
		$('.setting_size .bf_size_note').hide(); 
	}, 1500);
});
// end set size
})(jQuery)











