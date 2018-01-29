<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sql="select * from zhoukao3";
$res=mysql_query($sql);

 ?>
 <center>
 	<table border="1">
 		<th>ID</th>
 		<th>用户名</th>
 		<th>密码</th>
 		<th>确认密码</th>
 		<th>邮箱</th>
 		<th>昵称</th>
 		<?php 
 		while ($arr=mysql_fetch_assoc($res)) {
 			echo "<tr>";
 				echo "<td>".$arr['id']."</td>";
 				echo "<td>".$arr['username']."</td>";
 				echo "<td>".$arr['pwd']."</td>";
 				echo "<td>".$arr['rpwd']."</td>";
 				echo "<td>".$arr['email']."</td>";
 				echo "<td>".$arr['rname']."</td>";
 			echo "</tr>";
 		}
 		 ?>
 	</table>
 </center>