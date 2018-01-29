<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>列表</title>
</head>
<body>
	<center>
		<table border="1">
			<th>ID</th>
			<th>名称</th>
			<th>操作</th>

			<tbody id="html">
				<?php foreach($data as $k => $v){ ?>
					<tr>
						<td><?php echo $v['id'] ?></td>
						<td><?php echo $v['name'] ?></td>
						<td><a href="javascript:void(0)" class="del" data-id="<?php echo $v['id'] ?>">删除</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

		<a href="javascript:void(0)" class="ye" data-p="1">首页</a>
		<a href="javascript:void(0)" class="ye" data-p="2">上一页</a>
		<a href="javascript:void(0)" class="ye" data-p="3">下一页</a>
		<a href="javascript:void(0)" class="ye" data-p="4">尾页</a>
		第<span id="nowpage">1</span>页|共<span id="totalpage"><?php echo $totalpage ?></span>页
	</center>
</body>

<script src="<?php echo base_url('public/jquery.js') ?>"></script>
<script type="text/javascript">
	$('.del').click(function(){
		var id=$(this).data('id');
		var page=$('#nowpage').text();
		$.ajax({
			url:"<?php echo site_url('Welcome/del') ?>",
			type:'get',
			data:{id:id,page:page},
			dataType:'json',
			success:function(m){
				var data=m.data;
				var page=m.page;
				var totalpage=m.totalpage;
				var html='';
				for(k in data){
					html+="<tr>\
						<td>"+data[k].id+"</td>\
						<td>"+data[k].name+"</td>\
						<td><a href='javascript:void(0)' class='del' data-id="+data[k].id+">删除</a></td>\
					</tr>"
				}
				$('#html').html(html);
				$('#nowpage').html(page);
				$('#totalpage').html(totalpage);
			}
		})
	})

	$('.ye').click(function(){
		var nowpage=parseInt($('#nowpage').text());
		var totalpage=parseInt($('#totalpage').text());
		var p=$(this).data('p');
		var page='';
		if(p==1){
			page=1;
		}
		if(p==2){
			page=nowpage-1;
		}
		if(p==3){
			page=nowpage+1;
		}
		if(p==4){
			page=totalpage;
		}
		if(page<1||page>totalpage){
			return false;
		}

		$.ajax({
			url:"<?php echo site_url('Welcome/ajaxpage') ?>",
			type:'get',
			data:{page:page},
			dataType:'json',
			success:function(m){
				var html='';
				for(k in m){
					html+="<tr>\
						<td>"+m[k].id+"</td>\
						<td>"+m[k].name+"</td>\
						<td><a href='javascript:void(0)' class='del' data-id="+m[k].id+">删除</a></td>\
					</tr>"
				}
				$('#html').html(html);
				$('#nowpage').html(page);
			}
		})
	})
</script>

</html>