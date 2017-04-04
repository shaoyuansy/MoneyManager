<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\UserModel;
use app\index\model\IncomeModel;
use app\index\model\OutgoModel;
use app\index\model\DebteeModel;
use app\index\model\DebtorModel;
use app\index\model\BudgetModel;
use app\index\model\AccountModel;
use app\index\model\MemberModel;
use think\Request;

class Account extends Controller
{
    public function _empty($name){
        return view($name);
    }
	//收入
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
	
	public function get_income(){
		$uid = session('user_auth.uid');
		$income = new IncomeModel;
		$result = $income->select_income($uid);
		$data = [];
		if(count($result) > 0){
			foreach($result as &$arr){
				array_push($data,array_values($arr));
			}
			$jsonData = array('success'=>true,'data'=>$data);
			return json($jsonData);
		}else{
			$jsonData = array('success'=>false,'errorMassage'=>'暂无记录');
			return json($jsonData);
		}
	}
	//删除收入记录
		public function del_income(){
		if(request()->isPost()){
			$del = input('post.del');
			$delArr = explode(",",$del);
			$uid = session('user_auth.uid');
			$income = new IncomeModel;
			$result = $income->delete_income($uid,$delArr);
			if($result>0){
				$jsonData = array('success'=>true,'data'=>"");
				return json($jsonData);
			}else{
				$jsonData = array('success'=>false,'errorMassage'=>'删除失败');
				return json($jsonData);
			}
		}
	}	
	//支出
	public function set_outgo(){
		if(request()->isPost()){
			$uid = session('user_auth.uid');
			$type = input('post.type');
			$account = input('post.account');
			$money = input('post.money');
			$member = input('post.member');
			$time = input('post.time');
			$remark = input('post.remark');
			$outgo = new OutgoModel;
			$result = $outgo->save_outgo($uid,$type,$account,$money,$member,$time,$remark);
			if($result>0){
				$jsonData = array('success'=>true,'data'=>'');
			}else{
				$jsonData = array('success'=>false,'errorMassage'=>'记录存入失败。');
			}
			return json($jsonData);
		}
	}
	
	public function get_outgo(){
		$uid = session('user_auth.uid');
		$outgo = new OutgoModel;
		$result = $outgo->select_outgo($uid);
		$data = [];
		if(count($result) > 0){
			foreach($result as &$arr){
				array_push($data,array_values($arr));
			}
			$jsonData = array('success'=>true,'data'=>$data);
			return json($jsonData);
		}else{
			$jsonData = array('success'=>false,'errorMassage'=>'暂无记录');
			return json($jsonData);
		}
	}

		//删除支出记录
		public function del_outgo(){
		if(request()->isPost()){
			$del = input('post.del');
			$delArr = explode(",",$del);
			$uid = session('user_auth.uid');
			$outgo = new OutgoModel;
			$result = $outgo->delete_outgo($uid,$delArr);
			if($result>0){
				$jsonData = array('success'=>true,'data'=>"");
				return json($jsonData);
			}else{
				$jsonData = array('success'=>false,'errorMassage'=>'删除失败');
				return json($jsonData);
			}
		}
	}

	//分类	
	//收入分类
	public function in_type(){
		$uid = session('user_auth.uid');
		$income = new IncomeModel;
		$data = $income->get_in_type($uid);
		if(!empty($data)){
			$jsonData = array('success'=>true,'data'=>$data);
			return json($jsonData);
		}
	}
	//支出分类
	public function out_type(){
		$uid = session('user_auth.uid');
		$outgo = new OutgoModel;
		$data = $outgo->get_out_type($uid);
		if(!empty($data)){
			$jsonData = array('success'=>true,'data'=>$data);
			return json($jsonData);
		}
	}
	//账户分类
	public function account_type(){
		$uid = session('user_auth.uid');
		$account = new AccountModel;
		$data = $account->get_account_type($uid);
		if(!empty($data)){
			$jsonData = array('success'=>true,'data'=>$data);
			return json($jsonData);
		}
	}
	//成员分类
	public function member_type(){
		$uid = session('user_auth.uid');
		$member = new MemberModel;
		$data = $member->get_member($uid);
		if(!empty($data)){
			$jsonData = array('success'=>true,'data'=>$data);
			return json($jsonData);
		}
	}

	//还款
	public function set_debtee(){
		if(request()->isPost()){
			$uid = session('user_auth.uid');
			$time = input('post.time');
			$member = input('post.member');
			$debtor = input('post.debtor');
			$money = input('post.money');
			$remark = input('post.remark');
			$debtee = new DebteeModel;
			$result = $debtee->save_debtee($uid,$time,$member,$debtor,$money,$remark);
			if($result>0){
				$jsonData = array('success'=>true,'data'=>'');
			}else{
				$jsonData = array('success'=>false,'errorMassage'=>'记录存入失败。');
			}
			return json($jsonData);
		}
	}
	
	public function get_debtee(){
		$uid = session('user_auth.uid');
		$debtee = new DebteeModel;
		$result = $debtee->select_debtee($uid);
		$data = [];
		if(count($result) > 0){
			foreach($result as &$arr){
				array_push($data,array_values($arr));
			}
			$jsonData = array('success'=>true,'data'=>$data);
			return json($jsonData);
		}else{
			$jsonData = array('success'=>false,'errorMassage'=>'暂无记录');
			return json($jsonData);
		}
	}
	//删除还款记录
		public function del_debtee(){
		if(request()->isPost()){
			$del = input('post.del');
			$delArr = explode(",",$del);
			$uid = session('user_auth.uid');
			$debtee = new DebteeModel;
			$result = $debtee->delete_debtee($uid,$delArr);
			if($result>0){
				$jsonData = array('success'=>true,'data'=>"");
				return json($jsonData);
			}else{
				$jsonData = array('success'=>false,'errorMassage'=>'删除失败');
				return json($jsonData);
			}
		}
	}

	//收债
	public function set_debtor(){
		if(request()->isPost()){
			$uid = session('user_auth.uid');
			$time = input('post.time');
			$debtee = input('post.debtee');
			$member = input('post.member');
			$money = input('post.money');
			$remark = input('post.remark');
			$debtor = new DebtorModel;
			$result = $debtor->save_debtor($uid,$time,$debtee,$member,$money,$remark);
			if($result>0){
				$jsonData = array('success'=>true,'data'=>'');
			}else{
				$jsonData = array('success'=>false,'errorMassage'=>'记录存入失败。');
			}
			return json($jsonData);
		}
	}
	
	public function get_debtor(){
		$uid = session('user_auth.uid');
		$debtor = new DebtorModel;
		$result = $debtor->select_debtor($uid);
		$data = [];
		if(count($result) > 0){
			foreach($result as &$arr){
				array_push($data,array_values($arr));
			}
			$jsonData = array('success'=>true,'data'=>$data);
			return json($jsonData);
		}else{
			$jsonData = array('success'=>false,'errorMassage'=>'暂无记录');
			return json($jsonData);
		}
	}
	//删除还款记录
		public function del_debtor(){
		if(request()->isPost()){
			$del = input('post.del');
			$delArr = explode(",",$del);
			$uid = session('user_auth.uid');
			$debtor = new DebtorModel;
			$result = $debtor->delete_debtor($uid,$delArr);
			if($result>0){
				$jsonData = array('success'=>true,'data'=>"");
				return json($jsonData);
			}else{
				$jsonData = array('success'=>false,'errorMassage'=>'删除失败');
				return json($jsonData);
			}
		}
	}

	//预算
	public function set_budget(){
		if(request()->isPost()){
			$uid = session('user_auth.uid');
			$time = input('post.time');
			$term = input('post.term');
			$money = input('post.money');
			$remark = input('post.remark');
			$budget = new BudgetModel;
			$result = $budget->save_budget($uid,$time,$term,$money,$remark);
			if($result>0){
				$jsonData = array('success'=>true,'data'=>'');
			}else{
				$jsonData = array('success'=>false,'errorMassage'=>'记录存入失败。');
			}
			return json($jsonData);
		}
	}
	
	public function get_budget(){
		$uid = session('user_auth.uid');
		$budget = new BudgetModel;
		$result = $budget->select_budget($uid);
		$data = [];
		if(count($result) > 0){
			foreach($result as &$arr){
				array_push($data,array_values($arr));
			}
			$jsonData = array('success'=>true,'data'=>$data);
			return json($jsonData);
		}else{
			$jsonData = array('success'=>false,'errorMassage'=>'暂无记录');
			return json($jsonData);
		}
	}
	//删除预算记录
		public function del_budget(){
		if(request()->isPost()){
			$del = input('post.del');
			$delArr = explode(",",$del);
			$uid = session('user_auth.uid');
			$budget = new BudgetModel;
			$result = $budget->delete_budget($uid,$delArr);
			if($result>0){
				$jsonData = array('success'=>true,'data'=>"");
				return json($jsonData);
			}else{
				$jsonData = array('success'=>false,'errorMassage'=>'删除失败');
				return json($jsonData);
			}
		}
	}
	
}