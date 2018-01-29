<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
	<h3><font color="red">无限极分类展示</font></h3>
		<table border="1">
			<th>ID</th>
			<th>地区</th>
			<?php foreach ($data as $key => $v): ?>
				<tr>
					<td><?php echo $v['id'] ?></td>
					<td><?php echo str_repeat('-',(substr_count($v['new_path'],'-')-1)*2) ?><?php echo $v['name'] ?></td>
				</tr>
			<?php endforeach ?>
		</table>
		<hr>
		<h3><font color="red">无页面刷新搜索</font></h3>
		<input type="text" id="search"><input type="button" id="sou" value="搜索">
		<hr width="500">
		<div id="show">
			
		</div>
	</center>
</body>
</html>
<script src="<?php echo base_url('public/jquery.js') ?>"></script>
<script>
	$(document).on('click', '#sou', function() {
		var search = $('#search').val();
		var _show="";
		if (search=='') {
			alert('不能为空');
			return 
		}
		$.ajax({
			url: "<?php echo site_url('Demo/ajax') ?>",
			type: 'post',
			dataType: 'json',
			data: {search:search},
			success:function(msg){
				if (msg!='no') {
						_show="<table border='1'>";
					for(k in msg){
						_show+="<tr>\
								<td>"+msg[k]['id']+"</td>\
								<td>"+msg[k]['name']+"</td>\
							   </tr>";
					}
					_show+="</table>";
					$('#show').html(_show)
				}else{
					alert('搜索内容不存在')
				}
			}
		})
		
	});
</script>