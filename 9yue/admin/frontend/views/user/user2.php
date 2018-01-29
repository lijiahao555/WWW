<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<html><head>
<meta charset="utf-8">
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" id="viewport" name="viewport">
<meta name="wap-font-scale" content="no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="2345小说大全" name="apple-mobile-web-app-title">
<title>直播用户界面</title>
<link rel="shortcut icon" href="javascript:void(0)http://img2.2345.com/bookimg/public/pic/book/book_icon.png">
<link rel="stylesheet" href="/tp/public/static/user_/css/mobile-global.css">
			<link rel="stylesheet" href="/tp/public/static/user_/css/mobile-user.css">
	<link href="javascript:void(0)http://img1.2345.com/bookimg/public/pic/book/icon-57.jpg" rel="apple-touch-icon">
<link href="javascript:void(0)http://img2.2345.com/bookimg/public/pic/book/icon-114.jpg" sizes="114x114" rel="apple-touch-icon">
<link href="javascript:void(0)http://img3.2345.com/bookimg/public/pic/book/icon-57.jpg" rel="apple-touch-icon-precomposed">
</head>
<body id="xtopjsinfo" ontouchstart="">
<!--wrapper begin-->
<div class="wrapper userCenter">
<!-- header begin -->
<header class="header inner-header">
<a href="javascript:void(0)javascript:;" id="go-back-button" class="back"></a>
<h1 class="sub-title">定时提醒</h1>
<a href="javascript:void(0)/m/" class="home iconfont icon-home" onclick="cc('ck_m_fanhuishouye')"></a></header>
<!--header end--><div class="container">
<!-- user -->
<div class="uc-info">
	<div class="avatar"><img src="<?=$data['url']?>" onerror="this.src='http://img1.2345.com/bookimg/public/pic/book/default.png'"></div>
	<p class="name"><?=$data['name']?></p>
<a class="btn-primary" btn-size="small" href="javascript:void(0)/m/index.php/c/user/a/pay/" onclick="cc('ck_m_chongzhi02');"></a></div>
<?=Html::beginForm(['user/addmsg'],'post');?>
	<table>
		<input type="hidden" name="openid" value="<?=$data['openid']?>">
		<tr>
			<td>提醒内容</td>
			<td><textarea name="content" placeholder="请输入提醒任务" cols="20" rows="3"></textarea></td>
		</tr>
		<tr>
			<td>提醒时间</td>
			<td><input placeholder="请输入日期" name="time" class="laydate-icon" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"></td>
		</tr>
		<tr>
			<td></td>
			<td><?= Html::submitButton('发送提醒')?></td>
		</tr>
	</table>
<?=Html::endForm();?>
<?=Html::jsFile('@web/js/laydate.js')?>
<script type="text/javascript">
!function(){
	laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
	laydate({elem: '#demo'});//绑定元素
}();

</script>
