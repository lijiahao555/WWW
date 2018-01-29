<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update</title>
</head>
<body>
	<form action="<?= site_url('Index/index_c/audit_update_do') ?>" method='post'>
		<table border="1" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td>作品名称</td>
				<td>
					<input type="text" value="<?= $work['works_name'] ?>" name="works_name">
				</td>
			</tr>
			<tr>
				<td>表演时间</td>
				<td>
					<input type="text" value="<?= $work['works_time'] ?>" name="works_time">
				</td>
			</tr>
			<tr>
				<td>表演人员</td>
				<td>
					<input type="text" value="<?= $work['works_member'] ?>" name="works_member">
				</td>
			</tr>
			<tr>
				<td>排序</td>
				<td>
					<input type="text" value="<?= $work['works_sort'] ?>" name="works_sort">
				</td>
			</tr>
			<tr>
				<td>所属分类</td>
				<td>
					<select name="type_id">
						<option value="">请选择...</option>
						<?php foreach ($type as $key => $value): ?>
							<option <?php if ($work['type_id']==$value['type_id']): ?>selected<?php endif ?> value="<?= $value['type_id'] ?>"><?= str_repeat('&nbsp',$value['level']*3) ?><?= $value['type_name'] ?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="Update">
					<input type="hidden" name="works_id" value="<?= $work['works_id'] ?>">
				</td>
			</tr>
		</table>
	</form>
	<center>
		<a href="<?= site_url('Index/index_c/index') ?>">首页</a>
	</center>
</body>
</html>