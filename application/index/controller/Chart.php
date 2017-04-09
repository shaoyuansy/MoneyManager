<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\IncomeModel;
use app\index\model\OutgoModel;
use app\index\model\BudgetModel;
use app\index\model\AccountModel;
use think\Request;

class Chart extends Controller{
   
    public function _empty($name){
        return redirect('errorpage/index');
    }

    public function daily(){
        if(is_login() == 0){
            $username = session('user_auth.username');
            $this->assign('username',$username);
           	return redirect('login/index');
        }else{
            $uid = session('user_auth.uid');
            $outgo = new OutgoModel;
            $income = new IncomeModel;
            $outdata = $outgo->get_group_type($uid);
            $indata = $income->get_group_type($uid);
            $this->assign('outlist', $outdata);
            $this->assign('inlist', $indata);
            $this->assign('pagetitle','报表 > 日常收支表 - F.M');
			$this->fetch('/layout');
            return $this->fetch();
        }
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

    public function trend(){ //收支趋势图table
        if(is_login() == 0){
            $username = session('user_auth.username');
            $this->assign('username',$username);
           	return redirect('login/index');
        }else{
            $uid = session('user_auth.uid');
            $year = input('get.year');
            if($year == ""){
                $year = date('Y',time());
            }
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
            $this->assign('pagetitle','报表 > 收支趋势图 - F.M');
			$this->fetch('/layout');
            return $this->fetch();
        }
        
    } 

    public function trend_year_inout(){ //收支趋势图
        $uid = session('user_auth.uid');
        $year = input('post.year');
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

    public function member(){ //成员收支表 收入 支出 table渲染
        if(is_login() == 0){
            $username = session('user_auth.username');
            $this->assign('username',$username);
           	return redirect('login/index');
        }else{
            $uid = session('user_auth.uid');
            $outyear = input('get.outyear');//渲染成员收支图标中的年收入支出的年份，空则默认为当年
            $inyear = input('get.inyear');
            if($inyear == ""){ 
                $inyear = date('Y',time());
            }
            if($outyear == ""){
                $outyear = date('Y',time());
            }
            //开始请求成员收入、支出数据
            $outgo = new OutgoModel;
            $income = new IncomeModel;
            $out_member = $outgo->get_year_group_member($uid,$outyear);
            $in_member = $income->get_year_group_member($uid,$inyear);
            $outsum = 0; 
            if(count($out_member)>0){//计算支出比例
                foreach($out_member as $out){
                    $outsum += $out['outgo']; //所有支出
                }
                foreach($out_member as &$out){
                    $out['per'] = (round($out['outgo'] / $outsum,3)*100)."%"; //计算所占比
                }
            }
            
            $insum = 0; 
            if(count($in_member)>0){//计算收入比例
                foreach($in_member as $in){
                    $insum += $in['income']; //所有收入
                }
                foreach($in_member as &$in){
                    $in['per'] = (round($in['income'] / $insum,3)*100)."%"; //计算所占比
                }
            }

            $this->assign('inyear', $inyear);
            $this->assign('outyear', $outyear);
            $this->assign('outsum', $outsum);
            $this->assign('out_member', $out_member);
            $this->assign('insum', $insum);
            $this->assign('in_member', $in_member);
            $this->assign('pagetitle','报表 > 成员收支表 - F.M');
			$this->fetch('/layout');
            return $this->fetch();
        }
    } 
    
    public function out_year_member(){ //图表 支出 按成员分类 数据处理
        $uid = session('user_auth.uid');
        $year = input('post.year');
        $outgo = new OutgoModel;
        $out_member = $outgo->get_year_group_member($uid,$year);
        $outsum = 0; 
        $arr = [];
        if(count($out_member)>0){//计算支出比例
            foreach($out_member as $out){
                $outsum += $out['outgo']; //所有支出
            }
            foreach($out_member as &$out){
                $out['per'] = round($out['outgo'] / $outsum,3)*100; //计算所占比
                unset($out['outgo']);
                $arr[] = array_values($out);
            }
        }
        $jsonData = array('success'=>true,'data'=>$arr);
        return json($jsonData);
    }

    public function in_year_member(){ //图表 收入 按成员分类 数据处理
        $uid = session('user_auth.uid');
        $year = input('post.year');
        $income = new IncomeModel;
        $in_member = $income->get_year_group_member($uid,$year);
        $insum = 0; 
        $arr = [];
        if(count($in_member)>0){//计算收入比例
            foreach($in_member as $in){
                $insum += $in['income']; //所有收入
            }
            foreach($in_member as &$in){
                $in['per'] = round($in['income'] / $insum,3)*100; //计算所占比
                unset($in['income']);
                $arr[] = array_values($in);
            }
        }
        $jsonData = array('success'=>true,'data'=>$arr);
        return json($jsonData);
    }


    public function budget(){ //预算
        if(is_login() == 0){
            $username = session('user_auth.username');
            $this->assign('username',$username);
           	return redirect('login/index');
        }else{
            $uid = session('user_auth.uid');
            $year = input('get.year');
            if($year == ""){
                $year = date('Y',time());
            }
            $outgo = new OutgoModel;
            $budget = new BudgetModel;
            $out_data = $outgo->get_year_group_month($uid,$year);
            $budget_data = $budget->get_year($uid,$year);
            
            $budgetlist=[
                ['month' => 1,'budget' => '0.00','outgo' => '0.00','fact' => '0.00'],['month' => 2,'budget' => '0.00','outgo' => '0.00','fact' => '0.00'],
                ['month' => 3,'budget' => '0.00','outgo' => '0.00','fact' => '0.00'],['month' => 4,'budget' => '0.00','outgo' => '0.00','fact' => '0.00'],
                ['month' => 5,'budget' => '0.00','outgo' => '0.00','fact' => '0.00'],['month' => 6,'budget' => '0.00','outgo' => '0.00','fact' => '0.00'],
                ['month' => 7,'budget' => '0.00','outgo' => '0.00','fact' => '0.00'],['month' => 8,'budget' => '0.00','outgo' => '0.00','fact' => '0.00'],
                ['month' => 9,'budget' => '0.00','outgo' => '0.00','fact' => '0.00'],['month' => 10,'budget' => '0.00','outgo' => '0.00','fact' => '0.00'],
                ['month' => 11,'budget' => '0.00','outgo' => '0.00','fact' => '0.00'],['month' => 12,'budget' => '0.00','outgo' => '0.00','fact' => '0.00']
            ];
            if(count($out_data)>0){
                foreach($out_data as $index => $out){
                    if($budgetlist[$index]['month'] == $out['month']){
                        $budgetlist[$index]['outgo'] = $out['outgo'];
                    }
                }
            }
            if(count($budget_data)>0){
                foreach($budget_data as $index => $budget){
                    if($budgetlist[$index]['month'] == $budget['month']){
                        $budgetlist[$index]['budget'] = $budget['money'];
                    }
                }
            }
            foreach($budgetlist as &$list){
                $list['fact'] = $list['budget'] - $list['outgo'];
                if($list['fact']==0)
                    $list['fact']="0.00";
            }

            $this->assign('budgetlist', $budgetlist);
            $this->assign('year', $year);
            $this->assign('pagetitle','报表 > 支出预算表 - F.M');
			$this->fetch('/layout');
            return $this->fetch();
        }
    } 

    public function get_budget(){ //获取预算图表数据
        $uid = session('user_auth.uid');
        $year = input('post.year');
        if($year == ""){
            $year = date('Y',time());
        }
        $outgo = new OutgoModel;
        $budget = new BudgetModel;
        $out_data = $outgo->get_year_group_month($uid,$year);
        $budget_data = $budget->get_year($uid,$year);
        $out_money =[0,0,0,0,0,0,0,0,0,0,0,0];
        $budget_money =[0,0,0,0,0,0,0,0,0,0,0,0];
        if(count($out_data)>0){
            foreach($out_data as $out){
                $out_money[$out['month']-1] = $out['outgo'];
            }
        }
        if(count($budget_data)>0){
            foreach($budget_data as $budget){
                $budget_money[$budget['month']-1] = floatval($budget['money']);
            }
        }
        $data = [
			"outgo"	=>	$out_money,
            "budget"	=>	$budget_money
        ];
        $jsonData = array('success'=>true,'data'=>$data);
        return json($jsonData);
    } 

    public function accountstatus(){ //账户概况图
        if(is_login() == 0){
            $username = session('user_auth.username');
            $this->assign('username',$username);
           	return redirect('login/index');
        }else{
            $uid = session('user_auth.uid');
            $account = new AccountModel;
            $accountlist = $account->get_account_status($uid);
            $this->assign('accountlist', $accountlist);
            $this->assign('pagetitle','报表 > 账户概况图 - F.M');
			$this->fetch('/layout');
            return $this->fetch();
        }
    } 

    public function get_account(){ //账户统计表
        $uid = session('user_auth.uid');
        $account = new AccountModel;
        $accountlist = $account->get_account_status($uid);
        if(count($accountlist)>0){
            $type = [];
            $money = [];
            foreach($accountlist as $account){
                $type[] = $account["a_type"];
                $money[] = $account["a_money"];
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