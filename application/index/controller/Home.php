<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\AccountModel;
use app\index\model\IncomeModel;
use app\index\model\OutgoModel;
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

}