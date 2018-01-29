<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="<?php echo U('Infor/upOne');?>" method="post">
	<h3><font color="red"><?php echo $_SESSION['name'] ?></font>个人信息</h3>
		<table border="5">
			<tr>
				<td>年龄</td>
				<td><input type="text" name="infor_age" value="<?php echo ($list["infor_age"]); ?>"></td>
			</tr>
			<tr>
				<td>性别</td>
				<td><input type="text" name="infor_sex" value="<?php echo ($list["infor_sex"]); ?>"></td>
			</tr>
			<tr>
				<td>电话</td>
				<td><input type="text" name="infor_tel" value="<?php echo ($list["infor_tel"]); ?>"></td>
			</tr>
			<tr>
				<td>邮箱</td>
				<td><input type="text" name="infor_email" value="<?php echo ($list["infor_email"]); ?>"></td>
			</tr>
			<tr>
				<td>简介</td>
				<td><textarea name="infor_content"  cols="30" rows="10"><?php echo ($list["infor_content"]); ?></textarea></td>
			</tr>
			<tr>
				<td>爱好</td>
				<td>
					<input type="checkbox" name="infor_hobby[]" value="打球">打球
					<input type="checkbox" name="infor_hobby[]" value="打篮球">打篮球
					<input type="checkbox" name="infor_hobby[]" value="打飞机">打飞机
					<input type="checkbox" name="infor_hobby[]" value="打羽毛球">打羽毛球
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="提交"></td>
			</tr>
		</table>
		<input type="hidden" name="id" value="<?php echo ($id); ?>">
	</form>
</center>
</body>
</html>