<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('student');

mysql_query('set names utf8');

$sql="select id,name,rpwd,sex,staste,age,hobby,motto,aaa from student inner join wo on student.class=wo.tid";
//资源转换
//mysql_fetch_array():从结果/数据库取一行关联数组或者索引一起
//mysql_fetch_assoc():从结果/数据库取得一行作为关联数组
//mysql_fetch_row:从结果/数据库取得一行作为索引数组
//

$res=mysql_query($sql);
//$cont=mysql_num_rows($res);
//for ($i=1; $i <$cont ; $i++) {
//	$arr[]=mysql_fetch_assoc($res);
	
///}

 ?>
<center>
 <table border="1">
		<th>学生编号</th>
		<th>姓名</th>
 		<th>性别</th>
 		<th>班级</th>
 		<th>学生状态</th>
 		<th>年龄</th>
 		<th>爱好</th>
 		<th>座右铭</th>
	<?php 
		while ( $arr=mysql_fetch_assoc($res)) {
		echo "<tr>";
	 		echo "<td>".$arr['id']."</td>";
	 		echo "<td>".$arr['name']."</td>";
	 		echo "<td>".$arr['sex']."</td>";
	 		echo "<td>".$arr['aaa']."</td>";
	 		if ($arr['staste']==1) {
	 			echo "<td><a href='update.php?id={$arr['id']}&&staste=0'>走读</a></td>";
	 		}else {
	 			echo "<td><a href='update.php?id={$arr['id']}&&staste=1'>住校</a></td>";
	 		}
	 		echo "<td>".$arr['age']."</td>";
	 		echo "<td>".$arr['hobby']."</td>";
	 		echo "<td>".$arr['motto']."</td>";
	 		echo "<td><a href='a.php?a={$arr['id']}'>删除</a></td>";
	 	echo "</tr>";
	 	} 	


 	 ?>
 </table>
 </center>


<!--  <center>
 <table border="1">
		<th>学生编号</th>
		<th>姓名</th>
 		<th>性别</th>
 		<th>班级</th>
 		<th>学生状态</th>
 		<th>年龄</th>
 		<th>爱好</th>
 		<th>座右铭</th>
	<?php 
	// foreach ($arr as $key => $val) {
	//  	echo "<tr>";
	//  		echo "<td>".$val['id']."</td>";
	//  		echo "<td>".$val['name']."</td>";
	//  		echo "<td>".$val['sex']."</td>";
	//  		echo "<td>".$val['class']."</td>";
	//  		echo "<td>".$val['staste']."</td>";
	//  		echo "<td>".$val['age']."</td>";
	//  		echo "<td>".$val['hobby']."</td>";
	//  		echo "<td>".$val['motto']."</td>";
	//  	echo "</tr>";
	 	 	


 	 ?>
 </table>
 </center> -->
