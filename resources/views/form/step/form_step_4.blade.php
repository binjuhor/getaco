		<div class="step step4" id="form-style" style="display: none;">
			<!-- form create -->
			<form action="
			@if(isset($key))
			{{ URL::action('TemplateFormController@create')}}
			@else 
			{{ URL::action('FormController@create') }}
			@endif" id="form_html" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			@if(isset($form_edit))
			<input type="hidden" value="{{$form_edit->id_form}}" name="id">
			@endif
			<input type="hidden" id="input_html" name="form_html">
			<input type="hidden" id="id_form" name="id_form" value="{{$id_form}}">
			<input type="hidden" id="this_theme" name="theme_form" @if(!empty($form_edit)) value="{{$form_edit->display}}" @endif >
			<input type="hidden" id="id_form_demo" name="id_form_demo" @if(isset($form_edit)) value="{{$form_edit['id_template']}}" @endif>
			<input type="hidden" id="backend_html" name="form_backend">
			<input type="hidden" id="data_display" name="display" @if(!empty($form_edit)) value="{{$form_edit->display}}" @endif>
			<input type="hidden" id="num_field" name="num_field" value="{{$num_field}}">
			<input type="hidden" id="attributejson" name="attribute">
			<input type="hidden" id="__form" name="form">

			<div class="modal fade" id="popup_display" role="dialog">
			    <div class="modal-dialog">
			      <div class="modal-content">
			        <div class="modal-body row">
			        	<div class="text-center">
			        		Custom Form Popup Dispay
			        	</div>
						<div id="extraPopupSetting"></div>
			        	<div class="button">
			        		<div class="col-md-6 text-right">
			        			<button class="btn btn_back  " data-dismiss="modal">CANCEL</button>
			        		</div>
			        		<div class="col-md-6 text-left">
			        			<button class="btn btn-primary btn-done" data-dismiss="modal">DONE</button>
			        		</div>
			        	</div>
			        </div>
			      </div>
			      
			    </div>
			</div>

			<!-- End create form -->

			<div class="" style="height: 50px;">
				&nbsp;
			</div>
			{{-------------------------------------------------}}
			<div class="container content_form_setting">
				<div class="basic_setting">
					<div class="row">
						<div class="col-md-3 label_name basic_setting_title">
							<label for="">Basic setting</label>
							<span>These settings make your projects easy to discover</span>
						</div>
						<div class="col-md-9 content">
							<div class="row">
								<label for="" class="col-md-3 text-left">Form name</label>
								<div class="col-md-9">
									<input name="name_form" class="form-control" id="" type="text" required="required" placeholder="Form name" @if(isset($form_edit)) value="{{$form_edit->form_name}}" @endif>
								</div>

							</div>
							<?php $user = Auth::User() ?>
							@if(isset($key))
								@if($user->id_role == 0)
								<div class="row">
									<label for="" class="col-md-3 text-left">Business Type</label>
									<div class="col-md-9">
										<select name="id_business" class="form-control" id="" style="width: 60%">
										 <option value="null" selected disabled>Lĩnh vực hoạt động</option>
										 @if(isset($business))
				                            @foreach($business as $orbit)
				                            <option value="{{$orbit->id_orbit}}" 
				                            	@if(isset($form_edit['id_business'])) @if($form_edit['id_business']) selected="selected" @endif @endif>{{$orbit->orbit}}
				                            </option>
				                            @endforeach
			                            @endif
										</select>
									</div>

								</div>
								@else
									<input type="hidden" value="0" name="id_business">
								@endif
							@endif

							@if(isset($key))
							<input type="hidden" value="{{$key}}" id="status_template">
							
							<div class="form-group row">
								<label for="image_form" class="col-md-3 control-label text-left">Image</label>
								<div class="col-md-9">
									<input type="file" class="form-control" id="image_form" name="image" >
								</div>
							</div>
							@endif
							<!-- <div class="row">
								<label for="" class="col-md-3 text-left">Form Description</label>
								<div class="col-md-9">
									<input name="" class="form-control" id="" type="text" required value="" placeholder="Please wait ...">
								</div>
							</div> -->
							<!-- <div class="row">
								<label for="" class="col-md-3 "></label>
								<div class="col-md-9 text-left save_template">
									<input id="save_template" type="checkbox" name="save_template" value="true"><label for="save_template">Save this form as template</label>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			@if(!isset($key))
				<div class="display_type" style="margin-top:20px;">
					<div class="row">
						<div class="col-md-3 label_name">
							<label for="">Select a form display type</label>
							<span>Here are the currently shown  form, choose and options for form</span>
						</div>
						<div class="col-md-9 content" style="overflow-y: scroll;height: 220px;">
							<div class=" row " style="height: 200px;width: 1700px;">
								@foreach($formtype as $key => $type)
								<div class="themes themeSetting col-sm-4 display" data-display="{{$key}}" style="float:left;width: 250px;">
									<div class="style">
										<div class="theme" data-style="bootstrap_1">
										</div>
										<div class="select_hidden" >
											<div class="content" style="padding:0">
												<p><img src="">You seleted this style</p>
												<a href="#" data-toggle="modal" 
												data-target="#popup_display" 
												data-formtype="{{$key}}">
													CUSTOM
												</a>
											</div>
										</div>
									</div>
									<div class="theme_name">
										<p>{{$type}}</p>
									</div>
								</div>
								@endforeach
							</div>
							<select name="setting[formType]" class="form-control hidden " id="formType">
								@foreach ( $formtype as $type => $name )
								<option
								@if(isset($settings->formType) && $settings->formType == $type){{ "selected" }}@endif
								value="{{ $type }}">{{ $name }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>

				

				<div class="effect_type">
					<div class="row">
						<div class="col-md-3 label_name effect_type_title">
							<label for="">Select an effect type  for form</label>
							<span>Here are the currently shown  form, choose and options for form</span>
						</div>
						<div class="col-md-9 content">
							<div class="row">
								<div class="col-md-8 offset-1 formDemoAnimated" style="min-height:300px;">

									<div id="formDemoAnimated" class="formDemo animated"></div>

								</div>
								<div class="col-md-4 menu_animation" style="max-height: 510px;">
									<ul class="text-left" >
										<li class="search"><span class="text_search"><input type="text" placeholder="Search an effect"></span></li>
										<div style="max-height: 440px;overflow-y: scroll;" class="effect" id="effect_in" >
										@foreach($effects['in'] as $effect =>$effectList)
											@foreach($effectList as $effectName => $ef)
												<li class="wtfEffect" data-effect="{{$effectName}}"  style="cursor: pointer;"><span class="icon" style="display: inline-block;">
													</span><span class="text">{{$ef}}</span>
													<span class="view" data-effect="{{$effectName}}" style="display:block;"></span>
												</li>
											@endforeach
										@endforeach
										</div>
									</ul>
									<input type="hidden" name="setting[effect][in]" id="input_setting_effect">
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="border">
					&nbsp;
				</div>

				<div class="effect_type2">
					<div class="row">
						<div class="col-md-3 label_name">
							<label for="">Select an effect type  for form</label>
							<span>Here are the currently shown  form, choose and options for form</span>
						</div>
						<div class="col-md-9 content">
							<div class="row">
								<label for="" class="col-md-3 text-left">Loading text</label>
								<div class="col-md-9">
									<input name="setting[loadingText]" class="form-control" id="loadingText"
									type="text" required
									value="{{ isset($settings->loadingText)?$settings->loadingText:"Please wait ..." }}">
								</div>
							</div>
							<div class="row">
								<label for="" class="col-md-3 text-left">Complete message</label>
								<div class="col-md-9">
									<input name="setting[completetext]" class="form-control" id="completetext"
									type="text" required
									value="{{ isset($settings->completetext)?$settings->completetext:"Success submit form." }}">
								</div>
							</div>
							<div class="row">
								<label for="" class="col-md-3 text-left">Failed message</label>
								<div class="col-md-9">
									<input name="setting[failedtext]" class="form-control" id="failedtext"
									type="text" required
									value="{{ isset($settings->failedtext)?$settings->failedtext:"Failed send information." }}">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="border">
					&nbsp;
				</div>
			@endif
				<div class="text-center" style="margin-bottom: 150px;margin-top: 50px;">
					<button class="btn btn_save hidden">advanced setting</button>
				</div>

			</div>

			<!-- day nay -->

			<div id="extrasettingxxx">
				@if( isset($settings->formType) && ($settings->formType == 'scroll' || 
				$settings->formType == 'timed' ||  
				$settings->formType == 'popup'))
				<div id="extraEffect">
					<div class="form-group row setting[effect]">
						<label for="dispayed" class="col-md-2 control-label">Entrances</label>
						<div class="col-md-10">
							<select id="extraFormEffect" name="" class="form-control">
								@foreach ($effects['in'] as $group => $effect )
								<optgroup label="{{ $group }}">
									@foreach ( $effect as $key => $value )
									<option 
									@if( 
									isset( $settings->effect->in ) && 
									$settings->effect->in == $key
									)
									{{ 'selected' }}
									@endif
									value="{{ $key }}">{{ $value }}</option>
									@endforeach
								</optgroup>
								@endforeach

							</select>
						</div>
					</div>

					<div class="form-group row setting[effect]">
						<label for="dispayed" class="col-md-2 control-label">Exit</label>
						<div class="col-md-10">
							<select id="extraFormEffect" name="setting[effect][exit]" class="form-control">
								@foreach ($effects['exit'] as $group => $effect )
								<optgroup label="{{ $group }}">
									@foreach ( $effect as $key => $value )
									<option 
									@if( 
									isset($settings->effect->exit) && 
									$settings->effect->exit == $key 
									)
									{{ 'selected' }}
									@endif
									value="{{ $key }}">{{ $value }}</option>
									@endforeach
								</optgroup>
								@endforeach
							</select>
						</div>
					</div>
				
				@endif
			</div>
				@if( (isset( $settings->formType ) && $settings->formType == 'fullscreen') || 
				(isset( $settings->formType ) && $settings->formType == 'scroll') )
				<div id="extraDisplayed" class="form-group setting[displayed] row">
					<label for="dispayed" class="col-md-2 control-label">Time to display</label>
					<div class="col-md-10">
						<input name="setting[dispayed]" class="form-control" id="dispayed" type="number" required 
						value="{{ isset($settings->dispayed)?$settings->dispayed:1 }}">
					</div>
				</div>
				@endif

				@if(isset( $settings->formType ) && $settings->formType == 'scroll' )
				<div  id="extraDisplayed">
					<div class="form-group row setting[scroll]">
						<label for="dispayed" class="col-md-2 control-label">Scroll effect</label>
						<div class="col-md-10">
							<select id="scrollType" name="setting[scroll][direction]" class="form-control">
								<option value="up" 
								@if(
								isset($settings->scroll->direction ) && 
								($settings->scroll->direction == 'up'))
								)
								{{ 'selected' }}
								@endif
								>
								Scroll Up
							</option>
							<option value="down"
							@if(
							isset($settings->scroll->direction ) && 
							($settings->scroll->direction == 'down'))
							)
							{{ 'selected' }}
							@endif
							>Scroll Down</option>
						</select>
					</div>
				</div>
			</div>
			@endif
			@if(
			isset($settings->scroll->direction ) && 
			($settings->scroll->direction == 'down'))
			<div id="choseScrollType">
				<div class="form-group row setting[scroll]">
					<label for="dispayed" class="col-md-2 control-label">Scroll type</label>
					<div class="col-md-10">
						<select name="setting[scroll][type]" class="form-control">
							<option value="pixel"
								@if(isset($settings->scroll->type) && $settings->scroll->type =='pixel')
								{{ 'selected' }}
								@endif
								>
								Pixel
							</option>
							<option value="screen"
								@if(isset($settings->scroll->type) && $settings->scroll->type =='screen') 
								{{ 'selected' }}
								@endif
								>
								Screen
							</option>
							<option value="percent"
								@if(isset($settings->scroll->type) && $settings->scroll->type =='percent')
								{{ 'selected' }}
								@endif
								>
								Percent
							</option>
						</select>
					</div>
				</div> 
	<div class="form-group row setting[scroll]">
		<label for="dispayed" class="col-md-2 control-label">Scroll value</label>
		<div class="col-md-10">
			<input type="number" min="0" name="setting[scroll][value]" value="{{ 
			$settings->scroll->value?$settings->scroll->value : 0 
		}}" 
		@switch($settings->scroll->type)
		@case('screen')
		{{ 'max=10' }}
		@break
		@case('percent')
		{{ 'max=100' }}
		@break
		@endswitch
		class="form-control">
	</div>
</div>
</div>
@endif

</div>

</form>
</div>
