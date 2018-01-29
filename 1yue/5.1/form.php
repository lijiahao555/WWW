<meta charset="utf-8">
<center>
<form action="date.php" method="post">
	<h2>钱塘江员工信息后台管理</h2>
	<table>
		<tr>
			<td>员工姓名：</td>
			<td><input type="text" name="User_name"></td>
		</tr>
		<tr>
			<td>员工性别：</td>
			<td>
				<input type="radio" name="User_sex" value="男">男
				<input type="radio" name="User_sex" value="女">女
			</td>
		</tr>
		<tr>
			<td>员工职位：</td>
			<td><input type="text" name="User_position"></td>
		</tr>
		<tr>
			<td>学历信息：</td>
			<td>
			<select name="User_education">
				<option value="小学">小学</option>
				<option value="大专">大专</option>
				<option value="高中">高中</option>
				<option value="本科">本科</option>
				<option value="初中">初中</option>
			</select>
		</td>
		</tr>
		<tr>
			<td>备注:</td>
			<td>
				<textarea name="User_desc" cols="30" rows="5"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="提交">
				<input type="reset" value="取消">
			</td>
			
		</tr>
	</table>
</form>
</center>