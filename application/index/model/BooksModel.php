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
	
}
