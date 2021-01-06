@extends('layouts.admin')
@section('content')
<div class="orbit">
	<div class="heading row" style="margin-bottom:30px;">
		<label class="col-sm-4" for="" style="font-size: 30px;line-height: 50px;">Lĩnh vực hoạt động</label>
		<div class="add_orbit col-sm-8" style="position:relative">
			<button id="show_orbit" class="btn btn-primary col-sm-3" style="float:right; width:auto;" >ADD NEW</button>
			<div id="add_orbit" style="padding: 20px;box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25); width:380px;position:absolute;z-index: 2;top: -20px;left: 200px;background: white;border-radius: 3px;display:none;">
				<form action="{{ URL::action('OrbitController@create')}}" method="post">
					{{ csrf_field() }}
					<span style="margin-right: 10px;">Lĩnh vực</span><input type="text" name="orbit">
					<button type="submit" class="btn btn-primary">Add</button>
				</form>
			</div>
		</div>
	</div>
	<div class="row content_table">
		<table class="table table-striped" id="table-format">
			<thead>
				<tr>
					<th>ID</th>
					<th class="text-left">Lĩnh vực hoạt động</th>
					<th  class="text-center">ACTION</th>
				</tr>
			</thead>

			<tbody>
				@foreach($orbits as $orbit)
				<tr>
					<td>{{ $orbit->id_orbit }}</td>
					<td class="orbit">{{ $orbit->orbit }}</td>
					<td  class="text-center">
					<a href="#" title="Edit" class="btn-action btn-edit"></a>
					<a href="{{ URL::action('OrbitController@delete') }}?id={{$orbit->id_orbit}}" title="Delete" class="btn-action btn-delete"></span></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$('#show_orbit').click(function () {
		$('#add_orbit').fadeToggle(400);
	});

	$('.btn-edit').click(function () {
		$('tr').removeAttr('style');
		$('.edit_orbit').remove();
		var old = $(this).closest('tr').find('.orbit').text();
		var id = $(this).closest('tr').find('td:first-child').text();
		$(this).closest('tr').css('position','relative').append(
			`<div class="edit_orbit" style="padding:10px 20px;box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25); width:410px;position:absolute;z-index: 2;left:40%;background: white;border-radius: 3px;height">
				<form action="{{ URL::action('OrbitController@update')}}" method="post">
					{{ csrf_field() }}
					<span style="margin-right: 10px;">Lĩnh vực</span>
					<input type="hidden" name="id" value="`+id+`">
					<input type="text" name="orbit" value="`+old+`">
					<button type="submit" class="btn btn-primary btn_update">Update</button>
				</form>
			</div>`
		);
	});
	$('#content').click(function(e) {
    	if (!$(e.target).closest(".edit_orbit").length && !$(e.target).closest(".btn-edit").length && !$(e.target).closest(".add_orbit").length && !$(e.target).closest(".show_orbit").length ) {
    		$('#add_orbit').fadeOut(400);
    		$('.edit_orbit').fadeOut(400,function () {
    			$(this).remove();
    		});
    }
});
	
</script>



@endsection