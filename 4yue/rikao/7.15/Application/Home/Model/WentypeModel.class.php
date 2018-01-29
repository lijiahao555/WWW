<?php
namespace Home\Model;
use Think\Model;
class WentypeModel extends Model {    
	protected $tableName = 'wentype'; 
	/**
	 * [select description] 查询分类表所有数据
	 * @return [type] [description] 返回数据
	 */
	public function select(){
		return M($this->tableName)->select();
	}

	
}