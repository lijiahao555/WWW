<?php 
header('content-type:text/html;charset=utf8');

$name=$_GET['name'];
$info=$_GET['info'];



require('./class.php');

$db=new Db('127.0.0.1','root','0509','day3rikao');
$r_sql="select * from day12 where name='$name' and info='$info'";
$res=mysql_query($r_sql);
$arr=mysql_fetch_assoc($res);

if ($arr) {
	echo 1;die;
}




// $sql=array($name,$info);
$db->add('day12',$_GET);


$s_sql=$db->select('*','day12','id');

 ?>
 <?php 
foreach ($s_sql as $key => $v) {?>
	<tr>
		<td><?php echo $v['name'] ?></td>
		<td><?php echo $v['info'] ?></td>
		<td><?php echo date('Y-m-d H:i:s') ?></td>
	</tr>

<?php
}
  ?>