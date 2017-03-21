<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

use think\Session;

function is_login(){
    $user = session('user_auth');
    if(empty($user)){
        return 0;
    }else{
        return session('user_auth_sign') == data_auth_sign($user) ? $user['uid'] : 0;
    }
}

function data_auth_sign($data) {
    if(!is_array($data)){
        $data = (array)$data;
    }
    ksort($data);//对数组进行降序排列
    $code = http_build_query($data);//将数组处理为url-encoded 请求字符串
    $sign = sha1($code);//进行散列算法
    return $sign;
}

function think_now_time(){
    return date("Y-m-d H:i:s");
}

function md5crypt($num){
	$num = md5(crypt($num,substr($num,0,2)));
	return $num;
}