<?php
namespace Home\Model;
use Think\Model;
class wenModel extends Model {    
	protected $tableName = 'wen'; 
	/**
	 * [addOne]  添加数据到数据库
	 * @param [type] $data 数据
	 */
	public function addOne($data){
		$data['time']=date('Y-m-d H:i:s');
		return M($this->tableName)->add($data);
	}
	/**
	 * 搜索要展示的数据
	 */
	public function select($where=1){
		return M($this->tableName)->join("wentype on wen.t_id=wentype.type_id")->where($where)->select();
	}
	/**
	 * [delOne description]  删除数据
	 * @param  [type] $id 要删除的ID
	 * @return [type]     删除成功的影响数据
	 */
	public function delOne($id){
		return M($this->tableName)->delete($id);
	}
	/**
	 * [findOne description] 根据id查询出要修改的一条数据
	 * @param  [type] $id [description]   要修改的id
	 * @return [type]     [description]	  查询出来的数据
	 */
	public function findOne($id){
		return M($this->tableName)->where("id=$id")->find();
	}


	public function upOne($post){
		
		$data['name']=$post['name'];
		$data['content']=$post['content'];
		$data['auther']=$post['auther'];
		$data['t_id']=$post['t_id'];
		$data['time']=date('Y-m-d H:i:s');
		$id=$post['id'];
		return M($this->tableName)->where("id=$id")->save($data);
	}

	public function sousuo($sou){
		return M($this->tableName)->join("wentype on wen.t_id=wentype.type_id")->where("name like '%$sou%'")->select();
	}

}