<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\ClassifyModel;
use think\Request;
use think\Db;

class Classify extends Controller
{
    public function _empty($name){
        return view($name);
    }
    public function index(){
        $uid = session('user_auth.uid');
        $classify = new ClassifyModel;

        $t_in_type = $classify->select_t_in_type($uid);

        $income->assign('income', $income);
        $outgo->assign('outgo', $outgo);
        $member->assign('member', $member);
        $this->assign('t_in_type', $t_in_type);



        return $this->fetch();
    }
}