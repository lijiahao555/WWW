<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>展示</title>
</head>
<body>
<center>
学生名字<input type="text" id="name"><button onclick="t_body(1)">查询</button>
	<table border="1">
		<thead>
			<th>请选择</th>
			<th>学生学号</th>
			<th>学生姓名</th>
			<th>违纪类型</th>
			<th>班主任</th>
			<th>讲师</th>
			<th>班级</th>
			<th>违纪时间</th>
			<th>记录人</th>
			<th>状态</th>
		</thead>
		<tbody id="t_body">
			
		</tbody>
		<tr>
			<td>
				<select id="s" onchange="sou(1)">
			
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
				</select>
			</td>
		</tr>
	</table>
</center>
</body>
<script>
	function t_body(page){
		var name=document.getElementById('name').value;
		var s=document.getElementById('s').value;

		var xhr=new XMLHttpRequest();
		xhr.open('get','show.php?page='+page+'&name='+name+'&s='+s);
		xhr.send(null);
		xhr.onreadystatechange=function(){
			if (xhr.readyState==4&&xhr.status==200) {
				document.getElementById('t_body').innerHTML=xhr.responseText;
			};
		}
	}
	t_body(1)

	function sou(a){
		var s=document.getElementById('s').value;
		
		var xhr=new XMLHttpRequest();
		xhr.open('get','show.php?a='+a+'&s='+s);
		xhr.send(null);
		xhr.onreadystatechange=function(){
			if (xhr.readyState==4&&xhr.status==200) {

				document.getElementById('t_body').innerHTML=xhr.responseText;
			};
		}
	}


	function dianji(page){
		var s=document.getElementById('s').value;

		var xhr=new XMLHttpRequest();
		xhr.open('get','show.php?page='+page+'&s='+s);
		xhr.send(null);
		xhr.onreadystatechange=function(){
			if (xhr.readyState==4&&xhr.status==200) {
				t_body(page);
			};
		}
	}


</script>
</html>