<?php 
namespace Home\Model;
use Think\Model;
class goodsModel extends Model {
	  protected $tableName = 'goods';
	  function del($ids){
	  	// echo $ids;die;
       return $this->delete($ids); 
	  }
	  
	  function stop($ids){
	  	
	  	$data=array(
	  			'start' => 0,
	  		);
	  	return $this->where("id IN ($ids)")->save($data); 
	  	
	  }

}

 ?>