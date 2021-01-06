@extends('layouts.app')

@section('content')

<div class="row">
	<a href="{{ URL::action('TemplateFormController@index') }}" class="btn btn_filter btn_popup_filter" style="margin-bottom: 20px;padding:0 10px">BACK TO LIST</a>
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<label for="">{{$formDemo->name_template}}</label>
			</div>
			<input type="hidden" value="{{$formDemo->source}}" id="source">
			<div class="panel-body row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4" id="show_form">
					


				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
        crossorigin="anonymous"></script>
<script>
	var source = $('#source').val();
	$('#show_form').html(source);
</script>
@endsection