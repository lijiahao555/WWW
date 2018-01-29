<?php
class Category_model extends Common_model {
	public $table_name='category';
	/*搜索所有的信息*/
	public function select(){
		return $this->selectAll();
	}
	/*添加数据*/
    public function add($data){
		return $this->addOne($data);
	}
	/**
	 * 删除数据
	 */
	public function del($id){
		return $this->delOne($id);
	}
}
