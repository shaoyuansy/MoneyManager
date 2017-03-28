$(document).ready(function () {
	//获取用户名
	$.ajax({
		type: "get",
		url: '/index/home/get_username',	
		async: false,
		success: function (msg) {
			if(msg.success){
				$("#get_username").text(msg.data);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});

});