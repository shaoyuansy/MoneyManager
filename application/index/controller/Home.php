<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\AccountModel;
use app\index\model\IncomeModel;
use app\index\model\OutgoModel;
use app\index\model\SignModel;
use app\index\model\UserModel;
use think\Request;

class Home extends Controller
{
    public function index(){
		
        return view('index');
		
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
	
	public function inout(){
		$time = Array();
		$in = Array(0,0,0,0,0,0);
		$out = Array(0,0,0,0,0,0);
		$uid = session('user_auth.uid');
		$income = new IncomeModel;
		$data = $income->get_inout($uid);
		for($i = 5 ; $i >= 0 ; $i--){
			array_push($time,date("Y-m", strtotime("-".$i." month")));//获取格式
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
	
	public function get_gritter(){
		$uid = session('user_auth.uid');
		$user = new UserModel;
		$registed = $user->get_registed_time($uid);
		if(!empty($registed)){
			$now = date("Y-m-d H:i:s");   
			$registed = strtotime($registed);  
			$now = strtotime($now);  
			$days = ceil(($now-$registed)/3600/24);  
		}
		$data = [
			'days'	=> $days,
			'budget'=> '0.00',
			'used'	=> '0.00',
			'over'	=> '0.00'
		];
		$jsonData = array('success'=>true,'data'=>$data);
		return json($jsonData);
	}

}