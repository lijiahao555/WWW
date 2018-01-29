<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Show</title>
</head>
<body>
<style type="text/css" media="screen">
	a{
	text-decoration: none;
	}
	body {
	font-family: arial;
	background: rgb(242, 244, 246);
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
  }
  .drag-list {
	width: 400px;
	margin: 0 auto;
  }

  .drag-list > li {
	list-style: none;
	background: rgb(255, 255, 255);
	border: 1px solid rgb(196, 196, 196);
	margin: 5px 0;
	font-size: 24px;
  }

  .drag-list .title {
	display: inline-block;
	width: 130px;
	padding: 6px 6px 6px 12px;
	vertical-align: top;
  }

  .drag-list .drag-area {
	display: inline-block;
	background: rgb(158, 211, 179);
	width: 60px;
	height: 40px;
	vertical-align: top;
	float: right;
	cursor: move;
  }
</style>
<center>
	<h1>节目清单</h1>
</center>
<form action="<?= site_url('index/pass/add_prog') ?>" method="post">
	<?php foreach ($data as $key => $val): ?>
		<section class="showcase showcase-2">
		  <ul class="drag-list">
			<li>
				<span class="title"><?= $val['works_name'] ?></span>
				<span style="font-size: 12px;"><?= $val['works_time'] ?></span>
				<span style="font-size: 12px;"><?= $val['works_member'] ?></span>
				<span style="font-size: 12px;">
					<?php if ($val['works_audit']==0) {  ?>
						<a style="color: red;" href="javascript:void(0)">未通过</a>
					<?php }else{  ?>
						<a style="color: blue;" href="javascript:void(0)">通过</a>
					<?php } ?>
				</span>
				<span class="drag-area"></span>
			</li>
		  </ul>
		</section>
		<input type="hidden" name="works_id[]" value="<?= $val['works_id'] ?>">
		<input type="hidden" name="type_id[]" value="<?= $val['type_id'] ?>">
	<?php endforeach ?>
<center>
	<input type="submit" value="确认节目">
	<?= $pages ?><br>
	<a href="<?= site_url('Index/index_c/index') ?>">首页</a>
</center>
</form>
</body>
<script src='<?= base_url('Public/jquery-1.8.2.min.js') ?>'></script>
<script type="text/javascript" src="<?= base_url('Public/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('Public/js/drag-arrange.js') ?>"></script>
<script type="text/javascript">
  $(function() {
	  $('.draggable-element').arrangeable();
	  $('li').arrangeable({dragSelector: '.drag-area'});
  });
</script>
</html>