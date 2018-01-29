<?php 
header('content-type:text/html;charset=utf8');
$name=$_POST['name'];
$sex=$_POST['sex'];
$type=$_POST['type'];
$file=$_FILES['file'];

require('./upload.php');
$up=new Upload($file);
$u=$up->upload();
if ($up->error==0) {
	require('./class.php');
	$db=new Db('127.0.0.1','root','0509','day3rikao');
	$sql=array($name,$sex,$type,$u);
	$res=$db->add('day7',$sql);
	if ($res) {
		echo "添加成功，正在跳转。。。";
		header('refresh:3;url=show.php');
	}else{
		echo "添加失败";
	}

}else{
	echo "0";
}

 ?>