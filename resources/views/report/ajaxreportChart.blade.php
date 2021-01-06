<div class="line-chart">
    <canvas id="report_line"></canvas>
    safdsafdsafda
</div>

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
        labels: {!! $chartLabel !!},
        datasets: [{
            label: "Data sheet from Form Embed ajax",
            borderColor: '#ff4669',
            pointBackgroundColor: '#ff4669',
            fill: false,
            borderWidth: 5,
            data: {!! $chartValue !!}
        }]
    };

   document.load = function() {
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
                            suggestedMin: 1,
                            suggestedMax: 10,
                            stepSize: 2
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
    };
</script>