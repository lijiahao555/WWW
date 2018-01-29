<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>day10技能</title>
</head>
<body>
<center>
<input type="text" id="sou" placeholder="根据姓名找对象"><button onclick="t_body">搜索</button>
	<table border="1">
		<tbody id="t_body">
			
		</tbody>
	</table>
</center>
</body>
<script>
	function t_body(page,sou){
		var sou=document.getElementById('sou').value;
		var xhr=new XMLHttpRequest();
		xhr.open('get', 'show.php?page='+page+'&sou='+sou);
		xhr.send(null);
		xhr.onreadystatechange=function (){
			if (xhr.readyState==4&&xhr.status==200) {
				document.getElementById('t_body')innerHTML=xhr.responseText;
			};
		}
	}
	t_body(page);

	function dian(page){
		var xhr=new XMLHttpRequest();
		xhr.open('get', 'show.php?page='+page);
		xhr.send(null);
		xhr.onreadystatechange=function (){
			if (xhr.readyState==4&&xhr.status==200) {
				document.getElementById('t_body')innerHTML=xhr.responseText;
			};
	}
</script>
</html>