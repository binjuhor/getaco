@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				@if(isset($coupon))
				<label for="">Edit Coupon</label>
				@else
				<label for="">Add Coupon</label>
				@endif
			</div>
			<div class="panel-body">
				<form action="@if(isset($coupon)) {{ URL::action('CouponController@edit')}} @else {{ URL::action('CouponController@create')}} @endif" method="post"> 
					{{ csrf_field() }}
					@if(isset($coupon)) 
					<input type="hidden" name="id" value="{{$coupon['id_coupon']}}">
					@endif
					<div class="form-group">
						<label for="exampleInputEmail1">Title</label>
						<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="title_coupon" @if(isset($coupon)) value="{{$coupon['title_coupon']}}" @endif required>
					</div>
					<div class="form-group">
						
						<div class="row">
							
							<div class="col-sm-6 coupon_type">
								<label for="exampleInputEmail1">Coupon Type</label> <br>
								<span>
									<input type="radio" id="type1"  aria-describedby="emailHelp" placeholder="" name="type_coupon" value="1" @if(isset($coupon)) checked="checked" @endif required>
									<label for="type1">%</label>
								</span>
								<span>
									<input type="radio" id="type2"  aria-describedby="emailHelp" placeholder="" name="type_coupon" value="2" @if(isset($coupon)) checked="checked" @endif>
									<label for="type2">$</label>
								</span>
							</div>
							<div class="col-sm-6">
								<label for="">Value</label><br>
								<span style="width: 80%"><input type="number" name="value_coupon" class="form-control input_value_coupon" @if(isset($coupon)) value="{{$coupon['value_coupon']}}" @endif required ></span>
								<span id="show_type_coupon"></span>
							</div>
							
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Coupon Code</label>
						<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="code_coupon" @if(isset($coupon)) value="{{$coupon['code_coupon']}}" @endif required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Expiry date</label>
						<input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="expiry_date" @if(isset($coupon)) value="{{$coupon['expiry_date']}}" @endif required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Note</label>
						<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="note" @if(isset($coupon)) value="{{$coupon['note']}}" @endif required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Limited</label>
						<input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="limited" @if(isset($coupon)) value="{{$coupon['limited']}}" @endif required>
					</div>

					<button type="submit" class="btn btn-primary">Add Coupon</button>
				</form>
			</div>
		</div>

	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('/js/coupon/coupon.js') }}"></script>

@endsection