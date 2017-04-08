$(document).ready(function () {
	//获取个人资料
	getuser();
	//修改头像
	$('.get-icon').attr('src',$(".get_icon").attr("src"));
	var options =
		{
			thumbBox: '.thumbBox',
			spinner: '.spinner',
			imgSrc: $(".get_icon").attr("src")
		}
	var cropper = $('.imageBox').cropbox(options);
	var img="";
	$('#upload-file').on('change', function(){
		var reader = new FileReader();
		reader.onload = function(e) {
			options.imgSrc = e.target.result;
			cropper = $('.imageBox').cropbox(options);
			getImg();
		}
		var file=this.files[0];
		reader.readAsDataURL(file);
		getImg();
	})
	$('#btnCrop').on('click', function(){
		var blob = dataURLtoBlob(cropper.getDataURL());
		var fd=new FormData();
		fd.append('image',blob,"image.png");
		var xhr = new XMLHttpRequest();
		xhr.open('POST', '/index/tools/upload_icon', true);
		xhr.onreadystatechange = callback;
		xhr.send(fd);
		function callback(){
			if (xhr.readyState == 4) { //readyState表示文档加载进度,4表示完毕
				var msg = JSON.parse(xhr.responseText);
				if(msg.success){
					$("#success").modal({backdrop:false});
					setTimeout(function(){					
						$("#success").modal('hide');
						location.reload();
					},1000);
				}
			}
		}
	})
	
	$(".imageBox").on("mouseup",function(){ //点击调整图片则获取当前图片大小
		getImg();
	});
	$('#btnZoomIn').on('click', function(){ //缩小
		cropper.zoomIn();
		getImg();
	})
	$('#btnZoomOut').on('click', function(){ //放大
		cropper.zoomOut();
		getImg();
	})
	function getImg(){ //获取图片预览图
		img = cropper.getDataURL();
		$('.cropped').html('');
		$('.cropped').append('<img src="'+img+'" align="absmiddle" style="width:180px;margin-top:4px;border-radius:180px;box-shadow:0px 0px 12px #7E7E7E;"><p>180px*180px</p>');
		$('.cropped').append('<img src="'+img+'" align="absmiddle" style="width:128px;margin-top:4px;border-radius:128px;box-shadow:0px 0px 12px #7E7E7E;"><p>128px*128px</p>');
		$('.cropped').append('<img src="'+img+'" align="absmiddle" style="width:64px;margin-top:4px;border-radius:64px;box-shadow:0px 0px 12px #7E7E7E;" ><p>64px*64px</p>');
	}
});

function changeIcon(){
    $("#change-icon").modal({backdrop:false});
}

function dataURLtoBlob(dataurl) {
	var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
		bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
	while(n--){
		u8arr[n] = bstr.charCodeAt(n);
	}
	return new Blob([u8arr], {type:mime});
}

//获取个人资料
function getuser(){
	$.ajax({
		type: "get",
		url: '/index/setting/get_user',
		async: false,
		success: function (msg) {
			if(msg.success){
				$("#nikename").val(msg.data.nikename);
				$("#realname").val(msg.data.realname);
				$("#sex").val(msg.data.sex);
				$("#phone").val(msg.data.phone);
				$("#last_time").val(msg.data.last_time);
				$("#email").val(msg.data.email);
				$("#send_email").val(msg.data.email);
				$("#safe_q_1").val(msg.data.safe_q_1);
				$("#safe_q_2").val(msg.data.safe_q_2);
				$("#safe_q_3").val(msg.data.safe_q_3);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
}

function save_person(){ //修改个人资料
	var nikename = $("#nikename").val();
	var realname = $("#realname").val();
	var sex = $("#sex").val();
	var phone = $("#phone").val();
	$.ajax({
		type: "post",
		url: '/index/setting/set_user',
		data:{nikename:nikename,realname:realname,sex:sex,phone:phone},
		dataType:"json",
		async: false,
		success: function (msg) {
			if(msg.success){
				$("#success").modal({backdrop:false});
				setTimeout(function(){					
					$("#success").modal('hide');
					location.reload();
				},1000);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
}

function show_change(){ //显示修改安全邮箱的按钮
	$('#email').removeAttr("disabled");
	$('.emailshow-btn').css("display","none");
	$('.email-btn').show();
}

function change_email(){ //修改安全邮箱
	var email = $("#email").val();
	if( email == $("#send_email").val()){
		$('#email').attr("disabled","true");
		$('.email-btn').css("display","none");
		$('.emailshow-btn').show();
		return false;
	}
	$.ajax({
		type: "post",
		url: '/index/setting/set_safe_email',
		data:{email:email},
		dataType:"json",
		async: false,
		success: function (msg) {
			if(msg.success){
				$('#email').attr("disabled","true");
				$('.email-btn').css("display","none");
				$('.emailshow-btn').show();
				$("#send_email").val(email);
			}else{
				$('.email-error').text(msg.errorMassage);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
}

function save_person(){ //修改安全问题
	var safe_q_1 = $("#safe_q_1").val();
	var safe_q_2 = $("#safe_q_2").val();
	var safe_q_3 = $("#safe_q_3").val();
	var safe_a_1 = $("#safe_a_1").val();
	var safe_a_2 = $("#safe_a_2").val();
	var safe_a_3 = $("#safe_a_3").val();
	$.ajax({
		type: "post",
		url: '/index/setting/set_safe',
		data:{safe_q_1:safe_q_1,safe_q_2:safe_q_2,safe_q_3:safe_q_3,safe_a_1:safe_a_1,safe_a_2:safe_a_2,safe_a_3:safe_a_3},
		dataType:"json",
		async: false,
		success: function (msg) {
			if(msg.success){
				$("#success").modal({backdrop:false});
				setTimeout(function(){					
					$("#success").modal('hide');
					location.reload();
				},1000);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
}
function show_change_pwd(){
	$("#changepwd").modal({backdrop:false});		
}
function change_pwd(){ // 修改密码请求
	var opwd = $("#opassword").val();
	var npwd = $("#npassword").val();
	var rpwd = $("#rpassword").val();
	if(opwd==""){
		$(".error_msg").text("请输入原密码");
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
			url: '/index/setting/change_password',
			data:{opwd:opwd,npwd:npwd},
			dataType:"json",
			async: false,
			success: function (msg) {
				if(msg.success){
					$("#changepwd").modal("hide");
					$(".error_msg").text("");
					$("#success").modal({backdrop:false});
					setTimeout(function(){					
						$("#success").modal('hide');
					},1000);
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

function show_success(){
	$("#success").modal({backdrop:false});
	setTimeout(function(){					
		$("#success").modal('hide');
	},1000);
}