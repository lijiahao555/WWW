<?php 
header('content-type:text/html;charset=utf8');
require('date.php');
$db=new Db('127.0.0.1','root','0509','day3');

$res=$db->select('day2','1');
 ?>
<center>
	<table border="1">
		<th>ID</th>
		<th>姓名</th>
		<th>数量</th>
		<th>班级</th>
		<th>性别</th>
		<th>爱好</th>
		<th>简介</th>
		<?php 
		foreach ($res as $key => $v) {
			echo "<tr>";
			 	echo "<td>".$v['id']."</td>";
			 	echo "<td>".$v['name']."</td>";
			 	echo "<td>".$v['number']."</td>";
			 	echo "<td>".$v['class']."</td>";
			 	echo "<td>".$v['sex']."</td>";
			 	echo "<td>".$v['box']."</td>";
			 	echo "<td>".$v['count']."</td>";
			echo "</tr>";
		}
		 ?>
	
	</table>
</center>