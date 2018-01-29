<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>详情页</title>
</head>
<body>
	<h1>{$title}</h1>
	<p>{$content}</p>
	
	{config_load file="detail.conf"}
	
	{#auther#}

	{assign var="aa" value="holle"}

	{$aa}
</body>
</html>
