<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<table border="2">
		<tr>
			<td>ID</td>
			<td>姓名</td>
			<td>操作</td>
		</tr>
		<?php foreach ($data as $key => $v): ?>
			<tr>
				<td><?php echo $v['id'] ?></td>
				<td><?php echo $v['name'] ?></td>
				<td><a href="javascript:void(0);" class="del" data-id="<?php echo $v['id'] ?>">删除</a></td>
			</tr>
		<?php endforeach ?>
	</table>
	
</center>
</body>
</html>
<script src="<?php echo base_url('public/jquery.js') ?>"></script>
<script>
	$('.del').click(function(){
		del_id=$(this).data('id');
		_this=$(this);
		
		$.ajax({
		   type: "get",
		   url: "<?php echo site_url() ?>/Exam/del_id",
		   data: {del_id:del_id},
		   success: function(msg){
		     if (msg=='ok') {
		     	_this.parent().parent().remove();
		     };
		   }
		});
	})
</script>