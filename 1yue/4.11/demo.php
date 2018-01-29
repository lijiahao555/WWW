<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="iction.php" method="post">
	<table border="1" width="300px;" height="100px;" align="center">
		<tr >
			<td>员工姓名：</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>设置密码：</td>
			<td><input type="password" name="pwd"></td>
		</tr>
		<tr>
			<td>确认密码：</td>
			<td><input type="password" name="rpwd"></td>
		</tr>
		<tr>
			<td>员工年龄：</td>
			<td>
				<select name="age">
					<?php 
					for ($i=18; $i <100 ; $i++) { 
							echo "<option value='$i'>$i</option>";
						}	
					 ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>员工性别</td>
			<td><input type="radio" name="sex" value="男" checked="checked">男<input type="radio" name="sex" value="女">女</td>
		</tr>
		<tr>
			<td>所属部门</td>
			<td>
				<select name="card">
					<option value="市场部">市场部</option>
					<option value="营业部">营业部</option>
					<option value="宣传部">宣传部</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>电子邮箱：</td>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>
			<td>电话号码：</td>
			<td><input type="tel" name="tel"></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit"></td>
		</tr>
	</table>
</form>
</body>
</html>