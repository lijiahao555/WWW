<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sou=!empty($_GET['sou'])?$_GET['sou']:'';
$page=!empty($_GET['page'])?$_GET['page']:1;
$pianyi=ceil($page-1)*5;

$zong_sql="SELECT COUNT(*) AS num FROM rikao WHERE name LIKE '%$sou%'";
$zong_res=mysql_query($zong_sql);
$zong_arr=mysql_fetch_assoc($zong_res);
$zong=ceil($zong_arr['num']/5);

$sql="select * from rikao where name like '%$sou%' limit $pianyi,5";
$res=mysql_query($sql);


?>
<?php 
	while ($arr=mysql_fetch_assoc($res)) {
		echo "<tr>";
			echo "<td><input type='checkbox' name='box' value='{$arr['id']}'></td>";
			echo "<td>".$arr['id']."</td>";
			echo "<td>".str_replace($sou, "<font color='red'>".$sou."</font>",$arr['name'])."</td>";
			echo "<td>".$arr['sex']."</td>";
			echo "<td>".$arr['type']."</td>";
			echo "<td><img src='{$arr['file']}' width='100px' height='70px'></td>";
			echo "<td>".$arr['count']."</td>";
			echo "<td>".$arr['box']."</td>";
			echo "<td><a href='javascript:void(0)' onclick='del({$arr['id']},".$page.")'>删除</a>
			
			<a href=down.php?xiazai={$arr['file']}>下载</a></td>";
			
		echo "<tr>";
	}
 ?>
 <tr>
 	<td colspan="9" align="center">
 	当前<?php echo $page ?>页
 	<a href="javascript:void(0)" onclick="t_body(1)">首页</a>
 	<a href="javascript:void(0)" onclick="t_body(<?php echo $page-1 ?>)">上一页</a>
 	<a href="javascript:void(0)" onclick="t_body(<?php echo $page+1 ?>)">下一页</a>
 	<a href="javascript:void(0)" onclick="t_body(<?php echo $zong ?>)">尾页</a>
 	一共<?php echo $zong ?>页<button onclick="pi(<?php echo $page ?>)">批删</button>
 </tr>