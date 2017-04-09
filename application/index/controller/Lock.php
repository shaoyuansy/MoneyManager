<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\UserModel;
use think\Request;

class Lock extends Controller{

    public function _empty($name){
        return view('index');
    }

    public function forgetpwd(){
		$user = new UserModel;
        if(request()->isPost()){
            $unlock = input('post.unlock');
            $uid = session('user_auth.uid');
            $user = new UserModel;
            $result = $user->unlocked($uid,$unlock);
            if($result >= 0){
                $jsonData = array('success'=>true,'data'=>'');
            }else{
                $jsonData = array('success'=>false,'errorMassage'=>"密码错误");
            }
            return json($jsonData);
        }
    }
}