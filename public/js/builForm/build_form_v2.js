(function($){
	"use trict";
	
	$('#element_type_group p.element').draggable({
		revert:"valid",
		helper:"clone",
		drag: function(e,ui){
			$(ui.helper).css({"background-color":"#ff4669","color":"white","border-radius":"3px","box-shadow":"0 10px 20px 0 rgba(0, 0, 0, 0.25),"});
			$(ui.helper).find('.copy-2').css('display','inline-block');
			$(ui.helper).find('.copy').css('display','none');
			$(ui.helper).find('.gray').css('display','none');
			$(ui.helper).css('cursor','-webkit-grabbing');
		}

	});
	$('.step3 .content_form').droppable({
		accept:".element",
		drop: function (e, ui) {
	      	// $(ui.draggable).clone().appendTo($(this));

	      	var a = ui.draggable.attr('class').split(' ')[0];
	      	$(ui.helper).fadeOut("1500", function() {
	      		$(this).css('display','none');
	      	});
	      	var type = $(ui.helper).data('type');
	      	var label = $(ui.helper).data('label');
	      	var attr = $(ui.helper).data('attribute');
	      	var currentPos = ui.helper.position();
	      	type=="attribute"||type=="html"?create_menu(type,currentPos):create_field(type,label,attr);
      	
      }
  });
	$( function() {
		$( ".content_form" ).sortable({

			start: function(e,ui){
	        	$(ui.helper).find('.form_field').hide();
	        	$(ui.helper).height('180px');
	        	$(ui.helper).find('.form_field').before(`<div class="loadding"></div>`);
	        },
			axis: "y",
			cursor: "-webkit-grabbing",
			handle:".sortable",
			placeholder: "sortable-placeholder",
			opacity:"0.9",
			forcePlaceholderSize:true,
	        tolerance: 'pointer',
	        connectWith: ".content_form",
	        forceHelperSize: true,
	        stop: function (e,ui) {
	        	$('.loadding').remove();
	        	$('.form_field').show();
	        },
			activate:function (e,ui) {
				$(ui.helper).css('transition','none');

			}
		});
		$( ".content_form" ).disableSelection();
	});
	// $( function() {
	// 	$( ".option" ).draggable({
	// 		axis: "y",
	// 		delay:0,
	// 		cursor:"grabbing",
	// 		zIndex:0,
	// 		activate:function (e,ui) {
	// 			$(ui.helper).css('transition','none');
	// 			console.log('ok');
	// 		}
	// 	});
	// 	$( ".content_form" ).disableSelection();
	// });

	$('.step3 .content_form').on('click mouseover','.content_element',function (e) {
		var tool = $(this).closest('.element_build').find('.tool_edit');
		if (e.type == "click") {
			if (tool.size() > 0 ) {
				if ($(e.target).attr('class') == "editable_text") {
					editable_text($(e.target));
					return false;
				}
				if (e.target.localName == "label" || e.target.localName == "p") { 
					editable_text(e.target);
					return false;
				}
				else if(e.target.localName == "input" || e.target.localName == "textarea"){ 
					editable_placeholder(e.target);
					return false;
				}

				else if (e.target.localName == "span") {
				// add add_option
				var child = e.target;
				var object = $(this);
				var class_child = $(child).attr('class');
				if (class_child == "add_option") {
					add_option_form(object);
				}
				else if (class_child == "option_other") {
					var other = "true";
					add_option_form(object,other);
				}
			}
			if ($(e.target).attr("class") == "delete_field") {
				delete_option(e.target);
				border_bottom_option($(e.target).closest('.field'));
				return false;
			}
			else if($(e.target).attr("class") == "duplicate_field"){
				var object = $(e.target).closest('.option');
				duplicate_option(object,e);
				return false;
			}
			else if($(e.target).attr("class").split(" ")[0] == "check"){
				var object = $(e.target);
				change_status_checked(object);
			}
			else if($(e.target).attr("class") == "show_option"){
				add_edit_option_2();
				return false;
			}
			if ($(object).attr("class") == "option") {
				$(object).css('border-top','1px solid gray');
				return false;
			}
			return false;
		}else {
			edit_element(this);
			
		}
	}
	else{
		var object = $(e.target);
		if ($(object).closest('.option').length) {
			add_edit_option(object);
			
			return ;
		}
		return false;
	}		
	return false;

});
	$('#content').click(function(e) {
		if (!$(e.target).closest("#style_build_form").length && !$(e.target).closest(".content_form").length && !$(e.target).closest(".html_2").length) {
			hidden_edit_element(e);
		}
	});

// edit label field
$('#content').on('keypress','.input_editable_text', function (e) { //line 27
	
	if (e.which == 13) {
		var object = $(this).parent();
		return add_new_text(object);
	}
});
$('#content').on('blur','.input_editable_text', function (e) { //line 27
	
	var object = $(this).parent();
	return add_new_text(object);
});
// edit place holder
$('#content').on('keypress','.field input', function (e) { //open input edit - line 30
	if (e.which == 13 ) {
		var new_text = $(this).val();
		if (new_text == null) {
			$(this).attr('placeholder',old_text);
			$(this).val('');
		}
		else{
			$(this).attr('placeholder',new_text);
			$(this).val('');
		}
		$(this).blur();
	}
});
$('#content').on('keypress','.field textarea', function (e) { //open input edit - line 30
	if (e.which == 13 ) {
		var new_text = $(this).val();
		if (new_text == null) {
			$(this).attr('placeholder',old_text);
			$(this).val('');
		}
		else{
			$(this).attr('placeholder',new_text);
			$(this).val('');
		}
		$(this).blur();

	}
});
// delete element field
$('#content').on('click','.delete_field',function () {
	var object = $(this);
	delete_field(object);
});
// duplicate element field
$('#content').on('click','.duplicate_field',function () {
	var object = $(this).closest('.element_build');
	var type = $(object).closest('.element_build').data('type');
	duplicate_field(object,type);
});
// Require
$('#content').on('change','#require_this_field',function () {
	var object = $(this);
	require_field(object);
});
$('.step3').on('click','.add_step',function () {
	var object = $(this).closest('.step_form');
	var new_step = $(object).clone().appendTo($(object).parent());
	$(new_step).find('.content_form').html(' ');
});
$('.step3').on('click','.delete_step',function () {
	var object = $(this).closest('.step_form').find('.content_form  .element_build').remove();
	
});
$('.step3').on('click','.column_option',function () {
	var status = $('.menu_column_option').css('display');
	var a = $(this).closest('.right');
	status=="block"?remove_menu_column(a):show_menu_column(a);

	function show_menu_column(a) {
		$(a).append(
			`<div class="menu_column_option">
			<div><input type="radio" id="option_1_col" name="column_option" class="form-control" value="1"><label for="option_1_col">1 Column</label></div>
			<div><input type="radio" id="option_2_col" name="column_option" class="form-control" value="2"><label for="option_2_col">2 Column</label></div>
			<div><input type="radio" id="option_3_col" name="column_option" class="form-control" value="3"><label for="option_3_col">3 Column</label></div>
			<div><input type="radio" id="option_4_col" name="column_option" class="form-control" value="4"><label for="option_4_col">4 Column</label></div>
			</div>`
			);

		$( ".menu_column_option" ).animate({height: '155px',},200);
		$( ".menu_column_option div" ).animate({margin: '5px',}, 200);
		var object = $(this).closest('.element_build');
		set_column_option(object);
	};

	function remove_menu_column(a){
		$( ".menu_column_option div" ).animate({marginBottom: '-25px',}, 200);
		$( ".menu_column_option" ).animate({height: '0px',},200,function () {
			$('.menu_column_option').remove();
		});
	}

});
$('.step3').on('change','input[name^="column_option"]',function(){
	var value = $(this).val();
	$('.tool_edit').closest('.element_build').attr('data-column',value);
});

$('.content_form').on('click','.html_2 p',function () {
	var value = $(this).data('style');
	var html = 'beauvn_form_'+value+'';
	var type = "html";
	var label = 'This is '+value+'';
	var attr  = "NONE";
	create_field(type,label,attr,html);
});
// search
$('#element_type_group p.search input').focus(function () {
	$('#element_type_group p.search input').keypress(function (e) {
		$('#element_type_group p').each(function () {
			var a = $('#element_type_group p.search input').val();
			a==""?$('#element_type_group p').show():'';
			var text = $(this).text();
			var status = text.indexOf(a);
			if (status < 0 ) {
				$(this).not('p.search').hide();
			}
			else{
				$(this).show();
			}
		});
	});
});
$('#element_type_group p.search input').on('blur',function () {
	$(this).val('');
	$('#element_type_group p').show();
});
$('.attribute_menu').on('click','p.element',function () {
	var label = $(this).data('label');
	var name = $(this).data('name');
	var type = $(this).data('type');
	var id = $(this).data('id');
	var option = $(this).data('option');
	var attribute = $(this).data('attribute');
	$(this).hide();
	create_field_attribute(label,name,type,id,option,attribute);
	

});
$('.attribute_menu .hidden_tab').click(function () {
	$('.attribute_menu').hide();
});
// add id form
var id = $('#id_form').val();
$('.content_form').addClass('form_'+id+'');

// preview form
$('.preview_form').click(function(){
	var html = $('.step_form').html();
	$('#preview_step3 .modal-content').html(html);
	$('#preview_step3 .modal-content .setting_form').remove();
	$('#preview_step3 .modal-content .content_form').removeClass('col-md-8 col-sm-offset-2').addClass('col-md-1');
	var width = $('#preview_step3 .modal-content .content_form').width();
	if (width > "999") {
		$('#preview_step3 .modal-content .content_form').css('margin-left','0px');
	}
	else{
		$('#preview_step3 .modal-content .content_form').css('margin-left','200px');
	}
});
$('#content').on('click','.html_2 .icon',function () {
	$('.html_2').remove();
});
// edit type button
$('.content_form').on('click','.element_build button',function () {
	if($(this).closest('.element_build').find('.tool_edit').length){
		if (!$('input.editable_button').length) {
			var old = $(this).text();
			$(this).empty();
			$(this).append(`<input type="text" value="`+old+`" class="editable_button">`)
		}
	};
});
$('.content_form').on('keypress','.editable_button', function (e) { //line 27
	if (e.which == 13) {
		var new_text = $(this).val();
		$(this).parent().text(new_text);
		$(this).remove();
		return false;
	}
	
});
$('#content').on('blur','input.editable_button',function function_name() {
	var new_text = $(this).val();
	$(this).parent().text(new_text);
	$(this).remove();
	return false;
})
// set column option
})(jQuery)









