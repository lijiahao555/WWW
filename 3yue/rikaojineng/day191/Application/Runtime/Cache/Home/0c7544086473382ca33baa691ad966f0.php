<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="/3yue/rikaojineng/day191/index.php/Home/Show/addDo" method="post" enctype="multipart/form-data" onsubmit="return sub()">
		<table border="8">
			<tr>
				<td>相册名称</td>
				<td><input type="text" name="name" onblur="ck_name(this)"><span id="ckr_name"></span></td>
			</tr>
			<tr>
				<td>相册封面</td>
				<td><input type="file" name="file"></td>
			</tr>
			<tr>
				<td>相册描述</td>
				<td>
					<textarea name="count" cols="20" rows="5"></textarea>
				</td>
			</tr>
			<tr>
				<td>是否公开</td>
				<td>
					<input type="radio" name="on" value="1">公开
					<input type="radio" name="on" value="0">不公开
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="提交"></td>
			</tr>
		</table>
	</form>
</center>
</body>
<script>
	window.isname=false; 
	function ck_name(th){
		name=th.value;
		if (name=='') {
			document.getElementById('ckr_name').innerHTML="不能为空";
			return false;
		};
		var xhr=new XMLHttpRequest();
		xhr.open('get', '/3yue/rikaojineng/day191/index.php/Home/Show/xiao/name/'+name);
		xhr.send();
		xhr.onreadystatechange=function (){
			if (xhr.readyState==4&&xhr.status==200) {
				if (xhr.responseText==1) {
					document.getElementById('ckr_name').innerHTML="√";
					window.isname=true;
				}else{
					document.getElementById('ckr_name').innerHTML="存在";
					window.isname=false;
				}
				// alert(xhr.responseText);
			};
		}
	}
	function sub(){
			if (window.isname==true) {
				return true;
			}else{
				return false;

			}
		}
</script>
</html>