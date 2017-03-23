<?php
namespace app\index\controller;
use app\index\model\UserModel;
use think\View;
use think\Controller;
use think\Session;
use think\Request;
class Login extends Controller
{
    public function index(){
		if(request()->isPost()){
			/*实例化User模型，验证登陆*/
			$username = input('post.username');
			$password = input('post.password');
			$user = new UserModel;
			$uid = $user->loginByEmail($username,$password);
			if($uid < 0){
				$uid = $user->login($username,$password);
			}
			if($uid > 0){
				$hash_pass = $user->get_user_hash($uid);
				$username = $user->get_user_name($uid);
				/*登陆成功后User签字*/
				$auth = array(
				'uid'       => $uid,
				'username'  => $username,
				'time'      => think_now_time()
				);
				session('user_auth',$auth);
				session('user_auth_sign',data_auth_sign($auth));
				if($uid >= 0) {
					$this->redirect('home/index');
				}
			}else if($uid < 0){
				switch($uid){
		           		case -1: $error = '用户不存在或被禁用！'; break;
		           		case -2: $error = '密码错误！'; break;
		           		default: $error = '未知错误！'; break;
		       		}	
				$this->assign('error',$error);
				return view('index');
			}
		}else{
			$this->assign('error','');
			return view('index');
		}
	}
    
    public function logout(){
        if(is_login()){
            session('user_auth',null);
            session('user_auth_sign',null);
            session_destroy();
            return redirect('login/index');
	}
        return redirect('login/index');
    }

	public function forgetpwd(){
		$user = new UserModel;
		if(request()->isPost()){
			$email = input('post.email');
			if(empty($email)){
				$jsonData = array('success'=>false,'errorMessage'=>'邮箱不能为空','data'=>'');
				return json($jsonData);
			}
			if(captcha_check($captcha)){
				$uid = $user->chk_user_email($email);
				if($uid >= 0){
					$hash = randchar(30);
					Cache::set('uid',$uid);
					Cache::set('hash',$hash);
					if($this->sendmail($email,$hash)){
						$jsonData = array('status'=>'success','msg'=>'邮件发送成功，请查收','data'=>true);
						return json($jsonData);
					}else{
						$jsonData = array('status'=>'error','errorCode'=>'6001','msg'=>'system error','data'=>false);
						return json($jsonData);
					}
				}else{
					$jsonData = array('status'=>'error','errorCode'=>'2001','msg'=>'该邮箱未注册','data'=>false);
					return json($jsonData);
				}
			}else{
				//验证失败
				$jsonData = array('status'=>'error','errorCode'=>'3001','msg'=>'验证码错误','data'=>false);
				return json($jsonData);
			}
		}
		$this->assign('error','');
		return view('index');
	}
}
