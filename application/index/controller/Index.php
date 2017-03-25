<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\UserModel;
use think\Request;

class Index extends Controller
{
    public function index(){
        if(is_login() != 0){
           return redirect('home/index');
        }else{
            //if(session('user_auth.uid') == 1){
            //	$this->redirect('admin/index');
           // }else{
            $username = session('user_auth.username');
            $this->assign('username',$username);
           	return redirect('login/index');
        	//}
        }
    }

}