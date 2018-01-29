<meta charset="UTF-8">
<center>
	<form action="admin.php" method="post">
		<table>
			<tr>
				<td>用户名：</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>密码：</td>
				<td><input type="text" name="pwd"></td>
			</tr>
			<tr>
				<td>确认密码：</td>
				<td><input type="text" name="rpwd"></td>
			</tr>
			<tr>
				<td>年龄</td>
				<td>
					<select name="age">
						<?php for ($i=1; $i <=100 ; $i++) { 
						?>
						<option value="<?php echo $i?>"><?php echo $i ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>资料</td>
				<td><textarea name="data" cols="30" rows="3"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit"></td>
			</tr>
		</table>
	</form>
</center>
