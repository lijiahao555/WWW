<?php 
namespace Home\Model;
use Think\Model;
class ImgModel extends Model {
protected $tableName = 'img'; 
	public function img($arr){
		return $this->add($arr);

	}
	




}

 ?>