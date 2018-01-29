<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$huan1=2;
$huan2=1;

$sql="select * from demo4";
$res=mysql_query($sql);
while ($arr=mysql_fetch_assoc($res)) {
	echo "<tr>";
		echo "<td>".$arr['id']."</td>";
		echo "<td>".$arr['number']."</td>";
		echo "<td>".$arr['name']."</td>";
		echo "<td>".$arr['price']."</td>";
		if ($arr['shang']==1) {
			echo "<td><a href='javascript:void(0)' onclick='jia1($huan1)'>上架</a></td>";
		}else{
			echo "<td><a href='javascript:void(0)' onclick='jia2($huan2)'>下架</a></td>";
		}
	echo "</tr>";
}


 ?>