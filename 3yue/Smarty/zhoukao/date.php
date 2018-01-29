<?php 
header('content-type:text/html;charset=utf8');

$name=$_POST['name'];
$email=$_POST['email'];
$count=$_POST['count'];
$oder=$_POST['oder'];
$show=$_POST['show'];
$logo=$_FILES['logo'];

require('./upload.php');

$up=new Upload($logo);
$lo=$up->upload();

if ($up->error==0) {
	require('./class.php');
	$db=new Db('127.0.0.1','root','0509','day3rikao');
	$sql=array($name,$email,$lo,$count,$oder,$show);
	$res=$db->add('zhoukao2',$sql);
	if ($res) {
		echo "添加成功，正在跳转...";
		header('refresh:3;url=show.php');
	}else{
		echo "添加失败";
	}

}else{
	echo "上传失败";
}


 ?>