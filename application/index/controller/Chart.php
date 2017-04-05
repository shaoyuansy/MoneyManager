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
        $uid = session('user_auth.uid');
        $year = 2017;
        $outgo = new OutgoModel;
        $income = new IncomeModel;

        $yaer_out = $outgo->get_year_out($uid,$year);
        $yaer_in = $income->get_year_in($uid,$year);
        $year_sub = floatval($yaer_in["year_income"]) - floatval($yaer_out["year_outgo"]);

        $data = $income->get_year_inout($uid,$year);
        $inoutList = [
            ['month' => 1,'in' => '0.00','out' => '0.00','sub' => '0.00'],['month' => 2,'in' => '0.00','out' => '0.00','sub' => '0.00'],
            ['month' => 3,'in' => '0.00','out' => '0.00','sub' => '0.00'],['month' => 4,'in' => '0.00','out' => '0.00','sub' => '0.00'],
            ['month' => 5,'in' => '0.00','out' => '0.00','sub' => '0.00'],['month' => 6,'in' => '0.00','out' => '0.00','sub' => '0.00'],
            ['month' => 7,'in' => '0.00','out' => '0.00','sub' => '0.00'],['month' => 8,'in' => '0.00','out' => '0.00','sub' => '0.00'],
            ['month' => 9,'in' => '0.00','out' => '0.00','sub' => '0.00'],['month' => 10,'in' => '0.00','out' => '0.00','sub' => '0.00'],
            ['month' => 11,'in' => '0.00','out' => '0.00','sub' => '0.00'],['month' => 12,'in' => '0.00','out' => '0.00','sub' => '0.00']

        ];
        
        foreach($data['income'] as $index => $in){
            if($inoutList[$index]['month'] == $in['month']){
                $inoutList[$index]['in'] = $in['income'];
            }
        }
        foreach($data['outgo'] as $index => $out){
            if($inoutList[$index]['month'] == $out['month']){
                $inoutList[$index]['out'] = $out['outgo'];
            }
        }
        foreach($inoutList as &$list){
            $list['sub'] = $list['in'] - $list['out'];
            if($list['sub']==0)
                $list['sub']="0.00";
        }
        $this->assign('yaer_out', $yaer_out["year_outgo"]);
        $this->assign('yaer_in', $yaer_in["year_income"]);
        $this->assign('year_sub',$year_sub);
        $this->assign('year', $year);
        $this->assign('inoutList', $inoutList);
        return $this->fetch();
    } 

    public function trend_year_inout(){
        $uid = session('user_auth.uid');
        $year = "2017";
        $income = new IncomeModel;
        $data = $income->get_year_inout($uid,$year);
        $in = $data["income"];
        $out = $data["outgo"];
        $inArr = [null,null,null,null,null,null,null,null,null,null,null,null];
        $outArr = [null,null,null,null,null,null,null,null,null,null,null,null];
        $subArr = [null,null,null,null,null,null,null,null,null,null,null,null];
        foreach($in as $index=>$arr){
            $inArr[$arr['month']-1] = $arr['income'];
        }
        foreach($out as $index=>$arr){
            $outArr[$arr['month']-1] = $arr['outgo'];
        }
        for($i=0;$i<count($subArr);$i++){
            $subArr[$i] = $inArr[$i] - $outArr[$i];
            if($subArr[$i]==0){
                $subArr[$i]=null;
            }
        }
        $data = [
            "income"	=>	$inArr,
			"outgo"	=>	$outArr,
            "sub"	=>	$subArr,
        ];
        $jsonData = array('success'=>true,'data'=>$data);
        return json($jsonData);
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