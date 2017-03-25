<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\UserModel;
use think\Request;

class Home extends Controller
{
    public function index(){
       
        return view('index');

    }

}