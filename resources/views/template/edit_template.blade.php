@extends('layouts.app')

@section('content')
<div class="form_demo_edit">
	<form action="">
		<div class="col-sm-6">
			<label for="">Name form</label>
			<input type="text" name="name_template" value="{{$template['name_template']}}"  class="form-control">
		</div>
		<div class="col-sm-6"></div>
	</form>
</div>
<div class="row" style="" >
	<div class="col-sm-12" >
		<label style="float: left;">Basic info:</label>
		<!-- basic field -->
		<!-- Name -->
		<div class="icon" data-type="name" style="float: left;">
			<i class="fas fa-user" title="name"></i>
		</div>
		<!-- Email Customer -->
		<div class="icon" data-type="email_customer" style="float: left;">
			<i class="fas fa-at" title="Email Address"></i>
		</div>
		<!-- Phone number -->
		<div class="icon" data-type="phone" style="float: left;">
			<i class="fas fa-phone" title="Phone number"></i>
		</div>
		<!-- dynamic field -->
		<label style="float: left; line-height: 30px;">Other:</label>
		<!-- type text -->
		<div class="icon" data-type="text" style="float: left;">
			<i class="fa fa-pencil-alt" title="text"></i>
		</div>
		<!-- type textarea -->
		<div class="icon" data-type="textarea" style="float: left;">
			<i title="textarea" class="fa fa-align-left"></i>
		</div>
		<!-- email -->
		<div class="icon" data-type="email" style="float: left;">
			<i class="far fa-envelope" title="Email"></i>
		</div>
		<!-- select -->
		<div class="icon" data-type="select" style="float: left; ">
			<i class="far fa-caret-square-down" title="Select"></i>
		</div>
		<!-- checkbox -->
		<div class="icon" data-type="checkbox" style="float: left; ">
			<i class="far fa-check-square" title="checkbox"></i>
		</div>
		<!-- radio -->
		<div class="icon" data-type="radio" style="float: left; ">
			<i class="far fa-check-circle" title="Radio"></i>
		</div>
		<!-- date -->
		<div class="icon" data-type="date" style="float: left; ">
			<i class="far fa-calendar " title="Date"></i>
		</div>
		<!-- time -->
		<div class="icon" data-type="time" style="float: left; ">
			<i class="far fa-clock" title="Time"></i>
		</div>

		<div class="icon" data-type="submit" style="float: left; ">
			<i class="far fa-paper-plane" title="Submit"></i>
		</div>
	</div>
</div>
<!-- form backend, form frondend -->
<div class="row">
	<!-- form backend -->
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				Backend
			</div>
			<div class="panel-body" style="height: 450px;max-height:500px; overflow-y: scroll; " id="formBackend">
				
			</div>
		</div>
	</div>
	<!-- form frontend -->
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				Frontend
			</div>
			<div class="panel-body" style="height: 450px;max-height:500px; overflow-y: scroll; ">
				<div id="form_frontend">
					<div class="content_form" id="frontend"></div>

				</div>

			</div>
		</div>
	</div>
</div> <!-- end form-->
<input type="hidden" id="edit_template_backend" value="{{$template['form_backend']}}">
<input type="hidden" id="edit_template_frontend" value="{{$template['source']}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('/js/builForm/buildFormDemo.js') }}"></script>
<script>
	var a = $('#edit_template_backend').val();
	var b = $('#edit_template_frontend').val();
	$('#formBackend').html(a);
	$('#frontend').html(b);
</script>
@endsection