<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$t_tel=!empty($_GET['t_tel'])?$_GET['t_tel']:'';

//三元运算符判断
$set=!empty($_GET['set'])?$_GET['set']:1;
//查询所有条数
$sql1="select count(*) as num from demo2 where username like '%$t_tel%'";
//执行sql语句
$ziyuan=mysql_query($sql1);
//执行完返回资源，运用函数取资源
$zong=mysql_fetch_assoc($ziyuan);
//公式算出条数
$zuhe=ceil($zong['num']/5);
//设置偏移量
$count_a=($set-1)*5;

$sql="select * from demo2 where username like '%$t_tel%' limit $count_a,5";
$res=mysql_query($sql);





 ?>

 <center>
  
 	 <input type="text" placeholder="根据名字搜索" id="t_tel" value="<?php echo $t_tel ?>"><input type="submit" onclick="sel()">

 	<table border="1">
 		<th>ID</th>
 		<th>姓名</th>
 		<th>性别</th>
 		<th>年月</th>
 		<th>身份证</th>
 		<th>图片</th>
 		<th>电话</th>
 		<th>邮箱</th>
 		<th>学历</th>
 		<th>学院</th>
 		<th>时间</th>
 		<th>多选</th>
 		<th>操作</th>
 		<?php 
 		while ($arr=mysql_fetch_assoc($res)) {
 			echo "<tr id='dd".$arr['id']."'>";
 				echo "<td><input type='checkbox' name='box' value='{$arr['id']}'></td>";
 				echo "<td>".$arr['id']."</td>";
 				echo "<td>".$arr['username']."</td>";
 				echo "<td>".$arr['sex']."</td>";
 				echo "<td>".$arr['month']."</td>";
 				echo "<td>".$arr['card']."</td>";
 		
				echo "<td>".$arr['tel']."</td>";
				echo "<td>".$arr['email']."</td>";
				echo "<td>".$arr['xueli']."</td>";
				echo "<td>".$arr['school']."</td>";
				echo "<td>".$arr['time']."</td>";
				echo "<td>".$arr['box']."</td>";
 				echo "<td>
 				<a href='javascript:void(0)' onclick=js_delete({$arr['id']},this)>删除</a>
 				
 			</td>";
 			echo "</tr>";
 		}
 		 ?>
 	</table>
 	<button onclick="c_all()">全选</button><button onclick="no()">全不选</button><button onclick="fan()">反选</button><button onclick="pi()">批删</button><br>
		当前页为<?php echo $set?>页
		<a href="javascript:void(0)" onclick="js_jump(1)">首页</a>
		<a href="javascript:void(0)" onclick="js_jump(<?php echo $set-1?>)">上一页</a>
		<a href="javascript:void(0)" onclick="js_jump(<?php echo $set+1?>)">下一页</a>
		<a href="javascript:void(0)" onclick="js_jump(<?php echo $zuhe?>)">尾页</a>
		共<?php echo $zuhe?>
		<input type="hidden" id="yc" value="<?php echo $zuhe?>">
		
		<input type="text" style="width:50px;" id="ye"> <button onclick="js_go()">go</button>
 </center>

 <script>
	 function pi(){
	 	if (confirm('删除吗？')) {



	 	var box = document.getElementsByName('box')
	 	var pi = '';
	 		for (var i=0 ; i < box.length; i++) {
	 			if (box[i].checked==true) {
	 				pi+=box[i].value+',';
	 			}; 
	 		};
	 		var xhr = new XMLHttpRequest();
	 		xhr.open('get','tel.php?id='+pi);
	 		xhr.send(null);
	 		xhr.onreadystatechange = function(){
	 			if (xhr.readyState==4 && xhr.status==200) {
	 				if (xhr.responseText==1) {
	 						for (var i=box.length-1 ; i >= 0; i--) {
						 			if (box[i].checked==true) {
						 				box[i].parentNode.parentNode.remove();
						 			}; 
						 		};
	 				}else{
	 					alert('删除失败');
	 				}
	 			};
	 		};
	 		
	 }
};

  function js_delete(id){
 	if (confirm('删除么？')) {

 		//创建
 		var xhr = new XMLHttpRequest();
 		//初始化
 		xhr.open('get','tel.php?id='+id);
 		//发送
 		xhr.send(null);
 		//回调函数 监听状态 
 		xhr.onreadystatechange =function(){
 			if (xhr.readyState==4 && xhr.status==200) {
 				if (xhr.responseText==1) {
 			        //th.parentNode.parentNode.remove()
 			        document.getElementById('dd'+id).remove()
 				}else{
 					alert('删除失败');
 				}
 			};
 		}
 	};

 }

 	function sel(){
 		var t_tel=document.getElementById('t_tel').value;

 		location.href="show.php?t_tel="+t_tel;

 	}


	function js_go(){
		//取出用户输入的页码
		var ye = document.getElementById('ye').value
		//var page = document.getElementById('jump_page').value

		if(ye == ''){
			alert('请输入页码');
			return false
		}

	
		//js_jump(ye)
		location.href="show.php?set="+ye;
	}

 	


	function js_jump(set){
		if (set==0) {
			alert('已经第一页了');
			return false;
		}

		var ycc=document.getElementById('yc').value
		
		if (parseInt(set)>parseInt(ycc)) {
			alert('已经最后页了');
			return false;
		};
		var t_tel=document.getElementById('t_tel').value;
		location.href="show.php?set="+set+"&t_tel="+t_tel;
	}
	

//  function pi(set){
//  	if (confirm('您确认要删除么')) {
//  	var box=document.getElementsByName('box')
//  	var pi=''
//  	for (var i = 0; i < box.length; i++) {
//  		if (box[i].checked==true) {
//  			pi+=box[i].value+','
// 		};
//  	};

//  	location.href='delete.php?id='+pi+'&set='+set;
//  }
// };


function c_all(){
	var box=document.getElementsByName('box');
	for (var i = 0; i < box.length; i++) {
		box[i].checked=true
	};
}
function no(){
	var box=document.getElementsByName('box');
	for (var i = 0; i < box.length; i++) {
		box[i].checked=false;
	};
}
function fan(){
	var box=document.getElementsByName('box');
	for (var i = 0; i < box.length; i++) {
		if (box[i].checked==true) {
			box[i].checked=false;
		}else{
			box[i].checked=true;
		}
	};
}

 </script>