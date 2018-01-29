<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
</head>
<body>
<center>
	<form action="<?php echo U('Home/Login/adminDo');?>" method="post" onsubmit="return sub()">
		<table border="3">
			<tr>
				<td>账号</td>
				<td><input type="text" name="name" id="c_name" onclick="ck_name()"><span id="ckr_name"></span></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="text" name="pwd" id="c_pwd" onclick="ck_pwd()"><span id="ckr_pwd"></span></td>
			</tr>
			<tr>
				<td colspan="2"><input type="checkbox" name="box" value="7">7天免登陆</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="登录"></td>
			</tr>
		</table>
	</form>
</center>
</body>
<script>
	function ck_name(){
		var name=document.getElementById('c_name').value;
		
		if (name=='') {
			document.getElementById('ckr_name').innerHTML="用户名不能为空";
			return false;
		}else{
			document.getElementById('ckr_name').innerHTML="√";
			return true;
		}
	}

	function ck_pwd(){
		var pwd=document.getElementById('c_pwd').value;
		
		if (pwd=='') {
			document.getElementById('ckr_pwd').innerHTML="密码不能为空";
			return false;
		}else{
			document.getElementById('ckr_pwd').innerHTML="√";
			return true;
		}
	}

	function sub(){
		if (ck_name()&ck_pwd()) {
			return true;
		}else{
			return false;
		}
	}
</script>
</html>