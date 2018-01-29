<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Show</title>
</head>
<style type="text/css" media="screen">
	a{
		text-decoration: none;
	}
	.top,.next{
		padding: 0px 5px 0px 5px;
		background-color: red;
	}
</style>
<body>
<center>
	<h1>审核列表</h1>
</center>
	<table border="1" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td>ID</td>
			<td>作品名称</td>
			<td>表演时间</td>
			<td>表演人员</td>
			<td>所属分类</td>
			<td>演出顺序</td>
			<td>是否审核</td>
			<td>操作</td>
			<td>排序</td>
		</tr>
		<?php foreach ($data as $key => $val): ?>
			<tr sort='<?= $val['works_sort'] ?>' data_id='<?= $val['works_id'] ?>'>
				<td><?= $val['works_id'] ?></td>
				<td><?= $val['works_name'] ?></td>
				<td><?= $val['works_time'] ?></td>
				<td><?= $val['works_member'] ?></td>
				<td><?= $val['type_name'] ?></td>
				<td><?= $val['works_sort'] ?></td>
				<td>
					<?php if ($val['works_audit']==0) {  ?>
						<a style="color: red;" href="<?= site_url('index/index_c/state/'.$val['works_id']) ?>">未通过</a>
					<?php }else{  ?>
						<a style="color: blue;" href="javascript:void(0)">通过</a>
					<?php } ?>
				</td>
				<td>
					<a href="<?= site_url('index/index_c/audit_update/'.$val['works_id']) ?>" title="修改">修改</a>
					<a href="<?= site_url('index/index_c/data_delete/'.$val['works_id']) ?>" title="删除">删除</a>
				</td>
				<td align="center">
					<a href="javascript:void(0)" class="top"  title="顶">↑</a>
					<a href="javascript:void(0)" class="next"  title="降">↓</a>
				</td>
			</tr>
		<?php endforeach ?>

	</table>
	<center>
		<?= $pages ?><br>
		<a href="<?= site_url('Index/index_c/index') ?>">首页</a>
	</center>
</body>
<script type="text/javascript" src="<?= base_url('Public/jquery-1.8.2.min.js') ?>" ></script>
<script type="text/javascript">
$(function(){
	//排序向上
	$(document).on('click','.top',function(){
		var now_tr = $(this).parents('tr');//获取点击的一行
		var sort = now_tr.attr('sort');//获取当前排序
		var prev_sort = now_tr.prev().attr('sort');//获取上一个兄弟节点的排序
		var prev_id = now_tr.prev().attr('data_id');//获取上一个兄弟节点id
		var id = now_tr.attr('data_id');//获取当前id
		if(isNaN(prev_id))
		{
			alert('上天了');return;
		}

		//替换
		now_tr.attr('sort',prev_sort);
		now_tr.prev().attr('sort',sort);
		now_tr.children().eq(5).html(prev_sort);
		now_tr.prev().children().eq(5).html(sort);

		now_tr.insertBefore(now_tr.prev());//把当前tr放到当前上一个兄弟节点的上面
		sort_ajax(id,prev_sort);//把当前的排序修改成上一个
		sort_ajax(prev_id,sort);//把上一个排序替换成当前的
	})
	//排序向下
	$(document).on('click','.next',function(){
		var now_tr = $(this).parents('tr');//获取点击的一行
		var sort = now_tr.attr('sort');//获取当前排序
		var next_sort = now_tr.next().attr('sort');//获取下一个兄弟节点的排序
		var next_id = now_tr.next().attr('data_id');//获取下一个兄弟节点id
		var id = now_tr.attr('data_id');//获取当前id
		if(isNaN(next_id))
		{
			alert('入地了');return;
		}

		//替换
		now_tr.attr('sort',next_sort);
		now_tr.next().attr('sort',sort);
		now_tr.children().eq(5).html(next_sort);
		now_tr.next().children().eq(5).html(sort);

		now_tr.insertAfter(now_tr.next());//把当前tr放到当前下一个兄弟节点下面
		sort_ajax(id,next_sort);
		sort_ajax(next_id,sort);
	})

	function sort_ajax(id,sort){
		var data = '';
		$.ajax({
			type:'post',
			url:"<?= site_url('index/index_c/update_stop') ?>",
			data:{
				'works_sort':sort,
				'works_id':id
			},
			success:function(data){
				if (data!=1)alert('Fail');
			}
		})
	}

})

</script>
</html>