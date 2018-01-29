<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="<?php echo MVC_Add_Index?>index.php?p=admin&c=Add&a=add_date" method="post">
		<table border="1">
			<tr>
				<td>工单类别</td>
				<td>
					<select name="type">
						<option value="请选择">请选择</option>
						<option value="会员账号">会员账号</option>
						<option value="财务类">财务类</option>
						<option value="活动咨询">活动咨询</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>联系Email</td>
				<td><input type="email" name="email"></td>
			</tr>
			<tr>
				<td>简短描述</td>
				<td>
					<textarea name="count" id="" cols="20" rows="5"></textarea>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="reset" value="重置"><input type="submit" value="提交"></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>