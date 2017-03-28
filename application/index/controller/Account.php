<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\UserModel;
use think\Request;

class Account extends Controller
{
   public function _empty($name)
    {
        return view($name);
    }

}