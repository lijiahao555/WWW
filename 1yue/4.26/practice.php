<center>
	<meta charset="utf8">
		<form action="demo.php" method="post">
			<table border="1">
				<tr>
					<td>课程名称</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>课程价格</td>
					<td><input type="text" name="price"></td>
				</tr>
				<tr>
					<td>是否连载</td>
					<td>
						<input type="radio" name="off" value="连载中">是
						<input type="radio" name="off" value="完成">否
					</td>
				</tr>
				<tr>
					<td>该课程讲师</td>
					<td><input type="text" name="teacher"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="添加"></td>
				</tr>
			</table>
		</form>
	
</center>