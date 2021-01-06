@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<label for="">Form Demo</label>
			</div>
			<div class="panel panel-body">
				<form action="{{ URL::action('TemplateFormController@create') }}" enctype="multipart/form-data" method="post" >
					{{ csrf_field() }}
					<div class="form_group">
						<label for="">Name form</label>
						<input type="text" class="form-control" name="name_template">
					</div>
					<div class="form_group">
						<label for="">Image</label>
						<input type="file" class="form-control" name="image">
					</div>
					<button type="submit" class="btn btn-primary" >submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection