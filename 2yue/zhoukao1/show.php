<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sql="select * from demo";
$res=mysql_query($sql);

 ?>
 <center>
 	<table border="1">
 		<th>用户名</th>
 		<th>电子邮箱</th>
 		<th>密码</th>
 		<th>重复密码</th>
 		<th>删除</th>
 		<?php 
 		while ($arr=mysql_fetch_assoc($res)) {
 			echo "<tr>";
 				echo "<td>".$arr['id']."</td>";
 				echo "<td>".$arr['username']."</td>";
 				echo "<td>".$arr['pwd']."</td>";
 				echo "<td>".$arr['rpwd']."</td>";
 				echo "<td><a href='delete.php?id={$arr['id']}'>删除</a></td>";
 			echo "</tr>";
 		}
 		 ?>
 	</table>
 </center>