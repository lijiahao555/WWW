<?php 
header('content-type:text/html;charset=utf8'); 

mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');
mysql_query('set names utf8');
$sql="select * from class";
$res=mysql_query($sql);
 
 ?>
 <center>
 <table border="1">
 	<th>学生姓名</th>
 	<th>学生年龄</th>
 	<th>学生班级</th>
 	<th>学生成绩</th>
 	<th>操作</th>
 	<?php 
 	while ($arr=mysql_fetch_assoc($res)) {
 		echo "<tr>";
 			echo "<td>".$arr['name']."</td>";
 			echo "<td>".$arr['age']."</td>";
 			echo "<td>".$arr['class']."</td>";
 			if ($arr['grade']==100) {
 				echo "<td>优秀</td>";
 			}else if($arr['grade']>=90&&$arr['grade']<=100){
 				echo "<td>及格</td>";
 			}else{
 				echo "<td>继续努力</td>";
 			}
 			echo "<td><a href=''>删除</a></td>";
 		echo "</tr>";
 	}


 	 ?>
 </table>
 </center>