<?php
namespace Admin\Model;
use Think\Model;
class TypeModel extends Model {
    protected $tableName = 'type';
    /**
     * 添加一条分类信息
     * @param [type] $data [description]
     */
    function addOne($data){
    	
    	$data['type_time']=time();
    	return M($this->tableName)->add($data);
    }

    function select(){
    	$data=M($this->tableName)->select();
    	for ($i=0; $i <count($data); $i++) {
    		$data[$i]['type_time']=date("Y-m-d H:i:s",$data['type_time'][$i]);
    	}
    	return $data;
    }


}