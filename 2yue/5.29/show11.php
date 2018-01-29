<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>展示</title>
</head>
<body>
<center>
<h1>欢迎<font color="red"><?php echo $_COOKIE['name']?></font>来到用户展示页面</h1>
<input type="text" placeholder="根据名字搜索" id="uname"><button onclick="t_body(1)">搜索</button>
	<table border="1">
		<thead>
			<th></th>
			<th>用户编号</th>
			<th>用户名</th>
			<th>密码</th>
			<th>身份证号</th>
			<th>电子邮箱</th>
			<th>手机号</th>
			<th>个人简介</th>
			<th>头像显示</th>
			<th>操作</th>
		</thead>
		<tbody id="t_body">
			<input type="text">
		</tbody>
	</table>
</center>
</body>
<script>
	function t_body(page,zong){
		if (page==0) {
			alert('已经在第一页了');
			return false;
		}
		if (page>zong) {
			alert('已经最后一页了');
			return false;
		};
		var uname=document.getElementById('uname').value
		var xhr=new XMLHttpRequest();
		xhr.open('get','show1.php?page='+page+'&uname='+uname);
		xhr.send(null);
		xhr.onreadystatechange=function(){
			if (xhr.readyState==4&&xhr.status) {
				document.getElementById('t_body').innerHTML=xhr.responseText;
			}
		}
	}
	t_body(1);

	function del(id,page){
		var xhr=new XMLHttpRequest();
		xhr.open('get','del.php?id='+id+'&page='+page);
		xhr.send(null);
		xhr.onreadystatechange=function(){
			if (xhr.readyState==4&&xhr.status==200) {
				if (xhr.responseText==1) {
					t_body(page);
				}else{
					alert('删除失败')
				}
			}
		}
	}

	function pi(page){
		var box=document.getElementsByName('box');
		var pi='';
		for (var i = 0; i < box.length; i++) {
			if(box[i].checked==true){
				pi+=box[i].value+',';
			}
		}
		var xhr=new XMLHttpRequest();
		xhr.open('get','del.php?id='+pi+'&page='+page);
		xhr.send(null);
		xhr.onreadystatechange=function(){
			if (xhr.readyState==4&&xhr.status==200) {
				if (xhr.responseText==1) {
					t_body(page);
				}else{
					alert('删除失败');
				}
			}
		}
	}
</script>
</html>