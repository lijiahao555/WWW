<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>展示</title>
</head>
<body>
<center>
	<table border="1">
		<th>ID</th>
		<th>名字</th>
		<th>数量</th>
		<th>价格</th>
		<th>简介</th>
		{foreach $sql as $a}
			<tr>
				<td>{$a['id']}</td>
				<td>{$a['name']}</td>
				<td>{$a['number']}</td>
				<td>{$a['price']}</td>
				<td>{$a['count']}</td>
			</tr>
		{/foreach}
	</table>
</center>
</body>
</html>