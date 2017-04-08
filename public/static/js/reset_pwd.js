function reset_pwd(){ // 修改密码请求
	var username = $("#username").val();
	var npwd = $("#npassword").val();
	var rpwd = $("#rpassword").val();
	if(username==""){
		$(".error_msg").text("请输入用户名");
	}else if(npwd==""){
		$(".error_msg").text("请输入新密码");
	}else if(npwd.length<6){
		$(".error_msg").text("新密码长度不够");
	}else if(rpwd==""){
		$(".error_msg").text("请再输入新密码");
	}else if(rpwd != npwd){
		$(".error_msg").text("两次新密码输入不一致");
	}else{
		$.ajax({
			type: "post",
			url: '/index/login/reset_pwd',
			data:{username:username,npwd:npwd},
			dataType:"json",
			async: false,
			success: function (msg) {
				if(msg.success){
					$(".error_msg").text("密码重置成功，请登录");
				}else{
					$(".error_msg").text(msg.errorMassage);
				}
			},
			error: function (e) {
				console.log(e);
			}
		});
	}
}
