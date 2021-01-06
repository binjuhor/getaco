@extends('layouts.app')
@section('content')
<?php $user = Auth::User(); ?>

<div class="row header_list">
	<div class="col-md-6"><h2>Form</h2></div>
	@can('stt_act')
	<div class="col-md-6 text-right">
		<a href="{{URL::action('FormController@buildForm')}}" class="btn btn-primary">
			<img src="" alt="">ADD FORM</a>
		</div>
		@endcan
	</div>

	<div class="row content_table">
		<div class="col-md-12">
			<table class="table table-striped" id="table-format">
				<thead>
					<tr>
						<th>ID</th>
						<th class="text-left">FORM NAME</th>
						<th class="text-left">DISPLAYED</th>
						<th class="text-left">SUBMITED</th>
						<th class="text-center">ACTION</th>
					</tr>
				</thead>
	
				<tbody>
					@foreach($forms as $stt => $form )
					<tr class="form" id="form_{{$form->id_form}}">
						<td>{{ $form->id_form }}</td>
						<td class="text-left"><a href="#" class="btn-popup" data-toggle="modal" data-target="#detail_form" data-id="{{$form->id_form}}" title="Detail">
							{{ $form->form_name?$form->form_name:"Untitled" }}
						</a></td>
						<td class="text-left">
							{{ @json_decode( $redis->get( 'form_'.$form->id_form ) )->show?
							@json_decode( $redis->get( 'form_'.$form->id_form  ) )->show:0}}
						</td>
						
						<td>{{ @json_decode($form->logs)->submited?@json_decode($form->logs)->submited:0 }}</td>
						<td class="text-center">
							<a href="#" class="btn-action btn-detail btn-popup" title="Detail" data-toggle="modal" data-target="#detail_form" data-id="{{$form->id_form}}" @if(@json_decode($form->setting)->formType == 'popup') data-setting="true" @endif></a>
							@can('form_act')
							<a href="{{ URL::action('FormController@copy') }}?id={{$form->id_form}}" title="Copy Form" class="btn-action btn-copy"></a>
							<a href="{{ URL::action('FormController@edit') }}?id={{$form->id_form}}" title="Edit" class="btn-action btn-edit"></a>
							<a href="#" title="Delete" class="btn-action btn-delete btn-delete-form" data-toggle="modal" data-target="#note_form" data-id="{{$form->id_form}}" data-form="form"></span></a>
							@endcan
						</td>
					</tr>
					@endforeach
					@if(count($forms) == 0)
						<tr class="text-center">
							<td colspan="4">No data</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
		<div class = "col-md-12 text-center pagination_content">{{ $forms->links() }}</div>

	</div>

	<!-- detail form -->
	<div class="modal fade" id="detail_form" role="dialog" >
		<div class="modal-dialog">
			<div class="getacoEmbed modal-content content_detail row">
			</div>
			<div style="color: white;margin: 40px 0 10px 20px;font-size: 14px;">
				Copy and paste any where you want to show this form
			</div>
			<div class="modal-content row" style="padding:15px;border-radius: 3px">
				<div class="col-sm-10">
					<textarea type="text" id="url_script_form" class="form-control col-sm-10 text_js" style="margin-bottom: 0;resize: none;" ;resize: none;></textarea>
				</div>
				<div class="col-sm-2" style="padding: 0;border-radius: 3px">
					<button class="btn-primary" onclick="coppyText()" style="height: 40px;padding: 0px 15px;text-align: center;line-height: 40px;border-radius: 50px;">COPY</button>
				</div>
			</div>
			<!-- class button -->
			<div class="class_button">
				<div style="color: white;margin: 40px 0 10px 20px;font-size: 14px;">
					Copy and paste class button
				</div>
				<div class="modal-content row" style="padding:15px;border-radius: 3px">
					<div class="col-sm-10">
						<textarea type="text" id="url_script_form2" class="form-control col-sm-10 class_js" style="margin-bottom: 0;resize: none;" ;resize: none;></textarea>
					</div>
					<div class="col-sm-2" style="padding: 0;border-radius: 3px">
						<button class="btn-primary" onclick="coppyText2()" style="height: 40px;padding: 0px 15px;text-align: center;line-height: 40px;border-radius: 50px;">COPY</button>
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="modal fade" id="note_form" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content content_note" style="padding: 20px 30px">
				<div class="text-center text_content" style="margin: 20px 0;font-weight:bold;color:#888888"></div>
				<div class="button row" style="margin: 0 auto">
					<div class="yes col-sm-6" style="text-align: center;">
						<button class="btn btn-primary btn-yes" style="height: 30px;font-size:14px;line-height: 30px;" >YES</button>
					</div>
					<div class="no col-sm-6" style="text-align: center;">
						<button class="btn btn_back btn-no " style="height: 30px;font-size:14px;line-height: 30px;" data-dismiss="modal" >NO</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" value="{{$show_id}}" id="id_form_show">
	<a class="hidden code_embed" href="{{URL::action('FormEmbedController@js')}}"></a>
	<script>
		var url_detail = "{{ asset('/app/form/detail') }}";
		function coppyText() {
		  var copyText = document.getElementById("url_script_form");
		  copyText.select();
		  document.execCommand("copy");
		}
		function coppyText2() {
		  var copyText = document.getElementById("url_script_form2");
		  copyText.select();
		  document.execCommand("copy");
		}
	</script>
	<script>
	var url_form = "{{ URL::action('FormController@delete') }}";
</script>
	@endsection

	@section('extra_footer')
	<script src="{{ asset('js/builForm/list_form.js') }}" language="javascript"></script>
	<script src="{{ asset('js/builForm/detail_form.js') }}" language="javascript"></script>
	@endsection