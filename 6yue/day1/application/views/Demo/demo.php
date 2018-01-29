<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table>
		<tr>
			<td>ID</td>
			<td><input type="text" id="name"></td>
		</tr>
		<tr>
			<td>姓名</td>
			<td><input type="text" id="pwd"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" id="sub" value="提交"></td>
		</tr>
	</table>
</body>
</html>
<script src='http://localhost/6yue/day1/public/jquery.js'></script>
<script type="text/javascript">
	$("#sub").click(function(){
		var name=$('#name').val();
		var pwd=$('#pwd').val();
		$.ajax({
		   type: "post",
		   url: "http://localhost/6yue/day1/index.php/Demo/addOne",
		   data: "name="+name+"&pwd="+pwd,
		   success: function(msg){
				console.log(msg);
		   }
		});
	})
</script>