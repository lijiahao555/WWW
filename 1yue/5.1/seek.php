<?php 
header('content-type:text/html;charset=utf8');
$a=$_POST['a'];
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('moni');
mysql_query('set names utf8');
$sql="select * from user where User_name like '%$a%'";
$res=mysql_query($sql);
if (empty($a)) {
	echo "<script>alert('请输入搜索信息');location.href='show.php'</script>";
};
// if (empty($a)) {
// 	echo "搜索信息不能为空<a href='show.php'>返回列表</a>";
// };die;

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
 				echo "<td>".str_replace($a, "<span style='color:red;font-size:25px'>$a</span>", $arr['User_name'])."</td>";
 				echo "<td>".$arr['User_sex']."</td>";
 				echo "<td>".$arr['User_position']."</td>";
 				echo "<td>".$arr['User_education']."</td>";
 				echo "<td>".$arr['User_desc']."</td>";
 				echo "<td><a href='delete.php?User_id={$arr['User_id']}'>删除</a></td>";
 			echo "<tr>";
 		}

 		 ?>
 	</table>
 	<a href="show.php" style="color:green;font-size:25px;">返回列表</a>
 </center>