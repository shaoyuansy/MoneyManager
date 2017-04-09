<?php

namespace app\index\model;
use think\Model;
use think\Db;
/**
 *Account model
 */
class AccountModel extends Model{
	
	public function get_account($uid){//获取用户资产
		$data = db('account')->where('uid',$uid)->select();
		$asset = round(0,2);
		$debtee = round(0,2);
		$all = Array();
		if(!empty($data)){
			foreach($data as $account){
				if($account['a_type'] === "信用卡账户"){
					$asset += floatval($account['a_money']);
				}
				if($account['a_type'] === "现金账户"){
					$asset += floatval($account['a_money']);
				}
				if($account['a_type'] === "虚拟账户"){
					$asset += floatval($account['a_money']);
				}
				if($account['a_type'] === "债权账户"){
					$asset += floatval($account['a_money']);
				}
				if($account['a_type'] === "债务账户"){
					$debtee += floatval($account['a_money']);
				}
			}
			$all['asset'] = sprintf("%1\$.2f",$asset);
			$all['debtee'] = sprintf("%1\$.2f",$debtee);
			$all['netasset'] = sprintf("%1\$.2f",$asset - $debtee);
			return $all;
		}
	}
	
	public function get_account_type($uid){//获取近6个月收支
		$type = Db::table('t_account')->where('uid',$uid)->field('type')->select();
		if(count($type)>0){
			return $type[0];
		}
	}

	public function get_account_status($uid){ //获取一个用户的账户信息
		$data = Db::table('account')->where('uid',$uid)->select();
		if(count($data)>0){
			return $data;
		}
	}
	
	public function add_money($uid,$account,$money){
		$moneydata = Db::table('account')->where('uid',$uid)->where('a_type',$account)->field('a_money')->select();
		if(count($moneydata)>0){
			$moneydata = $moneydata[0]['a_money'];
			$money = floatval($moneydata)+floatval($money);
			$result = Db::table('account')->where('uid', $uid)->where('a_type', $account)->update(['a_money' => $money]);
			if($result>0){
				return $result;
			}
		}
	}

	public function sub_money($uid,$account,$money){
		$moneydata = Db::table('account')->where('uid',$uid)->where('a_type',$account)->field('a_money')->select();
		if(count($moneydata)>0){
			$moneydata = $moneydata[0]['a_money'];
			$money = floatval($moneydata)-floatval($money);			
			$result = Db::table('account')->where('uid', $uid)->where('a_type', $account)->update(['a_money' => $money]);
			if($result>0){
				return $result;
			}
		}
	}

}
