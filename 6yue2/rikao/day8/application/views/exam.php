<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
	<select id="change">
			<option value="0">请选择</option>
		<?php foreach ($data as $key => $v): ?>
			<option value="<?php echo $v['goods_type_id'] ?>"><?php echo $v['type_name'] ?></option>
		<?php endforeach ?>
	</select>
		<table id="show" border="1">
			
		</table>
	</center>
</body>
</html>
<script src="<?php echo base_url('public/jquery.js') ?>"></script>
<script>
	$(document).on('change', '#change', function() {
		var id=$(this).val();
		var _table=""
		$.ajax({
			url: "<?php echo site_url('Exam/change') ?>",
			type: 'post',
			dataType: 'json',
			data: {id:id},
			success:function(msg){
				for(k in msg){
					_table+="<tr>\
								<td>"+msg[k]['attribute_id']+"</td>\
								<td>"+msg[k]['attribute_name']+"</td>\
								<td>"+msg[k]['attribute_values']+"</td>\
								<td>"+msg[k]['sort']+"</td>\
							</tr>"

				}
				$('#show').html(_table)
				
			}
		})
	});
</script>