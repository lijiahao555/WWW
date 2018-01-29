<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	
		<table border="8">
			<tr>
				<td>用户名</td>
				<td><input type="text" id="name" onblur="ck_name()"><span id="ckr_name"></span></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="text" id="pwd" onblur="ck_pwd()"><span id="ckr_pwd"></span></td>
			</tr>
			<tr>
				<td>验证码</td>
				<td><input type="text" id="xiao" onblur="ck_xiao()"><img src="/3yue/rikaojineng/day191/index.php/Home/Index/entry" alt="" onclick="ck_entry(this)"><span id="ckr_xiao"></span></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="提交" onclick="subm()"></td>
			</tr>
	</table>
	
</center>
</body>
<script>
	function ck_entry(th){
		th.src="/3yue/rikaojineng/day191/index.php/Home/Index/entry/"+Math.random();
	}
	function ck_name(){
		var name=document.getElementById('name').value;
		if (name=='') {
			document.getElementById('ckr_name').innerHTML="<font color='red'>用户名不能为空</font>";
			return false;
		}else{
			document.getElementById('ckr_name').innerHTML="";
			return true;
		}
	}

	function ck_pwd(){
		var pwd=document.getElementById('pwd').value;
		if (pwd=='') {
			document.getElementById('ckr_pwd').innerHTML="<font color='red'>密码不能为空</font>";
			return false;
		}else{
			document.getElementById('ckr_pwd').innerHTML="";
			return true;
		}
	}

	function ck_xiao(){
		var xiao=document.getElementById('xiao').value;
		if (xiao=='') {
			document.getElementById('ckr_xiao').innerHTML="<font color='red'>校验码不能为空</font>";
			return false;
		}else{
			document.getElementById('ckr_xiao').innerHTML="";
			return true;
		}
	}

	function subm(){
		var name=document.getElementById('name').value;
		if (name=='') {
			document.getElementById('ckr_name').innerHTML="<font color='red'>用户名不能为空</font>";
			return false;
		}
		var pwd=document.getElementById('pwd').value;
		if (pwd=='') {
			document.getElementById('ckr_pwd').innerHTML="<font color='red'>密码不能为空</font>";
			return false;
		}
		var xiao=document.getElementById('xiao').value;
		if (xiao=='') {
			document.getElementById('ckr_xiao').innerHTML="<font color='red'>校验码不能为空</font>";
			return false;
		}

		var xhr=new XMLHttpRequest();
		xhr.open('get', '/3yue/rikaojineng/day191/index.php/Home/Index/sub/name/'+name+'/pwd/'+pwd+'/xiao/'+xiao);
		xhr.send();
		xhr.onreadystatechange=function(){
			if (xhr.readyState==4&&xhr.status==200) {
				if (xhr.responseText==1) {
					document.getElementById('ckr_xiao').innerHTML="<font color='red'>校验码不正确</font>";
					return false;
				}else if (xhr.responseText==2) {
					document.getElementById('ckr_name').innerHTML="<font color='red'>用户名不正确</font>";
					return false;
				}else if (xhr.responseText==3) {
					document.getElementById('ckr_pwd').innerHTML="<font color='red'>密码不正确</font>";
					return false;
				}else{
						
						location.href="/3yue/rikaojineng/day191/index.php/Home/Show/add";
				}

		
			}
		}

	}

</script>
</html>