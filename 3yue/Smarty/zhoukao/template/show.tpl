<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>展示</title>
</head>
<body>
<center>
	<table border="1">
		<tr>
		<td>ID</td>
		<td>商品名称</td>
		<td>品牌网址</td>
		<td>LOGO</td>
		<td>描述</td>
		<td>排序</td>
		<td>操作</td>
		</tr>
		{foreach $sql as $v}
			<tr>
				<td>{$v['id']}</td>
				<td>{$v['name']}</td>
				<td>{$v['email']}</td>
				<td><img src="{$v['logo']}" width="100"></td>
				<td>{$v['count']}</td>
				<td>{$v['oder']}</td>
				<td><a href="delete.php?id={$v['id']}">删除</a></td>
			</tr>
		{/foreach}
	</table>
	<a href="form.php">继续添加</a>
</center>
</body>
</html>