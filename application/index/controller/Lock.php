<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\UserModel;
use think\Request;

class Lock extends Controller
{
    public function index(){
       
        return view('index');
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