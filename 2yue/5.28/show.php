<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sou=!empty($_GET['sou'])?$_GET['sou']:'';
$page=!empty($_GET['page'])?$_GET['page']:1;
$pianyi=ceil($page-1)*5;

$zong_sql="select count(*) as num from news where news_title like '%$sou%'";
$zong_res=mysql_query($zong_sql);
$zong_arr=mysql_fetch_assoc($zong_res);
$zong=ceil($zong_arr['num']/5);

$sql="select * from news inner join news_type on news.type_id=news_type.type_idd where news_title like '%$sou%' limit $pianyi,5";
$res=mysql_query($sql);
 ?>

<?php 
while ($arr=mysql_fetch_assoc($res)) {
	echo "<tr>";
		echo "<td><input type='checkbox' name='box' value='{$arr['news_id']}'></td>";
		echo "<td>".$arr['news_id']."</td>";
		echo "<td>".str_replace($sou, "<font color='red' size='3px'>$sou</font>",$arr['news_title'])."</td>";
		echo "<td>".$arr['type_name']."</td>";
		echo "<td>".$arr['news_author']."</td>";
		echo "<td>".str_replace( substr($arr['news_content'], 30), '*****', $arr['news_content'])."</td>";
		echo "<td><img src='{$arr['news_file']}' width='50'></td>";
		echo "<td>".$arr['news_addtime']."</td>";
		echo "<td><a href='javascript:void(0)' onclick='del({$arr['news_id']},$page)'>删除</td>";

	echo "<tr>";
}
 ?>
 <tr>
 	<td colspan="9" align="center">
 		当前<?php echo $page?>页
 		<a href="javascript:void(0)" onclick="t_body(1)">首页</a>
 		<a href="javascript:void(0)" onclick="t_body(<?php echo $page-1?>)">上一页</a>
 		<a href="javascript:void(0)" onclick="t_body(<?php echo $page+1?>,<?php echo $zong ?>)">下一页</a>
 		<a href="javascript:void(0)" onclick="t_body(<?php echo $zong?>)">尾页</a>
 		<input type="hidden" id="yc" value="<?php echo $zuhe?>">
 		共<?php echo $zong?>页
 	</td>
 </tr>
 <tr align="center">
 	<td colspan="9">
 		<a href="javascript:void(0)" onclick="quan()">全选</a>
 		<a href="javascript:void(0)" onclick="fan()">反选</a>
 		<a href="javascript:void(0)" onclick="buxuan()">全不选</a>
 		<a href="javascript:void(0)" onclick="pi(<?php echo $page ?>)">批删</a>
 	</td>
 </tr>
