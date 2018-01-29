<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$page=!empty($_GET['page'])?$_GET['page']:1;
$sou=$_GET['s'];

$name=!empty($_GET['name'])?$_GET['name']:'';
$start=($page-1)*$sou<=0?0:($page-1)*$sou;

$zong_sql="SELECT COUNT(*) AS num FROM yuekao WHERE stu_name LIKE '%$name%'";

$zong_res=mysql_query($zong_sql);
$zong_arr=mysql_fetch_assoc($zong_res);

$zong=ceil($zong_arr['num']/$sou);

$sql="select * from yuekao where stu_name like '%$name%' limit $start,$sou";

$res=mysql_query($sql);

?>
<?php
while ( $arr=mysql_fetch_assoc($res)) {
		echo "<tr>";
			echo "<td><input type='checkbox'></td>";
			echo "<td>".$arr['stu_id']."</td>";
			echo "<td>".$arr['stu_name']."</td>";
			echo "<td>".$arr['violate_type']."</td>";
			echo "<td>".$arr['adviser']."</td>";
			echo "<td>".$arr['teacher_name']."</td>";
			echo "<td>".$arr['class']."</td>";
			echo "<td>".$arr['violate_time']."</td>";
			if ($arr['state']==1) {
				echo "<td><a href='javascript:void(0)'>已经审核</a></td>";
			}else{
				echo "<td><a href='javascript:void(0)'>未审核</a></td>";
			}
			echo "<td>".$arr['add_uer']."</td>";
		echo "</tr>";
	}
 ?>
 <tr>
 	<td colspan="10" align="center">
 	当前<?php echo $page ?>页
 
 	<a href="javascript:void(0)" onclick="dianji(<?php echo $page-1 ?>)">上一页</a>
 	<a href="javascript:void(0)" onclick="dianji(<?php echo 1 ?>)">1</a>
 	<a href="javascript:void(0)" onclick="dianji(<?php echo 2 ?>)">2</a>
 	<a href="javascript:void(0)" onclick="dianji(<?php echo 3 ?>)">3</a>
 	<a href="javascript:void(0)" onclick="dianji(<?php echo 4 ?>)">4</a>
 	<a href="javascript:void(0)" onclick="dianji(<?php echo 5 ?>)">5</a>
 	<a href="javascript:void(0)" onclick="dianji(<?php echo $page+1 ?>,<?php echo $sou ?>)">下一页</a>
 	
 	共<?php echo $zong ?>页
 	</td>
 </tr>
 </center>
