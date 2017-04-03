<?php

namespace app\index\model;
use think\Model;
use think\Db;
/**
 *usermodel
 */
class MemberModel extends Model{
	public function get_member($uid){//获取成员
		$in_type = Db::table('t_member')->where('uid',$uid)->field('type')->select();
		if(count($in_type)>0){
			return $in_type[0];
		}
	}
}
