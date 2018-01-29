<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>展示</title>
</head>
<body>
<center>
<input type="text" id="sousuo" value="{$sousuo}"><button onclick="t_body(1)">搜索</button>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>姓名</td>
			<td>性别</td>
			<td>种类</td>
			<td>图片</td>
		</tr>
		{foreach $sql as $v}
			<tr>
				<td><input type="checkbox">{$v['id']}</td>
				<td>{$v['id']}</td>
				<td>{$v['name']}</td>
				<td>{$v['sex']}</td>
				<td>{$v['type']}</td>
				<td><img src="{$v['file']}" width="50"></td>				
			</tr>
		{/foreach}
	</table>
	当前{$page}页
	<button onclick="t_body(1)">首页</button>
	<button onclick="t_body({$page-1})">上一页</button>
	<button onclick="t_body({$page+1},{$zong})">下一页</button>
	<button onclick="t_body({$zong})">尾页</button>
	总{$zong}页
	<select id="i" onchange="t_body(1)">
		<option value="0">0</option>
		<option value="1">1</option>
		<option value="2">2</option>
	</select>
</center>
</body>
<script>
	function t_body(page,zong){

		if (page==0) {
			return false;
		};
		if (page>zong) {
			return false;
		};
		sousuo=document.getElementById('sousuo').value;
		i=document.getElementById('i').value;
		location.href="show.php?page="+page+'&sousuo='+sousuo+'&i='+i;
	}
	
</script>
</html>