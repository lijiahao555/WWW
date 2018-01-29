<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Show</title>
</head>
<script type="text/javascript" src="<?= base_url('Public/jquery-1.8.2.min.js') ?>"></script>
<style>
	a{
		text-decoration: none;
	}
	.top,.next{
		padding: 0px 5px 0px 5px;
		background-color: gray;
	}
</style>
<body>
<center>
	<h1>节目列表</h1>
</center>
	<table border="1" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td>ID</td>
			<td>作品名称</td>
			<td>表演时间</td>
			<td>表演人员</td>
			<td>是否审核</td>
			<td>节目排序</td>
			<td>操作</td>
		</tr>
		<?php foreach ($data as $key => $val): ?>
			<tr>
				<td class="works_id"><?= $val['works_id'] ?></td>
				<td><?= $val['works_name'] ?></td>
				<td><?= $val['works_time'] ?></td>
				<td><?= $val['works_member'] ?></td>
				<td>
					<?php if ($val['works_audit']==0) {  ?>
						<a style="color: red;" href="javascript:void(0)">未审核</a>
					<?php }else{  ?>
						<a style="color: blue;" href="javascript:void(0)">通过</a>
					<?php } ?>
				</td>
				<td class="works_sort"><?= $val['works_sort'] ?></td>
				<td align="center">
					<a href="javascript:void(0)" class="top" title="顶">↑</a>
					<a href="javascript:void(0)" class="next" title="降">↓</a>
				</td>
			</tr>
		<?php endforeach ?>

	</table>
	<center>
		<?= $pages ?><br>
		<a href="<?= site_url('Index/index_c/add') ?>">发布作品</a>
	</center>
</body>
<script type="text/javascript">
	$(function(){
		//上移
		$('.top').click(function(){
			var tr = $(this).parents('tr');//获取当前tr
			var id = tr.children('.works_id').html();//获取当前id
			var sort = tr.children('.works_sort').html();//获取当前排序
			var prev_id = tr.prev().children('.works_id').html();//获取上一个兄弟节点id
			if (isNaN(prev_id)) {
				alert('小姐姐要上天么');return;
			}
			var prev_sort = tr.prev().children('.works_sort').html();//获取上一个兄弟节点排序
			tr.children('.works_sort').html(prev_sort);//把当前改成修改后
			tr.prev().children('.works_sort').html(sort);//把修改的改成当前
			tr.insertBefore(tr.prev());
			sort_ajax(id,prev_sort);
			sort_ajax(prev_id,sort);
		})
		//下移
		$('.next').click(function(){
			var tr = $(this).parents('tr');//获取当前tr
			var id = tr.children('.works_id').html();//获取当前id
			var sort = tr.children('.works_sort').html();//获取当前排序
			var next_id = tr.next().children('.works_id').html();//获取下一个兄弟节点id
			if (isNaN(next_id)) {
				alert('小姐姐要见阎王么');return;
			}
			var next_sort = tr.next().children('.works_sort').html();//获取下一个兄弟节点排序
			tr.children('.works_sort').html(next_sort);//把当前改成修改后
			tr.next().children('.works_sort').html(sort);//把修改的改成当前
			tr.insertAfter(tr.next());
			sort_ajax(id,next_sort);
			sort_ajax(next_id,sort);
		})
		//ajax
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