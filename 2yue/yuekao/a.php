<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	 <center>
	 学生姓名:<input type="text" id="cha"><button onclick="js_show(1)">查询</button>
	 	<table border="1">
	 		<thead>
	 			 <th>选择</th>
                 <th>学生学号</th>
                 <th>学生姓名</th>
                 <th>违纪类型</th>
                 <th>讲师</th>
                 <th>班主任</th>
                 <th>班级</th>
                 <th>违纪时间</th>
                 <th>记录人</th>
                 <th>状态</th>
	 		</thead>
            <tbody id="aaaa">
            	
            </tbody>
            <tr>
	 			<td colspan="10" align="center">
	 			  每页显示
	 				<select id="num" onchange="js_show(1)">
	 					<option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
	 				</select>
	 			</td>
	 		</tr>
	 	</table>
	 </center>
</body>
<script>
	function js_show(page,total) {

		if(page==0){
			alert('已经是第一页了')
			return false
		}
		if(page>total){
			alert('已经是最后一页了')
			return false
		}
		var page_num=document.getElementById('num').value	
		var cha=document.getElementById('cha').value
		var xhr=new XMLHttpRequest()
		xhr.open('get','b.php?page='+page+'&cha='+cha+'&page_num='+page_num)
		xhr.send(null)
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4&&xhr.status==200){
               document.getElementById('aaaa').innerHTML=xhr.responseText
			}
		}	
	}

	js_show(1)

</script>
</html>