function create_field(type,label,attr,html){
	var field = $('.form_field');
	if (type == "name" || type == "email" || type == "phone") {
		for (var i = field.length; i >= 0; i--) {
			var a = $(field[i]).data("type");
			if (a == type) {
				$('#notify p.text').text("Not more than 2 field "+type+"");
				$('.btn-info').click();
				return false;
			}
		}
	}
	var id_form = $('#id_form').val();
	var num_field = $('#num_field').val();
	switch(type){
		case "name":
			var name = "customer_name";
			break;
		case "email":
			var name = "customer_email";
			break;
		case "phone":
			var name = "customer_phone";
			break;
		default:
			var name = 'customer_attr[field_'+id_form+'_'+num_field+']';
			break;

	}
	$('.content_form .first_content').remove();
	switch(type) {
		case "textarea":
			var new_field = `<div class="label col-sm-12"><label class="editable_text">Textarea</label></div>
			<div class="field" data-type="`+type+`"><textarea class="" name="`+name+`" placeholder="Place Holder"></textarea></div>`
			break;
		case "button":
			var new_field = `<div class="field " data-type="`+type+`"><button type="submit" class="btn ">`+label+`</button>`
			break;
		case "select":
			var new_field = `<div class="label col-sm-12"><label class="editable_text" >Select</label></div><div class="field options" data-type="`+type+`">
			<select name="`+name+`" class="">
			</select></div>`
			break;
		case "checkbox":
			var new_field = `<div class="label col-sm-12"><label class="editable_text" >`+label+`</label></div><div class="field" data-type="`+type+`">
			<div class="options row" data-name="`+name+`">
			</div></div>`
			break;
		case "radio":
			var new_field = `<div class="label col-sm-12"><label class="editable_text" >`+label+`</label></div><div class="field" data-type="`+type+`"><div class="options row" data-name="`+name+`"></div></div>`
			break;
		case "html":
			var title = html.split('_');
			var new_field = `<div class="label field col-sm-12" data-type="html" data-type2="`+title[2]+`"><p class="editable_text `+html+`">`+label+`</p></div>`
			break;
		case "phone":
			var new_field = `<div class="label col-sm-12"><label class="editable_text" >`+label+`</label></div>
			<div class="field" data-type="`+type+`"><input class="" type="text" name="`+name+`" placeholder="Place Holder"></div>`
			break;
		case "name":
			var new_field = `<div class="label col-sm-12"><label class="editable_text" >`+label+`</label></div>
			<div class="field" data-type="`+type+`"><input class="" type="text" name="`+name+`" placeholder="Place Holder"></div>`
			break;
		default:
			var new_field = `<div class="label col-sm-12"><label class="editable_text" >`+label+`</label></div>
			<div class="field" data-type="`+type+`"><input class="" type="`+type+`" name="`+name+`" placeholder="Place Holder"></div>`
	}
	create_field_append(new_field, type, id_form, num_field, name,attr);
	num_field = parseInt(num_field) + 1;
    $('#num_field').val(num_field);
}
function create_field_append(new_field,type,id_form,num_field,name,attr){
	var id = 'field_'+id_form+'_'+num_field+'';
	var class_attribute = type =="name"||type=="phone"||type=="email"||type=="button"||type=="html"?'':"fieldCustom";
	$('.content_form').append(
		`<div class="element_build `+class_attribute+`" id="`+id+`" data-name="`+name+`" data-input="`+id+`" data-type="`+type+`" data-attr="`+attr+`" data-column="1">
			<div class="content_element">
				<div class="form_field" data-type="`+type+`">
					`+new_field+`
				</div>			
			</div>
			<style data-type="hover" data-radius="0" data-opacity="1" data-border="1" data-shadow="" ></style>
		</div>`
	);
	var element = $('.step3 .element_build');
	if ($(element).length < 2) {
		edit_element(element);
	}
	if (type == "checkbox" || type == "radio") {
		var object = $('.content_form').find('#field_'+id_form+'_'+num_field+'');
		add_option_form(object);
	}
	theme_add(id); //add theme
	$('.html_2').remove();	
}
function hidden_edit_element(e) {
	var container = $('.content_form');
	if (!container.is(e.target) && container.has(e.target).length === 0 ) {
		var type = $('.tool_edit').closest('.element_build').find('.form_field').data('type');
		var id = $('.tool_edit').closest('.element_build').attr('id');
		if (type == "select") {
			var object = $('.tool_edit').closest('.element_build');
			close_option_select(object);
		}
		$('.tool_edit').remove();
		$('.sort').remove();
		$('.option').css('border','none');
		$('.add_options').remove();
		$('.step3 .content_form .element_build').removeAttr('style');
		$('.step3 .content_form .element_build .form_field').removeAttr('style');
		if(e.target.className !="style_background"){
			hidden_style_form();
		}
		// background color theo background form

		var color = $('.content_form').css('background-color');
		$('.content_form .element_build').css('background-color',color);
		type=="checkbox"||type=="radio"?set_column(id):'';

	}

}
function show_edit_element(object) {
	$('.tool_edit').remove();
	$('.sort').remove();
	$('.step3 .content_form .element_build').removeAttr('style');
	$('.step3 .content_form .element_build .form_field').removeAttr('style');
	var padding = 20;
	ef_padding_top(object,padding);
	ef_shadow(object);
	ef_add_sort(object);
	ef_tool_edit(object);
	// check type option
	var type = $(object).data('type');
	type =="checkbox"||type=="radio"?$('.tool_edit .column_option').show():$('.tool_edit .column_option').hide();

	var id = $(object).attr('id');
	var color = $('.content_form').css('background-color');
	$('.content_form .element_build').not('#'+id+'').css('background-color',color);
	

}
function show_add_option(object) {
	var a = $('.step3 .element_build').find('.add_option');
	if($(a).size() == 0){
		$(object).find('.content_element .form_field').append(
			`<div class="add_options">
				<span ><img src="`+url_svg+`/add-red.svg"></span>
				<span class="add_option" >Add new item </span>
				
			</div>`
		);
	}
	var type = $(object).find('.form_field').data('type');
	if (type == "select") {
		add_option_select(object);
	}
	border_bottom_option(object);
}
function set_column_option() {
	var column = $('.tool_edit').closest('.element_build').attr('data-column');
	if (column ==undefined) {
		column = 1;
	}
	$('.menu_column_option input[name="column_option"]').removeAttr('checked');
	$('.menu_column_option input[name="column_option"][value="'+column+'"]').prop('checked', true);
}
function set_column(id) {
	var col = $('#'+id+'').attr('data-column');
	var num_col = 100/col;
	$('#'+id+'').find('.option').css({'width':''+num_col+'%','float':'left'})
}

// effect click element_build
function ef_padding_top(object,padding) {
	$(object).css('margin-bottom','30px');
	$(object).css('background-color','white');
	$(object).css('padding-top',''+padding+'px').css('width','104%').css('margin-left','-2%');
}
function ef_shadow(object) {
	$(object).css('box-shadow','0 5px 20px 0 rgba(0, 0, 0, 0.25)');
}
function ef_add_sort(object) {
	var sort = $(object).find('.sort');
	if(sort.size() < 1){
		$(object).find('.content_element').append(
			`<div class="sort">
				<img class="sortable" src="`+url_svg+`/group-7-copy-5.svg" alt="">
			</div>`
		);
		// height_sort(object);
	}
}
// function height_sort(object){

// 	var  height = $(object).find('.form_field').height();
// 	$(object).find('.sort').height(height);
// }
function ef_tool_edit(object) {
	var tool = $(object).find('.tool_edit');
	var attr = $(object).data('attr');
	var attr1 = attr=="undefined"?'':attr;
	var require = $(object).closest('.element_build').attr('require');
	var checked = require=='true'?'checked':'';
	if(tool.size() < 1){
		$(object).append(
			`<div class="tool_edit">
				<div class="attribute col-sm-6">
					<span class="label">Attribute :</span>
					<span for="" class="attr">`+attr1+`</span>
				</div>
				<div class="right col-sm-6">
					<span class="require">
						<input type="checkbox" value="require" id="require_this_field" `+checked+`/>
						<label for="require_this_field" style="m">Require</label>
					</span>
					<span title="Delete" class="delete_field">
						<img src="`+url_svg+`/delete-1487-copy-3.svg" alt="">
					</span>
					<span title="Duplicate" class="duplicate_field">
						<img src="`+url_svg+`/clone-copy-3.svg" alt="">
					</span>
					<span title="Setting Style" class="shape edit_style" style="">
						<img src="`+url_svg+`/shape-copy.svg" alt="">
					</span>
					<span title="Column option" class="column_option"> </span>
				</div>
			</div>`
		);
		$(object).find('.tool_edit span').hide();
		var a = $(object).find('.tool_edit span');
		var b = 0
		$(a).each(function () {
			b++;
		
			$(this).show(200);
		});
	}
	// kiem tra required
	var status = $(object).find('.field').children().is(':required');
	
	if (status == false) {
		$('.no_required').removeClass('hidden');
		$('.required').addClass('hidden');
	}
	else{
		$('.no_required').addClass('hidden');
		$('.required').removeClass('hidden');
	}
}
// edit text 
function hidden_label() {
	$('.label').each(function () {
		var type = $(this).data('type');
		type=="html"?'':$(this).hide();
	});
}
function show_label() {
	$('.label').each(function () {
		var type = $(this).data('type');
		type=="html"?'':$(this).show();
	});
}
function editable_text(object) {
	var old_text = $(object).html();
	$(object).hide();
	var height = $(object).css('line-height');
	var size = $(object).css('font-size');
	var color = $(object).css('color');
	var currentClass = $(object).parent().attr('class');
	var width = currentClass== "op"?"60%":"90%";
	var spacing = $(object).css('letter-spacing');
	$(object).parent().append(
		`<input class="input_editable_text"  style="color:`+color+`;width:`+width+`;min-height:`+height+`;height:`+height+`;font-size:`+size+`; border:none; background-color:white; padding-left:0px; box-shadow:none;outline:none;resize: none;display:inline-block;letter-spacing:`+spacing+`">`
	);
	$('.input_editable_text').focus().val(old_text);
}
function editable_placeholder(object) {
	var old_text = $(object).attr('placeholder');
	$(object).val(old_text);
}
function add_new_text(object) {
	var new_text = $('.input_editable_text').val();
	if ($(object).attr('class') == "op") {
		var type = $(object).closest('.form_field').data('type');
		if (type == "select") {
			$(object).attr('data-value',new_text);
		}
		else{
			$(object).find('input').val(new_text);
		}
	}
	$('.input_editable_text').parent().find('.editable_text').text(new_text).show();
	$('.input_editable_text').remove();
}
function delete_option(object) {
	$(object).closest('.option').remove();
}
function delete_field(object) {
	var del = $(object).parent().parent().parent();
	$(del).remove();
	///remove
}
function duplicate_field(object,type) {
	if (type=="name" || type =="email" || type=="phone") {
		return;
	}
	var new_field = $(object).clone().appendTo($(object).parent());
	var id = $(new_field).attr('id');
	var a = id.split('_');

	var num_field = $('#num_field').val();
	num_field = parseInt(num_field) + 1;
	$('#num_field').val(num_field);

	var field = ''+a[0]+'_'+a[1]+'_'+num_field+'';
	$(new_field).attr('id',field);   
	$(new_field).attr('data-input',field);   
	$(new_field).find('.options').attr('data-name','customer_attr['+field+']');   
	$(new_field).find('input').attr('name','customer_attr['+field+']');   
	$(new_field).find('select').attr('name','customer_attr['+field+']');   
	$(new_field).find('textarea').attr('name','customer_attr['+field+']');   
	hidden_edit_element(key);
	show_edit_element(object);	
}
function duplicate_option(object,e) {
	$(object).find('.tool_option').remove();
	var a = $(object).closest('.options');
	var b = $(object).closest('.option').clone().appendTo($(object).closest('.options'));
	border_bottom_option($(object).closest('.options'));
	
}
function require_field(object) {
	var type = $(object).closest('.element_build').data('type');
	let status = $(object).closest('.element_build').attr('require');
	if (status === undefined) {
		$(object).closest('.element_build').attr('require','true');
		if (type != 'radio' && type != 'select' && type != 'checkbox') {
			$(object).closest('.element_build').find('.field input').attr('required','required');
			$(object).closest('.element_build').find('.field textarea').attr('required','required');
		}
	}
	else{
		$(object).closest('.element_build').removeAttr('require');
		if (type != 'radio' && type != 'select' && type != 'checkbox') {
			$(object).closest('.element_build').find('.field input').removeAttr('required');
			$(object).closest('.element_build').find('.field textarea').removeAttr('required');
		}
	}
	return;
	
}
function add_option_form(object,other) {
	var type = $(object).find('.form_field').data('type');
	var option = Math.floor(Math.random() * 100000);
	var name = $(object).find('.options').data('name');
	var col = $(object).closest('.element_build').attr('data-column');
	var width = 100/col ;
	// customer_attr[field_' 
 //              + id_form + '_' + inputNumber + ']
	if (other == "true") {
		var text = "Other";
	}
	else{
		var text = "New Option";
	}
	if (type == "select") {
		$(object).find('.options').append(
			`<div class="option" data-other="true">
				<span class="editable_text">`+text+`</span>
			</div>`
		);
	}
	else if(type == "checkbox"){
		$(object).find('.options').append(
			`<div class="option row" data-other="`+text+`" style="width:`+width+`%;float:left;">
				<div class="op">
					<input type="`+type+`" name="`+name+`[]" value="`+text+`" id="option_`+option+`"> <label for="option_`+option+`" class="editable_text">`+text+`</label>
				</div>
			</div>`
		);
	}
	else{
		$(object).find('.options').append(
			`<div class="option row" data-other="`+text+`" style="width:`+width+`%;float:left;">
				<div class="op">
					<input type="`+type+`" name="`+name+`" value="`+text+`" id="option_`+option+`"> <label for="option_`+option+`" class="editable_text">`+text+`</label>
				</div>
			</div>`
		);	
	}
	
	// height_sort(object);
	border_bottom_option(object);	
}
function add_option_select(object) {
	$(object).find('.field select').css('display','none');
	var option = $(object).find('option');
	$(option).each(function () {
		var value = $(this).text();
		if (this.selected) {
			var status = "true";
		}
		$(object).find('.field ').append(
			`<div class="option row" data-selected="`+status+`" ><span class="editable_text">`+value+`</span></div>`
		)
	});
}
function close_option_select(object){
	var all_option = $(object).find('div.option');
	$(object).find('select option').remove();
	$(all_option).each(function () {
		var text = $(this).find('span').text();
		var flag_check_selected = $(this).data('selected');
		if (flag_check_selected == true) {
			var selected = "selected";
		}
		else{
			var selected = "";
		}
		$(object).find('.options select').append(
			`<option value="`+text+`" `+selected+`>`+text+`</option>`
		);
		$(this).remove();
	});
	$(object).find('select').css('display','block');
}
function border_bottom_option(object){
	$(object).find('.option:not(.option:last-child)').css('border-bottom','solid 1px #d8d8d8');
	// height_sort(object);
}
function add_edit_option(object) {
	$(object).find('.tool_option').remove();
	var status_edit = $(object).closest('.element_build').find('.tool_edit');
	var a = $(object).closest('.element_build').attr('data-column');
	if ($(status_edit).length == 1 && $(object).closest('.element_build').find('.tool_option').length == 0) {
		var ob  = $(object).hasClass('option')?object:$(object).closest('.option');
		if (a > 1) {
			$(ob).append(
				`<div class="tool_option">
					<span style="float:right"><img src="`+url_svg+`/shape-copy-2.svg" class="show_option" style="margin-left:20px;display:inline-block;cursor:pointer"></span>
				</div>`
			);
		}
		else{
			$(ob).append(
				`<div class="tool_option">
					<span style="float:right;"><img src="`+url_svg+`/delete-1487-copy-3.svg" class="delete_field" style="margin-left:20px;display:inline-block;cursor:pointer">	</span>
					<span style="float:right;margin-top:1px"><img src="`+url_svg+`/clone-copy-3.svg" class="duplicate_field" style="margin-left:20px;display:inline-block;cursor:pointer">	</span>
					
					<span class="status_checked" style="float:right;margin-top:1px">
						<img src="`+url_svg+`/ic-playlist-add-check-24-px-copy-2.svg" class="check check_true" data-check="true" style="margin-left:20px;display:inline-block;cursor:pointer">
						<img src="`+url_svg+`/ic-playlist-add-check-24-px-copy.svg" class="check check_false" data-check="false" style="margin-left:20px;display:none;cursor:pointer">
					</span>
				</div>`
			);
		}
	};
	$(object).mouseleave(function () {
		$(object).find('.tool_option').remove();
	});

}
function add_edit_option_2() {
	$('.tool_option .show_option').css('transform','rotate(90deg)').css('transition','0.4s');
	if($('.tool_option_2').length == 0){
		$('.tool_option').append(
			`<div class="tool_option_2">
						<span class="status_checked" style="margin-top:1px">
							<img src="`+url_svg+`/ic-playlist-add-check-24-px-copy-2.svg" class="check check_true" data-check="true" >
							
						</span>
						
						<span style="margin-top:1px">
							<img src="`+url_svg+`/clone-copy-3.svg" class="duplicate_field">	
						</span>

						<span style=""><img src="`+url_svg+`/delete-1487-copy-3.svg" class="delete_field" >	</span>
						
						
					</div>`
		);

	}
	else{
		$('.tool_option_2').remove();
	}
}
function edit_element(argument) {
	var object = $(argument).closest('.element_build');
	var type = $(argument).find('.form_field').data('type');
	if (type == "checkbox" || type == "radio" || type == "select") {
		show_add_option(object);
	}
	var type_this = $('.content_form .tool_edit').closest('.element_build').data('type');
	if (type_this == "select") {
		var ob = $('.tool_edit').closest('.element_build');
		close_option_select(ob);
	}
	show_edit_element(object);
}
function change_status_checked(object) {
	var type = $(object).closest('.form_field').data('type');
	if(type == "select"){
		$(object).closest('.options').find('.option').removeAttr("data-selected");
		$(object).closest('.option').attr('data-selected','true');
		 add_edit_option(object);
	}
	else if(type == "checkbox"){
		var key = $(object).closest('.option').find('input').attr('checked');
		if (key == "checked") {
			$(object).closest('.option').find('input').removeAttr("checked");
		}
		else{
			$(object).closest('.option').find('input').attr("checked","checked");
		}
	}
	else if(type == "radio"){
		var key = $(object).closest('.options').find('input').attr('checked');
		var a = $(object).closest('.option').find('input').prop('checked',true);
	}
	
}
function hidden_style_form() {
	$('.setting_text .select_first div').removeClass('disable');
	$('#style_build_form').css('right','-380px').css('transition','0.4s');
}
function show_style_form() {
	$('#style_build_form').css('right','0px').css('transition','0.4s');
	}
// add class theme
function theme_add(id){
	var theme = $('#this_theme').val();
	var this_class = theme=="bootstrap_1"?"beauvn_default":'beauvn_'+theme+'';
	var object = id=="all"?'.content_form':'#'+id+'';
	var type = $('#'+id+'').data('type');
	if (type == "radio"||type=="checkbox"||type=="html") {
		return;
	}
	else{
		add_class(object,this_class);
	}
	function add_class() {
		var class_group = ['beauvn_default','beauvn_template_2','beauvn_template_3'];
			$(''+object+'').find('.field').children().removeClass('beauvn_template_2').removeClass('beauvn_template_3').removeClass('beauvn_default');
		$(''+object+'').find('.field').children().addClass(this_class);
	}
	theme=="bootstrap_1"?show_label():hidden_label();
	
}
function create_menu(type,currentPos) {
	if(type =="html"){
		$('.content_form').append(
			`<div class="html_2">
				<div class="icon"></div>
				<p data-style="title">Title</p>
				<p data-style="subtitle">Subtitle</p>
				<p data-style="body">Body</p>
			</div>`
		);
	}
	else if(type == "attribute"){
		$('.attribute_menu').show().css({'top':currentPos.top,'left':currentPos.left});
		console.log('ok');
	}
}
function create_field_attribute(label,name,type,id,option,attribute) {
	var id2 = name;
	name = 'customer_attr['+name+']';
	switch(type) {
		case "textarea":
			var new_field = `<div class="label col-sm-12"><label class="editable_text">Textarea</label></div>
			<div class="field" data-type="`+type+`"><textarea class="" name="`+name+`" placeholder="Place Holder"></textarea></div>`
			break;
		case "select":
			var option2 = '';
			for (var i = 0 ; i <= option.length - 1; i++) {
				option2 = option2 + '<option value="'+option[i]['option_value']+'">'+option[i]['option_name']+'</option>';
			}
			var new_field = `<div class="label col-sm-12"><label class="editable_text" >Select</label></div><div class="field options" data-type="`+type+`">
			<select name="`+name+`" class="">
				`+option2+`
			</select></div>`
			break;
		case "checkbox":
			var option2 = '';
			for (var i = 0 ; i <= option.length - 1; i++) {
				var num = Math.floor(Math.random() * 100000);
				option2 = option2 + `<div class="option row" data-other="">
				<div class="op">
					<input type="`+type+`" name="`+name+`[]" value="`+option[i]['option_value']+`" id="option_`+num+`"> <label for="option_`+num+`" class="editable_text">`+option[i]['option_name']+`</label>
				</div>
				</div>`;
			}
			var new_field = `<div class="label col-sm-12"><label class="editable_text" >`+label+`</label></div><div class="field" data-type="`+type+`">
			<div class="options row" data-name="`+name+`">
				`+option2+`
			</div></div>`
			break;
		case "radio":
			var option2 = '';
			for (var i = 0 ; i <= option.length - 1; i++) {
				option2 = option2 + `<div class="option row" data-other="" >
				<div class="op">
					<input type="`+type+`" name="`+name+`" value="`+option[i]['option_value']+`" id="option_`+num+`"> <label for="option_`+num+`" class="editable_text">`+option[i]['option_value']+`</label>
				</div>
				</div>`;
			}
			var new_field = `<div class="label col-sm-12"><label class="editable_text" >`+label+`</label></div><div class="field" data-type="`+type+`"><div class="options row" data-name="`+name+`">`+option2+`</div></div>`
			break;
		default:
			var new_field = `<div class="label col-sm-12"><label class="editable_text" >`+label+`</label></div>
			<div class="field" data-type="`+type+`"><input class="" type="`+type+`" name="`+name+`" placeholder="Place Holder"></div>`
	}
	$('.content_form').append(
		`<div class="element_build" id="`+id2+`" data-name="`+name+`" data-input="`+id+`" data-type="`+type+`" data-attr="`+attribute+`" data-column="1">
			<div class="content_element">
				<div class="form_field" data-type="`+type+`">
					`+new_field+`
				</div>			
			</div>
			<style data-type="hover" data-radius="0" data-opacity="1" data-border="1" data-shadow="" ></style>
		</div>`
	);
	$('.first_content').remove();
	var element = $('.step3 .element_build');
	if ($(element).length < 2) {
		edit_element(element);
	}
	theme_add(id2); //add theme
	$('.html_2').remove();
	$('.attribute_menu').hide();

}



