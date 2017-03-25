 $.backstretch("/static/img/login-bg.jpg", {speed: 100});
		
$('input').focus(function (){
	$('.error').text(''); 
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
	var rpassword = $("#rpassword").val();
	if(password.length < 6){
		$("#password").addClass("has-error");
	}else{
		$("#password").addClass("has-success");
	}
	if(rpassword!="")
	this.chkRpassword();
};

function chkRpassword(){
	$("#rpassword").removeClass("has-error");
	$("#rpassword").removeClass("has-success");
	var password = $("#password").val();
	var rpassword = $("#rpassword").val();
	if(rpassword=="" || password != rpassword){
		$("#rpassword").addClass("has-error");
	}else{
		$("#rpassword").addClass("has-success");
	}
};

function chkEmail(){
	$("#email").removeClass("has-error");
	$("#email").removeClass("has-success");
	var emailReg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var email = $("#email").val();
	if(!emailReg.test(email)){
		$("#email").addClass("has-error");
	}else{
		$("#email").addClass("has-success");
	}
};

function chkPhone(){
	$("#phone").removeClass("has-error");
	$("#phone").removeClass("has-success");
	var phoneReg = /^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
	var phone = $("#phone").val();
	if(phone != ""){
		if(!phoneReg.test(phone)){
			$("#phone").addClass("has-error");
		}else{
			$("#phone").addClass("has-success");
		}
	}
};