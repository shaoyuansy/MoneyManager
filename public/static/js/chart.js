$(document).ready(function () {
	
	//获取收入信息
	$.ajax({
		type: "get",
		url: '/index/home/income',
		async: false,
		success: function (msg) {
			if(msg.success){
				let w_in = msg.data.week_income===null ? "0" : msg.data.week_income;
				let m_in = msg.data.month_income===null ? "0" : msg.data.month_income;
				let y_in = msg.data.year_income===null ? "0" : msg.data.year_income;
				$("#w_in").text("￥"+ w_in );
				$("#m_in").text("￥"+ m_in );
				$("#y_in").text("￥"+ y_in );
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
	
	//获取支出信息
	$.ajax({
		type: "get",
		url: '/index/home/outgo',
		async: false,
		success: function (msg) {
			if(msg.success){
				let w_out = msg.data.week_outgo===null ? "0" : msg.data.week_outgo;
				let m_out = msg.data.month_outgo===null ? "0" : msg.data.month_outgo;
				let y_out = msg.data.year_outgo===null ? "0" : msg.data.year_outgo;
				$("#w_out").text("￥"+ w_out);
				$("#m_out").text("￥"+ m_out);
				$("#y_out").text("￥"+ y_out);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
	

	//获取收支图表
	var time = [];
	var income = [];
	var outgo = [];
	$.ajax({
		type: "get",
		url: '/index/home/inout',
		async: false,
		success: function (msg) {
			if(msg.success){
				time = msg.data.time;
				income = msg.data.in;
				outgo = msg.data.out;
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
	
	//描绘收支图表
	$('#sz-chart').highcharts({
		chart: {
			type: 'column',
			marginTop:50,
			marginRight:20
		},
		title: {
			text: ''
		},
		xAxis: {
			categories: time,
			labels:{
				style:{
					fontFamily:"Microsoft YaHei"
				}
			}
		},
		credits:{
			enabled:false // 禁用版权信息
		},
		yAxis: [{
			min: 0,
			title: {
				text: 'RMB'
			},
			labels:{
				style:{
					fontFamily:"Microsoft YaHei"
				}
			}
		}, {
			title: {
				text: ''
			},
			opposite: true
		}],
		legend: {
			shadow: false
		},
		tooltip: {
			shared: true,
			valueSuffix: '元',
			style: {               
				fontFamily:"Microsoft YaHei"
		}
		},
		plotOptions: {
			column: {
				grouping: false,
				shadow: false,
				borderWidth: 0
			}
		},
		series: [{
			name: '收入',
			color: '#71C8E5',
			data: income,
			pointPadding: 0.3,
			pointPlacement: 0
		},{
			name: '支出',
			color: '#ffd777',
			data: outgo,
			pointPadding: 0.4,
			pointPlacement: 0
		}]
	});
	
});
