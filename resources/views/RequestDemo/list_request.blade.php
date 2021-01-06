@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">List Request Demo </div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">Phone</th>
							<th scope="col">Comany</th>
							<th scope="col">Comany Size</th>
							<th scope="col">Notes</th>
						</tr>
					</thead>
					<tbody>
						@foreach($demos as $demo)
						<tr>
							<th scope="row">{{$demo['id_reDemo']}}</th>
							<td>{{$demo['first_name']}} {{$demo['last_name']}}</td>
							<td>{{$demo['business_email']}}</td>
							<td>{{$demo['phone_number']}}</td>
							<td>{{$demo['company']}}</td>
							<td>{{$demo['company_size']}}</td>
							<td>{{$demo['notes']}}</td>
							<td><a href="request_demo/delete?id={{$demo['id_reDemo']}}">delete</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection