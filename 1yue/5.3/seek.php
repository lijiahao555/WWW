<?php 
header('content-type:text/html;charset=utf8');
$name=$_POST['name'];
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('moni');
mysql_query('set names utf8');
$sql="select id,a_type,shelf,date,number,name,price,rprice,cont,intro from shangping inner join a on shangping.type=a.a_type where a_type like '%$name%'";
$res=mysql_query($sql);



?>
<center>
<style>
	a{text-decoration: none;}
</style>
<form action="seek.php" method="post">
	<input type="text" style="width:300px;height:30px" name="name">
	<input type="submit" value="搜索" style="width:200px;height:30px;color:black;background:red;font-size:20px">
	
</form>
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
		<th>操作</th>
		<?php 
		while ($arr=mysql_fetch_assoc($res)) {
		echo "<tr>";
			echo "<td>".str_replace($name, "<span style='color:red;font-size:20px'>$name</span>", $arr['a_type'])."</td>";
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
			echo "<td>
			<a href='delete.php?id={$arr['id']}'>删除</a>|<a href='select.php?id={$arr['id']}'>查询</a>
			</td>";
		echo "</tr>";
		}
		 ?>

	</table>
	<a href="form.php" style="font-size:30px;color:green">返回添加列表继续添加</a>
</center>