<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<form action="<?php echo site_url('Demo/addDo') ?>" method="post">
			<table border="1">
				<tr>
					<td>申请标题</td>
					<td><input type="text" name="infor_title"></td>
				</tr>
				<tr>
					<td>申请类别</td>
					<td>
					<input type="radio" name="infor_type" value="1">请假
					<input type="radio" name="infor_type" value="0">调休
					</td>
				</tr>
				<tr>
					<td>开始时间</td>
					<td><input type="text" name="infor_start"></td>
				</tr>
				<tr>
					<td>结束时间</td>
					<td><input type="text" name="infor_stop"></td>
				</tr>
				<tr>
					<td>申请理由</td>
					<td><textarea name="infor_content" cols="30" rows="10"></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" value="申请"></td>
					<td><input type="reset" value="取消"></td>
				</tr>
			</table>
			<tr>
			<input type="hidden" name="user_name" value="<?php echo $name ?>">
			<td><a href="<?php echo site_url('Demo/demo') ?>">返回主界面</a></td>
			<td><a href="<?php echo site_url('Login/login') ?>">退出登录</a></td>
		</tr>
		</form>
	</center>
</body>
</html>