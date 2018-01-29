<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
<input type="text" id="sou"><button onclick="ajax(1)">搜索</button>
	<table border="2">
		<thead>
			<th></th>
			<th>ID</th>
			<th>名字</th>
			<th>价格</th>
			<th>状态</th>
		</thead>
		<tbody id="box">
			
		</tbody>
	</table>
</center>
</body>
<script>
	function ajax(p){
		sou=document.getElementById('sou').value
		var xhr=new XMLHttpRequest();
		xhr.open('get', '/3yue/6.28/index.php/Home/Index/ajax/p/'+p+'/sou/'+sou);
		xhr.send();
		xhr.onreadystatechange=function(){
			if (xhr.readyState==4&&xhr.status==200) {
				document.getElementById('box').innerHTML=xhr.responseText;
			};
		}
	}
	ajax(1)
	function chang(th,p){
		var chang=th.value
		if (chang==0) {
			return false;
		}; 
		var box=document.getElementsByName('box');
		var id='';
		for (var i = 0; i < box.length; i++) {
			if (box[i].checked==true) {
				id+=box[i].value+',';
			};
		};

		if (chang=='删除') {
			url='/3yue/6.28/index.php/Home/Index/chang/id/'+id;
		}else{
			url='/3yue/6.28/index.php/Home/Index/stop/id/'+id;

		}
		// alert(url)
		var xhr=new XMLHttpRequest();
		xhr.open('get', url);
		xhr.send();
		xhr.onreadystatechange=function(){
			if (xhr.readyState==4&&xhr.status==200) {
				ajax(p)
			};
		}
	}
</script>
</html>