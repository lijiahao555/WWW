<?php 
header('content-type:text/html;charset=utf8');
$id=$_GET['id'];
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('moni');
mysql_query('set names utf8');
$sql="select * from shangping inner join a on shangping.type=a.a_type where id='$id'";
$res=mysql_query($sql);



?>
<center>
<style>
	a{text-decoration: none;}
</style>

	<table border="1">
		<th>手机型号</th>
		<th>是否上架</th>
		<th>出厂时间</th>
		<th>序列号</th>
		<th>销售商</th>
		<th>市场价格</th>
		<th>本店价格</th>
		<th>库存量</th>
		<th>描述</th>
		<?php 
		while ($arr=mysql_fetch_assoc($res)) {
		echo "<tr>";
			echo "<td>".$arr['a_type']."</td>";
			if ($arr['shelf']==1) {
				echo "<td><a href='update.php?id={$arr['id']}&&shelf=0'><span style='color:red;font-size:35px;'>上架</span></a></td>";
			}else{
				echo "<td><a href='update.php?id={$arr['id']}&&shelf=1'><span style='color:blue;font-size:35px;'>下架</span></a></td>";
			}
			echo "<td>".$arr['date']."</td>";
			echo "<td>".$arr['number']."</td>";
			echo "<td>".$arr['name']."</td>";
			echo "<td>".$arr['price']."</td>";
			echo "<td>".$arr['rprice']."</td>";
			echo "<td>".$arr['cont']."</td>";
			echo "<td>".$arr['intro']."</td>";
		echo "</tr>";
		}
		 ?>

	</table>
	<a href="show.php" style="font-size:20px;color:yellow">返回查看列表继续查看</a>
</center>