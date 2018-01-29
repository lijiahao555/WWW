<meta charset="utf8">
<center>
<form action="add.php" method="post">
	<table border="1">
		<tr>
			<td>商品名称</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>商品品牌</td>
			<td>
				<select name="brand">
					<?php 
					$arr=array('华为','三星','苹果','小米','oppo');
					foreach ($arr as $key => $value) {
						echo "<option value='$value'>$value</option>";
					}
					 ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>商品价格</td>
			<td><input type="text" name="price"></td>
		</tr>
		<tr>
			<td>商品设置</td>
			<td>
				<input type="CheckBox" name="set" value="新品">新品
				<input type="CheckBox" name="set" value="热卖">热卖
			</td>
		</tr>
		<tr>
			<td>商品描述</td>
			<td><textarea name="intro" cols="30" rows="3"></textarea></td>
		</tr>
		<tr>
			<td><input type="submit" value="添加" style="border-radius:5px;"></td>
			<td></td>
		</tr>
	</table>
</form>
</center>