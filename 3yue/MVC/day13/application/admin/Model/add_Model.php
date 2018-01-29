<?php 
require(MVC_Add_Model.'db.php');
class Date extends Db{
	function __construct(){
		parent::__construct();
	}

	public function addDateOne($arr){
		
		$s=new Db();
		
		$res=$s->add('day13',$arr);

		return $res;
	}

}

 ?>