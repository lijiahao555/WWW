<?php
namespace Admin\Model;
use Think\Model;
class labelModel extends Model {
    protected $tableName = 'label'; 
    /**
     * 添加一条标签
     * @param [type] $data 添加数据
     */
    function addOne($data){
    	return M($this->tableName)->add($data);
    }
    /**
     * 删除一条标签
     * @param  [type] $id int
     * @return [type]     int
     */
    function delOne($id){
    	return M($this->tableName)->where("label_id=".$id)->delete();
    }
    /**
     * 查要修改的标签
     * @param  [type] $id int
     * @return [type]     int
     */
    function find($id){
    	return M($this->tableName)->where("label_id=".$id)->find();
    }
    /**
     * 修改一条标签
     * @param  [type] $id int
     * @return [type]     int
     */
    function upOne($data){
    	return M($this->tableName)->where("label_id=".$data['id'])->save($data);
    }

}