<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\BooksModel;
use think\Request;

class Books extends Controller{

    public function _empty($name){
        return redirect('errorpage/index');
    }

    public function index(){
        if(is_login() == 0){
            $username = session('user_auth.username');
            $this->assign('username',$username);
           	return redirect('login/index');
        }else{
            $this->assign('pagetitle','周期账本 - F.M');
			$this->fetch('/layout');
            return view('index');
        }
    }

    public function get_events_in(){
        $start = input('get.start');
        $end = input('get.end');
        $uid = session('user_auth.uid');
        $books = new BooksModel;
        $data = $books->get_in($uid,$start,$end);
        foreach($data as &$in){
            $in['start'] = date('Y-m-d H:m:i',$in['start']);
            $in['end'] = date('Y-m-d H:m:i',$in['end']);
        }
        return $data;
    }

    public function get_events_out(){

    }

}