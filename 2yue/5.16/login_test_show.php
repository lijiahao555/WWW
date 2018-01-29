<?php 
header('content-type:text/html;charset=utf8');
if (empty($_COOKIE['name'])) {
	echo "请输入账号密码后登录";die;
}else{
echo "欢迎"."<font color='red' size=20px;>".$_COOKIE['name']."</font>"."先生登录";


}




 ?>