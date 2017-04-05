<?php

namespace app\index\model;
use think\Model;
use think\Db;
/**
 *Account model
 */
class IncomeModel extends Model{
	
	public function save_income($uid,$type,$account,$money,$member,$time,$remark){
		$data = [
			'uid'		=> $uid,
			'i_type' 	=> $type, 
			'i_account' => $account, 
			'i_money' 	=> $money, 
			'i_member' 	=> $member, 
			'i_time' 	=> $time, 
			'i_remark' 	=> $remark
		];
		$result = Db::name('income')->insert($data);
		return $result;
	}
	
	public function select_income($uid){//获取用户收入记录
		$data = Db::table('income')
				->where('uid',$uid)
				->field('iid,i_type,i_account,i_time,i_money,i_member,i_remark')
				->order('iid desc')
				->select();
		return $data;
	}
	
	public function get_income($uid){//首页获取用户收入
		$week_income = Db::query("SELECT SUM(i_money) as week_income FROM income WHERE uid=".$uid." AND YEARWEEK(date_format(i_time,'%Y-%m-%d')) = YEARWEEK(now());");
		$month_income = Db::query("SELECT SUM(i_money) as month_income FROM income WHERE uid=".$uid." AND date_format(i_time,'%Y-%m')=date_format(now(),'%Y-%m');");
		$year_income = Db::query("SELECT SUM(i_money) as year_income FROM income WHERE uid=".$uid." AND YEAR(i_time)=YEAR(NOW());");
		$data = array_merge($week_income[0],$month_income[0],$year_income[0]);
		return $data;
	}
	
	public function get_inout($uid){//获取近6个月收支
		$in = Db::query("SELECT DATE_FORMAT(i_time,'%Y-%m') AS itime,sum(i_money) AS imoney FROM income 
		WHERE uid=".$uid." AND i_time BETWEEN date_sub(now(),INTERVAL 6 MONTH) AND now() GROUP BY YEAR(i_time) ASC,MONTH(i_time) ASC;");
		$out = Db::query("SELECT DATE_FORMAT(o_time,'%Y-%m') AS otime,sum(o_money) AS omoney FROM outgo 
		WHERE uid=".$uid." AND o_time BETWEEN date_sub(now(),INTERVAL 6 MONTH) AND now() GROUP BY YEAR(o_time) ASC,MONTH(o_time) ASC;");
		$data['in'] = $in;
		$data['out'] = $out;
		return $data;
	}
	
	public function get_in_type($uid){//获取收入类型
		$in_type = Db::table('t_in')->where('uid',$uid)->field('type')->select();
		if(count($in_type)>0){
			return $in_type[0];
		}
	}
	
	public function delete_income($uid,$del){//删除记录
		$result = Db::table('income')->where('uid',$uid)->delete($del);
		return $result;
	}

	public function get_group_type($uid){
		$data = Db::query("SELECT i_type as type,sum(i_money) as money FROM income WHERE uid=".$uid."  GROUP BY i_type;");
		if($data){
			return $data;
		}
	}
	
	public function get_group_type_time($uid,$start,$end){
		$data = Db::query("SELECT i_type as type,sum(i_money) as money FROM income WHERE uid=".$uid." AND i_time BETWEEN \"".$start."\" AND \"".$end."\" GROUP BY i_type;");
		if($data){
			return $data;
		}
	}
}
