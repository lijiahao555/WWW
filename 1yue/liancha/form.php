<meta charset ="utf-8">
<center>
	<form action="demo.php" method="post">
		<table>
			<tr>
				<td>文章标题</td>
				<td><input type="text" name="a_titile"></td>
			</tr>
			<tr>
				<td>文章分类</td>
				<td>
					<select name="T_id">
						<?php 
						mysql_connect('127.0.0.1','root','0509');
						mysql_select_db('lianxi');
						mysql_query('set names utf8');
						$sql="select * from type";
						$res=mysql_query($sql);
						while ($arr=mysql_fetch_assoc($res)) {
							echo "<option value='{$arr['type_id']}'>{$arr['type_name']}</option>";
						}
						 ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>文章重要性</td>
				<td>
				<input type="radio" name="a_important" value="1">普通
				<input type="radio" name="a_important" value="0">置顶  <span style="color:red;font-weight:bold">*</span>
				</td>
			</tr>
			<tr>
				<td>是否显示</td>
				<td><input type="radio" name="a_is_show" value="1">显示
					<input type="radio" name="a_is_show" value="0">不显示  <span style="color:red;font-weight:bold">*</span></td>
			</tr>
			<tr>
				<td>文章作者</td>
				<td><input type="text" name="a_author"></td>
			</tr>
			<tr>
				<td>作者email</td>
				<td><input type="email" name="a_author_email"></td>
			</tr>
			<tr>
				<td>关键字</td>
				<td><input type="text" name="a_content"></td>
			</tr>
			<tr>
				<td>网页描述</td>
				<td><textarea name="a_desc" cols="30" rows="5"></textarea></td>
			</tr>
			<tr>
				<td align="center"><input type="submit"></td>
				
			</tr>
		</table>
	</form>
</center>