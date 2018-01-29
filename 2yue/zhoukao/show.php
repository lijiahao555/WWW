<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sql="select * from zhoukao";
$res=mysql_query($sql);

 ?>
<center>
	<table border="1">
		<th>ID</th>
		<th>账号</th>
		<th>密码</th>
		<th>确认密码</th>
		<th>真实姓名</th>
		<th>身份证</th>
		<th>邮箱</th>
		<?php 
		while ($arr=mysql_fetch_assoc($res)) {
			echo "<tr>";
				echo "<td>".$arr['id']."</td>";
				echo "<td>".$arr['name']."</td>";
				echo "<td>".$arr['pwd']."</td>";
				echo "<td>".$arr['rpwd']."</td>";
				echo "<td>".$arr['username']."</td>";
				echo "<td>".$arr['shenfen']."</td>";
				echo "<td>".$arr['email']."</td>";
			echo "</tr>";
		}
		 ?>
	</table>
</center>