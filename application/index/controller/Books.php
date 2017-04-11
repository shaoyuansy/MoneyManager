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

    public function add_book(){
        if(request()->isPost()){
            $uid = session('user_auth.uid');
			$title = input('post.title');
            $type = trim(input('post.type'));
            $money = input('post.money');
            $date = input('post.date');
            $round = input('post.round');
            $delmark = strtotime("now");
            $start = strtotime($date);
            $con_time = $start;
            $data = [];
            if($round == "month"){ //添加两年内 月周期账本
                do{
                    $arr = [
                        'uid'  =>  $uid,
                        'title'  =>  $title,
                        'type'  =>  $type,
                        'money'  =>  $money,
                        'start'  =>  $start,
                        'round'  =>  $round,
                        'delmark'  =>  $delmark
                    ];
                    array_push($data,$arr);
                    $start = strtotime("+1 month",$start);
                }while( $start <= strtotime("+2 year",$con_time) );
            }
            if($round == "quarter"){ //添加两年内 季度周期账本
                do{
                    $arr = [
                        'uid'  =>  $uid,
                        'title'  =>  $title,
                        'type'  =>  $type,
                        'money'  =>  $money,
                        'start'  =>  $start,
                        'round'  =>  $round,
                        'delmark'  =>  $delmark
                    ];
                    array_push($data,$arr);
                    $start = strtotime("+3 month",$start);
                }while( $start <= strtotime("+2 year",$con_time) );
            }
            if($round == "halfyear"){ //添加两年内 半年周期账本
                do{
                    $arr = [
                        'uid'  =>  $uid,
                        'title'  =>  $title,
                        'type'  =>  $type,
                        'money'  =>  $money,
                        'start'  =>  $start,
                        'round'  =>  $round,
                        'delmark'  =>  $delmark
                    ];
                    array_push($data,$arr);
                    $start = strtotime("+6 month",$start);
                }while( $start <= strtotime("+2 year",$con_time) );
            }
            if($round == "year"){ //添加两年内 一年周期账本
                do{
                    $arr = [
                        'uid'  =>  $uid,
                        'title'  =>  $title,
                        'type'  =>  $type,
                        'money'  =>  $money,
                        'start'  =>  $start,
                        'round'  =>  $round,
                        'delmark'  =>  $delmark
                    ];
                    array_push($data,$arr);
                    $start = strtotime("+1 year",$start);
                }while( $start <= strtotime("+2 year",$con_time) );
            }
            $books = new BooksModel;
            $result = $books->add_books($uid,$data);
            if($result>0){
				$jsonData = array('success'=>true,'data'=>'');
				return json($jsonData);
			}else{
				$jsonData = array('success'=>false,'errorMassage'=>'添加失败');
				return json($jsonData);
			}
        }
    }

    public function del_books(){
        if(request()->isPost()){
            $uid = session('user_auth.uid');
            $delmark = input('post.delmark');
            $books = new BooksModel;
            $result = $books->del_books($uid,$delmark);
            if($result>0){
				$jsonData = array('success'=>true,'data'=>'');
				return json($jsonData);
			}else{
				$jsonData = array('success'=>false,'errorMassage'=>'');
				return json($jsonData);
			}
        }
    }

    public function get_events_in(){
        $start = input('get.start');
        $end = input('get.end');
        $uid = session('user_auth.uid');
        $books = new BooksModel;
        $data = $books->get_in($uid,$start,$end);
        if(count($data)>0){
            foreach($data as &$in){
                $in['start'] = date('Y-m-d',$in['start']);
                $in['end'] = date('Y-m-d',$in['end']);
            }
            return $data;
        }
    }

    public function get_events_out(){
        $start = input('get.start');
        $end = input('get.end');
        $uid = session('user_auth.uid');
        $books = new BooksModel;
        $data = $books->get_out($uid,$start,$end);
        if(count($data)>0){
            foreach($data as &$out){
                $out['start'] = date('Y-m-d',$out['start']);
                $out['end'] = date('Y-m-d',$out['end']);
            }
            return $data;
        }
    }

    public function get_events_er(){
        $start = input('get.start');
        $end = input('get.end');
        $uid = session('user_auth.uid');
        $books = new BooksModel;
        $data = $books->get_er($uid,$start,$end);
        if(count($data)>0){
            foreach($data as &$er){
                $er['start'] = date('Y-m-d',$er['start']);
                $er['end'] = date('Y-m-d',$er['end']);
            }
            return $data;
        }
    }

    public function get_events_or(){
        $start = input('get.start');
        $end = input('get.end');
        $uid = session('user_auth.uid');
        $books = new BooksModel;
        $data = $books->get_or($uid,$start,$end);
        if(count($data)>0){
            foreach($data as &$or){
                $or['start'] = date('Y-m-d',$or['start']);
                $or['end'] = date('Y-m-d',$or['end']);
            }
            return $data;
        }
    }

}