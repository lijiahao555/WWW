<?php 
header('content-type:text/html;charset=utf8');

class Show{
	function index(){
		require(MVC_Add_Model.'add_Model.php');

		$d=new Date();

		$sql=$d->select('*','day13','id');
		
		require(MVC_Add_View.'show.php');
		
	}

}

 ?>