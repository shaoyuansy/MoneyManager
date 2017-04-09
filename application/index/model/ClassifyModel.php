<?php

namespace app\index\model;
use think\Model;
use think\Db;

class DiaryModel extends Model{

	public function get_t_in_type($uid){
		$t_in_type = Db::query("SELECT type FROM t_in WHERE uid=".$uid.";");
		return $data;
	}

}