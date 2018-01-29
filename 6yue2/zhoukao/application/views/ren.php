<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
	<h2>欢迎<font color="red"><?php echo $name ?></font><?php echo $role_name ?>审批</h2>
		<table border="1" id="show">
			<th>申请类型</th>
			<th>编号</th>
			<th>申请内容</th>
			<th>起始时间</th>
			<th>结束时间时间</th>
			<th>审核状态</th>
			<th>操作</th>
			<?php foreach ($data as $key => $v): ?>
				<tr >
					<td><?php echo $v['infor_title'] ?></td>
					<td><?php echo $v['infor_id'] ?></td>
					<td><?php echo $v['infor_content'] ?></td>
					<td><?php echo $v['infor_start'] ?></td>
					<td><?php echo $v['infor_stop'] ?></td>
					<td>
						<?php if ($v['is_ban']==1): ?>
							<font color="purple">待审核</font>
						<?php endif ?>
					</td>
					<td>
						<a href="javascript:;" id="is_show" infor_id="<?php echo $v['infor_id'] ?>" status="1">通过</a>|<a href="javascript:;" id="is_show" infor_id="<?php echo $v['infor_id'] ?>" status="2">不通过</a>
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
<script src="<?php echo base_url('public/jquery.js') ?>"></script>
<script>
	$(document).on('click', '#is_show', function() {
		var infor_id=$(this).attr('infor_id');
		var status=$(this).attr('status');
		_this=$(this).parent().parent().remove();
		$.ajax({
			url: "<?php echo site_url('Demo/renDo') ?>",
			type: 'get',
			dataType: 'json',
			data: {infor_id:infor_id,status:status},
			success:function(msg){
				if (msg=='ok') {
					_this
				}
			}
		})
	});
</script>