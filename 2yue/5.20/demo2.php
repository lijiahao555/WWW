 <?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');

$sh_num=!empty($_GET['num'])?$_GET['num']:1;
$sh_num1=5;
$sh_num3=($sh_num-1)*$sh_num1;

$sql="select * from demo2 limit $sh_num3,$sh_num1";
$res=mysql_query($sql);
 
$s_sql="select count(*) as num1 from demo2";
$s_res=mysql_query($s_sql);
$zong = mysql_fetch_assoc($s_res);
$zu = ceil($zong['num1']/$sh_num1);

 ?>
 <center>
 <style>
 a{text-decoration: none};

 </style>
 <form action="select.php" method="post">
 	 <input type="text" name="name" placeholder="根据名字搜索"><input type="submit">
 </form>

 	<table border="1">
 		<th></th>
 		<th>ID</th>
 		<th>姓名</th>
 		<th>性别</th>
 		<th>出生年月</th>
 		<th>身份证号</th>
 		<th>头像</th>
 		<th>手机</th>
 		<th>邮箱</th>
 		<th>学历</th>
 		<th>毕业院校</th>
 		<th>毕业时间</th>
 		<th>精通语言</th>
 		<?php 
 		while ($arr=mysql_fetch_assoc($res)) {
 		echo "<tr>";
 			echo "<td><input type='checkbox' name='box' value='{$arr['id']}'></td>";
 			echo "<td>".$arr['id']."</td>";
 			echo "<td>".$arr['username']."</td>";
 			echo "<td>".$arr['sex']."</td>";
 			echo "<td>".$arr['month']."</td>";
 			echo "<td>".$arr['card']."</td>";
			echo "<td><img src='{$arr['file']}' width='200' height='50' alt=''></td>";
 			echo "<td>".$arr['tel']."</td>";
 			echo "<td>".$arr['email']."</td>";
 			echo "<td>".$arr['xueli']."</td>";
 			echo "<td>".$arr['school']."</td>";
 			echo "<td>".$arr['time']."</td>";
 			echo "<td>".$arr['box']."</td>";
 			echo "<td>
 			<a href='javascript:void(0)' onclick=js_delete({$arr['id']})>删除</a>
 			<a href=down.php?xiazai={$arr['file']}>下载</a>
 			</td>";
 		echo "</tr>";
 		}
 		 ?>
 	</table>
 	<button onclick="quanxuan()">全选</button><button onclick="quanbuxuan()">全部选</button><button onclick="fanxuan()">反选</button><button onclick="pishan()">批量删除</button></br>
	<span>当前页面为<?php echo $sh_num?>页</span>
	
	<a href="show.php?num=1">首页</a>
 	<?php 
 	if ($sh_num==1) {
 		echo "<a href=javascript:alert('已经是第一页了')>上一页</a>";
 	}else{
 		echo "<a href=show.php?num=".($sh_num-1).">上一页</a>";
 	}
 	
 	?>

 	<?php 
 	if ($zu==$sh_num) {
 		echo "<a href=javascript:alert('已经最后了')>下一页</a>";
 	}else{
		echo "<a href=show.php?num=".($sh_num+1).">下一页</a>";
 	}
 	
 	?>
 	<!-- <a href="show.php?num=<?php //echo $sh_num+1?>">下一页</a> -->
 
 	<a href="show.php?num=<?php echo $zu?>">尾页</a><br>

 	<a href="demo.html">继续添加</a>
 <script>
 function js_delete(id){
 	if (confirm('您确认要删除么')) {
 		location.href='delete.php?id='+id;
 	};
 }

  function pishan(){
 	if (confirm('您确认要删除么')) {
 		var box=document.getElementsByName('box');
 		var pi='';
 		for (var i = 0; i < box.length; i++) {
 			if (box[i].checked==true) {
 				pi+=box[i].value+',';
 			};
 		};
 		location.href="delete.php?id="+pi;
 	};
 }
function quanxuan(){
	var box=document.getElementsByName('box');
	for (var i = 0; i < box.length; i++) {
		box[i].checked=true
	};
}

function quanbuxuan(){
	var box=document.getElementsByName('box');
	for (var i = 0; i < box.length; i++) {
		box[i].checked=false;
	};
}

	
	
 function fanxuan(){
 	box=document.getElementsByName('box')
 	for (var i = 0; i < box.length; i++) {
 		if (box[i].checked==true) {
 			box[i].checked=false;
 		}else{
 			box[i].checked=true;
 		}
 	}
 }
	
 </script>
 </center>