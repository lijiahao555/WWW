<?php
namespace Home\Model;
use Think\Model;
class SortModel extends Model {
    protected $tableName = 'sort'; 
    /**
     * 查询 分类表
     * @return [type] string
     */
    public function select(){
    	return M($this->tableName)->select();
    }
}