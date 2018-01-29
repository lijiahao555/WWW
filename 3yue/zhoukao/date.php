<?php 
header('content-type:text/html;charset=utf8');
$page=!empty($_GET['page'])?$_GET['page']:'';

$sex=substr($name,6,8 );
if ($sex%2!=0) {
	$sex1="男";
}else{
	$sex1="女";
}
$age1=(2017-1995);
$sex2=("1995-05-09");
 ?>
<center>
请输入身份证号<input type="text" name="name" value="<?php echo $name?>">
<input type="submit" value="分析">

<hr/>
年龄：<input type="text" name="age" value="<?php echo $age1?>"><br/>
出生年月：<input type="text" name="month" value="<?php echo $sex2?>"><br/>
性别：<input type="text" name="sex" value="<?php echo $sex1?>"><br/>
</center>
