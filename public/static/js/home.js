$(document).ready(function () {
	//获取资产信息
	$.ajax({
		type: "get",
		url: '/index/home/all',	
		async: false,
		success: function (msg) {
			if(msg.success){
				$("#asset").text(msg.data.asset);
				$("#debtee").text(msg.data.debtee);
				$("#netasset").text(msg.data.netasset);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
	
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
	
	//获取天气
	$.getJSON("http://wthrcdn.etouch.cn/weather_mini?citykey=101180101", function(data) {
		$(".weather-on-time h2").text(data.data.wendu+"℃");
		$(".weather-on-time h4").text(data.data.city);
	});
	
	//签到表
	createCalendar();
	//消息窗
	createGritter();

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
				console.log(msg);
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

//创建消息窗
function createGritter(){
	var days = 0;
	var budget = 0.00;
	var used = 0.00;
	var over = 0.00;
	$.ajax({
		type: "get",
		url: '/index/home/get_gritter',
		async: false,
		success: function (msg) {
			if(msg.success){
				days = msg.data.days;
				budget = msg.data.budget;
				used = msg.data.used;
				over = msg.data.over;
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
	var unique_id = $.gritter.add({
		// (string | mandatory) the heading of the notification
		title: '今天是您第'+ days +'天记账!',
		// (string | mandatory) the text inside the notification
		text: '本月预算额度'+ budget +'元，已使用'+ used +'元，还剩'+ over +'元可用。',
		// (string | optional) the image to display on the left
		image: '/static/img/ui-sam.jpg',
		// (bool | optional) if you want it to fade out on its own or just sit there
		sticky: true,
		// (int | optional) the time you want it to be alive for before fading out
		time: '1000',
		// (string | optional) the class name you want to apply to that specific message
		class_name: 'welcome-msg'
	});
			
	$("#gritter-item-"+unique_id).parent().addClass("bottom-right");
}

//创建签到日历
function createCalendar(){
	//获取签到状态
	var legend = new Array();
	$.ajax({
		type: "get",
		url: '/index/home/sign_status',
		async: false,
		success: function (msg) {
			if(msg.success){
				legend =[
					{type: "text", label: "连续签到天数", badge: msg.data.count},
					{type: "block", label: msg.data.status, classname: ""}
				]
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
	$("#my-calendar").zabuto_calendar({
		today: true,
		action: function () {
			return myDateFunction(this.id,true);
		},
		legend: legend
	});
}

//签到日历点击事件
function myDateFunction(id) {
	var date = $("#" + id).data("date");
	if(date == GetDateStr()){
		$.ajax({
			type: "get",
			url: '/index/home/sign',
			async: false,
			success: function (msg) {
				if(msg.success){
					if(msg.data.result=="ok"){
						$("#tag .modal-body").text("签到成功。每天都要记账呀~");
					}else{
						$("#tag .modal-body").text("今日已签到。坚持签到，坚持记账~");
					}
					$(".badge-event").text(msg.data.count);
					$(".legend-block ul span").text(msg.data.status);
				}
			},
			error: function (e) {
				console.log(e);
			}
		});
	}else{
		$("#tag .modal-body").text("这一天不能签到~");
	}
	$("#tag").modal({backdrop:false});
};

function GetDateStr() { 
	var dd = new Date(); 
	var y = dd.getFullYear(); 
	var m = dd.getMonth()+1;//获取当前月份的日期 
	var d = dd.getDate(); 
	return y +"-"+ (m<10 ? "0"+m : m ) +"-"+ (d<10 ? "0"+d : d ); 
}
		