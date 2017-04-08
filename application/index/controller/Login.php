<?php
namespace app\index\controller;
use app\index\model\UserModel;
use think\View;
use think\Controller;
use think\Session;
use think\Request;
use think\Cache;
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
				$userArr = $user->get_user($uid);
				if($userArr){
					$username = $userArr['username'] ? $userArr['username'] : '';
					$nikename = $userArr['nikename'] ? $userArr['nikename'] : '';
					$icon = $userArr['icon'] ? $userArr['icon'] : '';
				}
				/*登陆成功后User签字*/
				$auth = array(
					'uid'       => $uid,
					'username'  => $username,
					'nikename'  => $nikename,
					'time'      => think_now_time(),
					'icon'		=> $icon
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
			$uid = $user->uid_by_email($email);
			if($uid >= 0){
				$hash = randchar(30);
				Cache::set('uid',$uid);
				Cache::set('hash',$hash);
				if($this->sendmail($email,$hash)){
					$jsonData = array('success'=>true,'data'=>'邮件发送成功。请登录您的邮箱查看。');
					return json($jsonData);
				}else{
					$jsonData = array('success'=>false,'errorMessage'=>'邮件发送失败','data'=>'');
					return json($jsonData);
				}
			}else{
				$jsonData = array('success'=>false,'errorMessage'=>'该邮箱未注册','data'=>'');
				return json($jsonData);
			}
		}
		$this->assign('error','');
		return view('index');
	}
	
	public function reset_password(){
		if(request()->isGet()){
			$hash = input('get.hash');
			if(!Cache::get('uid') || !Cache::get('hash')){
				Cache::rm('uid'); 
				Cache::rm('hash'); 
				return view('timeout');
			}else if($hash == Cache::get('hash')){ 
				return view('reset_password');
			}
		}
	}
	
	public function sendmail($to,$hash){
		$subject = 'mk.manager.com - 密码找回';
		$message = "尊敬的".$to."您好："."\r\n\t"."欢迎使用找回密码功能。"."\r\n\t"."请您复制此链接到浏览器继续下一步操作："."\r\n\t"."http://".$_SERVER['HTTP_HOST']."/index/Login/reset_password.html?hash=".$hash."\r\n\t"."链接只可访问一次，10分钟内有效。"."\r\n\t"."如果您并未发过此请求，则可能是因为其他用户在尝试重设密码时误输入了您的电子邮件地址而使您收到这封邮件，那么您可以放心的忽略此邮件，无需进一步采取任何操作。"."\r\n"."此致"."\r\n\t".date("Y年m月d日");
		$headers = 'From: 钱管家<no-reply@mk.com>' ; 
		$send=mail($to, $subject, $message, $headers);
		if($send){
			return $send;
		}else{
			return $send;
		}
    }

	public function reset_pwd(){ // 重置密码
		if(request()->isPost()){     
            $username = input('post.username');
            $npwd = input('post.npwd');
            $user = new UserModel;
            $result = $user->uid_by_username($username);
            if($result >= 0 ){
                $result = $user->reset_pwd($username,$npwd);
                if($result >= 0){
                    $jsonData = array('success'=>true,'data'=>"");
                }else{
                    $jsonData = array('success'=>false,'errorMassage'=>"重置失败");
                }
                return json($jsonData);
            }else{
                $jsonData = array('success'=>false,'errorMassage'=>"该用户不存在");
                return json($jsonData);
            }
        }
	}
	
}
