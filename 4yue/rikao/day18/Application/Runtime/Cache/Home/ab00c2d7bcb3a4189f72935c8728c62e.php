<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<table border="1">
	<!-- <th>ID</th>
	<th>名称</th>
	<th>价格</th>
	<th>封面</th>
	<th>作者</th> -->
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 3 );++$i;?><td>
			<img src="/4yue/rikao/day18/<?php echo ($v["file"]); ?>" width="50"><br/>
			<?php echo ($v["name"]); ?><br/>
			<?php echo ($v["price"]); ?>
		</td>
		<?php if(($mod) == "2"): ?></tr><tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
	
	<tr id="page">
		<td colspan="5"><a href="javascript:page(1)">首页</a>
		<a href="javascript:page(1)">上一页</a>
		<a href="javascript:page(2)">下一页</a>
		<a href="javascript:page(1)">尾页</a></td>
	</tr>
	
	</table>
</center>
</body>
</html>
<script>
	function page(p){
		var xhr=new XMLHttpRequest();
		xhr.open('get',"<?php echo U('Book/ajax');?>?p="+p);
		xhr.send(null);
		xhr.onreadystatechange=function (){
			if (xhr.readyState==4&&xhr.status==200) {
				
			};
		}
	}
</script>