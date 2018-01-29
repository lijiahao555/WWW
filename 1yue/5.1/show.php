<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('moni');
mysql_query('set names utf8');
$sql="select * from user";
$res=mysql_query($sql);

 ?>
 <center>
 <form action="seek.php" method="post">
 	<input type="text" name="a" placeholder="根据员工姓名搜索">
 	<input type="submit" value="搜索">
 </form>
 	<table border="1">
 		<th>ID</th>
 		<th>员工姓名</th>
 		<th>员工性别</th>
 		<th>员工职位</th>
 		<th>学历信息</th>
 		<th>备注</th>
 		<th>操作</th>
 		<?php 
 		while ($arr=mysql_fetch_assoc($res)) {
 			echo "<tr align='center'>";
 				echo "<td>".$arr['User_id']."</td>";
 				echo "<td>".$arr['User_name']."</td>";
 				echo "<td>".$arr['User_sex']."</td>";
 				echo "<td>".$arr['User_position']."</td>";
 				echo "<td>".$arr['User_education']."</td>";
 				echo "<td>".$arr['User_desc']."</td>";
 				echo "<td><a href='delete.php?User_id={$arr['User_id']}'>删除</a>
 				</td>";
 			echo "<tr>";
 		}

 		 ?>
 	</table>
 	<a href="form.php" style="color:yellow;font-size:25px;">返回继续添加信息</a>
 </center>