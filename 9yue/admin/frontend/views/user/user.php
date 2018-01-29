<?php
/* @var $this yii\web\View */
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
<h1 class="sub-title">用户中心</h1>
<a href="javascript:void(0)/m/" class="home iconfont icon-home" onclick="cc('ck_m_fanhuishouye')"></a></header>
<!--header end--><div class="container">
<!-- user -->
<div class="uc-info">
	<div class="avatar"><img src="<?=$data['headimgurl']?>" onerror="this.src='http://img1.2345.com/bookimg/public/pic/book/default.png'"></div>
	<p class="name"><?=$data['nickname']?></p>
	<p class="balance">阅读币余额：<b class="spec">0</b></p>
<a class="btn-primary" btn-size="small" href="javascript:void(0)/m/index.php/c/user/a/pay/" onclick="cc('ck_m_chongzhi02');">充值</a></div>
<ul class="uc-op-list">
		<li><a href="javascript:void(0)/m/index.php/c/user/a/message/">我的消息</a></li>
</ul>
<ul class="uc-op-list">
	<li><a href="<?=Url::to(['user/addmsg', 'name'=>$data['nickname'], 'url'=>$data['headimgurl'], 'openid'=>$data['openid'],'#' => 'name'])?>">定时提醒</a></li>
</ul>
<ul class="uc-op-list">
		<li><a href="javascript:void(0)/index.php?c=login&amp;a=logout&amp;forward=%2Fm%2F">退出登录</a></li>
</ul>
</div>
</div>
<!--wrapper end-->
<!--footer begin-->
<!--footer begin-->
<footer class="footer">
<p class="links"><a href="javascript:void(0)/m/"></a><i>|</i><a href="javascript:void(0)/app/index.html">手机客户端</a><i>|</i><a href="javascript:void(0)/m/index.php/c/feedback/">问题反馈</a><i>|</i><a href="javascript:void(0)#xtopjsinfo" class="go_top">返回顶部</a></p>
<p>Copyright © 2345网址导航    ICP证沪B2-20120099</p>
</footer>
<!--footer end-->

<!--footer end--></body></html>