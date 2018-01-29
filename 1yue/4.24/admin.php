<meta charset="utf8">
<center>
	<form action="demo.php" method="post">
		<table border="1">
		<tr>
			<td>用户名：</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>密码：</td>
			<td><input type="password" name="rpwd"></td>
		</tr>
		<tr>
			<td>性别:</td>
			<td>
			<input type="radio" name="sex" value="男">男
			<input type="radio" name="sex" value="女">女
			</td>
		</tr>
		<tr>
			<td>班级：</td>
			<td>
			<select name="class">				
			<?php 
			mysql_connect('127.0.0.1','root','0509');
			mysql_select_db('student');
			$sql="select * from wo";
			$res=mysql_query($sql);
			while ($arr=mysql_fetch_assoc($res)) {
				echo "<option value='{$arr['tid']}'>{$arr['aaa']}</option>";
			}
			?>	
			</select>
			</td>
		</tr>
		<tr>
			<td>学生状态：</td>
			<td>
				<input type="radio" name="staste" value="1">走读
				<input type="radio" name="staste" value="0">住校
			</td>
		</tr>
		<tr>
			<td>年龄：</td>
			<td>
				<select name="age">				
			<?php 
				for ($i=18; $i <=100 ; $i++) { 
				echo "<option value='$i'>$i</option>";
				}
				 ?>
				</select>
				</select>
			</td>
		</tr>
		<tr>
			<td>爱好：</td>
			<td>
				<input type="checkbox" name="hobby[]" value="打篮球">打篮球
				<input type="checkbox" name="hobby[]" value="踢足球">踢足球
				<input type="checkbox" name="hobby[]" value="打乒乓球">打乒乓球
				<input type="checkbox" name="hobby[]" value="打豆豆">打豆豆
				<input type="checkbox" name="hobby[]" value="打飞机">打飞机
			</td>
		</tr>
		<tr>
			<td>座右铭：</td>
			<td>
				<textarea name="motto" cols="30" rows="5"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit">&nbsp;&nbsp;&nbsp;
			<input type="reset"></td>
		</tr>
		</table>
	</form>
</center>