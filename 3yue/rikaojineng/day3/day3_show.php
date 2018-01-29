<?php 
header('content-type:text/html;charset=utf8');
require('class.php');
$db=new Db('127.0.0.1','root','0509','day3');

$res=$db->select('*','day3','id');



 ?>
 <center>
 	<table border="1">
 		<th>ID</th>
 		<th>用户名</th>
 		<th>密码</th>
 		<th>确认密码</th>
 		<th>电话号码</th>
 		<?php 
 		// while ($arr=implode($aa,',')) {
 		// 	echo "<tr>";
 		// 		echo "<td>".$arr['id']."</td>";
 		// 		echo "<td>".$arr['name']."</td>";
 		// 		echo "<td>".$arr['pwd']."</td>";
 		// 		echo "<td>".$arr['rpwd']."</td>";
 		// 		echo "<td>".$arr['tel']."</td>";
 		// 	echo "</tr>";
 		// }
 		foreach ($res as $key => $v) {
 			echo "<tr>";
 				echo "<td>".$v['id']."</td>";
 				echo "<td>".$v['name']."</td>";
 				echo "<td>".$v['pwd']."</td>";
 				echo "<td>".$v['rpwd']."</td>";
 				echo "<td>".$v['tel']."</td>";
 			echo "</tr>";
 		}
 		
 		 ?>
 	</table>
 </center>