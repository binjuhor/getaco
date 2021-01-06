@extends('layouts.app')

@section('content')
<a class="btn btn_back" href="{{URL::action('FormController@index')}}">Back to list</a>
<div class="row">

	
	<div class="col-sm-12">
		
			<div id="detail_form" style="width:90%;margin: 0 5%">
				<input type="hidden" value="{{$form->source}}">
				<form action="{{URL::action('CustomerController@dataCustomer')}}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="id_form" value="{{$form->id_form}}">
				<div class="form">
			
				</div>
				</form>
			</div>
	</div>
	<div class="col-sm-6" style="margin: 10px 3%">
		<textarea name="" id="__embedCode" cols="30" rows="5" class="form-control" readonly style="border-radius:3px;background: white;box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.25);">
			<script id="__geTaco{{ $form->id_form }}" src="{{URL::action('FormEmbedController@js')}}?id={{$form->id_form}}"></script>
		</textarea >
		@if($settings->formType =='popup')
			<small>Copy and paste this js to footer ( before body close tag ).</small>
			<br>
			<br>
			<input type="text" id="formModal" class="form-control" readonly value="__getAcoPopup{{ $form->id_form }}">
			<small>Copy this class add to element</small>
		@else
			<small>Copy and paste any where you want to show this form</small>
		@endif
 
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	jQuery(function() {
		var source = $('#detail_form input').val();
		$('#detail_form .form').html(source);
	});
</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('/js/builForm/build_form_v2.js') }}"></script>
		<script src="{{ asset('/js/builForm/function_build_form.js') }}"></script>
<script>
	jQuery(function() {
		$('.content_form').removeClass('col-md-8').removeClass('col-sm-offset-2');
	});
</script>
@endsection

@section('extra_footer')
<script src="{{asset('/js/getaco.js')}}"></script>
@endsection