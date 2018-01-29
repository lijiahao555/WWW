<?php 
header('content-type:text/html;charset=utf8');
$goods_name=$_POST['goods_name'];
$goods_price=$_POST['goods_price'];
$goods_state=$_POST['goods_state'];
$goods_desc=$_POST['goods_desc'];
$t_id=$_POST['t_id'];


mysql_connect('127.0.0.1','root','0509');
mysql_select_db('moni');
mysql_query('set names utf8');
$sql="insert into goods values(null,'$goods_name','$t_id','$goods_price','$goods_state','$goods_desc')";
			
if (mysql_query($sql)) {
	echo "<a href='show.php'>添加成功</a>";
}else{
	echo "<a href='show.php'>添加失败</a>";
}

 ?>