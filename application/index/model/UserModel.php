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
		if($uid >= 0){
			return $uid;
		}else{
			return -1;
		}
	}
	
	public function save_icon($uid,$path){
		$result = db('user')->where('uid',$uid)->update(['icon' =>$path]);
		if($result>0){
			return $result;
		}else{
			return -1;
		}
	}

	public function uid_by_username($username){
		$data = db('user')->where('username',$username)->field('uid')->select();
		if($data){
			return $data[0]['uid'];
		}else{
			return -1;
		}
	}
	
	public function uid_by_email($email){//根据邮箱获取用户id
		$data = db('user')->where('email',$email)->field('uid')->select();
		if($data){
			return $data[0]['uid'];
		}else{
			return -1;
		}
		
	}
	
	public function get_user_hash($uid){//获取用户密码
		$data = db('user')->where('uid',$uid)->field('password')->select();
		return $data[0]['password'];
	}
	
	public function get_user($uid){//获取用户登陆名
        $data = db('user')->where('uid',$uid)->select();
		if(count($data)>0){
			return $data[0];
		}else{
			return -1;
		}
        
    }
	
	public function get_registed_time($uid){
		$data = db('user')->where('uid',$uid)->field('registered_time')->select();
        return $data[0]['registered_time'];
	}

	//修改个人资料
	public function update_user($uid,$nikename,$realname,$sex,$phone){
		$result = db('user')
				->where('uid',$uid)
				->update([
					'nikename' =>$nikename,
					'realname' =>$realname,
					'sex' =>$sex,
					'phone' =>$phone
				]);
		return $result;
	}

	//设置安全问题
	public function update_question($uid,$safe_q_1,$safe_q_2,$safe_q_3,$safe_a_1,$safe_a_2,$safe_a_3){
		$result = db('user')
				->where('uid',$uid)
				->update([
					'safe_q_1' =>$safe_q_1,
					'safe_q_2' =>$safe_q_2,
					'safe_q_3' =>$safe_q_3,
					'safe_a_1' =>$safe_a_1,
					'safe_a_2' =>$safe_a_2,
					'safe_a_3' =>$safe_a_3
				]);
		return $result;
	}

	public function find_email($email){
		$data = db('user')->where('email',$email)->find();
		return $data;
	}

	public function set_email($uid,$email){
		$result = db('user')
				->where('uid',$uid)
				->update(['email' =>$email]);
		return $result;
	}

	public function check_pwd($uid,$opwd){
		$user = Db::table('user')->where('uid',$uid)->find();
		if(is_array($user)){
			if(md5(crypt($opwd,substr($opwd,0,2))) === $user['password']){
		        return 1;
			}else{
		        return -1;
			}
		}else{
            return -1;
		}
	}

	public function change_pwd($uid,$npwd){ 
		$result = db('user')
				->where('uid',$uid)
				->update(['password' => md5(crypt($npwd,substr($npwd,0,2)))]);
		return $result;
	}

	public function reset_pwd($username,$npwd){ 
		$result = db('user')
				->where('username',$username)
				->update(['password' => md5(crypt($npwd,substr($npwd,0,2)))]);
		return $result;
	}

	public function unlocked($uid,$unlock){
		$user = Db::table('user')->where('uid',$uid)->find();
		if(is_array($user)){
			if(md5(crypt($unlock,substr($unlock,0,2))) === $user['password']){
		        return $user['uid']; 
			}else{
		        return -2;
			}
		}else{
            return -1;
		}
    }
}
