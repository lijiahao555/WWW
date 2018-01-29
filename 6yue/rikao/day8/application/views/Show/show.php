<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<table border="1">
			<thead>
				<tr>
					<td>分类</td>
					<td>
						<select class="change">
								<option value="">请选择</option>
							<?php foreach ($data as $key => $v): ?>
								<option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
							<?php endforeach ?>
						</select>
					</td>
				</tr>
			</thead>
			<tbody id="show">
		</tbody>
		</table>
	</center>
</body>
</html>
<script src="<?php echo base_url('public/jquery.js')?>"></script>
<script>
	$(document).on('change', '.change', function() {
		id=$(this).val();
		_tr="";
		if (id!='') {
			$.ajax({
			   type: "get",
			   url: "<?php echo site_url('Show/ajax')?>",
			   data: {id:id},
			   dataType: 'json',
			   success: function(msg){
			   		for( var i=0; i < msg.length ; i++){
			   			_tr+="<td>\
										<input type='text'>\
									</td>\
			   						<td>\
										<select>\
											<option>"+msg[i]['name']+"</option>\
										</select>\
									</td>"
			   		}
			   		$('#show').html(_tr);
			   }
			});
		}
	});
</script>