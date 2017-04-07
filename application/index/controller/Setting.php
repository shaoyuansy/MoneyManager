<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;

class Setting extends Controller
{
    public function _empty($name){
        return view($name);
    }
    
}