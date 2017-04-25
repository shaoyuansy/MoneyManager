<?php
namespace app\index\controller;
use app\index\model\UserModel;
use think\Controller;
use think\Request;
use think\Db;

class Setting extends Controller
{
    public function _empty($name){
        return redirect('errorpage/index');
    }

    public function personal(){	
		if(is_login() == 0){
            $username = session('user_auth.username');
            $this->assign('username',$username);
           	return redirect('login/index');
        }else{
            $this->assign('pagetitle','设置 > 个人中心 - F.M');
			$this->fetch('/layout');
			return view('personal');
		}
    }

    public function classify(){	
		if(is_login() == 0){
            $username = session('user_auth.username');
            $this->assign('username',$username);
           	return redirect('login/index');
        }else{
            $this->assign('pagetitle','设置 > 分类管理 - F.M');
			$this->fetch('/layout');
			return view('classify');
		}
    }
    
    public function get_user(){
        $uid = session('user_auth.uid');
        $user = new UserModel;
		$userArr = $user->get_user($uid);
		$data = [
            'nikename'  => $userArr['nikename'],
			'icon'      => $userArr['icon'],
            'sex'       => $userArr['sex'],
            'phone'     => $userArr['phone'],
            'email'     => $userArr['email'],
            'last_time' => $userArr['last_login_time'],
            'realname'  => $userArr['realname'],
            'safe_q_1'  => $userArr['safe_q_1'],
            'safe_q_2'  => $userArr['safe_q_2'],
            'safe_q_3'  => $userArr['safe_q_3']
		];
		if(!empty($data)){
			$jsonData = array('success'=>true,'data'=>$data);
			return json($jsonData);
		}
	}

    public function set_user(){ // 设置个人资料
        if(request()->isPost()){     
            $uid = session('user_auth.uid');  
            $nikename = input('post.nikename');
            $realname = input('post.realname');
            $sex = input('post.sex');
            $phone = input('post.phone');
            $user = new UserModel;
		    $result = $user->update_user($uid,$nikename,$realname,$sex,$phone);
            if($result>=0){
                $jsonData = array('success'=>true,'data'=>"");
            }else{
                $jsonData = array('success'=>false,'errorMassage'=>"更新失败");
            }
            return json($jsonData);
        }
    }

    public function set_safe(){ // 设置安全问题
        if(request()->isPost()){     
            $uid = session('user_auth.uid');  
            $safe_q_1 = input('post.safe_q_1');
            $safe_q_2 = input('post.safe_q_2');
            $safe_q_3 = input('post.safe_q_3');
            $safe_a_1 = input('post.safe_a_1');
            $safe_a_2 = input('post.safe_a_2');
            $safe_a_3 = input('post.safe_a_3');
            $user = new UserModel;
		    $result = $user->update_question($uid,$safe_q_1,$safe_q_2,$safe_q_3,$safe_a_1,$safe_a_2,$safe_a_3);
            if($result>=0){
                $jsonData = array('success'=>true,'data'=>"");
            }else{
                $jsonData = array('success'=>false,'errorMassage'=>"安全问题设置失败");
            }
            return json($jsonData);
        }
    }

    public function set_safe_email(){ // 修改安全邮箱
        if(request()->isPost()){     
            $uid = session('user_auth.uid');  
            $email = input('post.email');
            $user = new UserModel;
            $data = $user->find_email($email);
            if($data === null ){
                $result = $user->set_email($uid,$email);
                if($result>=0){
                    $jsonData = array('success'=>true,'data'=>"");
                }else{
                    $jsonData = array('success'=>false,'errorMassage'=>"安全邮箱设置失败");
                }
                return json($jsonData);
            }else{
                $jsonData = array('success'=>false,'errorMassage'=>"该邮箱已被使用");
                return json($jsonData);
            }
        }
    }

    public function change_password(){ // 修改密码
        if(request()->isPost()){     
            $uid = session('user_auth.uid');  
            $opwd = input('post.opwd');
            $npwd = input('post.npwd');
            $user = new UserModel;
            $result = $user->check_pwd($uid,$opwd);
            if($result > 0 ){
                $result = $user->change_pwd($uid,$npwd);
                if($result>0){
                    $jsonData = array('success'=>true,'data'=>"");
                }else{
                    $jsonData = array('success'=>false,'errorMassage'=>"与原密码相同");
                }
                return json($jsonData);
            }else{
                $jsonData = array('success'=>false,'errorMassage'=>"原密码不正确");
                return json($jsonData);
            }
        }
    }
}