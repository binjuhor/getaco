
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body" >
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn_select" data-dismiss="modal">Select</button>
				<button type="button" class="btn btn_back" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
<!-- end modal -->
<div class="step step1" style="display: none">
	<div class="image_step1">
		<img src="{{ asset('images/undraw-choose-80-qg.svg') }}" alt="">
	</div>
	<div class="heading_step1">
		<p class="heading">Start Building Your Form</p>
		<p class="text_small">What form do you want to design today?</p>
	</div>
	<div class="row" id="step1_select_form">	
		@foreach($form_demos as $demo)
		<div class="template" style="">
			<div class="frames">
				<div class="form_demo template_form"  data-name="{{$demo->name_template}}" 
					data-image="{{$demo->image}}">
					<input type="hidden" value="{{$demo->id_template}}" class="id_template">
					<input type="hidden" value="{{$demo->source}}" class="source_form">
					<input type="hidden" value="{{$demo->name_template}}" class="name_form">
					<input type="hidden" value="{{$demo->theme}}" class="theme_template">
					<div class="" style="height: 100%">
						<img src="{{$demo->image}}" alt="" style="width: 100%;height: 100%;">
					</div>
				</div>
				<div class="select_hidden">
					<div class="content">
						<p><img src="">Seleted this form</p>
						<a class="preview" href="#" data-toggle="modal"	data-target="#myModal" data-id="{{$demo->id_template}}">PREVIEW</a>
					</div>
				</div>
			</div>
			<div class="theme_name">
				<p>{{$demo->name_template}}</p>
			</div>
		</div>
		@endforeach
		<div class="template">
			<div class="frames" >
				<div class="form_subscribe form_demo" >
					<input type="hidden" value="0" class="id_template">
					<div class="panel-body" style="padding: 0;" >
						<img src="{{asset('/images/FormDemo/form-contact.png')}}" alt="" style="width: 100%;height: 100%;">
					</div>
				</div>
				<div class="select_hidden">
					<div class="content">
						<p><img src="">Seleted this form</p>
					</div>
				</div>
			</div>
			<div class="theme_name">
				<p>Form Subscribe</p>
			</div>
		</div>
		<div class="template">
			<div class="frames">
				<div class=" form_other form_demo" >
					<input type="hidden" value="0" class="id_template">
					<div class="panel-body" style="padding: 0" >
					</div>
				</div>
				<div class="select_hidden">
					<div class="content">
						<p><img src="">Seleted this form</p>
					</div>
				</div>
			</div>
			<div class="theme_name">
				<p>Blank</p>
			</div>
		</div>
	</div>
	<div class="button_step1">
		<button class="btn btn-primary step_next">NEXT STEP</button>
	</div>
</div>