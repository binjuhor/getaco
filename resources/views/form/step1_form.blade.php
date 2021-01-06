@extends('layouts.app')

@section('content')
<div class="row">
	<form action="stepAdd" method="post">
		{{ csrf_field()}}
		<input type="hidden" name="id_form" value="{{$id}}">
	@for($i = 1; $i < 5; $i++ )
		<div id="div{{$i}}" class="col-sm-2 panel panel-default " style="margin: 0 10px;height: 520px" id="receiver4" ondrop="drop(event)" ondragover="allowDrop(event)">
			<div class="panel-healding">
				<label for="">Step{{$i}}</label>
			</div>
			<div class="panel-body">
				@foreach($steps as $step)
					@if($step['step'] == $i)
						@if($step['id_element'] == -1)
						<div class="card" id="drag1" style="height: 40px; border: 1px solid gray; border-radius: 7px; line-height: 40px; text-align: center; margin: 5px; " ondragstart="drag(event)" draggable="true">Customer Name
							<input type="hidden" name="-1" id="input1">
						</div>
						@elseif($step['id_element'] == -2)
						<div class="card" id="drag2" style="height: 40px; border: 1px solid gray; border-radius: 7px; line-height: 40px; text-align: center; margin: 5px; " ondragstart="drag(event)" draggable="true">Customer Phone
							<input type="hidden" name="-2" id="input2">
						</div>
						@elseif($step['id_element'] == -3)
						<div class="card" id="drag3" style="height: 40px; border: 1px solid gray; border-radius: 7px; line-height: 40px; text-align: center; margin: 5px; " ondragstart="drag(event)" draggable="true">Customer Email
							<input type="hidden" name="-3" id="input3">
						</div>
						@elseif($step['id_element'] == -4)
						<div class="card" id="drag4" style="height: 40px; border: 1px solid gray; border-radius: 7px; line-height: 40px; text-align: center; margin: 5px; " ondragstart="drag(event)" draggable="true">Company
							<input type="hidden" name="-4" id="input4">
						</div>
						@elseif($step['id_element'] == -5)
						<div class="card" id="drag5" style="height: 40px; border: 1px solid gray; border-radius: 7px; line-height: 40px; text-align: center; margin: 5px; " ondragstart="drag(event)" draggable="true">Sort Order
							<input type="hidden" name="-5" id="input5">
						</div>
						@endif


						<?php $k = 5 ?>
						@foreach($Element as $key)
						<?php $k +=1 ?>
							@if($step['id_element'] == $key['id_element'])
							<div class="card" id="drag{{$k}}" draggable="true" style="height: 40px; border: 1px solid gray; border-radius: 7px; line-height: 40px; text-align: center; margin: 5px; " ondragstart="drag(event)">{{$key['element_label']}}
								<input type="hidden" name="{{$key['id_element']}}" id="input{{$k}}">
							</div>
							@endif
						@endforeach
					@endif
				@endforeach
			</div>
		</div>
	@endfor
	<div class="col-sm-3">
		<button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
	</div>
	</form>
</div>
<script>
	document.addEventListener("DOMContentLoaded",function () {

	},false);
</script>
 <script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
    var elm = document.getElementById(data);
    var chil = elm.children[0];
    if (ev.target.id == "div1") {
    	chil.value = "1";
    }
    if (ev.target.id == "div2") {
    	chil.value = "2";
    }
    if (ev.target.id == "div3") {
    	chil.value = "3";
    }
    if (ev.target.id == "div4") {
    	chil.value = "4";
    }
}
</script>
@endsection