<?php
namespace app\index\controller;
use think\Controller;
use think\Request;

class Tools extends Controller{

    function upload_icon(){
        $file = request()->file('image');
        $result = upload($file,2097152);//头像大小不可超过2Mb
        if($result["success"]===true){
            return $result["data"];
        }else{
            return $result["errorMessage"];
        }
    }

    function upload_image(){//可上传多个
        $file = request()->file('image');
        $result = upload($file,5242880);//图片大小不可超过5Mb
        if($result["success"]===true){
            return "../../uploads/".$result["data"];
        }else{
            return "error|".$result["errorMessage"];
        }
    }
}