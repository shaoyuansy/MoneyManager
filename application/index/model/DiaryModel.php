<?php

namespace app\index\model;
use think\Model;
use think\Db;

class DiaryModel extends Model{

	public function get_count($uid){
		$month_count = Db::query("SELECT count(id) as month_count FROM diary WHERE uid=".$uid." AND date_format(date,'%Y-%m')=date_format(now(),'%Y-%m');");
		$all_count = Db::query("SELECT count(id) as all_count FROM diary WHERE uid=".$uid.";");
		$data = array_merge($month_count[0],$all_count[0]);
		return $data;
	}

	public function select_list($uid){//获取日记列表
		$list = Db::name('diary')->where('uid',$uid)->paginate(10);
		return $list;
	}

	public function add($uid,$title,$content,$date){//存入日记
		$data = [
			'uid'		=> $uid,
			'title' 	=> $title, 
			'date' 		=> $date, 
			'content' 	=> $content
		];
		$result = Db::name('diary')->insert($data);
		return $result;
	}

	public function alter($uid,$title,$content,$date,$id){//更新日记
		$result = Db::table('diary')->where('uid', $uid)->where('id', $id)->update(['title' => $title,'content' => $content]);
		return $result;
	}

	public function del($uid,$id){
		$result = Db::table('diary')->where('uid',$uid)->delete($id);
		return $result;
	}
	public function select_diary($uid,$id){
		$data = Db::table('diary')->where('uid',$uid)->where('id',$id)->select();
		return $data[0];
	}
}
