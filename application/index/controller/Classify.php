<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\ClassifyModel;
use think\Request;

class Classify extends Controller{

    public function _empty($name){
        return redirect('errorpage/index');
    }
	
    public function index(){
        if(is_login() == 0){
            $username = session('user_auth.username');
            $this->assign('username',$username);
           	return redirect('login/index');
        }else{  
            $this->assign('pagetitle','设置 > 分类设置 - F.M');
			$this->fetch('/layout');
            return view('classify');
		}
    }

    public function get_in_type(){
        $uid = session('user_auth.uid');
        $classify = new ClassifyModel;
        $in_type = $classify->select_in_type($uid);
        $inlist = json_decode($in_type['type'], true);
        $jsonData = array('success'=>true,'data'=>$inlist);
        return json($jsonData);
    }

    public function add_in_type(){
        if(request()->isPost()){
            $uid = session('user_auth.uid');
            $intype = input('post.intype');
            $classify = new ClassifyModel;
            $in_type = $classify->select_in_type($uid);
            $inlist = json_decode($in_type['type'], true);
            $key = array_search($intype, $inlist['type']);
            if ($key !== false){
                $jsonData = array('success'=>true,'data'=>'分类已存在');
                return json($jsonData);
            }
            $inlist['type'][] = $intype;
            $arr = json_encode($inlist,JSON_UNESCAPED_UNICODE);
            $result = $classify->update_in_type($uid,$arr);
            if($result>=0){
                $jsonData = array('success'=>true,'data'=>'');
            }else{
                $jsonData = array('success'=>false,'errorMassage'=>'添加失败');
            }
            return json($jsonData);
        }
    }

    public function del_in_type(){
        if(request()->isPost()){
            $uid = session('user_auth.uid');
            $intype = input('post.intype');
            if($intype == '其他收入'){
                $jsonData = array('success'=>true,'data'=>'');
                return json($jsonData);
            }
            $classify = new ClassifyModel;
            $in_type = $classify->select_in_type($uid);
            $inlist = json_decode($in_type['type'], true);
            $key = array_search($intype, $inlist['type']);
            if ($key !== false){
                array_splice($inlist['type'], $key, 1);
                $arr = json_encode($inlist,JSON_UNESCAPED_UNICODE);
                $result = $classify->update_in_type($uid,$arr);
                if($result>=0){
                    $jsonData = array('success'=>true,'data'=>'');
                }else{
                    $jsonData = array('success'=>false,'errorMassage'=>'删除失败');
                }
                return json($jsonData);
            }else{
                $jsonData = array('success'=>false,'errorMassage'=>'分类不存在');
                return json($jsonData);
            }
            
        }
    }

    public function get_out_type(){
        $uid = session('user_auth.uid');
        $classify = new ClassifyModel;
        $out_type = $classify->select_out_type($uid);
        $outlist = json_decode($out_type['type'], true);
        $jsonData = array('success'=>true,'data'=>$outlist);
        return json($jsonData);
    }

    public function add_out_type(){
        if(request()->isPost()){
            $uid = session('user_auth.uid');
            $outtype = input('post.outtype');
            $classify = new ClassifyModel;
            $out_type = $classify->select_out_type($uid);
            $outlist = json_decode($out_type['type'], true);
            $key = array_search($outtype, $outlist['type']);
            if ($key !== false){
                $jsonData = array('success'=>true,'data'=>'分类已存在');
                return json($jsonData);
            }
            $outlist['type'][] = $outtype;
            $arr = json_encode($outlist,JSON_UNESCAPED_UNICODE);
            $result = $classify->update_out_type($uid,$arr);
            if($result>=0){
                $jsonData = array('success'=>true,'data'=>'');
            }else{
                $jsonData = array('success'=>false,'errorMassage'=>'添加失败');
            }
            return json($jsonData);
        }
    }

    public function del_out_type(){
        if(request()->isPost()){
            $uid = session('user_auth.uid');
            $outtype = input('post.outtype');
            if($outtype == '其他款项'){
                $jsonData = array('success'=>true,'data'=>'');
                return json($jsonData);
            }
            $classify = new ClassifyModel;
            $out_type = $classify->select_out_type($uid);
            $outlist = json_decode($out_type['type'], true);
            $key = array_search($outtype, $outlist['type']);
            if ($key !== false){
                array_splice($outlist['type'], $key, 1);
                $arr = json_encode($outlist,JSON_UNESCAPED_UNICODE);
                $result = $classify->update_out_type($uid,$arr);
                if($result>=0){
                    $jsonData = array('success'=>true,'data'=>'');
                }else{
                    $jsonData = array('success'=>false,'errorMassage'=>'删除失败');
                }
                return json($jsonData);
            }else{
                $jsonData = array('success'=>false,'errorMassage'=>'分类不存在');
                return json($jsonData);
            } 
        }
    }

    public function get_member_type(){
        $uid = session('user_auth.uid');
        $classify = new ClassifyModel;
        $member_type = $classify->select_member_type($uid);
        $memberlist = json_decode($member_type['type'], true);
        $jsonData = array('success'=>true,'data'=>$memberlist);
        return json($jsonData);
    }

    public function add_member_type(){
        if(request()->isPost()){
            $uid = session('user_auth.uid');
            $membertype = input('post.membertype');
            $classify = new ClassifyModel;
            $member_type = $classify->select_member_type($uid);
            $memberlist = json_decode($member_type['type'], true);
            $key = array_search($membertype, $memberlist['type']);
            if ($key !== false){
                $jsonData = array('success'=>true,'data'=>'分类已存在');
                return json($jsonData);
            }
            $memberlist['type'][] = $membertype;
            $arr = json_encode($memberlist,JSON_UNESCAPED_UNICODE);
            $result = $classify->update_member_type($uid,$arr);
            if($result>=0){
                $jsonData = array('success'=>true,'data'=>'');
            }else{
                $jsonData = array('success'=>false,'errorMassage'=>'添加失败');
            }
            return json($jsonData);
        }
    }

    public function del_member_type(){
        if(request()->isPost()){
            $uid = session('user_auth.uid');
            $membertype = input('post.membertype');
            if($membertype == '本人'){
                $jsonData = array('success'=>true,'data'=>'');
                return json($jsonData);
            }
            $classify = new ClassifyModel;
            $member_type = $classify->select_member_type($uid);
            $memberlist = json_decode($member_type['type'], true);
            $key = array_search($membertype, $memberlist['type']);
            if ($key !== false){
                array_splice($memberlist['type'], $key, 1);
                $arr = json_encode($memberlist,JSON_UNESCAPED_UNICODE);
                $result = $classify->update_member_type($uid,$arr);
                if($result>=0){
                    $jsonData = array('success'=>true,'data'=>'');
                }else{
                    $jsonData = array('success'=>false,'errorMassage'=>'删除失败');
                }
                return json($jsonData);
            }else{
                $jsonData = array('success'=>false,'errorMassage'=>'分类不存在');
                return json($jsonData);
            } 
        }
    }
}