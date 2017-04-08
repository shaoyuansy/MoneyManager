<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\DiaryModel;
use think\Request;
use think\Db;

class Diary extends Controller
{
    public function _empty($name){
        return redirect('errorpage/index');
    }

    public function index(){
        if(is_login() == 0){
            $username = session('user_auth.username');
            $this->assign('username',$username);
           	return redirect('login/index');
        }else{
            $uid = session('user_auth.uid');
            $diary = new DiaryModel;
            $count = $diary->get_count($uid);
            $list = $diary->select_list($uid);
            $page = $list->render();
            $this->assign('list', $list);
            $this->assign('page', $page);
            $this->assign('month_count', $count['month_count']);
            $this->assign('all_count', $count['all_count']);
            $this->assign('pagetitle','理财日记 - F.M');
			$this->fetch('/layout');
            return $this->fetch();
        }
    }
    public function save_diary(){
        $uid = session('user_auth.uid');
        $title = input('post.title');
        $content = input('post.content');
        $date = input('post.date');
        $id = input('post.id');
        if(!empty($uid) && !empty($title) && !empty($content) && !empty($date)){
            $diary = new DiaryModel;
            if($id==""){
                $result = $diary->add($uid,$title,$content,$date);
            }else{
                $result = $diary->alter($uid,$title,$content,$date,$id);
            }
            if($result>0){
				$jsonData = array('success'=>true,'data'=>'');
			}else{
				$jsonData = array('success'=>false,'errorMassage'=>'日记存入失败');
			}
			return json($jsonData);
        }
    }
    public function get_diary_centont(){
        $uid = session('user_auth.uid');
        $id = input('post.id');
        $diary = new DiaryModel;
        $data = $diary->select_diary($uid,$id);
        if($data){
            $jsonData = array('success'=>true,'data'=>$data);
            return json($jsonData);
        }
    }
    public function del_diary(){
        $uid = session('user_auth.uid');
        $id = input('post.id');
        $diary = new DiaryModel;
        $result = $diary->del($uid,$id);
        if($result>0){
            $jsonData = array('success'=>true,'data'=>"");
            return json($jsonData);
        }else{
            $jsonData = array('success'=>false,'errorMassage'=>'删除失败');
            return json($jsonData);
        }
    }
}