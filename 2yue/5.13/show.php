<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sql="select * from zuce";
$res=mysql_query($sql);

 ?>
<center>
	<table border="1">
		<th>选择</th>
		<th>id</th>
		<th>姓名</th>
		<th>班级</th>
		<th>性别</th>
		<th>邮箱</th>
		<th>城市</th>
		<th>学院</th>
		<th>课程</th>
		<th>简介</th>
		<th>操作</th>
		<?php 
		while ($arr=mysql_fetch_assoc($res)) {
			echo "<tr>";
				echo "<td><input type='checkbox' name='box' value='{$arr['id']}'></td>";
				echo "<td>".$arr['id']."</td>";
				echo "<td>".$arr['name']."</td>";
				echo "<td>".$arr['class']."</td>";
				echo "<td>".$arr['sex']."</td>";
				echo "<td>".$arr['email']."</td>";
				echo "<td>".$arr['city']."</td>";
				echo "<td>".$arr['school']."</td>";
				echo "<td>".$arr['course']."</td>";
				echo "<td>".$arr['cont']."</td>";

				echo "<td><a href='javascript:void(0)' onclick=js_del({$arr['id']})>删除</a></td>";

			echo "</tr>";
		}
		 ?>

	</table>
	 <button onclick="dianji()">全选</button>&nbsp;&nbsp;<button onclick="stop()">反选</button>&nbsp;&nbsp;<button onclick="buxuan()">全不选</button>
	 <input type="button" value="批量删除" onclick="js_del_all()">
</center>
<script>
	function js_del(id){
		// alert("del.php?id="+id)
		if(confirm('您确认要删除吗')){
			location.href="delete.php?id="+id
		}
	}

	function js_del_all(){
		if(confirm('您确认要删除吗')){
			//找到所有的复选框
			var box = document.getElementsByName('box')
			//
			var ids = ''
			for(var i = 0; i < box.length; i++){
				if(box[i].checked == true){
					ids+=box[i].value+','
				}
			}

			location.href = "delete.php?id="+ids
		}
		
	}


	function dianji(){
		 box=document.getElementsByName('box')
		for (var i = 0; i < box.length; i++) {
			box[i].checked=true;
		};
	}
	
	function stop(){
		 box=document.getElementsByName('box')
		for (var i = 0; i < box.length; i++) {
			if (box[i].checked==true) {


			box[i].checked=false;
		}else{
			box[i].checked=true;
		}
	}
}
	function buxuan(){
		 box=document.getElementsByName('box')
		for (var i = 0; i < box.length; i++) {
			box[i].checked=false;
		};
	}
	
	// function stop(){
	// 	 box=document.getElementsByName('box')
	// 	for (var i = 0; i <box.length; i++) {
	// 		if (box[i].checked==true;) {
	// 			box[i].checked=false;
	// 		}else{
	// 			box[i].checked=true;
	// 		}
	// 	};
	// }
	// function piliang(){
	// 	box=document.getElementsByName('box')
	// 	ids=''
	// 	for (var i = 0; i < box.length; i++) 
	// 	{
	// 		if (box[i].checked==true) 
	// 			{
	// 				ids+=box[i].value+','
	// 			}
	// 	}
	// 	<?php echo "<a href='delete.php?id={$arr['id']}'>删除</a>" ?>
	// 	//location.href="delet.php?id="+ids
	// }
</script>