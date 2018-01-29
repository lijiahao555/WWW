<?php 
header('content-type:text/html;charset=utf8');
$id=$_GET['id'];
$set=$_GET['set'];
$pi=trim($id,',');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sql="delete from demo2 where id in ($pi)";

if (mysql_query($sql)) {
	echo "<script>alert('删除成功');location.href='show.php?set=$set'</script>";
}else{
	echo "<script>alert('删除失败');location.href='show.php?set=$set'</script>";
}


 ?>


