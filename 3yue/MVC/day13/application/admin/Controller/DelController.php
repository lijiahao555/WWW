<?php 
header('content-type:text/html;charset=utf8');

class Del{
	function delete(){
		$id=$_GET['id'];

		require(MVC_Add_Model.'add_Model.php');

		$a=new Date();

		$sql=$a->delete('day13',"id='$id'");

		if ($sql) {
			echo "删除成功，跳转中....";
			header('refresh:3;url=./index.php?p=admin&c=Show&a=index');
			
		}else{
			echo "删除失败，跳转中....";
			header('refresh:3;url=./index.php?p=admin&c=Show&a=index');
			return false;
		}

	}

}

 ?>