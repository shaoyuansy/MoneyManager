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
			$phone= input('post.phone');
			$email = input('post.email');
			$captcha = input('post.code');//验证code
			if(!captcha_check($captcha)){
				//验证失败
				$infor['username'] = $username;
				$infor['password'] = '';
				$infor['email'] = $email;
				$infor['phone'] = $phone;
				$infor['error'] = '验证码错误';
				$this->assign('infor',$infor);
				return view('index');
			}else{
				//验证成功
				$user = new UserModel;
				if(isset($username) && isset($password) && isset($email) && $username!='' && $password!='' && $email!=''){
					if($user -> uid_by_username($username) >= 0 ){
						$infor['username'] = $username;
						$infor['password'] = '';
						$infor['email'] = $email;
						$infor['phone'] = $phone;
						$infor['error'] = '该用户名已存在！';
						$this->assign('infor',$infor);
						return view('index');
					}else if($user -> uid_by_email($email) >= 0){
						$infor['username'] = $username;
						$infor['password'] = '';
						$infor['email'] = $email;
						$infor['phone'] = $phone;
						$infor['error'] = '该邮箱已被注册！';
						$this->assign('infor',$infor);
						return view('index');
					}else{
						$uid = $user->regist($username,$password,$phone,$email);
						if($uid >= 0){
							return view('registok');
						}else{
							$infor['username'] = $username;
							$infor['password'] = '';
							$infor['email'] = $email;
							$infor['phone'] = $phone;
							$infor['error'] = '用户注册失败！';
							$this->assign('infor',$infor);
							return view('index');
						}
					}
				}else{
					$infor['username'] = $username;
					$infor['password'] = '';
					$infor['email'] = $email;
					$infor['phone'] = $phone;
					$infor['error'] = '用户名或密码填写不完整';
					$this->assign('infor',$infor);
					return view('index');
				}
			}
		}else{
			$infor['username'] = '';
			$infor['password'] = '';
			$infor['email'] = '';
			$infor['phone'] = '';
			$infor['error'] = '';
			$this->assign('infor',$infor);
			return view('index');
		}
    }
	
	public function _empty($name)
    {
        //把所有空的操作解析到showfan方法
        return $this->showFun($name);
    }

    //注意 本身是 protected 方法
    protected function showFun($name)
    {
         return view($name);
    }
}
