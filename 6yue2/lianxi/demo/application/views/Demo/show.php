<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
	<input type="text" id="search"><input type="button" value="搜索" class="p" data-p='sou'>
		<table border='1' id='tab'>
			<tr>
				<td></td>
				<td>username</td>
				<td>password</td>
				<td>操作</td>
				<td></td>

			</tr>
			<?php foreach ($data as $v): ?>
				<tr>
					<td><?php echo $v['demo_id'] ?></td>
					<td><?php echo $v['demo_name'] ?></td>
					<td><?php echo $v['demo_pwd'] ?></td>
					<td><a href="<?php echo site_url('Demo/del')?>?id=<?php echo $v['demo_id'] ?>">删除</a></td>
					<td><a href="<?php echo site_url('Demo/up')?>?id=<?php echo $v['demo_id'] ?>">修改</a></td>
				</tr>
			<?php endforeach ?>
		</table>
		当前<span id="page">1</span>
		<a href='javascript:void(0);' class='p' data-p='1'>首页</a>
		<a href='javascript:void(0);' class='p' data-p='up'>上一页</a>
		<a href='javascript:void(0);' class='p' data-p='next'>下一页</a>
		<a href='javascript:void(0);' class='p' data-p="<?php echo $zong ?>">尾页</a>
		共<span id="zong"><?php echo $zong?></span>页
	</center>
</body>
</html>
<script src="<?php echo base_url('public/jquery.js') ?>"></script>
<script>
	$(document).on('click','.p',function(){
		p=$(this).data('p');
		sou=$('#search').val();
		page=parseInt($('#page').text());
		zong=parseInt($('#zong').text());
		ye="";
		if (isNaN(p)) {
			if (p=='up') {
				ye=page-1;
			}else if(p=='next'){
				ye=page+1
			}else if (p=='sou'){
				ye=page
			}
		}else{
			ye=p
		}
		if (ye<1||ye>zong) {
			return
		};
		$.ajax({
		   type: "get",
		   url: "<?php echo site_url('Demo/ajax') ?>",
		   data: {ye:ye,sou:sou},
		   dataType:'json',
		   success: function(msg){
		   	_tab="";
		   	_tab="<table border='1' id='tab'>\
			<tr>\
				<td>username</td>\
				<td>password</td>\
				<td></td>\
				<td></td>\
			</tr>"
		     for(k in msg){
		     	_tab+="<tr>\
						<td>"+msg[k]['demo_id']+"</td>\
						<td>"+msg[k]['demo_name']+"</td>\
						<td>"+msg[k]['demo_pwd']+"</td>\
						<td><a href=''>删除</a></td>\
						<td><a href=''>修改</a></td>\
					</tr>";
		     }
		     _tab+="</table>";
		     $('#tab').html(_tab);
		     $('#page').text(ye);
		   }
		});
	})

</script>