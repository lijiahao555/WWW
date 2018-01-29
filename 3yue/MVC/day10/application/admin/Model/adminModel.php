<?php 
require(MVC_Admin_Model.'db.php');

class AdminModel extends Db{
	function __construct(){

		parent::__construct();
	}




	public function getAdminOne($name){
		$sql="select * from admin where name='$name'";

		$res=mysql_query($sql);

		$arr=mysql_fetch_assoc($res);

		return $arr;


	}

}
 ?>