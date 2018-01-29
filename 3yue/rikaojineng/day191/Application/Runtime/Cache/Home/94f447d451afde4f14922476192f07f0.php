<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<div><h2>欢迎<font color="red"><?php echo ($_COOKIE["name"]); ?></font>登录</h2></div>
		<div><button onclick="location.href='/3yue/rikaojineng/day191/index.php/Home/Show/add'">添加相册</button><button>上传图片</button></div>
	<div id="box">
		
	</div>
</center>
</body>
<script>
	function ajax(p){
		var xhr=new XMLHttpRequest();
		xhr.open('get','/3yue/rikaojineng/day191/index.php/Home/Show/ajax/p/'+p);
		xhr.send();
		xhr.onreadystatechange = function (){
			if (xhr.readyState==4&&xhr.status==200) {
				document.getElementById('box').innerHTML=xhr.responseText;
				// alert();
			};
		}
	}
	ajax(1)
</script>
</html>