<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<table border="1">
		<thead>
			<th>学生ID</th>
			<th>学生姓名</th>
			<th>学生年龄</th>
			<th>学生性别</th>
			<th>学生电话</th>
			<th>学生邮箱</th>
			<th>学生爱好</th>
			<th>学生简介</th>
			<th>学生课程</th>
			<th>个人信息操作</th>
			<th>课程操作</th>
		</thead>
		<tbody id="body">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($v["admin_id"]); ?></td>
					<td><?php echo ($v["admin_name"]); ?></td>
					<td><?php echo ($v["infor_age"]); ?></td>
					<td><?php echo ($v["infor_sex"]); ?></td>
					<td><?php echo ($v["infor_tel"]); ?></td>
					<td><?php echo ($v["infor_email"]); ?></td>
					<td><?php echo ($v["infor_hobby"]); ?></td>
					<td><?php echo ($v["infor_content"]); ?></td>
					<td><?php echo ($v["class_name"]); ?></td>
					<td><a href="<?php echo U('Infor/up');?>?id=<?php echo ($v["infor_id"]); ?>">修改</a></td>
					<td><a href="<?php echo U('Class/up');?>?id=<?php echo ($v["admin_id"]); ?>">修改</a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<a href="<?php echo U('Class/choice');?>">返回选择查看页面</a>&nbsp;&nbsp;<a href="<?php echo U('Admin/admin');?>">返回登录页面</a>
</center>
</body>
</html>