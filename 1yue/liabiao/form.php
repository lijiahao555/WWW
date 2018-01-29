<meta charset="utf-8">
<center>
<form action="demo.php" method="post">
	<table border="1">
	<h2>商品添加页面</h2>
		<tr>
			<td>商品分类：</td>
			<td>
				<select name="t_id">
					<?php 
					mysql_connect('127.0.0.1','root','0509');
					mysql_select_db('moni');
					mysql_query('set names utf8');
					$sql="select * from goods_type";
					$res=mysql_query($sql);
					while ($arr=mysql_fetch_assoc($res)) {
						echo "<option value='{$arr['type_id']}'>{$arr['type_name']}</option>";
					}
					 ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>商品名称：</td>
			<td><input type="text" name="goods_name"></td>
		</tr>
		<tr>
			<td>商品价格：</td>
			<td><input type="text" name="goods_price"></td>
		</tr>
		<tr>
			<td>商品状态：</td>
			<td>
				<select name="goods_state">
					<option value="1">上架</option>
					<option value="0">下架</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>商品简介：</td>
			<td>
				<textarea name="goods_desc" cols="30" rows="5"></textarea>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit"></td>
		</tr>
	</table>
</form>
</center>