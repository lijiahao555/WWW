<?php

namespace app\index\model;

use think\Model;
use think\Db;


class AuthModel extends Model
{
	protected $table = 'Auth';


	// 添加
	public function insertData($data = [])
	{
		return Db::table($this->table)->insertGetId($data);
	}

	//搜所
	function selectData()
	{
		return Db::table($this->table)->select();
	}

	//删除
	function deleteData($id)
	{
		$id = $this->findData($id);
		return Db::table($this->table)->where('id','=',$id['id'])->delete();
	}

	//查询单条
	function findData($id)
	{
		return Db::table($this->table)->where('open_id','=',$id)->find();
	}

	//修改
	function updateData($data,$id)
	{
		$id = $this->findData($id);
		return Db::table($this->table)->where('id','=',$id['id'])->update($data);
	}


}