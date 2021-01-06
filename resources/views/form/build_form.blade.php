@extends("layouts.app")

@section('extra_header')
<link id="animateCss" rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
@endsection
@section("content")
<div class="build_form" style="">
	<div class="">
		<div class=" row" id="form-heading" style="display: none">
			<div class="heading col-sm-6"  >
				<div class="step_label" data-step="1">
					<h3>Step1</h3>
					<span>select one</span>
				</div>
				<div class="step_label" data-step="2">
					<h3>Select theme for your form</h3>
					<span>Select one style availiable or create new style</span>
				</div>
				<div class="step_label" data-step="3">
					<h3>Build Form</h3>
					<span>Type form description</span>
				</div>
				<div class="step_label" data-step="4">
					<h3>Form setting</h3>
					<span>Select one style available or create new style</span>
				</div>
			</div>
			<!-- button -->
			<div class="button_step col-sm-6">
				<button id="step_next" class="btn btn-primary step_next">NEXT</button>
				<button id="step_pre" class="btn btn_back">BACK</button>
				<p class="preview_form" data-toggle="modal" data-target="#preview_step3">PREVIEW</p>
			</div>
		</div>
		<div class="" id="content_build_form" style="">
			<!-- step 1 - select form demo -->
			@include("form.step.form_step_1")
			<!-- end step 1 -->
			<!-- step 2  - select css -->
			@include("form.step.form_step_2")

			<!-- end step 2 -->
			<!-- step 3  - select field type -->
			@if(isset($form_edit))
				@if($form_edit->form)
					
					@include("form.step.form_step_3_v1")
				@else
					@include("form.step.form_step_3_v2")
				@endif
			@else
				@include("form.step.form_step_3_v2")
			@endif
			<!-- end step 3 -->

			<!-- step 4 -->

			@include("form.step.form_step_4")
			<!-- end step 4 -->
		</div>
	</div>
</div>
<!-- style -->
	<!-- setting style field -->
	@include("form.style.form_style_field")
	
<button type="button" class="btn hidden btn-info btn-lg" data-toggle="modal" data-target="#notify">Open Modal</button>
  <!-- Modal  notify-->
  <div class="modal fade" id="notify" role="dialog" style="margin: 200px">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="padding-top: 30px">
        <div class="modal-body">
          <p class="text text-center" style="color:#888888"></p>
          <div class="row">
          	<button type="button" class="btn btn-primary" data-dismiss="modal" style="height: 25px;line-height: 25px;padding: 0 15px;float:right;font-size: 12px">OK</button>
          </div>
        </div>
        
      </div>
      
    </div>
  </div>
  
@if(isset($form_edit))
<input type="hidden" value="{{$form_edit->id_form}}" id="edit_id">
<input type="hidden" value="{{$form_edit->form_backend}}" id="edit_backend">
<input type="hidden" value="{{$form_edit->source}}" id="edit_frontend">
<input type="hidden" value="{{$form_edit->form}}" id="edit_form_frontend">
@endif
<!-- form edit field -->
<input type="hidden" id="theme">

<input type="hidden" id="key" @if(isset($key)) value="{{$key}}" @else value="1" @endif>
<?php $user = Auth::User(); ?>
<input type="hidden" id="id_company" value="{{$user->id_company}}">
<!-- this theme -->
<input type="hidden" id="theme_form_v2" value="bootstap_1">
@endsection
@section('element_group')
	@include('form.form_element_group')
	<!-- setting style all form -->
	@include("form.style.form_style_all_form")
<!-- end style form -->
@endsection
@section('extra_footer')


<script>
	var url_svg = "{{ asset('/iconSVG/') }}";
	var url_preview_form = "{{ URL::action('TemplateFormController@detail') }}";
</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@if(isset($form_edit))
<script src="{{ asset('/js/builForm/build_form_v2.js') }}"></script>
<script src="{{ asset('/js/builForm/function_build_form.js') }}"></script>
<script src="{{ asset('/js/builForm/edit_form_v2.js') }}"></script>
	@if($form_edit->source)
		<script src="{{ asset('/js/builForm/buildForm.js') }}"></script>
	@else
		<script src="{{ asset('/js/builForm/build_form_v2.js') }}"></script>
		<script src="{{ asset('/js/builForm/function_build_form.js') }}"></script>
	@endif
@else
<script src="{{ asset('/js/builForm/build_form_v2.js') }}"></script>
<script src="{{ asset('/js/builForm/function_build_form.js') }}"></script>
@endif
<!-- <script src="{{ asset('/js/ckeditor/ckeditor.js') }}"></script> -->
<script src="{{ asset('/js/builForm/build_form_step4.js') }}"></script>
<script src="{{ asset('/js/builForm/attribute.js') }}"></script>
<script src="{{ asset('/js/builForm/style_build_form.js') }}"></script>
<script src="{{ asset('/js/builForm/text_form.js') }}"></script>
<script src="{{ asset('/js/builForm/load_template.js') }}"></script>
<script src="{{ asset('/js/builForm/formStep.js') }}"></script>
<script src="{{ asset('/js/builForm/set_column.js') }}"></script>
<script src="{{ asset('/js/builForm/jscolor.js') }}"></script> <!-- set color -->
<script src="{{ asset('/js/builForm/style_form.js') }}"></script> <!-- set color -->
<script src="{{ asset('/js/builForm/jquery-swapsies.js') }}"></script>
<script src="{{ asset('/js/builForm/sort_form.js') }}"></script>

<script src="{{ asset('/js/builForm/form-setting.js') }}"></script>
<!-- <script>
	CKEDITOR.replace('editor1');
</script> -->
@if(isset($form_edit))
<script src="{{ asset('/js/builForm/edit_form.js') }}"></script><!--  asdasqw -->
@endif

<script src="{{ asset('/js/builForm/css_form.js') }}"></script>
<!-- <script src="{{ asset('/js/builForm/set_theme_step2.js') }}"></script> -->
<script src="{{ asset('/js/builForm/set_theme_step2_v2.js') }}"></script>

@endsection