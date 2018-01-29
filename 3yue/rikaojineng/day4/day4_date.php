<?php 
header('content-type:text/html;charset=utf8');
require('../day4/upload.php');
$name=$_POST['name'];
$type=$_POST['type'];
$jian=$_POST['jian'];
$count=$_POST['count'];
$file=$_FILES['file'];

$upload=new Upload($file);

$f=$upload->upload();
if ($upload->geterror()=='') {
	//文件上传成功
	require('class.php');
	$db=new Db('127.0.0.1','root','0509','day3');
	$sql=array($name,$type,$f,$jian,$count);
	$res=$db->add('day4',$sql);
	if ($res) {
		echo "1";
	}
}else{
	//上传失败
	echo $upload->geterror();
}





 ?>