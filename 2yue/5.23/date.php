<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$seek=!empty($_GET['seek'])?$_GET['seek']:'';

$page=!empty($_GET['page'])?$_GET['page']:1;

$zong_sql="SELECT COUNT(*) AS num FROM demo2 WHERE username LIKE '%$seek%'";
$zong_res=mysql_query($zong_sql);
$zong_arr=mysql_fetch_assoc($zong_res);
$zong=ceil($zong_arr['num']/5);


$start=($page-1)*5;
$sql="SELECT * FROM demo2 WHERE username LIKE '%$seek%' limit $start,5";
$res=mysql_query($sql);

 ?>
 <?php 
 	while ($arr=mysql_fetch_assoc($res)) {
 		echo "<tr>";
 			echo "<td><input type='checkbox' name='box' value='{$arr['id']}'></td>";
 			echo "<td>".$arr['id']."</td>";
 				  
 			echo "<td>".str_replace($seek,"<font color='red' style='font-size:18px'>".$seek."</font>",$arr['username'])."</td>";
 			echo "<td>".$arr['sex']."</td>";
 			echo "<td>".$arr['tel']."</td>";
 			echo "<td>".$arr['xueli']."</td>";
 			echo "<td>".$arr['school']."</td>";
 			if ($arr['hh']==1) {
 				echo "<td><a href='javascript:void(0)' onclick=update({$arr['hh']},2)>上架</a></td>";
 			}else{
 				echo "<td><a href='javascript:void(0)' onclick=updat({$arr['hh']},1)>下架</a></td>";
 			}
 			echo "<td><a href='javascript:void(0)' onclick=del(".$arr['id'].",".$page.")>删除</a>
 			</td>";
 		echo "</tr>";
 	}
	// echo "<tr>";
	// 	echo "<td colspan='5'>当前页位：".$page."页
	// 			<a href='javascript:void(0)' onclick='t_body(1)'>首页</a>
	// 			<a href='javascript:void(0)' onclick='t_body(".$page."-1)'>上一页</a>
	// 			<a href='javascript:void(0)' onclick='t_body(".$page."+1)'>上一页</a>
	// 			<a href='javascript:void(0)' onclick='t_body(".$zong.")'>尾页</a>
	// 			当前页位：".$zong."页</td>";
	// 	echo "<input type='hidden' id='yc' value='".$zong."'>";
	// echo "</tr>";
?>
<tr>
	<td colspan="5">当前页位：<?php echo $page ?>页
			<a href='javascript:void(0)' onclick='t_body(1)'>首页</a>
			<a href='javascript:void(0)' onclick='t_body(<?php echo $page-1 ?>)'>上一页</a>
		
			<a href='javascript:void(0)' onclick='t_body(<?php echo $page+1 ?>)'>下一页</a>
			<a href='javascript:void(0)' onclick='t_body(<?php echo $zong ?>)'>尾页</a>
			当前页位：<?php echo $zong?>
			<button onclick="pi(<?php echo $page?>)">批删</button>
	</td>
</tr>