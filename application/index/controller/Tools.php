<?php
namespace app\index\controller;
use app\index\model\UserModel;
use think\Controller;
use think\Request;
use think\Session;

class Tools extends Controller{

    function upload_icon(){
        $file = request()->file('image');
        $result = upload($file,2097152);//头像大小不可超过2Mb
        if($result["success"]===true){
            $path = "../../uploads/".$result["data"];
            $uid = session('user_auth.uid');
            $user = new UserModel;
            $result = $user->save_icon($uid,$path);
            if($result){
                $jsonData = array('success'=>true,'data'=>$path);
            }else{
                $jsonData = array('success'=>false,'errorMessage'=>'头像保存失败','data'=>'');
            }
            return json($jsonData);
        }else{
            $jsonData = array('success'=>false,'errorMessage'=>$result["errorMessage"],'data'=>'');
            return json($jsonData);
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