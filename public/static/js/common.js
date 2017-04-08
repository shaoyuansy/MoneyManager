$(document).ready(function () {
	//获取用户名
	$.ajax({
		type: "get",
		url: '/index/home/get_user',
		async: false,
		success: function (msg) {
			if(msg.success){
				$("#get_nikename").text(msg.data.nikename);
				$(".get_icon").attr('src',msg.data.icon);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});

});