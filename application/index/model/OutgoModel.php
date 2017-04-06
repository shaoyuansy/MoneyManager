<?php

namespace app\index\model;
use think\Model;
use think\Db;
/**
 *Account model
 */
class OutgoModel extends Model{

	public function save_outgo($uid,$type,$account,$money,$member,$time,$remark){
		$data = [
			'uid'		=> $uid,
			'o_type' 	=> $type, 
			'o_account' => $account, 
			'o_money' 	=> $money, 
			'o_member' 	=> $member, 
			'o_time' 	=> $time, 
			'o_remark' 	=> $remark,
		];
		$result = Db::name('outgo')->insert($data);
		return $result;
	}
	
	public function select_outgo($uid){//获取用户支出记录
		$data = Db::table('outgo')
				->where('uid',$uid)
				->field('oid,o_type,o_account,o_time,o_money,o_member,o_remark')
				->order('oid desc')
				->select();
		return $data;
	}

	public function get_outgo($uid){//首页获取用户支出
		$week_outgo = Db::query("SELECT SUM(o_money) as week_outgo FROM outgo WHERE uid=".$uid." AND YEARWEEK(date_format(o_time,'%Y-%m-%d')) = YEARWEEK(now());");
		$month_outgo = Db::query("SELECT SUM(o_money) as month_outgo FROM outgo WHERE uid=".$uid." AND date_format(o_time,'%Y-%m')=date_format(now(),'%Y-%m');");
		$year_outgo = Db::query("SELECT SUM(o_money) as year_outgo FROM outgo WHERE uid=".$uid." AND YEAR(o_time)=YEAR(NOW());");
		$data = array_merge($week_outgo[0],$month_outgo[0],$year_outgo[0]);
		return $data;
	}

	public function get_year_out($uid,$year){//获取一年的支出之和
		$year_outgo = Db::query("SELECT SUM(o_money) as year_outgo FROM outgo WHERE uid=".$uid." AND YEAR(o_time)=".$year.";");
		if(count($year_outgo)>0){
			return $year_outgo[0];
		}
	}
		
	public function get_out_type($uid){//获取支出类型
		$out_type = Db::table('t_out')->where('uid',$uid)->field('type')->select();
		if(count($out_type)>0){
			return $out_type[0];
		}
	}

	public function delete_outgo($uid,$del){//删除记录
		$result = Db::table('outgo')->where('uid',$uid)->delete($del);
		return $result;
	}

	public function get_group_type($uid){//根据支出分类分组查询(用于日常收支表)
		$data = Db::query("SELECT o_type as type,sum(o_money) as money FROM outgo WHERE uid=".$uid." GROUP BY o_type;");
		if($data){
			return $data;
		}
	}
	
	public function get_group_type_time($uid,$start,$end){//根据支出分类 时间段 分组查询(用于日常收支表)
		$data = Db::query("SELECT o_type as type,sum(o_money) as money FROM outgo WHERE uid=".$uid." AND o_time BETWEEN \"".$start."\" AND \"".$end."\" GROUP BY o_type;");
		if($data){
			return $data;
		}
	}

	public function get_year_group_member($uid,$year){ //获取一年的支出按照成员计算之和
		$data = Db::query("SELECT SUM(o_money) as outgo ,o_member as member FROM outgo WHERE uid=".$uid." AND YEAR(o_time)=".$year." GROUP BY o_member;");
		return $data;
	}

	public function get_year_group_month($uid,$year){ //获取一年内所有支出 按照月份求和
		$data = Db::query("SELECT SUM(o_money) as outgo ,MONTH(o_time) as month FROM outgo WHERE uid=".$uid." AND YEAR(o_time)=".$year." GROUP BY MONTH(o_time) ORDER BY MONTH(o_time) ASC;");
		return $data;
	}

	public function get_month_outgo($uid,$month){
		$data = Db::query("SELECT SUM(o_money) as outgo FROM outgo WHERE uid=".$uid." AND MONTH(o_time)=".$month.";");
		if(count($data)>0){
			return $data[0];
		}else{
			return 0;
		}
	}
}
