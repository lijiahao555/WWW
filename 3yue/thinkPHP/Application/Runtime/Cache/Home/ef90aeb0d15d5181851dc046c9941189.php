<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
<input type="text" id="sou"><button onclick="page(1)">搜索</button>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>姓名</td>
			<td>违纪类型</td>
			<td>扣分</td>
			<td>时间</td>
			<td>操作</td>
		</tr>
		<tbody id="box">
			
		</tbody>
	</table>
</center>
<script>
	function page(p){
		var sou=document.getElementById('sou').value;

		var xhr=new XMLHttpRequest();
		xhr.open('get', '/3yue/thinkPHP/index.php/Home/Index/ajax/p/'+p+'/sou/'+sou);
		xhr.send(null);
		xhr.onreadystatechange=function (){
		 	if (xhr.readyState==4&&xhr.status==200) {
		 		document.getElementById('box').innerHTML=xhr.responseText;
		 	};
		}
	}
	page(1);

	function dele(id,p){

		if (confirm('删除么')) {
		var sou=document.getElementById('sou').value;

		var xhr=new XMLHttpRequest();
		xhr.open('get', '/3yue/thinkPHP/index.php/Home/Index/dele/id/'+id+'/p/'+p+'/sou/'+sou);
		xhr.send(null);
		xhr.onreadystatechange=function (){
		 	if (xhr.readyState==4&&xhr.status==200) {
		 		if (xhr.responseText==0) {
		 			alert('删除失败');
		 		}else
		 		{
		 			document.getElementById('box').innerHTML=xhr.responseText;
		 		}
		 	};
		}
		}

		
	}


</script>
</body>
</html>