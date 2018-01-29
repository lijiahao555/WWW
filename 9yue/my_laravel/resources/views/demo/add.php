<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<style>
	td{text-align: center;}
</style>
</head>
<body>
	<form action="test" method="post">
		<table>
			<tr>
				<td>内容</td>
				<td><textarea name="content" id="" cols="30" rows="5"></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" value="添加"></td>
				<td></td>
			</tr>
			<input type="hidden" name="add_name" value="<?=Cookie::get('name');?>">
		</table>
	</form>
</body>
</html>
<hr>
<h4>当前登录人：<font color="red"><?=Cookie::get('name');?></font>&nbsp;&nbsp;<a href="login">退出</a></h4>
<table width="500px">
	<th>ID</th>
	<th>内容</th>
	<th>添加人</th>
	<th>操作</th>
	<?php foreach ($data as $key => $v): ?>
		<tr>
			<td><?=$v->id ?></td>
			<td><?=$v->content ?></td>
			<td><?=$v->add_name ?></td>
			<td><a href="del?id=<?=$v->id ?>">删除</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="up?id=<?=$v->id ?>">修改</a></td>
		</tr>
	<?php endforeach ?>
	<tr>
		<td><a href="<?=$first_page_url?>">首页</a></td>
		<td><a href="<?=$prev_page_url?>">上一页</a></td>
		<td><a href="<?=$next_page_url?>">下一页</a></td>
		<td><a href="<?=$last_page_url?>">尾页</a></td>
	</tr>
</table>