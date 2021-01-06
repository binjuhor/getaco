@extends('layouts.app')

@section('content')

<div class="row header_list">
	<div class="col-md-6"><h2>List Form Demo</h2></div>
	<div class="col-md-6 text-right">
		<a href="{{ URL::action('TemplateFormController@add') }}" class="btn btn-primary"><img src="" alt="">Add Template</a>
	</div>

</div>
<div class="row content_table" >
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body" style="min-height: 600px;overflow-y:auto;">
				@foreach($formDemos as $form)
					<div class="formPreview" id="form_{{$form->id_template}}">
							<img class="formPreview__thumb" src="{{$form['image']}}" alt="{{$form['name_template']}}">
						<div class="formPreview__action">
							<a href="javascript:void(0)" class="preview" data-id="{{$form->id_template}}" data-toggle="modal" data-target="#previewTemplate"><i class="fas fa-arrows-alt" title="Preview" ></i></a>
							<a  class="edit"   href="template/edit?id={{$form['id_template']}}" ><i class="fas fa-edit" title="Edit"></i></a>
							<a class="delete btn-delete-form" href="" data-toggle="modal" data-target="#note_form" data-id="{{$form->id_template}}" data-form="template"><i class="fas fa-times" title="Delete"></i></a>
							<!-- <a data-public="{{$form->status_public}}" style="float: right; margin: 0 10px;" class="public"   href="../form/template/public?id={{$form['id_template']}}" ><i class="fas fa-check-circle" title="public"></i></a> -->
						</div>
						<div class="formPreview__name text-center">
							<b class="card-text ">{{$form['name_template']}}</b>
						</div>
					</div>
				@endforeach
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
<div class="modal fade" id="previewTemplate" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body" style="padding-left: 50px;padding-top:30px">
         
        </div>
      </div>
      
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	var url_form = "{{ URL::action('TemplateFormController@delete') }}";
	var url_preview_form = "{{ URL::action('TemplateFormController@detail') }}";
</script>
<script type="text/javascript">	
   	var public = $('.templateAll');
   	$(public).each(function () {
   		var a = $(this).find('.public').data('public');
   		if (a == 0) {
   			$(this).find('.public').css('color','gray');
   		}
   		else{
   			$(this).find('.public').css('color','#337ab7');
   		}
   	});
   	
</script>
<script>
	var w = $('.card img').width();
	var h = w/1.6;
	$('.card img').height(h);
	$('.card').hover(
		function(){$(this).find('.templateAll').css('right','5%')},
		function(){$(this).find('.templateAll').css('right','-40%')}
	);
</script>
<script src="{{ asset('js/builForm/detail_form.js') }}" language="javascript"></script>


@endsection