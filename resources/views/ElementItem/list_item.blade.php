@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-sm-12">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Key</th>
					<th scope="col">Value</th>
					<th><a href="item/add?id={{$id}}">add new</a></th>
				</tr>
			</thead>
			<tbody>
				<?php $stt= 0 ?>
				@foreach($items as $item)
				<tr>
					<th scope="row">{{$stt += 1}}</th>
					<td>{{$item['item_key']}}</td>
					<td>{{$item['item_value']}}</td>
					<td><a href="item/edit?id_item={{$item['id_item']}}&id_element={{$id}}">edit</a></td>
					<td><a href="item/delete?id={{$item['id_item']}}">delete</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection