<?php

namespace app\index\model;
use think\Model;
use think\Db;
/**
 *Account model
 */
class DebtorModel extends Model{

	public function save_debtor($uid,$time,$debtee,$member,$money,$remark){
		$data = [
			'uid'		=> $uid,
			'r_time' 	=> $time, 
            'r_debtee'  => $debtee,
            'r_debtor'  => $member,
			'r_money' 	=> $money, 
			'r_remark' 	=> $remark,
		];
		$result = Db::name('debtor')->insert($data);
		return $result;
	}
	
	public function select_debtor($uid){//获取用户预算记录
		$data = Db::table('debtor')
				->where('uid',$uid)
				->field('rid,r_time,r_debtee,r_debtor,r_money,r_remark')
				->order('rid desc')
				->select();
		return $data;
	}

	public function delete_debtor($uid,$del){//删除记录
		$result = Db::table('debtor')->where('uid',$uid)->delete($del);
		return $result;
	}
	
}
