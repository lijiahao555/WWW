<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<input type="text" id="exam"><input type="button" id="search" value="提交">
</body>
</html>
<script>
	$(function(){
		$("#search").click(function(){
			alert(1);
		})
	})
</script>