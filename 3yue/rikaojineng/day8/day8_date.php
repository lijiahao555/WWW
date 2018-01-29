<?php 
header('content-type:text/html;charset=utf8');

$name=$_POST['name'];
$price=$_POST['price'];
$type=$_POST['type'];
$number=$_POST['number'];
$count=$_POST['count'];
$file=$_FILES['file'];

require('upload.php');
$upload=new Upload($file);
$up=$upload->upload();
if ($upload->error==0) {
	require('class.php');
	$db=new Db('127.0.0.1','root','0509','day3rikao');
	$sql_a=array($name,$price,$up,$type,$number,$count);
	$sql=$db->add('day8',$sql_a);
	if ($sql) {
		echo "<script>alert('天假成功');location.href='day8_show.php'</script>";
	}else{
		echo "<script>alert('天假失败');location.href='day8_form.php'</script>";
	}
}else{
 	echo "上传文件失败";
}


 ?>