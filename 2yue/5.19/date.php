<?php 
header('content-type:text/html;charset=utf8');
$username=$_POST['username'];
$pwd=$_POST['pwd'];
$file=$_FILES;


// if ($file['choice']['error']==0) {
// 	$file_name=time().rand(0,20000);
// 	$houzhui=substr($file['choice']['name'], strrpos($file['choice']['name'],'.'));
// 	$team='./img/'.$file_name.$houzhui;
// 	move_uploaded_file($file['choice']['tmp_name'] , $team);
// 	echo $team;die;
// }else{
// 	echo "失败";die;
// }
// //move_uploaded_file($file['choice']['name'] , './img/'.$file['choice']['name']);
// var_dump($file);die;





if ($file['choice']['error']==0) {
	//起文件名，保持唯一性。
	$file_name=time().rand(0,20000);
	$houzhui=substr($file['choice']['name'], strrpos($file['choice']['name'],'.'));
	
	//选择文件路径加名字.后缀
	$team='./img/'.$file_name.$houzhui;

	//创建文件夹  第一参数文件夹名字，第二参数权限 ,第三个参数（如果包含子目录，true不写创建不成功）
	//mkdir('./img/',0777, true);
	//判断一个路径 返回true文件夹存在，false文件不存在
	if (!file_exists('./img')) {
		mkdir('./img/',0777);
	}
	move_uploaded_file($file['choice']['tmp_name'] , $team);

	mysql_connect('127.0.0.1','root','0509');
	mysql_select_db('exam');
	mysql_query('set names utf8');
	$sql="insert into demo1 values(null,'$username','$pwd','$team')";
	
	if (mysql_query($sql)) {
	
	header('location:show.php');
	}else{
		echo "添加失败";
	}
}else{
	echo "添加失败";
}


 ?>