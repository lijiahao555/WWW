<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$jia1=$_GET['jia1'];
$jia2=$_GET['jia2'];

// $sql="update shangping set shelf='$shelf' where id='$id'";
$sql="update demo4 set shang='$jia1' where shang='$jia2'";
if (mysql_query($sql)) {
	echo 1;
}else{
	echo 2;
}
 ?>
