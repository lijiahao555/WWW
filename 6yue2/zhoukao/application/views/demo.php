<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<table>
		<h2>欢迎<font color="red"><?php echo $name ?></font><?php echo $role_name ?>登录</h2>
			<tr><h1><a href="<?php echo site_url('Demo/add') ?>">请假申请添加</a></h1></tr>
			<tr><h1><a href="<?php echo site_url('Demo/seek') ?>">本人请假列表</a></h1></tr>
			<tr><h1><a href="<?php echo site_url('Demo/sum') ?>">所有请假列表</a></h1></tr>
			<tr><h1><a href="<?php echo site_url('Demo/ban') ?>">辅导员审批列表</a></h1></tr>
			<tr><h1><a href="<?php echo site_url('Demo/ren') ?>">主任审批列表</a></h1></tr>
		</table>
		<tr>
			<td><a href="<?php echo site_url('Demo/demo') ?>">返回主界面</a></td>
			<td><a href="<?php echo site_url('Login/login') ?>">退出登录</a></td>
		</tr>
	</center>
</body>
</html>