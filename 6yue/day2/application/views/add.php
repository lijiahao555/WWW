<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
		<table border="1">
				<tr>
					<td>姓名</td>
					<td><input type="text" id="name"></td>
				</tr>
				<tr>
					<td>密码</td>
					<td><input type="text" id="pwd"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="button" value="提交" id="sub"></td>
				</tr>
		</table>
		<hr>
		<table id="box">
			
		</table>
</body>
</html>
<script src="<?php echo base_url('public/jquery.js') ?>"></script>
<script>
	$('#sub').click(function(){
		var name=$('#name').val();
		var pwd=$('#pwd').val();
		// console.log(name,pwd);
		var _tr="" 
		$.ajax({
			type:'post',
			url:'<?php echo site_url() ?>/Exam/add',
			data:{name:name,pwd:pwd},
			dataType:'json',
		   success: function(msg){
		  		_tr+="<tr>"+
	   					"<td>id</td>"+
	   					"<td>姓名</td>"+
	   				"</tr>"
		   		for(k in msg){
	   			_tr+="<tr>"+
					"<td>"+msg[k]['id']+"</td>"+
					"<td>"+msg[k]['name']+"</td>"+
					"</tr>"
		   		}
		   		$('#box').html(_tr);
			}
		})
	})
</script>