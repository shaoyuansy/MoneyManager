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

function randchar($length = ""){ 
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$randchar = ""; 
	for ($i = 0; $i < $length; $i++) { 
		$randchar .= $chars[mt_rand(0,strlen($chars)-1)];
	} 
	return $randchar; 
} 

function upload($file,$size){
    $info = $file->validate(['size'=>$size,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
    if($info){
        // $info->getExtension();//类型
        // $info->getSaveName();//public中的路径
        // $info->getRealPath();//绝对路径
        // $info->getFilename();//服务器中的名字
        $result = [
            "success"   =>  true,
            "data"      =>  $info->getSaveName()
        ];
    }else{
        $result = [
            "success"       =>  false,
            "errorMessage"  =>  $file->getError() 
        ];
    }
    return $result;
}

function uploadmore($file,$size){
    $info = $file->validate(['size'=>$size,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
    foreach($files as $file){
        if($info){
            $result = [
                "success"   =>  true,
                "data"      =>  $info->getSaveName()
            ];
        }else{
            $result = [
                "success"       =>  false,
                "errorMessage"  =>  $file->getError() 
            ];
        }
        return $result;
    }
}