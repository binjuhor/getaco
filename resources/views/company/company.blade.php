@extends('layouts.layout_setting')
@section('content_setting')
	<div class="row plans edit_company_plan">
	<div class="info_subscription row">
		@if(!isset($edit))
			<div class="col-md-12 wrapper_company">
				<div class="row control_label">
					<label for="" class="col-md-2 control-label">Company </label>
					<div class="col-md-6 control-info profile_content">{{$company['company_name']}}</div>
				</div>
				<div class="row control_label">
					<label for="" class="col-md-2 control-label">Address </label>
					<div class="col-md-6 control-info profile_content">{{$company['company_address']}}</div>
				</div>
				<div class="row control_label">
					<label for="" class="col-md-2 control-label">Phone </label>
					<div class="col-md-6 control-info profile_content">{{$company['company_phone']}}</div>
				</div>
				<div class="row control_label">
					<label for="" class="col-md-2 control-label">Email </label>
					<div class="col-md-6 control-info profile_content">{{$company['company_email']}}</div>
				</div>
				<div class="row control_label">
					<label for="" class="col-md-2 control-label">Website </label>
					<div class="col-md-6 control-info profile_content">{{$company['website']}}</div>
				</div>
				<div class="row control_label">
					<label for="" class="col-md-2 control-label">Business Type </label>
					<div class="col-md-6 control-info profile_content">{{ isset($company->orbit->orbit)?$company->orbit->orbit:"" }}</div>
				</div>
				<div class="row control_label">
					<label for="" class="col-md-2 control-label">Time zone </label>
					<div class="col-md-6 control-info profile_content">{{$company['timezone']}}</div>
				</div>
				<div class="row control_label">
					<label for="" class="col-md-2 control-label">Currency </label>
					<div class="col-md-6 control-info profile_content">{{$company['curency']}}</div>
				</div>
			</div>
		@else
			<div class="col-md-12">
				<div class="panel-body">
					<form action="{{ URL::action('CompanyController@edit') }}" method="post">
						{{ csrf_field() }}
						<div class="row edit_company_content">
							<div class="form-group col-md-6">
								<label for="exampleInputEmail1">Company Name</label>
								<input type="text" required class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email" value="{{$company['company_name']}}" name="company_name">
							</div>
							<div class="form-group col-md-6">
								<label for="exampleInputEmail1">Company Address</label>
								<input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="" value="{{$company['company_address']}}" name="company_address" >
							</div>
							<div class="form-group col-md-6">
								<label for="exampleInputEmail1">Phone Number</label>
								<input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="enter phone" value="{{$company['company_phone']}}" name="company_phone" >
							</div>
							<div class="form-group col-md-6">
								<label for="exampleInputEmail1">Email</label>
								<input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="" value="{{$company['company_email']}}" name="company_email">
							</div>
							<div class="form-group col-md-6">
								<label for="exampleInputEmail1">Website</label>
								<input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="" value="{{$company['website']}}" name="website">
							</div>
							<div class="form-group col-md-6">
								<label for="exampleInputEmail1">Description</label>
								<input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="" value="{{$company['company_description']}}" name="company_description">
							</div>
							<div class="form-group col-md-6">
								<label for="exampleInputEmail1">Business Type</label>
								<select name="business_type" id="" required class="form-control">
									<option value selected disabled>Select one</option>
									@if(isset($orbits))
									@foreach($orbits as $key)
										<option value="{{$key->id_orbit}}"
											@if($key->id_orbit == $company->business_type)
												selected
											@endif>
											{{$key->orbit}}
										</option>
									@endforeach
										@endif
								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="exampleInputEmail1">Time zone</label>
								<input type="time" class="form-control" id="" aria-describedby="emailHelp" placeholder="" value="{{$company['timezone']}}" name="timezone">
							</div>
							<div class="form-group col-md-6">
								<label for="exampleInputEmail1">Currency</label>
								<select name="curency" id="" class="form-control" required>
									<option value selected disabled>Select One</option>
									<option value="usd" @if($company['curency'] == "usd") selected @endif>USD</option>
									<option value="vnd" @if($company['curency'] == "vnd") selected @endif>VND</option>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="exampleInputEmail1">Open Hour</label>
								<input type="time" class="form-control" id="" aria-describedby="emailHelp" placeholder="" value="{{$company['open_hour']}}" name="open_hour">
							</div>
							<div class="form-group col-md-6">
								<label for="exampleInputEmail1">Closer Hour</label>
								<input type="time" class="form-control" id="" aria-describedby="emailHelp" placeholder="" value="{{$company['closer_hour']}}" name="closer_hour">
							</div>
						</div>

						<div class="action row">
							<button type="submit" class="btn btn-primary">Update</button>&nbsp&nbsp&nbsp
							<a href="{{ URL::action('CompanyController@view') }}" class="btn btn_cancel">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		@endif
	</div>
</div>
<div class="action row {{ Request::is('app/setting/company/edit*') ? 'hidden' : '' }}">
	<a href="{{ URL::action('CompanyController@edit') }}" class="btn btn-primary text-center">Edit profile</a>
</div>
@endsection