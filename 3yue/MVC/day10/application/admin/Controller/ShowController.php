<?php 
class Show{
	public function index(){
		require(MVC_Admin_Model.'adminModel.php');

		$show=new AdminModel();

		$sql=$show->select('*','admin','id');

		require(MVC_Admin_View.'show.php');
	}

}

 ?>