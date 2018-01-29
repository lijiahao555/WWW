<?php 
header('content-type:text/html;charset=utf8');
$name=$_POST['name'];
$number=$_POST['num'];
$price=$_POST['price'];
$count=$_POST['count'];

require('../3yue/rikaojineng/class.php');
$db=new Db('127.0.0.1','root','0509','day3rikao');
$sql=array($name,$number,$price,$count);
$res=$db->add('day8_2',$sql);
if ($res) {
	echo "添加成功，正在跳转....";
	header('refresh:3;url=show.php');
}else{
	echo "添加失败，正在返回....";
	header('refresh:3;url=form.php');
}

 ?>