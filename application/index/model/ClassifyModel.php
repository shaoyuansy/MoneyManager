<?php

namespace app\index\model;
use think\Model;
use think\Db;

class ClassifyModel extends Model{

	public function select_in_type($uid){
		$data = Db::table('t_in')->where('uid',$uid)->field('type')->select();
		return $data[0];
	}

	public function select_out_type($uid){
		$data = Db::table('t_out')->where('uid',$uid)->field('type')->select();
		return $data[0];
	}

	public function select_member_type($uid){
		$data = Db::table('t_member')->where('uid',$uid)->field('type')->select();
		return $data[0];
	}

	public function update_in_type($uid,$arr){//更新收入类型
		$result = Db::table('t_in')->where('uid', $uid)->update(['type' => $arr]);
		return $result;
	}

	public function update_out_type($uid,$arr){//更新支出类型
		$result = Db::table('t_out')->where('uid', $uid)->update(['type' => $arr]);
		return $result;
	}

	public function update_member_type($uid,$arr){//更新支出类型
		$result = Db::table('t_member')->where('uid', $uid)->update(['type' => $arr]);
		return $result;
	}

}