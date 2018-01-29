<?php
namespace Home\Model;
use Think\Model;
class Day7Model extends Model{
	protected $tableName = 'day7'; 
	public function ajax($page,$sou){
		
		$User=M('day7');

		$size=3;
		$start=($page-1)*$size;
		$sql=$User->join("day7_type on day7.t_id=day7_type.type_id")->where("name like '%$sou%'")->limit($start,$size)->select();
		return $sql;
	}
	
	public function del($id){
		$User=M('day7');
		return $sql=$User->delete($id);
	}
	public function up($post){
		$da['name']=$post['name'];
		$da['content']=$post['content'];
		$da['height']=$post['height'];
		$id=$post['id'];
		
		$User=M('day7');
		$sql=$User->where("id='$id'")->save($da);
		return $sql;


	}

}