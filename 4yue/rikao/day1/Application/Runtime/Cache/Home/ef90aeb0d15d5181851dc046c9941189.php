<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body id="t_body">
<center>
	<table border="1">
		<thead>
			<th>ID</th>
			<th>标题</th>
			<th>内容</th>
			<th>分类</th>
			<th>操作</th>
		</thead>
		<tbody>
			<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
					<td><?php echo ($v["id"]); ?></td>
					<td><?php echo ($v["name"]); ?></td>
					<td><?php echo ($v["content"]); ?></td>
					<td><?php echo ($v["type_name"]); ?></td>
					<td><a href="javascript:del(<?php echo ($v["id"]); ?>)">删除</a></td>
				</tr><?php endforeach; endif; ?>
		</tbody>
	</table>
</center>
<script>
	function del(id){
		var xhr=new XMLHttpRequest();
		xhr.open('get','/4yue/rikao/day1/index.php/Home/Index/ajax/id/'+id);
		xhr.send(null);
		xhr.onreadystatechange=function(){
			if (xhr.readyState==4&&xhr.status==200) {
				if (xhr.responseText==0) {
					alert('删除失败');
				}else{
					document.getElementById('t_body').innerHTML=xhr.responseText;
				}
				
			};
		}
	}
</script>
</body>
</html>