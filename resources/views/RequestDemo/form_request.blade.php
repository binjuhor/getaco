@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">Request a Demo</div>
			<div class="panel-body">			
				<form action="{{ URL::action('RequestDemoController@add') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="">First Name</label>
								<input type="text" class="form-control" name="first_name">
							</div>
							<div class="col-sm-6">
								<label for="">Last Name</label>
								<input type="text" class="form-control" placeholder="" name="last_name">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Business Email</label>
						<input type="email" class="form-control" name="business_email">
						</div>
					<div class="form-group">
						<label for="">Number Phone</label>
						<input type="number" class="form-control" name="phone_number">
					</div>
					<div class="form-group">
						<label for="">Company Name</label>
						<input type="text" class="form-control" name="company">
					</div>
					<div class="form-group">
						<label for="">Company Size</label>
						<select name="company_size" id="" class="form-control">
							<option value disabled="disabled" selected="selected">Select One</option>
							<option value="1">We're an agency</option>
							<option value="2">Myself Only</option>
							<option value="3">2 - 10 employees</option>
							<option value="4">11 - 50 employees</option>
							<option value="5">50 - 200 employees</option>
							<option value="6">200 - 500 employees</option>
							<option value="7">500 - 1000 employees</option>
							<option value="8"> > 1000 employees</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Notes</label>
						<textarea name="notes" id="" cols="30" rows="5" class="form-control"></textarea>
					</div>
					
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection