<?php

namespace app\index\model;
use think\Model;
use think\Db;
/**
 *Account model
 */
class DebteeModel extends Model{

	public function save_debtee($uid,$time,$member,$debtor,$money,$remark){
		$data = [
			'uid'		=> $uid,
			'e_time' 	=> $time, 
            'e_debtee'  => $member,
            'e_debtor'  => $debtor,
			'e_money' 	=> $money, 
			'e_remark' 	=> $remark,
		];
		$result = Db::name('debtee')->insert($data);
		return $result;
	}
	
	public function select_debtee($uid){//获取用户预算记录
		$data = Db::table('debtee')
				->where('uid',$uid)
				->field('eid,e_time,e_debtee,e_debtor,e_money,e_remark')
				->order('eid desc')
				->select();
		return $data;
	}

	public function delete_debtee($uid,$del){//删除记录
		$result = Db::table('debtee')->where('uid',$uid)->delete($del);
		return $result;
	}
	
}
