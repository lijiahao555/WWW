<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
	a{text-decoration:none;}
	</style>
</head>
<body>
<center>
<b>说说网</b> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Infor/show');?>">首页</a>&nbsp;<a href="<?php echo U('Home/Inforshow/add');?>">发表说说</a>&nbsp;<a href="<?php echo U('Home/Admin/admin');?>">登录</a></span>
<hr width="500">
<h1>登录</h1>
	<form action="<?php echo U('Home/Admin/adminDo');?>" method="post" onsubmit="return sub()">
		<table border="3" width="450">
			<tr>
				<td>用户名</td>
				<td><input type="text" name="name" id="c_name" onblur="ck_name()"><span id="ckr_name"></span></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="password" name="pwd" id="c_pwd" onblur="ck_pwd()"><span id="ckr_pwd"></span></td>
			</tr>
			<tr>
				<td>验证码</td>
				<td><input type="text" name="exam" id="c_exam" onblur="ck_exam()"><img src="<?php echo U('/Home/Admin/Verify');?>" width="100" height="50"  alt=""><span id="ckr_exam"></span></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="登录">&nbsp;&nbsp;还没有账号？&nbsp;<a href="<?php echo U('Home/Admin/login');?>">注册</a></td>
			</tr>
		</table>
	</form>
</center>

<script>
	// function del(th){
	// 	th.src=<?php echo U('/Home/Login/Verify');?>+Math.random(1,100)
	// }
	function ck_name(){
		var name=document.getElementById('c_name').value
			z_name=/^[\u4e00-\u9fa5]{1,}$/i;
		if (z_name.test(name)=='') {
			document.getElementById('ckr_name').innerHTML="<font color='red'>用户名不能为空</font>";
			return false;
		}else{
			document.getElementById('ckr_name').innerHTML="<font color='red'>√</font>";
			return true;
		}
	}

	function ck_pwd(){
		var pwd=document.getElementById('c_pwd').value
			z_pwd=/^\w{5,}$/;
		if (z_pwd.test(pwd)=='') {
			document.getElementById('ckr_pwd').innerHTML="<font color='red'>密码不能为空，且不少于5位</font>"
			return false;
		}else{
			document.getElementById('ckr_pwd').innerHTML="<font color='red'>√</font>"
			return true;
		}
	}
	function ck_exam(){
		var exam=document.getElementById('c_exam').value
		if (exam=='') {
			document.getElementById('ckr_exam').innerHTML="<font color='red'>验证码不能为空</font>"
			return false;
		}else{
			document.getElementById('ckr_exam').innerHTML="<font color='red'>√</font>"
			return true;
		}
	}
		function sub(){
		if (ck_name()&ck_pwd()&ck_exam()) {
			return true;
		}else{
			return false;
		}
	}
</script>
</body>
</html>