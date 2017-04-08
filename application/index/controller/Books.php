<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\UserModel;
use think\Request;

class Books extends Controller{

    public function _empty($name){
        return redirect('errorpage/index');
    }

    public function index(){
        if(is_login() == 0){
            $username = session('user_auth.username');
            $this->assign('username',$username);
           	return redirect('login/index');
        }else{
            $this->assign('pagetitle','周期账本 - F.M');
			$this->fetch('/layout');
            return view('index');
        }
    }

}