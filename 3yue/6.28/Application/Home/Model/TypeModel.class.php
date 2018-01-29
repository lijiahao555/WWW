<?php 
namespace Home\Model;
use Think\Model;
class TypeModel extends Model {
	 protected $tableName = 'type'; 
	function type(){
		return $this->select();
	}






}
 ?>