<style type="text/css">
	div{
		margin: 0px 80px;
		width: 1200px;
		height: 60px;
		background: gray;
		line-height: 60px;
	}
	.exit{
		padding-right: 10px;
		font-size: 20px;
		float: right;
	}
	.greet{
		padding-left:540px;
	}
</style>

<div>
	<?php $user = $this->session->userdata('user'); ?>
	<span class="greet">欢迎 <em style="color: red;"><?= $user['user_name'] ?></em> 登陆</span>
	<a class="exit" href="<?= site_url('login/login_c/user_exit') ?>">退出</a>
</div>

<center>
	<h1>
		<a href="<?= site_url('Index/index_c/show') ?>">节目清单</a><br>
		<a href="<?= site_url('Index/index_c/add') ?>">发表节目</a><br>
		<a href="<?= site_url('Index/index_c/user_show') ?>">节目列表</a><br>
		<a href="<?= site_url('Index/index_c/audit') ?>">审核列表</a><br>
		<a href="<?= site_url('Index/pass/show') ?>">通过数量</a><br>
	</h1>
</center>
