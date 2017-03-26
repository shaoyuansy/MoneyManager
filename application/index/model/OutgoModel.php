<?php

namespace app\index\model;
use think\Model;
use think\Db;
/**
 *Account model
 */
class OutgoModel extends Model{
	
	public function get_outgo($uid){//获取用户支出
		$week_outgo = Db::query("SELECT SUM(o_money) as week_outgo FROM outgo WHERE uid=".$uid." AND YEARWEEK(date_format(o_time,'%Y-%m-%d')) = YEARWEEK(now());");
		$month_outgo = Db::query("SELECT SUM(o_money) as month_outgo FROM outgo WHERE uid=".$uid." AND date_format(o_time,'%Y-%m')=date_format(now(),'%Y-%m');");
		$year_outgo = Db::query("SELECT SUM(o_money) as year_outgo FROM outgo WHERE uid=".$uid." AND YEAR(o_time)=YEAR(NOW());");
		$data = array_merge($week_outgo[0],$month_outgo[0],$year_outgo[0]);
		return $data;
	}
	
}
