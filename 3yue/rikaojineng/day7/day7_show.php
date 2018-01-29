<?php 
header('content-type:text/html;charset=utf8');

$page=!empty($_GET['page'])?$_GET['page']:1;
$pianyi=ceil($page-1)*5;

require('class.php');
$db=new Db('127.0.0.1','root','0509','day3rikao');
$sql=$db->select('*','day7',"id limit $pianyi,5");

$res=$db->select1('*','day7',5);

?>
<?php foreach ($sql as $key => $v) { ?>
	<tr>
		<td><?php echo $v['id'] ?></td>
		<td><?php echo $v['name'] ?></td>
		<td><?php echo $v['sex'] ?></td>
		<td><?php echo $v['class'] ?></td>

		<td><a href="javascript:void(0)" onclick="del(<?php echo $v['id']?>,<?php echo $page?>)">删除</a></td>
	</tr>
<?php } ?>
<tr>现<?php echo $page?>
	<td colspan="5"><a href="javascript:void(0)" onclick="t_body(1)">首页</a>
	<a href="javascript:void(0)" onclick="t_body(<?php echo $page-1?>)">上一页</a>
	<a href="javascript:void(0)" onclick="t_body(<?php echo $page+1?>)">下一页</a>
	<a href="javascript:void(0)" onclick="t_body(<?php echo $res[0]?>)">总</a>共<?php echo $res[0]?>
	</td>
</tr>