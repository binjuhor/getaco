@extends('layouts.app')

@section('content')
<?php $user = Auth::User() ?>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
						
				@if(isset($element))
					<label for="">Edit Element</label>
				@else
					<label for="">Add Element</label>
				@endif
			</div> 
			<div class="panel-body">
				<form action="@if(isset($element)) {{URL::action('ElementItemController@create')}} @else {{URL::action('ElementItemController@edit')}} @endif" method="post">
					{{ csrf_field() }}
					@if(isset($element))
						<input type="hidden" name="id" value="{{$id}}">
					@endif
					@if(isset($id_form))
						<input type="hidden" name="id_form_demo" value="{{$id_form}}">
					@else
						@if($user->id_role == 1)
							<label for="">Form :</label>form demo (admin)
						@else
						<div class="form-group">
							<small for="exampleInputEmail1">Form</small>
							<select name="id_form" id="" class="form-control">
							
								@foreach($form as  $key)
									<option value="{{$key['id_form']}}"
									@if(isset($element))
										@if($element['id_form'] == $key['id_form'])
											selected="selected" 
										@endif
									@endif

									>{{$key['form_name']}}</option>
								@endforeach
							</select>
						</div>
						@endif
					@endif
					<div class="form-group">
						<small for="exampleInputEmail1">Type</small>
						<select name="element_type" id="selectType" onchange="selected()" class="form-control" required>
							<option value selected="selected" disabled="disabled">Select one</option>
							@foreach($types as  $key)
								<option value="{{$key}}"
									@if(isset($element)) 
										@if($element['element_type'] == $key)
										selected="selected" 
										@endif	
									@endif
								>{{$key}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<small for="exampleInputEmail1">Label</small>
						<input type="text" name="element_label" class="form-control" placeholder="Element Label" required="required" @if(isset($element)) value="{{$element['element_label']}}" @endif >
					</div>
					<div class="form-group">
						<small for="exampleInputEmail1">Value</small>
						<input type="text" name="element_value" class="form-control" placeholder="Element value" required="required" @if(isset($element)) value="{{$element['element_value']}}" @endif >
					</div>
					<div class="form-group">
						<small for="exampleInputEmail1">Sort Order</small>
						<input type="text" name="sort_order" class="form-control" placeholder="Sort Order" required="required" validate=""
						@if(isset($element)) value="{{$element['sort_order']}}" @endif >
					</div>
					<div class="form-group">
						<small for="exampleInputEmail1">Required</small>
						<input type="checkbox" name="element_required" value="1" @if(isset($element)) @if($element['element_required'] == 1) checked="checked" @endif @endif>
					</div>
					<div class="form-group">
						<small for="exampleInputEmail1">Validate</small>
						<input type="checkbox" name="element_validate" id="validate" value="1" onclick="show()" @if(isset($validate)) checked="checked" @endif>
					</div>
					
					<div class="element row" id="element" @if(isset($validate)) style="display: block"  @else style="display: none" @endif>
						<div class="form-group col-sm-6">
							<small>Min</small>
							<input type="number" name="validate_min" class="form-control" @if(isset($validate)) value="{{$validate['validate_min']}}" @endif>
						</div>
						<div class="form-group col-sm-6">
							<small>Max</small>
							<input type="number" name="validate_max" class="form-control" @if(isset($validate)) value="{{$validate['validate_max']}}" @endif>
						</div>
						<div class="form-group col-sm-6">
							<small>integer</small>
							<input type="checkbox" name="validate_integer" class="" value="1" @if(isset($validate)) @if($validate['validate_integer'] == 1) checked="checked" @endif @endif>
						</div>
						<div class="form-group col-sm-6">
							<small>numeric</small>
							<input type="checkbox" name="validate_numeric" class="" value="1" @if(isset($validate)) @if($validate['validate_numeric'] == 1) checked="checked" @endif @endif>
						</div>
						<div class="form-group col-sm-6">
							<small>alpha</small>
							<input type="checkbox" name="validate_alpha" class="" value="1" @if(isset($validate)) @if($validate['validate_alpha'] == 1) checked="checked" @endif @endif>
						</div>
						<div class="form-group col-sm-6">
							<small>alpha dash</small>
							<input type="checkbox" name="validate_alpha_dash" class="" value="1" @if(isset($validate)) @if($validate['validate_alpha_dash'] == 1) checked="checked" @endif @endif >
						</div>
					</div>
					@if(isset($validate))
						<input type="hidden" name="id_validate" value="{{$validate['id_validate']}}">
					@endif
					<button type="submit" class="btn btn-primary" onclick="disabled()" >Submit</button>
					<div id="hello"></div>
				</form>
			</div>
			<form action="{{ URL::to('element/test') }}" method="post">
				{{ csrf_field() }}
				name<input type="text" name="data[name]">
				email<input type="select" name="data[email]">
				<input type="submit" value="submit">
			</form>
		</div>
	</div>
</div>
<script>
	function disabled() {
		return false;
	}
</script>
@endsection