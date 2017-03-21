<?php
namespace app\index\controller;
use app\index\model\UserModel;
use think\Controller;
use think\Request;
use think\Session;

class Register extends Controller
{
    public function index(){
		if(request()->isPost()){
			/*实例化User模型，获取注册数据*/
			$username = input('post.username');
			$password = input('post.password');
			$nickname = input('post.nickname');
			$email = input('post.email');
			$captcha = input('post.code');//验证code
			if(!captcha_check($captcha)){
				//验证失败
				$infor['username'] = $username;
				$infor['password'] = '';
				$infor['email'] = $email;
				$infor['error'] = '验证码错误';
				$this->assign('infor',$infor);
				return view('index');
			}else{
				//验证成功
				$user = new UserModel;
				if(isset($username) && isset($password) && isset($email) && $username!='' && $password!='' && $email!=''){
					$uid = $user->regist($username,$password,$nickname,$email);
					if($uid >= 0){
						$this->redirect('register');
					}else{
						$infor['username'] = $username;
						$infor['password'] = '';
						$infor['email'] = $email;
						$infor['error'] = '用户注册失败！';
						$this->assign('infor',$infor);
						return view('index');
					}
				}else{
					$infor['username'] = $username;
					$infor['password'] = '';
					$infor['email'] = $email;
					$infor['error'] = '用户名或密码填写不完整';
					$this->assign('infor',$infor);
					return view('index');
				}
			}
		}else{
			$infor['username'] = '';
			$infor['password'] = '';
			$infor['email'] = '';
			$infor['error'] = '';
			$this->assign('infor',$infor);
			return view('index');
		}
    }

}
