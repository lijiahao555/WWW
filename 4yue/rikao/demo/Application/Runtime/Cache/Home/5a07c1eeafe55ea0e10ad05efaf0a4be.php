<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table>
		<tr>
			<td>标签</td>
			<td><input type="text" id="type_name"></td>
		</tr>
		<tr>
			<td><input type="submit" value="提交" onclick="sub()"></td>
		</tr>
	</table>
	<table border="1">
		
			<tr>
				<td>ID</td>
				<td>分类名</td>
				<td>操作</td>
			</tr>
			<tbody id="show">
				<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
						<td><?php echo ($v["type_id"]); ?></td>
						<td><?php echo ($v["type_name"]); ?></td>
						<td><a href='javascript:del(<?php echo ($v["type_id"]); ?>)'>删除</a></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
	</table>
</body>
</html>
<script>
	function sub(){
		var str=""
		var type_name=document.getElementById('type_name').value
		var xhr=new XMLHttpRequest();
		xhr.open('get',"<?php echo U('Type/add');?>?type_name="+type_name);
		xhr.send(null)
		xhr.onreadystatechange=function (){
			if (xhr.readyState==4&&xhr.status==200) {
				// console.log(xhr.responseText);
				var arr=JSON.parse(xhr.responseText);
				for (var i = 0; i < arr.length; i++) {
					str+="<tr>"+
						"<td>"+arr[i]['type_id']+"</td>"+
						"<td>"+arr[i]['type_name']+"</td>"+
						"<td><a href=javascript:del("+arr[i]['type_id']+")>删除</a></td>"+
					"</tr>";
				};
				document.getElementById('show').innerHTML=str
			};
		}
	}
	function del(id){
		var str=""
		var xhr=new XMLHttpRequest();
		xhr.open('get',"<?php echo U('Type/del');?>?id="+id);
		xhr.send(null)
		xhr.onreadystatechange=function (){
			if (xhr.readyState==4&&xhr.status==200) {
				// console.log(xhr.responseText);
				var arr=JSON.parse(xhr.responseText);
				for (var i = 0; i < arr.length; i++) {
					str+="<tr>"+
						"<td>"+arr[i]['type_id']+"</td>"+
						"<td>"+arr[i]['type_name']+"</td>"+
						"<td><a href=javascript:del("+arr[i]['type_id']+")>删除</a></td>"+
					"</tr>";
				};
				document.getElementById('show').innerHTML=str
			};
		}
	}
</script>