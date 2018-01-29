<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
	<h2>欢迎<font color="red"><?php echo $name ?></font><?php echo $role_name ?>登录</h2>
		<table border="1">
			<th>申请类型</th>
			<th>编号</th>
			<th>申请人</th>
			<th>申请时间</th>
			<th>申请内容</th>
			<th>起始时间</th>
			<th>结束时间时间</th>
			<th>审核状态</th>
			<?php foreach ($data as $key => $v): ?>
				<tr>
					<td><?php echo $v['infor_title'] ?></td>
					<td><?php echo $v['infor_id'] ?></td>
					<td><font color="red"><?php echo $v['user_name'] ?></font></td>
					<td><?php echo $v['infor_time'] ?></td>
					<td><?php echo $v['infor_content'] ?></td>
					<td><?php echo $v['infor_start'] ?></td>
					<td><?php echo $v['infor_stop'] ?></td>
					<td>
						<?php if ($v['is_ban']==0): ?>
							<font color="purple">待审核</font>
						<?php elseif($v['is_ban']==1): ?>
							<font color="green">正在审核中</font>
						<?php elseif($v['is_ban']==2): ?>
							<font color="red">审核已通过</font>
						<?php elseif($v['is_ban']==3): ?>
							<font color="yellow">审核未通过(班主任)</font>
						<?php elseif($v['is_ban']==4): ?>
							<font color="blue">审核未通过(主任)</font>
						<?php endif ?>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
			<tr>
			<td><a href="<?php echo site_url('Demo/demo') ?>">返回主界面</a></td>
			<td><a href="<?php echo site_url('Login/login') ?>">退出登录</a></td>
		</tr>
	</center>
</body>
</html>