<?php 
header('content-type:text/html;charset=utf8');
require('class.php');
$db=new Db('127.0.0.1','root','0509','day3rikao');
$sql=$db->select('*','day6','id');


 ?>
 <center>
 	<table border="1">
 		<th>ID</th>
 		<th>书名</th>
 		<th>价格</th>
 		<th>作者</th>
 		<th>图片</th>
 		<?php 
 		foreach ($sql as $key => $v) {?>
 			<tr>
 				<td><?php echo $v['id'] ?></td>
 				<td><?php echo $v['name'] ?></td>
 				<td><?php echo $v['price'] ?></td>
 				<td><?php echo $v['username'] ?></td>
 				<td><img src="<?php echo $v['file']?>" width="50"></td>
 			</tr>

 	<?php	}

 		 ?>
 	</table>
 </center>