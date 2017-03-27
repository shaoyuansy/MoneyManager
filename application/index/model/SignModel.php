<?php

namespace app\index\model;
use think\Model;
use think\Db;
/**
 *Account model
 */
class SignModel extends Model{
	
	public function get_sign($uid){//获取用户签到信息
		$data = db('sign')->where("uid","=",$uid)->limit(0)->find();
		if($data){
			return $data;
		}
	}

	public function sign_in($uid){
		$data= [
			'uid'	=>	$uid,
			'count'	=>	1,
			'sign_time'	=> think_now_time()
		];
		$res = db("sign")->insert($data);
		if($res){
			return $res;
		}
	}
	
	public function sign_update($uid){
		$res1 = db("sign")->where('uid',$uid)->update(['sign_time' => think_now_time()]);
		$res2 = db("sign")->where('uid',$uid)->setInc('count');
		if($res1 && $res2){
			return $this->get_sign($uid);
		}
	}
	
	public function sign_count($uid){
		$res = db("sign")->where('uid',$uid)->update(['sign_time' => think_now_time(),'count' => 1]);
		if($res){
			return $res;
		}
	}
	
}
