<?php

namespace app\index\model;
use think\Model;
use think\Db;
/**
 *BooksModel
 */
class BooksModel extends Model{
	public function get_in($uid,$start,$end){
		$data = Db::table('books')->where('uid', $uid)->where('type', 'in')->where('start','between',[$start,$end])->select();
		return $data;
	}

	public function get_out($uid,$start,$end){
		$data = Db::table('books')->where('uid', $uid)->where('type', 'out')->where('start','between',[$start,$end])->select();
		return $data;
	}
	
	public function get_er($uid,$start,$end){
		$data = Db::table('books')->where('uid', $uid)->where('type', 'er')->where('start','between',[$start,$end])->select();
		return $data;
	}

	public function get_or($uid,$start,$end){
		$data = Db::table('books')->where('uid', $uid)->where('type', 'or')->where('start','between',[$start,$end])->select();
		return $data;
	}
	
	public function add_books($uid,$data){
		$result = Db::name('books')->insertAll($data);
		return $result;
	}

	public function del_books($uid,$delmark){
		$result = Db::name('books')->where('delmark',$delmark)->delete();
		return $result;
	}
}
