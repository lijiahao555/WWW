<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>列表展示</title>
</head>
<body>
<center>
<input type="text" id="sou">
<select id="shang">
<option value="2">是否显示</option>
<option value="1">是</option>
<option value="0">否</option>
</select>
<button onclick="ajax(1)">搜索</button>
	<table border="1">
		<thead>
			<th>品牌名称</th>
			<th>品牌网址</th>
			<th>品牌描述</th>
			<th>排序</th>
			<th>是否显示</th>
			<th>操作</th>
		</thead>
		<tbody id="box">
			
		</tbody>
	</table>
</center>
</body>
<script>
	function ajax(p){
		var sou=document.getElementById('sou').value;
		
		var shang=document.getElementById('shang').value;
		// if (shang==2) {
		// 	return false;
		// }
	
		var xhr=new XMLHttpRequest();
		xhr.open('get','/3yue/yuekao/index.php/Home/Index/ajax/p/'+p+'/shang/'+shang+'/sou/'+sou);
		xhr.send();
		xhr.onreadystatechange=function(){
			if (xhr.readyState==4&&xhr.status==200) {
				document.getElementById('box').innerHTML=xhr.responseText;
				
			};
		}
	}	
	ajax(1);
</script>
</html>