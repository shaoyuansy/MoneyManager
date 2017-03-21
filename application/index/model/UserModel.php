<?php

namespace app\index\model;
use think\Model;
use think\Db;
/**
 *usermodel
 */
class UserModel extends Model{
	public function login($username,$password){
		$user = Db::table('user')->where('username',$username)->find();
		if(is_array($user)){
			if(md5(crypt($password,substr($password,0,2))) === $user['password']){
		        $this->updateLogin($user['uid']);
		        return $user['uid']; 
			}else{
		        return -2;
			}
		}else{
            	return -1;
		}
    }

	protected function updateLogin($uid){
		$last_login_time = think_now_time();
		db('user')
		->where('uid',$uid)
		->update(['last_login_time' =>$last_login_time]);
		db('user')->where('uid',$uid)->setInc('login_count',1);
    }
}
