<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<input type="text" id="sou"><button onclick="ajax(1)">搜索</button>
	<table border="1">
		<thead>
			<th>ID</th>
			<th>标题</th>
			<th>名称</th>
			<th>次数</th>
			<th>创作时间</th>
			<th>操作</th>
		</thead>
		<tbody id="body">
		
			
		</tbody>
		
	</table>
		<div id="show_div">
			
		</div>
</center>
<script>
	function ajax(p){
		var sou=document.getElementById('sou').value;
		var xhr=new XMLHttpRequest();
		var str="";
		var strpage="";
		u="<?php echo U('Home/Index/ajax');?>?p="+p+"&sou="+sou;
		xhr.open('get',u );
		xhr.send();
		xhr.onreadystatechange=function (){
			if (xhr.readyState==4&&xhr.status==200) {

				arr=JSON.parse(xhr.responseText);
				// console.log(arr)
				// return
				for (var i = 0; i < arr.list.length; i++) {
					str+="<tr>"+
					"<td>"+arr['list'][i]['id']+"</td>"+
					"<td>"+arr['list'][i]['username']+"</td>"+
					"<td>"+arr['list'][i]['number']+"</td>"+
					"<td>"+arr['list'][i]['time']+"</td>"+
				
				"</tr>";
				}
				
				document.getElementById('body').innerHTML=str;
				strpage="<tr>"+
						"<td colspan='6' align='center'>"+
						"<a href='javascript:ajax("+arr['page_num']['up']+")'>上页</a>"+
						"<a href='javascript:ajax("+arr['page_num']['next']+")'>下页</a>"+
						"</td>"+
						"</tr>";

				document.getElementById('show_div').innerHTML=strpage;
			}
		}
	}
	ajax(1)
</script>
</body>
</html>