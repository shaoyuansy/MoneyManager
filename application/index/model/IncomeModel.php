<?php

namespace app\index\model;
use think\Model;
use think\Db;
/**
 *Account model
 */
class IncomeModel extends Model{
	
	public function get_income($uid){//获取用户收入
		$week_income = Db::query("SELECT SUM(i_money) as week_income FROM income WHERE uid=".$uid." AND YEARWEEK(date_format(i_time,'%Y-%m-%d')) = YEARWEEK(now());");
		$month_income = Db::query("SELECT SUM(i_money) as month_income FROM income WHERE uid=".$uid." AND date_format(i_time,'%Y-%m')=date_format(now(),'%Y-%m');");
		$year_income = Db::query("SELECT SUM(i_money) as year_income FROM income WHERE uid=".$uid." AND YEAR(i_time)=YEAR(NOW());");
		$data = array_merge($week_income[0],$month_income[0],$year_income[0]);
		return $data;
	}
	
}
