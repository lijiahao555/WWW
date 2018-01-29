<?php 
namespace Home\Model;
use Think\Model;
class TypeModel extends Model { 
   protected $tableName = 'type'; 
   /**
    * findOne 查询出分类表里的所有数据
    */
   public function selectAll(){
   		return $a=M($this->tableName)->select();
   }


}