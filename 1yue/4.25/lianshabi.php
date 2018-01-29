<?php
header('content-type:text/html;charset=utf8'); 
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');
$sql="select * from goods";
mysql_query('set names utf8');

$res=mysql_query($sql);


 ?>
 <center>
 <table border="1">
 	<th>商品id</th>
 	<th>商品名称</th>
 	<th>商品品牌</th>
 	<th>商品价格</th>
 	<th>是否新品</th>
 	<th>是否热卖</th>
 	<th>描述</th>
 	<th>操作</th>
 	<?php 
 	while ($arr=mysql_fetch_assoc($res)) {
 		echo "<tr>";
 			echo "<td>".$arr['id']."</td>";
 			echo "<td>".$arr['name']."</td>";
 			echo "<td>".$arr['brand']."</td>";
 			echo "<td>".$arr['price']."</td>";
 			echo "<td>".$arr['set']."</td>";
 			echo "<td>".$arr['set']."</td>";
 			echo "<td>".$arr['intro']."</td>";
 			echo "<td><a href='a.php?a={$arr['id']}'>删除</a></td>";
 		echo "</tr>";
 	}
 ?>
 </table>
 </center>