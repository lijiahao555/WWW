<?php 
header('content-type:text/html;charset=utf8');
class Add{
	function add_form(){
		require(MVC_Add_View.'form_View.php');
	}

	function add_date(){
		$type=$_POST['type'];
		$email=$_POST['email'];
		$count=$_POST['count'];
		require(MVC_Add_Model.'add_Model.php');	
		$sql=new Date();
		$arr=array($type,$email,$count);
		$res=$sql->addDateOne($arr);
		if ($res==true) {
			echo "添加成功，跳转中....";
			header('refresh:3;url=./index.php?p=admin&c=Show&a=index');
			
		}else{
			echo "添加失败，跳转中....";
			header('refresh:3;url=./index.php?p=admin&c=Add&a=add_date');
			return false;
		}

	}


}


 ?>