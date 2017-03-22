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
	
	public function loginByEmail($email,$password){
		$user = db('user')->where('email',$email)->find();
		if(is_array($user)){
			if(md5(crypt($password,substr($password,0,2))) === $user['u_pass']){
		        $this->updateLogin($user['uid']);
		        return $user['u_id']; 
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
	
	public function regist($username,$password,$phone='',$email){
		$data = [
			'username'=>$username,
			'password'=>md5(crypt($password,substr($password,0,2))),
			'email'=>$email,
			'phone'=>$phone,
			'registered_time'=>think_now_time()
		];
		$uid = db('user')->insertGetId($data);
		if($uid = 0){
			return $uid;
		}else{
			return -1;
		}
	}
	
	public function get_user_hash($uid){//获取用户密码
		$data = db('user')->where('uid',$uid)->field('password')->select();
		return $data[0]['password'];
	}
	
	public function get_user_name($uid){//获取用户登陆名
        $data = db('user')->where('uid',$uid)->field('username')->select();
        return $data[0]['username'];
    }
}
