<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<table border="1">
		<thead>
			<th>ID</th>
			<th>名字</th>
			<th>分类</th>
			<th>内容</th>
			<th>图片</th>
			<th>时间</th>
			<th>操作</th>
		</thead>
		<tbody id="body">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>str+="<tr>"+
					"<td>"+arr.v.photo_id}"</td>"+
					"<td>"+arr.v.photo_name}"</td>"+
					"<td>"+arr.v.photo_sort}"</td>"+
					"<td>"+arr.v.photo_content}"</td>"+
					"<td>""<img src='/4yue/rikao/photo/<?php echo ($v["photo_file"]); ?>' width='80'>"</td>"+
					"<td>""+arr.v.photo_time|date='Y-m-d H:i:s',###}"</td>"+
					"<td>"<a href=''>删除</a>"</td>"+
				"</tr>"<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
</center>
<script>
	function ajax(p){
		var str=""
		var xhr=new XMLHttpRequest();
		xhr.open('get',"<?php echo U('Photo/ajax');?>");
		xhr.send(null);
		xhr.onreadystatechange=function (){
			if (xhr.readyState==4&&xhr.status==200) {
				arr=JSON.parse(xhr.responseText);
				// console.log(arr)
				// return
				for (var i = 0; i < arr.list.length; i++) {

					str+="<tr>"+
					"<td>"+arr['list'][i]['photo_id']+"</td>"+
					"</tr>";
				};
				document.getElementById('body').innerHTML=xhr.responseText;
			};
		}
	}
	ajax(1)
</script>
</body>
</html>