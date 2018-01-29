<meta charset="utf-8">
<center>
<form action="data.php" method="post">
	<table border="1">
		<tr>
			<td>序列号</td>
			<td><input type="text" name="number"></td>
		</tr>
		<tr>
			<td>销售商</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>出厂时间</td>
			<td><input type="text" name="date"></td>
		</tr>
		<tr>
			<td>手机型号</td>
			<td>
				<select name="type">
					<?php 
					mysql_connect('127.0.0.1','root','0509');
					mysql_select_db('moni');
					mysql_query('set names utf8');
					$sql="select * from a ";
					$res=mysql_query($sql);
					while ($arr=mysql_fetch_assoc($res)) {
						echo "<option value='{$arr['a_type']}'>{$arr['a_type']}</option>";
					}
					 ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>市场价格</td>
			<td><input type="text" name="price"></td>
		</tr>
		<tr>
			<td>本店价格</td>
			<td><input type="text" name="rprice"></td>
		</tr>
		<tr>
			<td>是否上架</td>
			<td>
				<select name="shelf">
					<option value="1">上架</option>
					<option value="0">下架</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>库存量</td>
			<td><input type="text" name="cont"></td>
		</tr>
		<tr>
			<td>描述</td>
			<td>
				<textarea name="intro" cols="30" rows="5"></textarea>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input type="submit" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="reset" value="重置">
			</td>
		</tr>
	</table>
</form>
</center>