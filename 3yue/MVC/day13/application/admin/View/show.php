<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<table border="1">
			<tr>
				<td>ID</td>
				<td>分类</td>
				<ttdr>邮件</td>
				<td>内容</td>
				<td>操作</td>
			</tr>
			<?php 
			foreach ($sql as $key => $v) { ?>
			<tr>
				<td><?php echo $v['id'] ?></td>
				<td><?php echo $v['type'] ?></td>
				<td><?php echo $v['email'] ?></td>
				<td><?php echo $v['count'] ?></td>
				<td><a href="<?php echo MVC_Add_Index ?>index.php?id=<?php echo $v['id'] ?>&p=admin&c=Del&a=delete">删除</a></td>
			</tr>
			<?php
			}
			 ?>
		 </table>
		
	</center>
</body>
</html>