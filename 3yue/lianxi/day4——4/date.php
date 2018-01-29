<?php 
header('content-type:text/html;charset=utf8');
$name=$_POST['name'];
$sex=$_POST['sex'];
$box=implode($_POST['box'],',');

$file=$_FILES['file'];

require('upload.php');
//实例化类  对象
$upload=new upload($file);
//调用方法，执行文件上传功能,返回需要上传图片的名字
$file_a=$upload->upload();

if ($upload->error==0) {

	require('Db.php');
	$db=new Db('127.0.0.1','root','0509','day3');
	$sql=array($name,$file_a,$sex,$box);
	$res=$db->add('day5',$sql);

	if ($res) {
		
		echo "<script>alert('跳转');location.href='show.php'</script>";
	}else{
		echo "2";
	}
	// require('../rikaojineng/class.php');
	// $db=new Db('127.0.0.1','root','0509','day3');
	// $sql=array($name,$file_a,$sex,$box);
	// $res=$db->add('day5',$sql);
	// if ($res==true) {
	// 	echo "1";
	// }else{
	// 	echo "2";
	// }
}else{
	echo "文件上传失败";
}


 ?>