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
		<th>ID</th>
		<th>姓名</th>
		<th>内容</th>
		<th>升高</th>
		<th>部门</th>
		<th>时间</th>
		<th>操作</th>
			<tbody id="body">
				
			</tbody>
			<tr>
			<td>
				<select name="" id="">
					<?php $__FOR_START_18673__=1;$__FOR_END_18673__=6;for($i=$__FOR_START_18673__;$i < $__FOR_END_18673__;$i+=1){ ?><option onclick="ajax(<?php echo ($i); ?>)"><?php echo ($i); ?></option><?php } ?>
				</select>
			</td>
		</tr>
		</table>
		
	</center>
</body>
<script>
	function ajax(p){
		sou=document.getElementById('sou').value;

		var xhr=new XMLHttpRequest();
		xhr.open('get',"<?php echo U('/Home/Index/ajax/');?>?p="+p+"&sou="+sou);
		xhr.send();
		xhr.onreadystatechange=function (){
			if (xhr.readyState==4&&xhr.status==200) {
				document.getElementById('body').innerHTML=xhr.responseText;
			};
		}
	}
	ajax(1);
</script>
</html>