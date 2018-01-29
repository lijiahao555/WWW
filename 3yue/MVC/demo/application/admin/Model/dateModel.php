<?php 
require(MVC_Admin_Model.'db.php');
class Date extends Db{
	//定义一个构造函数，实例化类的时候自动调用父类的构造函数连库
	function __construct(){
		parent::__construct();
	}

	function getAdminOne($name){

		//根据传来的用户名和数据库里做对比
		$sql="select * from admin where name='$name'";
	
		$res=mysql_query($sql);
		$arr=mysql_fetch_assoc($res);
		return $arr;

	}


}

 ?>