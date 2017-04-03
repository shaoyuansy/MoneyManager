<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\UserModel;
use app\index\model\IncomeModel;
use app\index\model\AccountModel;
use app\index\model\MemberModel;
use think\Request;

class Account extends Controller
{
    public function _empty($name){
        return view($name);
    }
	
	public function set_income(){
		if(request()->isPost()){
			$uid = session('user_auth.uid');
			$type = input('post.type');
			$account = input('post.account');
			$money = input('post.money');
			$member = input('post.member');
			$time = input('post.time');
			$remark = input('post.remark');
			$income = new IncomeModel;
			$result = $income->save_income($uid,$type,$account,$money,$member,$time,$remark);
			if($result>0){
				$jsonData = array('success'=>true,'data'=>'');
			}else{
				$jsonData = array('success'=>false,'errorMassage'=>'记录存入失败。');
			}
			return json($jsonData);
		}
	}
	
	public function in_type(){
		$uid = session('user_auth.uid');
		$income = new IncomeModel;
		$data = $income->get_in_type($uid);
		if(!empty($data)){
			$jsonData = array('success'=>true,'data'=>$data);
			return json($jsonData);
		}
	}
	
	public function account_type(){
		$uid = session('user_auth.uid');
		$account = new AccountModel;
		$data = $account->get_account_type($uid);
		if(!empty($data)){
			$jsonData = array('success'=>true,'data'=>$data);
			return json($jsonData);
		}
	}
	
	public function member_type(){
		$uid = session('user_auth.uid');
		$member = new MemberModel;
		$data = $member->get_member($uid);
		if(!empty($data)){
			$jsonData = array('success'=>true,'data'=>$data);
			return json($jsonData);
		}
	}

}