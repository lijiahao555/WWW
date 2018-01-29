<?php 

	header('content-type:text/html;charset=utf8');
	mysql_connect('127.0.0.1','root','0509');
	//选择表
	mysql_select_db('demo');
	//设置字符集
	mysql_query('set names utf8');
	//sql语句
	$sql="select * from demo";
	$res=mysql_query($sql);
	while ($arr=mysql_fetch_assoc($res)) {
		$data[]=$arr;
	}
	
	
 ?>
 <center>
 	<table border="1">
 		<tr>
 			<td>用户名</td>
 			<td>密码</td>
 			<td>确认密码</td>
 			<td>年龄</td>
 			<td>资料</td>
 		</tr>
 		<?php foreach ($dat as $k => $v) {
 		?>	
 		<tr>
 			<td><?php echo $v['username'] ?></td>
 			<td><?php echo $v['pwd'] ?></td>
 			<td><?php echo $v['rpwd'] ?></td>
 			<td><?php echo $v['age'] ?></td>
 			<td><?php echo $v['data'] ?></td>
 		</tr>
 		<?php } ?>
 	</table>
 </center>