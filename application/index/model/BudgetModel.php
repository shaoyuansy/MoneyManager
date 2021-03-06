<?php

namespace app\index\model;
use think\Model;
use think\Db;
/**
 *Budget model
 */
class BudgetModel extends Model{

	public function save_budget($uid,$time,$month,$money,$remark){
		$data = [
			'uid'		=> $uid,
			'b_time' 	=> $time, 
            'b_month' 	=> $month, 
			'b_money' 	=> $money, 
			'b_remark' 	=> $remark,
		];
		$result = Db::name('budget')->insert($data);
		return $result;
	}
	
	public function update_budget($id,$uid,$time,$month,$money,$remark){
		$result = Db::table('budget')->where('uid', $uid)->where('bid', $id)
				->update(['b_time' => $time,'b_money' => $money,'b_remark' => $remark]);
		return $result;
	}

	public function select_budget($uid){//获取用户预算记录
		$data = Db::table('budget')
				->where('uid',$uid)
				->field('bid,b_time,b_month,b_money,b_remark')
				->order('bid desc')
				->select();
		return $data;
	}

	public function get_month($uid){
		$data = Db::query("SELECT b_month as month, bid as id FROM budget WHERE uid=".$uid." AND YEAR(b_time)=YEAR(NOW());");
		return $data;
	}

	public function delete_budget($uid,$del){//删除记录
		$result = Db::table('budget')->where('uid',$uid)->delete($del);
		return $result;
	}
	
	public function get_year($uid,$year){ //获取一年的预算
		$data = Db::query("SELECT b_month as month, b_money as money FROM budget WHERE uid=".$uid." AND YEAR(b_time)=".$year.";");
		return $data;
	}

	public function get_month_budget($uid,$month){ //获取某月的预算
		$data = Db::table('budget')
				->where('uid',$uid)->where('b_month',$month)
				->field('b_money')
				->select();
		if(count($data)>0){
			return $data[0];
		}else{
			return 0;
		}
		
	}
}
