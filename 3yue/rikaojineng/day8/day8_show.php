<?php 
header('content-type:text/html;charset=utf8');
require('class.php');
$db=new Db('127.0.0.1','root','0509','day3rikao');
$sql=$db->select('*','day8','id');
 
 ?>
 <center>
 	<table border="1">
 	<h3>商品列表页面</h3>
 		<th>商品ID</th>
 	 	<th>商品名称</th>
 	 	<th>商品价格</th>
 	 	<th>商品图片</th>
 	 	<th>商品分类</th>
 	 	<th>商品库存量</th>
 	 	<th>商品描述</th> 	
<?php
 foreach ($sql as $key => $v) {?>
	<tr>
		<td><?php echo $v['id'] ?></td>
		<td><?php echo $v['name'] ?></td>
		<td><?php echo $v['price'] ?></td>
		<td><img src="<?php echo $v['file'] ?>" width="50px"></td>
		<td><?php echo $v['type'] ?></td>
		<td><?php echo $v['number'] ?></td>
		<td><?php echo $v['count'] ?></td>
	</tr>
	
<?php		
}
?>
	</table>
</center>