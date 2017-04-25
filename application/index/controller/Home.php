<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\AccountModel;
use app\index\model\IncomeModel;
use app\index\model\OutgoModel;
use app\index\model\SignModel;
use app\index\model\UserModel;
use app\index\model\BudgetModel;
use think\Request;

class Home extends Controller
{
    public function index(){
		$this->assign('pagetitle','概览 - F.M');
		$this->fetch('/layout');
        return view('index');
		
    }
	
	public function get_user(){
		$uid = session('user_auth.uid');
		$user = new UserModel;
		$data = $user->get_user($uid);
		$arr = [
			'nikename' => $data['nikename'],
			'icon' => $data['icon'],
		];
		if(!empty($data)){
			$jsonData = array('success'=>true,'data'=>$arr);
			return json($jsonData);
		}
	}


	public function all(){
		$uid = session('user_auth.uid');
		$account = new AccountModel;
		$data = $account->get_account($uid);
		if(!empty($data)){
			$jsonData = array('success'=>true,'data'=>$data);
			return json($jsonData);
		}
	}
	
	public function income(){
		$uid = session('user_auth.uid');
		$income = new IncomeModel;
		$data = $income->get_income($uid);
		if(!empty($data)){
			$jsonData = array('success'=>true,'data'=>$data);
			return json($jsonData);
		}
	}
	
	public function outgo(){
		$uid = session('user_auth.uid');
		$outgo = new OutgoModel;
		$data = $outgo->get_outgo($uid);
		if(!empty($data)){
			$jsonData = array('success'=>true,'data'=>$data);
			return json($jsonData);
		}
	}
	
	//首页近6个月收支
	public function inout(){
		$time = Array();
		$in = Array(0,0,0,0,0,0);
		$out = Array(0,0,0,0,0,0);
		$uid = session('user_auth.uid');
		$income = new IncomeModel;
		$data = $income->get_inout($uid);
		for($i = 5 ; $i >= 0 ; $i--){
			array_push($time,date("Y-m", strtotime("-".$i." month")));//获取格式  strtotime获取时间戳
		};
		for($n = 0 ; $n < count($time) ; $n++ ){
			for($m = 0 ; $m < count($data['in']) ; $m++ ){
				if($data['in'][$m]['itime'] === $time[$n]){
					$in[$n]=$data['in'][$m]['imoney'];
				}
			}
			for($v = 0 ; $v < count($data['out']) ; $v++ ){
				if($data['out'][$v]['otime'] === $time[$n]){
					$out[$n]=$data['out'][$v]['omoney'];
				}
			}
		}
		$data = array( 
			'time'	=>	$time,
			'in'	=>	$in,
			'out'	=>	$out
		);
		$jsonData = array('success'=>true,'data'=>$data);
		return json($jsonData);
	}
	
	/**读取签到信息*/
	public function sign_status(){
		$uid = session('user_auth.uid');
		$sign = new SignModel;
		$data = $sign->get_sign($uid);
		if($data){
			/**今天的时间戳时间范围*/
			$t = time();			
			$now_start_time = mktime(0,0,0,date("m",$t),date("d",$t),date("Y",$t));
			$now_end_time = mktime(23,59,59,date("m",$t),date("d",$t),date("Y",$t));
			/**昨天的时间戳时间范围*/
			$last_start_time = mktime(0,0,0,date("m",$t),date("d",$t)-1,date("Y",$t));
			$last_end_time = mktime(23,59,59,date("m",$t),date("d",$t)-1,date("Y",$t));
			if($now_start_time < strtotime($data['sign_time']) && strtotime($data['sign_time']) < $now_end_time){
				//今日已签 返回状态
				$status = [
					'count'	=> $data['count'],
					'status'=> '今日已签到'
				];
				$jsonData = array('success'=>true,'data'=>$status);
				return json($jsonData);
			}else if($last_start_time < strtotime($data['sign_time']) && strtotime($data['sign_time']) < $last_end_time){
				//今日未签 返回状态
				$status = [
					'count'	=> $data['count'],
					'status'=> '今日未签到'
				];
				$jsonData = array('success'=>true,'data'=>$status);
				return json($jsonData);
			}else{
				//今日未签 返回状态
				$status = [
					'count'	=> 0,
					'status'=> '今日未签到'
				];
				$jsonData = array('success'=>true,'data'=>$status);
				return json($jsonData);
			}
		}else{
			//今日未签 返回状态
			$status = [
				'count'	=> 0,
				'status'=> '今日未签到'
			];
			$jsonData = array('success'=>true,'data'=>$status);
			return json($jsonData);
		}
	}
	
	/**连续签到的实现方式*/
	public function sign(){
		$uid = session('user_auth.uid');
		$sign = new SignModel;
		$data = $sign->get_sign($uid);
		/**此用户是否签到过*/
		if(!empty($data)){
			/**今天的时间戳时间范围*/
			$t = time();			
			$now_start_time = mktime(0,0,0,date("m",$t),date("d",$t),date("Y",$t));
			$now_end_time = mktime(23,59,59,date("m",$t),date("d",$t),date("Y",$t));
			if($now_start_time < strtotime($data['sign_time']) && strtotime($data['sign_time']) < $now_end_time){
				//今日已签 返回状态
				$status = [
					'count'	=> $data['count'],
					'status'=> '今日已签到'
				];
				$jsonData = array('success'=>true,'data'=>$status);
				return json($jsonData);
			}else{
				/**昨天的时间戳时间范围*/
				$last_start_time = mktime(0,0,0,date("m",$t),date("d",$t)-1,date("Y",$t));
				$last_end_time = mktime(23,59,59,date("m",$t),date("d",$t)-1,date("Y",$t));
				/**判断签到时间是否在昨天的时间范围内*/
				if($last_start_time < strtotime($data['sign_time']) && strtotime($data['sign_time']) < $last_end_time){
					$res = $sign->sign_update($uid);
					if($res){
						$status = [
							'count'	=> $res['count'],
							'status'=> '今日已签到',
							'result'=> 'ok'
						];
						$jsonData = array('success'=>true,'data'=>$status);
						return json($jsonData);
					}
				}else{
					$res = $sign->sign_count($uid);
					if($res){
						$status = [
							'count'	=> 1,
							'status'=> '今日已签到',
							'result'=> 'ok'
						];
						$jsonData = array('success'=>true,'data'=>$status);
						return json($jsonData);
					}
				}
			}
		}else{
			$res = $sign->sign_in($uid);
			if($res){
				$status = [
					'count'	=> 1,
					'status'=> '今日已签到',
					'result'=> 'ok'
				];
				$jsonData = array('success'=>true,'data'=>$status);
				return json($jsonData);
			}
		}
	}
	
	public function get_gritter(){ //首页消息弹窗的提示内容
		$uid = session('user_auth.uid');
		$month = date("n");
		$user = new UserModel;
		//获取注册的时间
		$registed = $user->get_registed_time($uid);
		if(!empty($registed)){
			$now = date("Y-m-d H:i:s");   
			$registed = strtotime($registed);  
			$now = strtotime($now);  
			$days = ceil(($now-$registed)/3600/24);  
		}

		//获取当月的预算
		$budget = new BudgetModel;
		$budget_data = $budget->get_month_budget($uid,$month);
		if($budget_data != 0 && array_key_exists("b_money",$budget_data)){
			$budget = $budget_data["b_money"];
		}else{
			$budget = 0.00;
		}

		//获取当月支出
		$outgo = new OutgoModel;
		$data = $outgo->get_month_outgo($uid,$month);
		if($data != 0 && array_key_exists("outgo",$data)){
			$used = $data["outgo"] == null ? 0 : $data["outgo"];
		}else{
			$used = 0.00;
		}

		//计算余额
		if( $budget>0 ){
			$over = $budget - $used;
			if( $over >= 0){
				$over = "，还剩".$over."元可用。";
			}else{
				$over = "，超出".abs($over)."元。";
			}
		}else{
			$over = "";
		}
		$data = [
			'days'	=> $days,
			'budget'=> $budget,
			'used'	=> $used,
			'over'	=> $over
		];
		$jsonData = array('success'=>true,'data'=>$data);
		return json($jsonData);
	}

}