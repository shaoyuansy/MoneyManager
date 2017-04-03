<?php

namespace app\index\model;
use think\Model;
use think\Db;
/**
 *Account model
 */
class BudgetModel extends Model{

	public function save_budget($uid,$time,$term,$money,$remark){
		$data = [
			'uid'		=> $uid,
			'b_time' 	=> $time, 
            'b_term' 	=> $term, 
			'b_money' 	=> $money, 
			'b_remark' 	=> $remark,
		];
		$result = Db::name('budget')->insert($data);
		return $result;
	}
	
	public function select_budget($uid){//获取用户预算记录
		$data = Db::table('budget')
				->where('uid',$uid)
				->field('bid,b_time,b_term,b_money,b_remark')
				->order('bid desc')
				->select();
		return $data;
	}

	public function delete_budget($uid,$del){//删除记录
		$result = Db::table('budget')->where('uid',$uid)->delete($del);
		return $result;
	}
	
}
