<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<table>
		<b><a href="<?php echo U('Class/self');?>?name=<?php echo ($name); ?>">查看个人信息</a>&nbsp;&nbsp;<a href="<?php echo U('Class/show');?>">查看所有学生信息</a></b>
	</table>
</center>
</body>
</html>