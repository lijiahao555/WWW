<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="<?php echo U('/Home/Inforshow/addOne');?>" method="post" onsubmit="return sub()">
		<strong>说说网</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('/Home/Inforshow/show');?>">首页</a>&nbsp;<a href="#"><?php echo $_SESSION['name'];?><a href="<?php echo U('Home/Infor/show');?>">(退出)</a></span>
		<hr width="500">
		<table border="1">
			<tr>
				<td>昵称</td>
				<td><input type="text" name="name" id="c_name" onblur="ck_name()"><span id="ckr_name"></span></td>
			</tr>
			<tr>
				<td>说说</td>
				<td><textarea name="content" id="c_content" onblur="ck_content()" cols="20" rows="5"></textarea><span id="ckr_content"></span></td>
			</tr>
			<tr>
				<td colspan="2">
					<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><input type="checkbox" name="box[]" value="<?php echo ($v["type_id"]); ?>"><?php echo ($v["type_name"]); endforeach; endif; else: echo "" ;endif; ?>
				</td>
			</tr>
			<tr>
				<td>验证码</td>
				<td>
					<input type="text" name="exam"><img src="<?php echo U('Inforshow/Verify');?>" width="100">
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="发表"><input type="reset" value="重置"></td>
				
			</tr>
		</table>
	</form>
</center>
<script>
	function ck_name(){
		var name=document.getElementById('c_name').value
		var z_name=/^[\u4e00-\u9fa5]{1,6}$/;
		if (z_name.test(name)=='') {
			document.getElementById('ckr_name').innerHTML="<font color='red'>必填且多于6个字</font>"
			return false;
		}else{
			document.getElementById('ckr_name').innerHTML="<font color='red'>√</font>"
			return true;
		}
	}
		function ck_content(){
		var content=document.getElementById('c_content').value
		var z_name=/^[\u4e00-\u9fa5]{5,}$/;

		if (content=='') {
			document.getElementById('ckr_content').innerHTML="<font color='red'>必填 不能少于5个字</font>"
			return false;
		}else{
			document.getElementById('ckr_content').innerHTML="<font color='red'>√</font>"
			return true;
		}
	}
	function sub(){
		if (ck_name()&ck_content()) {
			return true;
		}else{
			return false;
		}
	}
</script>
</body>
</html>