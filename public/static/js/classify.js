$(document).ready(function () {
	get_in_type();
	get_out_type();
	get_member_type();
	
}) 

function add_in_type(){
	var intype = palindrome($("#intype").val());
	if(intype==""){
		return false;
	}
	$.ajax({
		type: "post",
		url: '/index/classify/add_in_type',
		data:{intype:intype},
		dataType:"json",
		async: false,
		success: function (msg) {
			if(msg.success){
				$("#success").modal({backdrop:false});
				get_in_type();
				$("#intype").val("");
				setTimeout(function(){					
					$("#success").modal('hide');
				},1000);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
}

function add_out_type(){
	var outtype = palindrome($("#outtype").val());
	if(outtype==""){
		return false;
	}
	$.ajax({
		type: "post",
		url: '/index/classify/add_out_type',
		data:{outtype:outtype},
		dataType:"json",
		async: false,
		success: function (msg) {
			if(msg.success){
				$("#success").modal({backdrop:false});
				get_out_type();
				$("#outtype").val("");
				setTimeout(function(){					
					$("#success").modal('hide');
				},1000);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
}

function add_member_type(){
	var membertype = palindrome($("#membertype").val());
	if(membertype==""){
		return false;
	}
	$.ajax({
		type: "post",
		url: '/index/classify/add_member_type',
		data:{membertype:membertype},
		dataType:"json",
		async: false,
		success: function (msg) {
			if(msg.success){
				$("#success").modal({backdrop:false});
				get_member_type();
				$("#membertype").val("");
				setTimeout(function(){					
					$("#success").modal('hide');
				},1000);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
}

function delIntype(type){
	if(type=="其他收入"){
		return false;
	}
	$.ajax({
		type: "post",
		url: '/index/classify/del_in_type',
		data:{intype:type},
		dataType:"json",
		async: false,
		success: function (msg) {
			if(msg.success){
				$("#success").modal({backdrop:false});
				get_in_type();
				setTimeout(function(){					
					$("#success").modal('hide');
				},1000);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
}

function delOuttype(type){
	if(type=="其他款项"){
		return false;
	}
	$.ajax({
		type: "post",
		url: '/index/classify/del_out_type',
		data:{outtype:type},
		dataType:"json",
		async: false,
		success: function (msg) {
			if(msg.success){
				$("#success").modal({backdrop:false});
				get_out_type();
				setTimeout(function(){					
					$("#success").modal('hide');
				},1000);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
}

function delMembertype(type){
	if(type=="本人"){
		return false;
	}
	$.ajax({
		type: "post",
		url: '/index/classify/del_member_type',
		data:{membertype:type},
		dataType:"json",
		async: false,
		success: function (msg) {
			if(msg.success){
				$("#success").modal({backdrop:false});
				get_member_type();
				setTimeout(function(){					
					$("#success").modal('hide');
				},1000);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
}

function get_in_type(){
	$.ajax({
		type: "get",
		url: '/index/classify/get_in_type',
		async: false,
		success: function (msg) {
			if(msg.success){
				var inArr = msg.data.type;
				var trStr = "";
				$.each(inArr,function(i,v){
					if(this == "其他收入"){
						trStr += '<tr><td>'+this+'</td><td></td><tr>';
						return true;
					}
					trStr += '<tr><td>'+this+'</td>'+
					'<td><a onclick="delIntype(\''+this+'\')" class="tooltips" data-placement="bottom" data-original-title="删除"><i class="fa fa-trash-o"></i></a></td></tr>';
				})
				$(".in_type_table tbody").html(trStr);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
}

function get_out_type(){
	$.ajax({
		type: "get",
		url: '/index/classify/get_out_type',
		async: false,
		success: function (msg) {
			if(msg.success){
				var outArr = msg.data.type;
				var trStr = "";
				$.each(outArr,function(i,v){
					if(this == "其他款项"){
						trStr += '<tr><td>'+this+'</td><td></td><tr>';
						return true;
					}
					trStr += '<tr><td>'+this+'</td>'+
					'<td><a onclick="delOuttype(\''+this+'\')" class="tooltips" data-placement="bottom" data-original-title="删除"><i class="fa fa-trash-o"></i></a></td></tr>';
				})
				$(".out_type_table tbody").html(trStr);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
}

function get_member_type(){
	$.ajax({
		type: "get",
		url: '/index/classify/get_member_type',
		async: false,
		success: function (msg) {
			if(msg.success){
				var memberArr = msg.data.type;
				var trStr = "";
				$.each(memberArr,function(i,v){
					if(this == "本人"){
						trStr += '<tr><td>'+this+'</td><td></td><tr>';
						return true;
					}
					trStr += '<tr><td>'+this+'</td>'+
					'<td><a onclick="delMembertype(\''+this+'\')" class="tooltips" data-placement="bottom" data-original-title="删除"><i class="fa fa-trash-o"></i></a></td></tr>';
				})
				$(".member_type_table tbody").html(trStr);
			}
		},
		error: function (e) {
			console.log(e);
		}
	});
}

function palindrome(str) {
  var arr = str.replace(/[\ |\，|\。|\；|\‘|\：|\“|\”|\’|\【|\】|\{|\}|\、|\||\~|\！|\@|\#|\￥|\%|\……|\&|\*|\（|\）|\-|\——|\+|\=|\~|\`|\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\-|\_|\+|\=|\||\\|\[|\]|\{|\}|\;|\:|\"|\'|\,|\<|\.|\>|\/|\?]/g,"");
  return arr;
}