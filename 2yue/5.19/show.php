<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sql="select * from demo1";
$res=mysql_query($sql);


 ?>

<center>
	<table border="1">
		<th>ID</th>
		<th>名字</th>
		<th>密码</th>
		<th>图片</th>
		<th>操作</th>
		<?php 
		while ($arr=mysql_fetch_assoc($res)) {
			echo "<tr>";
				echo "<td>".$arr['id']."</td>";
				echo "<td>".$arr['username']."</td>";
				echo "<td>".$arr['pwd']."</td>";
				echo "<td><img src='{$arr['file_path']}' width='200' height='50' alt=''></td>";
			echo "</tr>";
		}
		 ?>
	</table>
</center>