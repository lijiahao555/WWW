<meta charset="utf8">
	<center>
		<form action="data.php" method="post">
			<table border="1">
				<tr>
					<td>姓名</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>密码</td>
					<td><input type="password" name="pwd"></td>
				</tr>
				<tr>
					<td>年龄</td>
					<td>
						<select name="age">
							<?php 
							for ($i=18; $i <=100 ; $i++) { 
								echo "<option value='$i'>$i</option>";
							}
							 ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>性别</td>
					<td>
					<input type="radio" name="sex" value="男"> 男
					<input type="radio" name="sex" value="女"> 女
					</td>
				</tr>
				<tr>
					<td>简介</td>
					<td><textarea name="content" cols="30" rows="5"></textarea></td>
				</tr>
				<tr>
					<td><input type="submit"></td>
					<td></td>
				</tr>
			</table>
		</form>
	</center>
</meta>