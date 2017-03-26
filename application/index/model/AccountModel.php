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
	
}
