<?php
namespace Home\Model;
use Think\Model;
class LabelModel extends Model {
    protected $tableName = 'label'; 
    /**
     * 标签查询
     * @return [type] 二维数组
     */
    function select(){
    	return M($this->tableName)->select();
    }
}