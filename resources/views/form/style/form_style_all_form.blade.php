
<div id="style_build_form" class="style_build_form" style="display:none" >
	<input type="hidden" id="object_style">
	<!-- custom text -->
	<div class="setting_style setting_text" data-object="text">
		<div class="text_style bf_style">
			<div class="select_first">
				<label class="col-sm-12">TEXT STYLE</label>
				<div class="col-sm-4 title bf_style_active" data-attr="title">
					<p title="Title" data-type="title" class="text_select">A</p>
					<p class="text_text">Title</p>
				</div>
				<div class="col-sm-4 subtitle" data-attr="subtitle">
					<p title="subtitle" data-type="subtitle" class="text_select">A</p>
					<p class="text_text">Subtitle</p>
				</div>
				<div class="col-sm-4 body" data-attr="body">
					<p title="body" data-type="body" class="text_select">A</p>
					<p class="text_text">Body</p>
				</div>			
			</div>
			<div class="bf_setting_attribute bf_text_attribute ">
				<div class="font row">
					<p class="col-sm-4 text_text">Font</p>
					<div class="col-sm-8">
						<select name="" id="bf_text_font" class="form-control" data-key="font-family" data-type="other">
							<option value="muli">Muli</option>
						</select>
					</div>
				</div>
				<div class="weight row">
					<p class="col-sm-4 text_text">Weight</p>
					<div class="col-sm-8">
						<select name="" id="bf_text_weight" class="form-control" data-key="font-weight" data-type="other">
							<option value="normal">Normal</option>
							<option value="bold">Bold</option>
						</select>
					</div>
				</div>
				<div class="row bf_size_line">
					<div class="bf_size">
						<p class="text_text">Size</p>
						<input type="text" class="form-control" data-key="font-size" data-type="px" value="14">
					</div>
					<div class="bf_line">
						<p class="text_text">Line</p>
						<input type="text" class="form-control" data-key="line-height" data-type="px" value="14">
					</div>
					<div class="bf_kerning">
						<p class="text_text">Kerning</p>
						<input type="text" class="form-control" data-key="letter-spacing" data-type="px" value="1">
					</div>
				</div> 
				<div class="row bf_opacity">
					<label for="" class="col-sm-6">Opacity</label>
					<input type="range" value="100" min="0" max="1" step="0.1" data-key="opacity" data-type="other">
				</div>
				<div class="row bf_align">
					<div class="left" data-key="text-align" data-value="left" data-type="other">
					</div>
					<div class="center" data-key="text-align" data-value="center" data-type="other">
					</div>
					<div class="right" data-key="text-align" data-value="right" data-type="other">
					</div>
				</div>
				<div class="bf_color">
					<p class="text_text col-sm-3">Color</p>
					<input type="text" class="text_color col-sm-6" data-key="color" data-type="color">
					<input type="color" class="color col-sm-3" id="bf_color" data-key="color" data-type="color">
				</div>
			</div>
		</div>
	</div>
	<!-- custom field -->
	<div class="setting_style setting_field" data-object="field">
		<div class="field_style bf_style">
			<div class="select_first">
				<label class="col-sm-12">STATUS</label>
				<div class="col-sm-4 nomarl btn_style btn_nomarl bf_style_active" data-attr="normal">
					<a href="#"  class=""> </a>
					<p class="text_text">Normal</p>
				</div>
				<div class="col-sm-4 hover btn_style btn_hover" data-attr="hover">
					<a href="#" class=""> </a>
					<p class="text_text">Hover</p>
				</div>
				<div class="col-sm-4 typing btn_style btn_typing" data-attr="focus">
					<a href="#" class=""> </a>
					<p class="text_text">Typing</p>
				</div>			
			</div>
			<div class="bf_setting_attribute bf_field_attribute ">
				<div class="row width_height">
					<div class="bf_width">
						<p class="text_text">Width</p>
						<select name="" id="" class="form-control" data-key="width" data-type="other">
							<option value="">other</option>
							@for($i = 1;$i < 11;$i++)
							<option value="{{$i*10}}%">{{$i*10}}%</option>
							@endfor
						</select>
					</div>
					<div class="bf_lock">
						<a href="#"  class="btn_lock"> </a>
					</div>
					<div class="bf_height">
						<p class="text_text">Height</p>
						<input type="number" class="form-control" data-key="height" data-type="px">
					</div>
				</div>
				<div class="row bf_opacity bf_radius">
					<label for="" class="col-sm-6">Radius</label>
					<input type="range" value="1" min="0" max="100" step="1" data-key="border-radius" data-type="px">
				</div>
				<div class="row bf_opacity">
					<label for="" class="col-sm-6">Opacity</label>
					<input type="range" value="1" min="0" max="1" step="0.1" data-key="opacity" data-type="other">
				</div>
				<div class="row bf_color">
					<p class="text_text col-sm-3">Color</p>
					<input type="text" class="text_color col-sm-6">
					<input type="color" class="color col-sm-3" id="bf_color" data-key="color" data-type="color" value="#000000">
				</div>
				<div class="row bf_opacity bf_border_thickness">
					<label for="" class="col-sm-8">Border thickness</label>
					<input type="range" value="1" max="20" step="1" data-key="border-width" data-type="px">
				</div>
			</div>
			<div class="bf_setting_attribute bf_shadow" style="border-top: 1px #d8d8d8 solid">
				<div class="row bf_color">
					<p class="text_text col-sm-3">Color</p>
					<input type="text" class="text_color col-sm-6" data-shadow="true" data-type="color">
					<input type="color" class="color col-sm-3" id="bf_color" data-key="box-shadow" data-type="color" data-shadow="true" value="#000000">
				</div>
				<div class="row bf_size_line">
					<div class="bf_size">
						<p class="text_text">X</p>
						<input type="number" class="form-control" data-key="shadow-x" data-type="px" data-shadow="true" value="0">
					</div>
					<div class="bf_line">
						<p class="text_text">Y</p>
						<input type="number" class="form-control" data-key="shadow-y" data-type="px" data-shadow="true" value="0">
					</div>
					<div class="bf_kerning">
						<p class="text_text">Blur</p>
						<input type="number" class="form-control" data-key="shadow-blur" data-type="px" data-shadow="true" value="0">
					</div>
				</div> 
				<div class="row bf_opacity">
					<label for="" class="col-sm-6">Opacity</label>
					<input type="range" value="1" min="0" max="1" step="0.1" data-key="opacity" data-type="other">
				</div>
			</div>
		</div>
	</div>
	<!-- custom button -->
	<div class="setting_style setting_button setting_field" data-object="button">
		<div class="field_style bf_style">
			<div class="select_first">
				<label class="col-sm-12">BUTTON</label>
				<div class="col-sm-4 nomarl btn_style btn_nomarl bf_style_active" data-attr="normal">
					<a href="#"  class=""> </a>
					<p class="text_text">Normal</p>
				</div>
				<div class="col-sm-4 hover btn_style btn_hover" data-attr="hover">
					<a href="#" class=""> </a>
					<p class="text_text">Hover</p>
				</div>
				<div class="col-sm-4 typing btn_style btn_typing" data-attr="focus">
					<a href="#" class=""> </a>
					<p class="text_text">Typing</p>
				</div>			
			</div>
			<div class="bf_setting_attribute bf_field_attribute ">
				
				<div class="row width_height">
					<div class="bf_width">
						<p class="text_text">Width</p>
						<select name="" id="" class="form-control" data-key="width" data-type="other">
							<option value="">other</option>
							@for($i = 1;$i < 11;$i++)
							<option value="{{$i*10}}%">{{$i*10}}%</option>
							@endfor
						</select>
					</div>
					<div class="bf_lock">
						<a href="#"  class="btn_lock"> </a>
					</div>
					<div class="bf_height">
						<p class="text_text">Height</p>
						<input type="number" class="form-control" data-key="height" data-type="px">
					</div>
				</div>
				<!-- <div class="row label_button" style="margin-bottom: 20px">
					<p for="" class="col-sm-4 text_text">Label</p>
					<input type="text" class="col-sm-8" data-type="text">
				</div> -->
				<div class="row bf_opacity bf_radius">
					<label for="" class="col-sm-6">Radius</label>
					<input type="range" value="1" min="0" max="100" step="1" data-key="border-radius" data-type="px">
				</div>
				<div class="row bf_opacity">
					<label for="" class="col-sm-6">Opacity</label>
					<input type="range" value="1" min="0" max="1" step="0.1" data-key="opacity" data-type="other">
				</div>
				<div class="row bf_color">
					<p class="text_text col-sm-3">Color</p>
					<input type="text" class="text_color col-sm-6">
					<input type="color" class="color col-sm-3" id="bf_color" data-key="background-color" data-type="color" value="#000000">
				</div>
				<div class="row bf_opacity bf_border_thickness">
					<label for="" class="col-sm-8">Border thickness</label>
					<input type="range" value="1" max="20" step="1" data-key="border-width" data-type="px">
				</div>
			</div>
			<div class="bf_setting_attribute bf_shadow" style="border-top: 1px #d8d8d8 solid">
				<div class="row bf_color">
					<p class="text_text col-sm-3">Color</p>
					<input type="text" class="text_color col-sm-6" data-shadow="true" data-type="color">
					<input type="color" class="color col-sm-3" id="bf_color" data-key="box-shadow" data-type="color" data-shadow="true" value="#000000">
				</div>
				<div class="row bf_size_line">
					<div class="bf_size">
						<p class="text_text">X</p>
						<input type="number" class="form-control" data-key="shadow-x" data-type="px" data-shadow="true" value="0">
					</div>
					<div class="bf_line">
						<p class="text_text">Y</p>
						<input type="number" class="form-control" data-key="shadow-y" data-type="px" data-shadow="true" value="0">
					</div>
					<div class="bf_kerning">
						<p class="text_text">Blur</p>
						<input type="number" class="form-control" data-key="shadow-blur" data-type="px" data-shadow="true" value="0">
					</div>
				</div> 
				<div class="row bf_opacity">
					<label for="" class="col-sm-6">Opacity</label>
					<input type="range" value="1" min="0" max="1" step="0.1" data-key="opacity" data-type="other">
				</div>
			</div>
		</div>
	</div>
	<!-- custom size -->
	<div class="setting_style setting_size" data-object="form">
		<div class="field_style bf_style">
			<div class="select_first">
				<label class="col-sm-12">SIZE</label>
				<div class="col-sm-6 bf_custom_size btn_style btn_custom_size" data-attr="custom-size" data-stt="1">
					<a href="#"  class="" > </a>
					<p class="text_text">Custom size</p>
				</div>
				<div class="col-sm-6 bf_pick_size btn_style btn_pick_size bf_style_active" data-attr="pick-size" data-stt="0">
					<a href="#" class="" > </a>
					<p class="text_text">Pick size</p>
				</div>

			</div>
				<div class="bf_size_note" ></div>
			<div class="bf_setting_attribute bf_setting_size">
				<div class="bf_size_form size_s bf_style_active" data-key="width" data-value="500px" data-type="other">
					<label for="">S</label>
					<p class="text_text">500-auto</p>
				</div>
				<div class="bf_size_form size_m" data-key="width" data-value="600px" data-type="other">
					<label for="">M</label>
					<p class="text_text">600-auto</p>
				</div>
				<div class="bf_size_form size_l" data-key="width" data-value="800px" data-type="other">
					<label for="">L</label>
					<p class="text_text">800-auto</p>
				</div>
				<div class="bf_size_form size_xl" data-key="width" data-value="1000px" data-type="other">
					<label for="">XL</label>
					<p class="text_text">1000-auto</p>
				</div>
			</div>
			<div class="bf_setting_attribute bf_setting_size" style="display: none">
				<div class="">
					<p class="text_text">Width</p>
					<input type="number" class="form-control" data-key="width" data-type="px">
				</div>
				
			</div>
			
		</div>
	</div>
	<!-- custom form -->
	<div class="setting_style setting_background" data-object="form-background">
		<div class="background_style bf_style">
			<div class="bf_setting_attribute bf_background">	
				<div class="row bf_opacity bf_radius">
					<label for="" class="col-sm-6"></label>
					<input type="range" value="3">
				</div>
				<div class="row bf_opacity bf_radius">
					<label for="" class="col-sm-6">Opacity</label>
					<input type="range" value="1" min="0" max="1" step="0.1" data-key="opacity" data-type="other">
				</div>
				<div class="row bf_color">
					<p class="text_text col-sm-3">Color</p>
					<input type="text" class="text_color col-sm-6" data-key="background-color" data-type="color">
					<input type="color" class="color col-sm-3" id="bf_color" data-key="background-color" data-type="color" value="#ffffff">
				</div>
				<div class="row bf_opacity bf_radius">
					<label for="" class="col-sm-8">Border thickness</label>
					<input type="range" value="1" min="1" max="20" step="1" data-key="border-width" data-type="px">
				</div>
			</div>
			<div class="bf_setting_attribute bf_shadow" style="border-top: 1px #d8d8d8 solid;">
				<div class="row bf_color">
					<p class="text_text col-sm-3">Color</p>
					<input type="text" class="text_color col-sm-6" data-key="color" data-type="color">
					<input type="color" class="color col-sm-3" id="bf_color" data-key="color" data-type="color" data-shadow="true" value="#000000">
				</div>
				<div class="row bf_size_line">
					<div class="bf_size">
						<p class="text_text">X</p>
						<input type="number" class="form-control" data-key="shadow-x" data-type="px" data-shadow="true" value="0">
					</div>
					<div class="bf_line">
						<p class="text_text">Y</p>
						<input type="number" class="form-control" data-key="shadow-y" data-type="px" data-shadow="true" value="0">
					</div>
					<div class="bf_kerning">
						<p class="text_text">Blur</p>
						<input type="number" class="form-control" data-key="shadow-blur" data-type="px" data-shadow="true" value="0">
					</div>
				</div> 
				<div class="row bf_opacity">
					<label for="" class="col-sm-6">Opacity</label>
					<input type="range" value="1" min="0" max="1" data-key="opacity" data-type="other">
				</div>
			</div>
		</div>
	</div>
	<div class="menu_style">
		<div class="bf_menu menu_text" data-child="0" data-object="text">
			<img src="" alt="">
			<p>Text</p>
		</div>
		<div class="bf_menu menu_field" data-child="1" data-object="field">
			<img src="" alt="">
			<p>Field</p>
		</div>
		<div class="bf_menu menu_button" data-child="2" data-object="button">
			<img src="" alt="">
			<p>Button</p>
		</div>
		<div class="bf_menu menu_size" data-child="3" data-object="size">
			<img src="" alt="">
			<p>Size</p>
		</div>
		<div class="bf_menu menu_background" data-child="4" data-object="background">
			<img src="" alt="">
			<p>Background</p>
		</div>
	</div>
</div>
