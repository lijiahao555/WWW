<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('moni');
mysql_query('set names utf8');

$sql="select goods_id,goods_name,type_name,goods_price,goods_state,goods_desc from goods inner join goods_type on goods.t_id=goods_type.type_id";

$res=mysql_query($sql);

 ?>
<center>
<form action="shousuo.php" method="post">
<input type="text" name="sousuo">
<input type="submit" value="搜索名称">
</form>
<style>
	a{text-decoration: none;}
</style>
	<table border="1">
		<th>序号</th>
		<th>商品名称</th>
		<th>所属分类</th>
		<th>商品价格</th>
		<th>商品状态</th>
		<th>商品简介</th>
		<th>操作</th>
		<?php 
		while ($arr=mysql_fetch_assoc($res)) {
		echo "<tr>";
			echo "<td>".$arr['goods_id']."</td>";
			echo "<td>".$arr['goods_name']."</td>";
			echo "<td>".$arr['type_name']."</td>";
			echo "<td>".$arr['goods_price']."</td>";
			if ($arr['goods_state']==1) {
				echo "<td><a href='update.php?id={$arr['goods_id']}&&name=0'><span style='color:red;font-size:30px;'>上架</span></a></td>";
			}else{
				echo "<td><a href='update.php?id={$arr['goods_id']}&&name=1'><span style='color:yellow;font-size:30px;'>下架</span></a></td>";
			};
			echo "<td>".$arr['goods_desc']."</td>";
			echo "<td><a href='delete.php?goods_id={$arr['goods_id']}'><span style='color:green;font-size:30px;'>删除</span></a></td>";
		echo "</tr>";

		}

		 ?>
	</table>
</center>