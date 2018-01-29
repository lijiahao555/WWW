<?php 
header('content-type:text/html;charset=utf8');
$name=$_POST['name'];
$price=$_POST['price'];
$username=$_POST['username'];
$file=$_FILES['file'];
require('upload.php');
$upload=new Upload($file);
$file_name=$upload->upload();
if ($upload->error==0) {
	require('class.php');
	$db=new Db('127.0.0.1','root','0509','day3rikao');
	$sql=array($name,$price,$username,$file_name);
	$res=$db->add('day6',$sql);
	if ($res) {
		echo "<script>alert('成功进入页面');location.href='day6_show.php'</script>";
	}else{
		echo "<script>alert('失败进入页面');location.href='day6_form.php'</script>";
	}
}else{
	echo "添加失败";
}


 ?>