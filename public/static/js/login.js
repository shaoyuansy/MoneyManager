$.backstretch("/static/img/login-bg.jpg", {speed: 200});
		
$('input').focus(function (){
	$('.error').text(''); 
	$(".email-note").text('');
});

function chkUsername(){
	$("#username").removeClass("has-error");
	$("#username").removeClass("has-success");
	var usernameReg = /^\w{5,16}$/;
	var username = $("#username").val();
	if(usernameReg.test(username)){
		$("#username").addClass("has-success");
	}else{
		$("#username").addClass("has-error");
	}
};

function chkPassword(){
	$("#password").removeClass("has-error");
	$("#password").removeClass("has-success");
	var password = $("#password").val();
	if(password.length < 6){
		$("#password").addClass("has-error");
	}else{
		$("#password").addClass("has-success");
	}
};

function chkEmail(){
	$("#qemail").removeClass("has-error");
	$("#qemail").removeClass("has-success");
	var emailReg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var qemail = $("#qemail").val();
	if(!emailReg.test(qemail)){
		$("#qemail").addClass("has-error");
	}else{
		$("#qemail").addClass("has-success");
	}
};

function forget(){
	var email = $("#qemail").val();
	$.ajax({
		type: "post",
		url: '/index/login/forgetpwd',
		dataType: "json",
		data: {email:email},
		async: false,
		success: function (msg) {
			if(msg.success){
				$(".email-note").text(msg.data);
				setTimeout(function(){
					$("#forgetpwd").modal('hide');
					$("#qemail").val('');
					$("#qemail").removeClass("has-error");
					$("#qemail").removeClass("has-success");
					$(".email-note").text('');
				},1500)
			}else{
				$(".email-note").text(msg.errorMessage);
			}
		},
		error: function (e) {
			console.log(e);
		}
	})
};