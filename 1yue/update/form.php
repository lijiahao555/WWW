<meta charset="utf8">
<center>
<form action="demo.php" method="post">
	<table border="1">
		<tr>
			<td>学生姓名</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>学生年龄</td>
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
			<td>学生班级</td>
			<td>
				<select name="class">
					<?php 
					$arr=array('1405phpA','1405phpB','1405phpC','1405phpD','1406phpB');
					foreach ($arr as $key => $val) {
						echo "<option value='$val'>$val</option>";
					}
					
					 ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>学生成绩</td>
			<td><input type="text" name="grade"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="添加"></td>
		</tr>

	</table>
</form>
</center>		