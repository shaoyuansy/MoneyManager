<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\IncomeModel;
use app\index\model\OutgoModel;
use think\Request;

class Chart extends Controller{
   
    public function daily(){
        $uid = session('user_auth.uid');
        $outgo = new OutgoModel;
        $income = new IncomeModel;
        $outdata = $outgo->get_group_type($uid);
        $indata = $income->get_group_type($uid);
        $this->assign('outlist', $outdata);
        $this->assign('inlist', $indata);
        return $this->fetch();
    } 

    public function get_group_out(){
        if(request()->isPost()){
            $start = input('post.start');
            $end = input('post.end');
            $uid = session('user_auth.uid');
            $outgo = new OutgoModel;
            if($start=="" && $end==""){
                $outdata = $outgo->get_group_type($uid);
            }else{
                $outdata = $outgo->get_group_type_time($uid,$start,$end);
            }
            if(count($outdata)>0){
                $type = [];
                $money = [];
                foreach($outdata as $out){
                    $type[] = $out["type"];
                    $money[] = $out["money"];
                }
                $data["type"] = $type;
                $data["money"] = $money;
                $jsonData = array('success'=>true,'data'=>$data);
                return json($jsonData);
            }else{
                $jsonData = array('success'=>false,'errorMassage'=>"暂无数据");
                return json($jsonData);
            }
        }
    }

    public function get_group_in(){
        if(request()->isPost()){
            $start = input('post.start');
            $end = input('post.end');
            $uid = session('user_auth.uid');
            $income = new IncomeModel;
            if($start=="" && $end==""){
                $indata = $income->get_group_type($uid);
            }else{
                $indata = $income->get_group_type_time($uid,$start,$end);
            }
            if(count($indata)>0){
                $type = [];
                $money = [];
                foreach($indata as $in){
                    $type[] = $in["type"];
                    $money[] = $in["money"];
                }
                $data["type"] = $type;
                $data["money"] = $money;
                $jsonData = array('success'=>true,'data'=>$data);
                return json($jsonData);
            }else{
                $jsonData = array('success'=>false,'errorMassage'=>"暂无数据");
                return json($jsonData);
            }
        }
    }

    public function trend(){
        return view("trend");
    } 

    public function member(){
        return view("member");
    } 
    
    public function asset(){
        return view("asset");
    } 

    public function budget(){
        return view("budget");
    } 

}