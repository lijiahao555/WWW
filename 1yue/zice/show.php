<?php 
header('content-type:text/html;charset=utf8');

mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');
mysql_query('set names utf8');
$sql="select * from news";

$res=mysql_query($sql);

 ?>
 <center>
 <table border="1">
 	<th>序号</th>
 	<th>新闻标题</th>
 	<th>新闻作者</th>
	<th>所属类型</th>
 	<th>新闻状态</th>
 	<th>添加时间</th>
 	<th>新闻内容</th>
 	<th>操作</th>
 	<?php 
 	while ($arr=mysql_fetch_assoc($res)) {
 		echo "<tr>";
 			echo "<td>".$arr['news_id']."</td>";
 			echo "<td>".$arr['news_title']."</td>";
 			echo "<td>".$arr['news_author']."</td>";
 			if ($arr['news_status']==1) {
 				echo "<td><a href='update.php?news_id={$arr['news_id']}&&news_status=0'>发布</a></td>";
 			}else{
 				echo "<td><a href='update.php?news_id={$arr['news_id']}&&news_status=1'>未发布</a></td>";
 			}
 			echo "<td>".$arr['news_type']."</td>";
 			echo "<td>".$arr['news_addtime']."</td>";
 			echo "<td>".$arr['news_content']."</td>";
 			echo "<td><a href='delete.php?a={$arr['news_id']}'>删除</a></td>";
 		echo "</tr>";
 	}


 	 ?>
 </table>
 </center>