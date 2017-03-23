<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\UserModel;
use think\Request;

class Index extends Controller
{
    public function index(){
        if(!is_login()){
           return redirect('login/index');
        }else{
            //if(session('user_auth.uid') == 1){
            //	$this->redirect('admin/index');
           // }else{
            $username = session('user_auth.username');
            $this->assign('username',$username);
           	return view('home/index');
        	//}
        }
    }

	public function _empty($name)
    {
        //把所有空的操作解析到showfan方法
        return $this->showFun($name);
    }

    //注意 本身是 protected 方法
    protected function showFun($name)
    {
         return view($name);
    }
}