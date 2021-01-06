@extends('layouts.app')

@section('extra_header')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<style>
	#hiddenFieldfrom{
		opacity: 0;
		width: 1px;
		height: 1px;
	}
	#hiddenFieldfrom :focus{
		opacity: 0;
		width: 1px;
		height: 1px;
	}
	#hiddenFieldto{
		opacity: 0;
		width: 1px;
		height: 1px;
	}
	#hiddenFieldto :focus{
		opacity: 0;
		width: 1px;
		height: 1px;
	}
</style>
<meta name="csrf-token" content="{!! Session::token() !!}">
@endsection

@section('content')

<div class="row with-padding reportRow reports_header">
	<div class="col-md-6 text-left report_header">
		<div><h2>Report and Analytics</h2></div>
		<div class="report_title">Select one style available or create new style</div>
	</div>
	
	<div class="col-md-6 text-right report_header form__select_days">
		<span class="btn btn-primary" style="cursor:default;">
			<a href="javascript:void(0)" class="report_day btn-dayselect" id="select_day_from">
				<input type="input" id="hiddenFieldfrom" name="report_from" class="datepicker" value="<?php 
					$startTime = date("Y-m-d");
					$cenvertedTime = date('Y-m-d',strtotime('-30 day',strtotime($startTime)));
					echo $cenvertedTime." "."00:00:01";?>" />
				<span id="time_from">
					<?php 
						$startTime = date("Y-m-d");
						$cenvertedTime = date('Y-m-d',strtotime('-30 day',strtotime($startTime)));
						echo date('d M', strtotime($cenvertedTime));
					?>
				</span>
			</a>
			<a href="javascript:void(0)" class="report_day btn-dayselect" id="select_day_to">
				<input type="input" id="hiddenFieldto" class="datepicker" name="report_to" value="<?php echo now(); ?>" />
				<span id="time_to"><?php $time = date("Y/m/d"); echo date('d M', strtotime($time)); ?></span>
			</a>
		</span>
	</div>
</div>

<div class="row report_convert">
	<div class="col-md-12"><h3>Statistical status</h3></div>
	<div class="col-md-12">
		<div class="col-md-8 reporrt_status">
			<div class="report_header">
				<div class="col-md-4 text-right">
                    <select id="customer_type" class="form-control report_select">
                        <!-- <option value="null" selected disabled>CHOOSE TYPE CUSTOMER</option> -->
                        <option value="lead"
                        @if(isset($type) && $type == "lead") selected="" @endif
                        >LEAD</option>
                        <option value="customer"
                        @if(isset($type) && $type == "customer") selected="" @endif
                        >CUSTOMER</option>
                    </select>
				</div>
				<div class="col-md-8 text-right button_report" id="select_time">
					<a href="javascript:void(0)" class="select_khoang" datalink="1">DAY</a>
					<a href="javascript:void(0)" class="select_khoang" datalink="7">WEEK</a>
					<a href="javascript:void(0)" class="select_khoang" datalink="30">MONTH</a>
				</div>
			</div>
			<div class="col-md-12 text-center">
				@foreach($tag as $val)
				<a class="tag_link" id="report_tag" href="javascript:void(0)" datalink="{{ $val->id_tag }}" >{{ $val->tag_name }}</a>
				@endforeach
			</div>
			<div class="col-md-12" style="margin-top: 30px;">
				@if($sum > 0)
					<canvas id="Chart_line" width="580" height="250"></canvas>
					<canvas id="Chart_bar" width="580" height="250"></canvas>
				@else
					<canvas style="display: none;" id="Chart_line" width="580" height="250"></canvas>
					<canvas style="display: none;" id="Chart_bar" width="580" height="250"></canvas>
					<p class="text-center">No data</p>
				@endif
				
			</div>
		</div>
		<div class="col-md-4" style="padding-right: 0px;">
			<div class="col-md-12" style="padding-right: 0px;">
				<div class="table_report">
					<table class="table" id="table_tag">
					<tr>
						<th>TAG NAME</th>
						<th>SELECTED</th>
						<th>INDEX</th>
					</tr>
					@if($sum > 0)
						@for($i = 0 ; $i< count($index) ; $i++)
						<tr>
							<td>{{ $c_tag[$i] }}</td>
							<td>{{ $index[$i] }}</td>
							<td>{{ round($index[$i]/$sum*100, 2) }} %</td>
						</tr>
						@endfor
					@else
						<tr>
							<td colspan="3"><p class="text-center">No data</p></td>
						</tr>
					@endif
					</table>
			</div>
			</div>
		</div>
	</div>
</div>
<div class="row report_convert report_segment">
	<div class="col-md-12"><h3>Statistical segment</h3></div>
	<div class="col-md-12">
		<div class="col-md-7 reporrt_status">
			<div class="col-md-12" style="margin-top: 30px;">
				

					@if($sum > 0)
						<canvas id="bar-chart-horizontal" width="600" height="350"></canvas>
					@else
						<canvas style="display: none;" id="bar-chart-horizontal" width="600" height="350"></canvas>
						<p class="text-center">No data</p>
					@endif
			</div>
		</div>
		<div class="col-md-5" style="padding-right: 0px;">
			<div class="col-md-12" style="padding-right: 0px;">
				<div class="table_report">
					<table class="table" id="table_segment">
						<tr>
							<th>SEGMENT NAME</th>
							<th>SELECTED</th>
							<th>INDEX</th>
						</tr>
						@if($sum > 0)
							@for($i = 0 ; $i< count($index_seg) ; $i++)
							<tr>
								<td>{{ $c_seg[$i] }}</td>
								<td>{{ $index_seg[$i] }}</td>
								<td>{{ round($index_seg[$i]/$sum*100, 2) }} %</td>
							</tr>
							@endfor
						@else
							<tr>
								<td colspan="3"><p class="text-center">No data</p></td>
							</tr>
						@endif

					</table>
			</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" name="" id="url_customer_report" value="{{ URL::action('ReportController@convert') }}">
<input type="hidden" name="" id="url_custom_report" value="{{ URL::action('ReportController@customReport') }}">
<input type="hidden" name="" id="lable_id" value="0">
<input type="hidden" name="" id="select_khoang" value="1">
@endsection
@section('extra_footer')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  	
	<script>
		var tag = <?php echo json_encode($c_tag) ?>;
		var index = <?php echo json_encode($index) ?>;
		var seg = <?php echo json_encode($c_seg) ?>;
		var index_seg = <?php echo json_encode($index_seg) ?>;
	</script>
	<script src="{{ asset('/js/charts/report.js') }}"></script>
	<script>
		$('#Chart_line').hide();
			chart_bar_tag(tag,index);
			char_seg(seg,index_seg);
	</script>
@endsection