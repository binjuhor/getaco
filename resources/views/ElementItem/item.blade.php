@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-sm-12">
		<label for="">Form Option</label>
		<form action="@if(isset($item)) {{URL::action('ElementItemController@edit')}} @else {{ URL::action('iElementItemController@create') }} @endif" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<small>Name Item</small>
				<input type="text" name="value" class="form-control" @if(isset($item)) value="{{$item['item_value']}}" @endif required>
			</div>

			<input type="hidden" value="{{$id}}" name="id">
			@if(isset($item))
				<input type="hidden" value="{{$id_element}}" name="id_element" required>
			@endif

			<button class="btn btn-primary" type="submit">@if(isset($item)) Edit @else Add @endif</button>

		</form>

	</div>
</div>
@endsection