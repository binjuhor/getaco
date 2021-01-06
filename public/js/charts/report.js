// select day
var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Novr', 'Dec'];   
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
//end select day report_tag
//select tag
$('#select_time').hide();
$('.tag_link').on('click',function() {
	$('#select_time').show();
	var id_tag = $(this).attr('datalink');
	$('.tag_link').removeAttr('style');
	$(this).css({"color":"#ff4669"});
	$('#lable_id').val(id_tag);
	customReport();
	return false;
});
// end select tag

//chon khoang
$('.select_khoang').on('click',function() {
	var select_khoang = $(this).attr('datalink');
	$('.select_khoang').removeAttr('style');
	$(this).css({"background-color":"#ff4669","color":"#ffffff"});
	$('#select_khoang').val(select_khoang);
	customReport();
	return false;
});

// end chon khong


//select type report
$('#customer_type').on('change', function () {
	var a = $('#customer_type').val();
	var url = $('#url_customer_report').val()+"?type="+a;
	$(location).attr('href', url);
});
//end select type report

// chart tag status
function chart_line_tag(tag,index,tag_lable,type) {
	var myChart = new Chart(document.getElementById("Chart_line"), {
		type: 'line',
		data: {
			labels: tag,
			tag : tag_lable,
			type: type,
			datasets: [{
				data: index,
				fill: false,
				borderColor: '#6d6a89',
				borderWidth: 3
			}]
		},
		options: {
			legend: { display: false },
			title: {
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			},
			elements: {
				line: {
	                tension: 0, // disables bezier curves
	            }
	        },
	        tooltips: {
		      callbacks: {
		        title: function(tooltipItem, data) {
		          return data['tag'][tooltipItem[0]['index']];
		        },
		        label: function(tooltipItem, data) {
		          return 'Selected';
		        },
		        afterLabel: function(tooltipItem, data) {
		          return data['datasets'][0]['data'][tooltipItem['index']];
		        },
		      },
		      backgroundColor: '#f5f5f5',
		      titleFontSize: 10,
		      titleFontColor: '#b2b2b2',
		      _titleFontFamily: 'Muli',
		      bodyFontColor: '#000',
		      bodyFontSize: 15,
		      displayColors: false,
		      xPadding: 30,
		      yPadding: 30,
		      borderColor: '#FA002F',
		      borderWidth: 2,
		      footerFontColor: 'red',
		    }
	    }
	});
}
function chart_bar_tag(tag,index) {
	var myChart = new Chart(document.getElementById("Chart_bar"), {
		type: 'bar',
		data: {
			labels: tag,
			datasets: [{
				data: index,
				fill: false,
				borderColor: '#6d6a89',
				backgroundColor: "#6d6a89",
				borderWidth: 1
			}]
		},
		options: {
			legend: { display: false },
			title: {
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			},
			elements: {
				line: {
	                tension: 0, // disables bezier curves
	            }
	        },
	        tooltips: {
		      callbacks: {
		        title: function(tooltipItem, data) {
		          return data['labels'][tooltipItem[0]['index']];
		        },
		        label: function(tooltipItem, data) {
		          return 'Selected';
		        },
		        afterLabel: function(tooltipItem, data) {
		          return data['datasets'][0]['data'][tooltipItem['index']];
		        },
		      },
		      backgroundColor: '#f5f5f5',
		      titleFontSize: 10,
		      titleFontColor: '#b2b2b2',
		      _titleFontFamily: 'Muli',
		      bodyFontColor: '#000',
		      bodyFontSize: 15,
		      displayColors: false,
		      xPadding: 30,
		      yPadding: 30,
		      borderColor: '#FA002F',
		      borderWidth: 2,
		      footerFontColor: 'red',
		    }
	    }
	});
}
//end chart tag status

//chart segment
function char_seg(c_seg,index_seg) {

new Chart(document.getElementById("bar-chart-horizontal"), {
	type: 'horizontalBar',
	data: {
		labels: c_seg,
		datasets: [ 
		{
			label: "",
			backgroundColor: "#6d6a89",
			data: index_seg
		}
		]
	},
	options: {
		legend: { display: false },
		tooltips: {
		      callbacks: {
		        title: function(tooltipItem, data) {
		          return data['labels'][tooltipItem[0]['index']];
		        },
		        label: function(tooltipItem, data) {
		          return 'Selected';
		        },
		        afterLabel: function(tooltipItem, data) {
		          return data['datasets'][0]['data'][tooltipItem['index']];
		        },
		      },
		      backgroundColor: '#f5f5f5',
		      titleFontSize: 10,
		      titleFontColor: '#b2b2b2',
		      _titleFontFamily: 'Muli',
		      bodyFontColor: '#000',
		      bodyFontSize: 15,
		      displayColors: false,
		      xPadding: 30,
		      yPadding: 30,
		      borderColor: '#FA002F',
		      borderWidth: 2,
		      footerFontColor: 'red',
		    }
	}
});

}
//end chart segment



//ajax
function customReport() {
	var url = $('#url_custom_report').val();
	var report_from = $('#hiddenFieldfrom').val();
	var report_to = $('#hiddenFieldto').val();
	// console.log(report_from);
	// console.log(report_to);
	var id_tag = $('#lable_id').val();
	var khoang = $('#select_khoang').val();
	var type = $('#customer_type').val();
	var token = $('meta[name=csrf-token]').attr('content');
	$.post(url, {
		_token: $('meta[name=csrf-token]').attr('content'),
		report_from: report_from,
		report_to: report_to,
		id_tag: id_tag,
		khoang: khoang,
		type: type,

	}
	)
	.done(function(data) {
		var obj = $.parseJSON(data);
		char_seg(obj.c_seg,obj.index_seg);

		$("#table_segment").html("");
		$("#table_segment").append(`
			<tr>
				<th>SEGMENT NAME</th>
				<th>SELECTED</th>
				<th>INDEX</th>
			</tr>`);
		
		for (var i = 0; i < obj.c_seg.length; i++) {
			if (obj.sum == 0) {
				var index_seg = 0;
			}else{
				var index_seg = (obj.index_seg[i]/obj.sum*100).toFixed(2);
			}
			$("#table_segment").append(`
				<tr style="border-top: 1px solid  #e9e9e9;margin: 8px;">
					<td>`+obj.c_seg[i]+`</td>
					<td>`+obj.index_seg[i]+`</td>
					<td>`+index_seg+`%</td>
				</tr>
			`);
		}


		if (id_tag == 0){
			$("#Chart_bar").show();
			$("#Chart_line").hide();
			chart_bar_tag(obj.tag_name,obj.index_tag);
		}
		else{
			$("#Chart_bar").hide();
			$("#Chart_line").show();
			chart_line_tag(obj.tag_name , obj.index_tag , obj.tag_table ,  obj.select_type);
		}
		var a = obj.tag_table;
		var b = obj.index_tag;
		$("#table_tag").html("");
		$("#table_tag").append(`
			<tr>
				<th>TAG NAME</th>
				<th>SELECTED</th>
				<th>INDEX</th>
			</tr>`);
		
		for (var i = 0; i < a.length; i++) {
			if (obj.sum == 0) {
				var index = 0;
			}else{
				var index = (b[i]/obj.sum*100).toFixed(2);
			}
			$("#table_tag").append(`
				<tr style="border-top: 1px solid  #e9e9e9;margin: 8px;">
					<td>`+a[i]+`</td>
					<td>`+b[i]+`</td>
					<td>`+index+`%</td>
				</tr>
			`);
		}
	})
	.fail(function() {
		alert( "error" );
	});
}