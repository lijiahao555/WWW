<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');
mysql_query('set names utf8');
$sql="select a_id,a_titile,type_name,a_important,a_is_show,a_author,a_author_email,a_content,a_desc from article inner join type on article.T_id=type.type_id ";

$res=mysql_query($sql);


 ?>
<style>
	a{ text-decoration:none;}
</style>
 <center>
 <form action="shousuo.php" method="post">
 <input type="text" name="shousuo">
 <input type="submit">
 </form>
 	<table border="1">
 		<th>文章id</th>
 		<th>文章标题</th>
 		<th>文章分类</th>
 		<th>文章重要性</th>
 		<th>是否显示</th>
 		<th>文章作者</th>
 		<th>作者email</th>
 		<th>关键字</th>
 		<th>网页描述</th>
 		<th>操作</th>
 		<?php 
 		while ( $arr=mysql_fetch_assoc($res)) {
 			echo "<tr>";
 				echo "<td>".$arr['a_id']."</td>";
 				echo "<td>".$arr['a_titile']."</td>";
 				echo "<td>".$arr['type_name']."</td>";
 				if ($arr['a_important']==1) {
 					echo "<td><a href='update.php?id={$arr['a_id']}&&a_important=0' style='font-size=30px;'></a></td>";
 				}else{
 					echo "<td><a href='update.php?id={$arr['a_id']}&&a_important=1'>置顶</a></td>";
 				};
 				if ($arr['a_is_show']==1) {
 					echo "<td><a href='a.php?did={$arr['a_id']}&&a_is_show=0'>显示</a></td>";
 				}else{
 					echo "<td><a href='a.php?did={$arr['a_id']}&&a_is_show=1'>不显示</a></td>";
 				}
 				echo "<td>".$arr['a_author']."</td>";
 				echo "<td>".$arr['a_author_email']."</td>";
 				echo "<td>".$arr['a_content']."</td>";
 				echo "<td>".$arr['a_desc']."</td>";
 				echo "<td><a href='delete.php?delete={$arr['a_id']}'>删除</a></td>";
 			echo "</tr>";
 		}



 		 ?>
 	</table>
 </center>