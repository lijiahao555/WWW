<?php 
header('content-type:text/html;charset=utf8'); 

mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');
mysql_query('set names utf8');
$sql="select * from books";
$res=mysql_query($sql);


 ?>
 <table>
 	<th>课程名称</th>
 	<th>课程价格</th>
 	<th>是否连载</th>
 	<th>该课程讲师</th>
 	<th>操作</th>
 	<?php 
 	while ($arr=mysql_fetch_assoc($res)) {
 		echo "<tr align='center'>";
 			echo "<td>".$arr['name']."</td>";
 			echo "<td>".$arr['price']."</td>";
 			echo "<td>".$arr['off']."</td>";
 			echo "<td>".$arr['teacher']."</td>";
 			echo "<td><a href=show_class_list.php?a={$arr['id']}>删除</a></td>";
 			
 		echo "</tr>";
 	}
 	 ?>
 </table>