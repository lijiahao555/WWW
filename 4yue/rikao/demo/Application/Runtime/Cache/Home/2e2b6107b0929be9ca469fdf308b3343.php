<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<thead>
	
		<b>说说网</b> <span>&nbsp;&nbsp;&nbsp;关键字<input type="text" id="sou">&nbsp;<input type="button" onclick="sou()" value="搜索">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Infor/show');?>">首页</a>&nbsp;<a href="<?php echo U('Home/Inforshow/add');?>">发表说说</a>&nbsp;<a href="<?php echo U('Home/Admin/admin');?>">登录</a></span>
		<hr width="500">
	</thead>
		<button onclick="ajax(1,5)">最新</button>&nbsp;&nbsp;<button onclick="ajax(1,6)">点赞数</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href='javascript:;' onclick='seek(<?php echo ($v["type_id"]); ?>)'><?php echo ($v["type_name"]); ?></a>&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
	<tbody> 
		<table id="tbody" width="500" border="1">
				<?php if(is_array($list['list'])): $i = 0; $__LIST__ = $list['list'];if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 1 );++$i;?><tr>
						<td><b><?php echo ($v["name"]); ?></b>&nbsp;&nbsp;&nbsp;<?php echo ($v["time"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</br><hr width="485"><?php echo ($v["content"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button onclick='zan(<?php echo ($v["id"]); ?>,this)'>赞</button><span><?php echo ($v["zan"]); ?></span><br/><?php echo ($v["type_name"]); ?></td>
						<?php if(($mod) == "0"): ?></tr><tr><?php endif; ?>
					</tr><?php endforeach; endif; else: echo "没有数据" ;endif; ?>
				<tr>
					<td align='center' colspan='6'>
					共<?php echo ($list['page']); ?>条说说
						<input type='button'  onclick='ajax(1)' value='首页'>
						<input type='button'  onclick='ajax(1)' value='上一页'>
						<input type='button'  onclick='ajax(2)' value='下一页'>
						<input type='button'  onclick="ajax(<?php echo ($list['page']); ?>)"  value="尾页">
					</td>
				</tr>
		</table>
	</tbody>
</center>
</body>
</html>
<script>
	function ajax(p,h){

		var xhr=new XMLHttpRequest();
		xhr.open('get', "<?php echo U('Home/Infor/ajax');?>?p="+p+"&h="+h)
		xhr.send()
		xhr.onreadystatechange=function (){
			if (xhr.readyState==4&&xhr.status==200) {
				document.getElementById('tbody').innerHTML=xhr.responseText
			};
		}
	}
	function zan(zan,obj){
		var span_num=obj.nextElementSibling.innerHTML;
		console.log(span_num);
		var num=parseInt(span_num)+1;
		var xhr=new XMLHttpRequest();
		xhr.open('get', "<?php echo U('Home/Inforshow/zan');?>?zan="+zan)
		xhr.send()
		xhr.onreadystatechange=function (){
			if (xhr.readyState==4&&xhr.status==200) {
				if(xhr.responseText=='no'){
					alert("已经点过赞");
				}else if(xhr.responseText==0){
					alert('不能给自己点赞')
				}else{
					obj.nextElementSibling.innerHTML=num
				}
				// xhr.responseText
			};
		}
	}
	function sou(){
		var sou=document.getElementById('sou').value
		var xhr=new XMLHttpRequest();
		xhr.open('get', "<?php echo U('Home/Infor/ajax');?>?sou="+sou)
		xhr.send()
		xhr.onreadystatechange=function (){
			if (xhr.readyState==4&&xhr.status==200) {
				document.getElementById('tbody').innerHTML=xhr.responseText
			};
		}
	}
	function seek(id){
		var xhr=new XMLHttpRequest();
		xhr.open('get', "<?php echo U('Home/Infor/ajax');?>?id="+id)
		xhr.send()
		xhr.onreadystatechange=function (){
			if (xhr.readyState==4&&xhr.status==200) {
				document.getElementById('tbody').innerHTML=xhr.responseText
			};
		}
	}
</script>