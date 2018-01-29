<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<table>
			<thead>
				
				<th>名字</th>
				
				
				<th>时间</th>
				<th>类型</th>
			</thead>
			<tbody id="body">
				
			</tbody>
		</table>
	
日志标题<input type="text" id="sou"> 排序条件 <input type="radio" name="o" id="yue" value="yue">阅读量 <input type="radio" id="tian" name="o" value="tian">添加时间 <button onclick="ajax(1)">搜索</button>

	</center>
	<?php  $n=0 ; ?>
</body>
<script>
	function ajax(p){
		// sou=document.getElementById('sou').value;
		// // o=document.getElementsByName('o');
		// tian=document.getElementById('tian').value;
		// yue=document.getElementById('yue').value;
		// if (sou && yue.checked) {
		// 	url="123"
		// }else{
		// 	if (sou) {
		// 		url="32";
		// 	}
		// 	if (yue.checked) {
		// 		url="55"
		// 	}
			
		// }
		
		// if(tian.checked == true){
		// 	var order = 'tian'
		// }else{
		// 	var order = 'yue'
		// }

		// if (sou=='') {
		// 	url='/3yue/6.28/index.php/Home/Log/ajax/p/'+p
		// }else{
		// 	url='/3yue/6.28/index.php/Home/Log/ajax/p/'+p+'/sou/'+sou
		// }
		// if (order==''&&sou!=''){
		// 	url='/3yue/6.28/index.php/Home/Log/ajax/p/'+p+'/sou/'+sou
		// }else if(order=='tian'&&sou!=''){
		// 	url='/3yue/6.28/index.php/Home/Log/ajax/p/'+p+'/sou/'+sou+'/order/'+order
		// }else if(order=='yue'&&sou!=''){
		// 	url='/3yue/6.28/index.php/Home/Log/ajax/p/'+p+'/sou/'+sou+'/order/'+order
		// }else{
		// 	url="/3yue/6.28/index.php/Home/Log/ajax/p/'+p"
		// }
		
	
		// if (tian.checked==true) {
		// 	url='/3yue/6.28/index.php/Home/Log/ajax/p/'+p+'/sou/'+sou+'/order/'+order
		// }else if (yue.checked==true) {
		// 	url='/3yue/6.28/index.php/Home/Log/ajax/p/'+p+'/sou/'+sou+'/order/'+order
		// }else if(sou==''){
		// 	url='/3yue/6.28/index.php/Home/Log/ajax/p/'+p'/sou/'+sou
		// }else{
		// 	url='/3yue/6.28/index.php/Home/Log/ajax/p/'+p
		// }
		// var data = "p="+p+'&sou='+sou+'&order='+order
		var xhr=new XMLHttpRequest();
		xhr.open('get','/3yue/6.28/index.php/Home/Log/ajax/p/'+p);
		// ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		xhr.send();
		xhr.onreadystatechange=function(){
			if (xhr.readyState==4&&xhr.status==200) {
				document.getElementById('body').innerHTML=xhr.responseText;
			};
		}
	}
	ajax(1)
	
</script>
</html>