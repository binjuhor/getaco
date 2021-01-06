@extends('layouts.app')

@section('extra_header')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
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
    @if($forms->count())
        <div class="row with-padding reportRow reports_header">
            <div class="col-md-6 text-left report_header">
                <div><h2>Report and Analytics</h2></div>
                <div class="report_title">Select one style available or create new style</div>
            </div>
            
            <div class="col-md-6 text-right report_header form__select_days">
                <span class="btn btn-primary" style="cursor:default;">
                    <a href="javascript:void(0)" class="report_day btn-dayselect" id="select_day_from">
                        <input type="input" id="hiddenFieldfrom" class="datepicker" value="<?php 
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
                        <input type="input" id="hiddenFieldto" class="datepicker" value="<?php echo now(); ?>" />
                        <span id="time_to"><?php $time = date("Y/m/d"); echo date('d M', strtotime($time)); ?></span>
                    </a>
                </span>
            </div> 
        </div>

        <div class="row reportRow">

             <div class="col-md-3 urlitem">
                <div class="urlitem__content box-nested">
                    <div class="url__link">http://beau.vn/*</div>
                    <h3>19876</h3>
                    <p>Times display</p>
                </div>
            </div> 

            <div class="col-md-3 urlitem">
                <div class="urlitem__content urlitem__content--blank">
                    <a href="#"></i>Add domain</a>
                </div>
            </div>
            

        </div>

        <div class="row with-padding reportRow">

            <div class="box-nested">
                <div class="row">
                    <div class="col-md-12 reporrt_status">
                        <div class="report_header">
                            <div class="col-md-4 text-right">
                                <select id="form_chart" class="form-control">
                                    <option value="all">All form</option>
                                    @foreach ($forms as $index => $form )
                                    <option value="{{ $form->id_form }}">{{ $form->form_name?$form->form_name:"Untitled" }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8 text-right">
                                <a href="javascript:void(0)" class="btn-select" datalink="1">DAY</a>
                                <a href="javascript:void(0)" class="btn-select" datalink="7">WEEK</a>
                                <a href="javascript:void(0)" class="btn-select active" datalink="30">MONTH</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 reporrt_status">
                    <div class="piechart-data">
                        <div class="small-chart">
                            <canvas id="pie-visistor"></canvas>
                        </div>
                        <div class="chart-infor">
                            <h3>950</h3>
                            <p>Visistor</p>
                        </div>
                    </div>

                    <div class="piechart-data">
                        <div class="small-chart">
                            <canvas id="pie-leads"></canvas>
                        </div>
                        <div class="chart-infor">
                            <h3>340</h3>
                            <p>Leads</p>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-12 reporrt_status" id="mainLineChart">
                    <div class="line-chart">
                        <canvas id="report_line"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row header_list reportRow">
            <div class="col-md-6">
                <h2 style="display:inline-block; margin-right:15px;">Data analytics URL from</h2>
                <select name="form-switcher" class="form-control form-switcher inline-block" 
                style="display:inline-block; width:auto;position:relative; top:-5px;" id="form-switcher">
                    <option value="0" selected>All Form</option>
                    @foreach ($forms as $index => $form )
                    <option value="{{ $form->id_form }}">{{ $form->form_name?$form->form_name:"Untitled" }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row content_table reportRow">
            <div id="reportUrl">
                <table class="table table-noaction" id="table_format">
                    <thead>
                        <tr>
                            <th class="text-left">URL NAME</th>
                            <th class="text-center">VISISTOR</th>
                            <th class="text-center">LEADS</th>
                            <th class="text-center">CR%</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        <tr>
                            <td class="text-left"><a href="https://dribbble.com/search?q=sale+dashboard" 
                                class="btn-link name" target="_blank">https://dribbble.com/search?q=sale+dashboard</a>
                            </td>
                            <td class="text-center">278</td>
                            <td class="text-center">189</td>
                            <td class="text-center">8.3%</td>           
                        </tr>

                        <tr>
                            <td class="text-left"><a href="https://themeforest.net/user/beautheme/portfolio?direction=desc&order_by=sortable_at&view=grid" 
                                class="btn-link name" target="_blank">https://themeforest.net/user/beautheme/portfolio?direction=desc&order_by=sortable_at&view=grid</a>
                            </td>
                            <td class="text-center">973</td>
                            <td class="text-center">105</td>
                            <td class="text-center">92.64%</td>           
                        </tr>

                        <tr>
                            <td class="text-left"><a href="https://analytics.google.com/analytics/web/#/a119895543w177444379p176128654/report/discover" 
                                class="btn-link name" target="_blank">https://analytics.google.com/analytics/web/#/a119895543w177444379p176128654/report/discover</a>
                            </td>
                            <td class="text-center">718</td>
                            <td class="text-center">234</td>
                            <td class="text-center">21.13%</td>           
                        </tr>

                        <tr>
                            <td class="text-left"><a href="https://dribbble.com/shots/3695177-Auto-POS-Dashboard" 
                                class="btn-link name" target="_blank">https://dribbble.com/shots/3695177-Auto-POS-Dashboard</a>
                            </td>
                            <td class="text-center">744</td>
                            <td class="text-center">958</td>
                            <td class="text-center">98.54%</td>           
                        </tr>

                        <tr>
                            <td class="text-left"><a href="http://staff.beaudebug.com/app/customer/customer" 
                                class="btn-link name" target="_blank">http://staff.beaudebug.com/app/customer/customer</a>
                            </td>
                            <td class="text-center">563</td>
                            <td class="text-center">992</td>
                            <td class="text-center">39.19%</td>           
                        </tr>

                        <tr>
                            <td class="text-left"><a href="http://keenthemes.com/preview/metronic/" 
                                class="btn-link name" target="_blank">http://keenthemes.com/preview/metronic/</a>
                            </td>
                            <td class="text-center">641</td>
                            <td class="text-center">682</td>
                            <td class="text-center">27.09%s</td>           
                        </tr>
                        
                    </tbody>
        
                </table>
            </div>
        </div>
    @endif

    @if(!$forms->count())
        <p>No Form to tracking</p>
    @endif

@endsection

{{-- Hidden for release --}}
@section('extra_footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
    Chart.defaults.global.pointHitDetectionRadius = 1;
    var customTooltips = function(tooltip) {
        var tooltipEl = document.getElementById('chartjs-tooltip');
        if (!tooltipEl) {
            tooltipEl = document.createElement('div');
            tooltipEl.id = 'chartjs-tooltip';
            tooltipEl.innerHTML = "<table class=\"tootip-result\"></table>"
            document.body.appendChild(tooltipEl);
        }
        if (tooltip.opacity === 0) {
            tooltipEl.style.opacity = 0;
            return;
        }
        tooltipEl.classList.remove('above', 'below', 'no-transform');
        if (tooltip.yAlign) {
            tooltipEl.classList.add(tooltip.yAlign);
        } else {
            tooltipEl.classList.add('no-transform');
        }
        function getBody(bodyItem) {
            return bodyItem.lines;
        }
        if (tooltip.body) {
            var titleLines = tooltip.title || [];
            var bodyLines = tooltip.body.map(getBody);
            var innerHtml = '<thead>';
            titleLines.forEach(function(title) {
                innerHtml += '<tr><th class="gray-title">' + title + '</th></tr>';
            });
            innerHtml += '</thead><tbody>';
            bodyLines.forEach(function(body, i) {
                var colors = tooltip.labelColors[i];
                var span = '<span class="chartjs-tooltip-key"></span>';
                innerHtml += '<tr><td><i class="fa fa-circle visistor"></i> 320 Visistors</td></tr>';
                innerHtml += '<tr><td><i class="fa fa-circle lead"></i> 430 lead</td></tr>';
            });
            innerHtml += '</tbody>';
            var tableRoot = tooltipEl.querySelector('table');
            tableRoot.innerHTML = innerHtml;
        }
        var position = this._chart.canvas.getBoundingClientRect();          
        tooltipEl.style.opacity = 1;
        tooltipEl.style.left = position.left + tooltip.caretX + 'px';
        tooltipEl.style.top = position.top + tooltip.caretY + 'px';
        tooltipEl.style.padding = '10px ' +  '30px';
    };

    var lineChartData = {
        labels: ["2 Feb", "07 Oct", "2 Feb", "07 Oct", "2 Feb", "07 Oct", "2 Feb", "07 Oct","2 Feb","07 Oct","2 Feb"],
        datasets: [{
            label: "Data sheet from Form Embed",
            borderColor: '#ff4669',
            pointBackgroundColor: '#ff4669',
            fill: false,
            borderWidth: 5,
            data: [ 150, 250, 200, 250, 250, 350, 290, 350, 390,300,450 ]
        }]
    };

    window.onload = function() {
        var chartEl = document.getElementById("report_line");
        chartEl.height = 120;
        window.visistorChart = new Chart(chartEl, {
            type: 'line',
            data: lineChartData,
            options: {
                legend: { display: false },
                title:{ display:false,},
                scaleShowLabels : true,
                scales:
                {
                    xAxes: [{ gridLines: { display: false } } ],
                    yAxes: [{
                        ticks: {
                            suggestedMin: 100,
                            suggestedMax: 500,
                            stepSize: 100
                        }
                    }]
                },
                tooltips: {
                    enabled: false,
                    intersect: true,
                    mode: 'x-axis',
                    custom: customTooltips
                }
            }
        });

        /*Pie small chart */
        var chartVisit = document.getElementById('pie-visistor');
        window.chartVisit = new Chart(chartVisit, {
            type: 'pie',
            data: {
                datasets: [{
                    data: [950,340],
                    backgroundColor: [ '#bd10e0','rgb(233, 233, 233)']
                }],
                labels: [
                    'Visistor',
                    'lead'
                ]
            },
            options: {
                legend: { display: false },
                title:{ display:false,},
                scaleShowLabels : true,
                tooltips: {
                    enabled: false,
                }
            }
        });

        var chartLead = document.getElementById('pie-leads');
        window.chartLead = new Chart(chartLead, {
            type: 'pie',
            data: {
                datasets: [{
                    data: [ 340,950 ],
                    backgroundColor: [ '#f5a623', 'rgb(233, 233, 233)']
                }],
                labels: [
                    'Visistor',
                    'lead'
                ]
            },
            options: {
                legend: { display: false },
                title:{ display:false,},
                scaleShowLabels : false,
                tooltips: {
                    enabled: false,
                }
            }
        });

    };

    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];   
    $('#select_day_from').on('click',function() {
        $( "#hiddenFieldfrom" ).datepicker().focus();
    });
    $("#hiddenFieldfrom").datepicker({
        dateFormat: 'yy-mm-dd',
        inline: true,
        onSelect: function(dateText, inst) {
            var date = $(this).val();
            var datetime = date+" "+"00:00:01";
            $('#hiddenFieldfrom').val(datetime);
            var date1 = new Date(dateText);
            var day = date1.getDate();
            var month = date1.getMonth();
            $('#time_from').html(day+"   "+months[month]);
            customReport();
            return false;
        }
    });
    $('#select_day_to').on('click',function() {
        $( "#hiddenFieldto" ).datepicker().focus();
    });
    $("#hiddenFieldto").datepicker({
        dateFormat: 'yy-mm-dd',
        inline: true,
        onSelect: function(dateText, inst) {
            var date = $(this).val();
            var datetime = date+" "+"23:59:59";
            $('#hiddenFieldto').val(datetime);
            var date1 = new Date(dateText);
            var day = date1.getDate();
            var month = date1.getMonth();
            $('#time_to').html(day+"   "+months[month]);
            customReport();
            return false;
        }
    });


    //Report Chart
    $('#form_chart').change(function(){
        let id = $(this).val();
        let urlLog = "{{ URL::action('ReportController@analyticsWithChart') }}";
        jQuery.ajax({
            type: "GET",
            url: urlLog,
            timeout: 8000,
            data: {
                'form_id': id,
                '_token': '{{ csrf_token() }}',
            },
        }).done( function(data){
            console.log(data);

            //done ajax here
        });
    });

    $('#form-switcher').change(function(){
        let id = $(this).val();
        let urlLog = "{{ URL::action('ReportController@analyticsWithFormID') }}";
        jQuery.ajax({
            type: "GET",
            url: urlLog,
            timeout: 8000,
            data: {
                'form_id': id,
                '_token': '{{ csrf_token() }}',
            },
        }).done( function(data){
            console.log(data);
            $('#reportUrl').html(data);
        });
    })

</script>
@endsection
