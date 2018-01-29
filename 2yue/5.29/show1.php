<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$uname=!empty($_GET['uname'])?$_GET['uname']:'';
$page=!empty($_GET['page'])?$_GET['page']:1;
$start=($page-1)*3;
$zong_sql="select count(*) as num from demo3 where name like '%$uname%'";
$zong_res=mysql_query($zong_sql);
$zong_arr=mysql_fetch_assoc($zong_res);
$zong=ceil($zong_arr['num']/3);

$sql="select * from demo3 where name like '%$uname%' limit $start,3";
$res=mysql_query($sql);
while ($arr=mysql_fetch_assoc($res)) {
	echo "<tr>";
		echo "<td><input type='checkbox' name='box' value='{$arr['id']}'></td>";
		echo "<td>".$arr['id']."</td>";
		echo "<td>".str_replace($uname, "<font color='red'>$uname</font>" ,$arr['name'])."</td>";
		echo "<td>".$arr['pwd']."</td>";
		echo "<td>".$arr['card']."</td>";
		echo "<td>".$arr['email']."</td>";
		echo "<td>".$arr['tel']."</td>";
		echo "<td>".$arr['count']."</td>";
		echo "<td><img src='{$arr['file']}' width='100' height='80'></td>";
		echo "<td><a href='down.php?id={$arr['file']}'>下载</a>|<a href='javascript:void(0)' onclick=del({$arr['id']},$page)>删除</a></td>";
	echo "</tr>";
}

 ?>
 <tr align="center">
 	<td colspan="9">
 	当前<?php echo $page?>页
 		<a href="javascript:void(0)" onclick="t_body(1)">首页</a>
 		<a href="javascript:void(0)" onclick="t_body(<?php echo $page-1?>)">上一页</a>
 		<a href="javascript:void(0)" onclick="t_body(<?php echo $page+1?>,<?php echo $zong ?>)">下一页</a>
 		<a href="javascript:void(0)" onclick="t_body(<?php echo $zong?>)">尾页</a>
 	一共<?php echo $zong?>页<button onclick="pi(<?php echo $page?>)">批删</button>
 	</td>
 </tr>
