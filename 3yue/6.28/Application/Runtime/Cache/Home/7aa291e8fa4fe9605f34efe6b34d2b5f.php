<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<table>
			<thead>
				<th>ID</th>
				
				<th>图片</th>
				<th>内容</th>
				
			</thead>
			<tbody id="body">
				<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
						<td><?php echo ($v['id']); ?></td>
						<td><img src="/3yue/6.28/<?php echo ($v['img_path']); ?>" width="50"></td>
						<td><?php echo ($v['content']); ?></td>
						
					</tr><?php endforeach; endif; ?>

			</tbody>
		</table><a href="/3yue/6.28/index.php/Home/Log/show">返回展示页面</a>
	</center>
</body>
</html>