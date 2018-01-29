<?php 
header('content-type:text/html;charset=utf8');

require('Db.php');
$db=new Db('127.0.0.1','root','0509','day3');

$sql=$db->select('*','day5','id');
 ?>

<center>
	<table border="1">
		<th>ID</th>
		<th>姓名</th>
		<th>图片</th>
		<th>性别</th>
		<th>多选</th>
		<?php 
		foreach ($sql as $key => $v) {
			?>
		<tr>
			<td><?php echo $v['id'] ?></td>
			<td><?php echo $v['name'] ?></td>
			<td><img src="<?php echo $v['filel']?>"></td>
			<td><?php echo $v['sex'] ?></td>
			<td><?php echo $v['box'] ?></td>
			
		</tr>
		<?php
			}
		 ?>
	</table>
</center>
