`<?php
//引入原来的类文件
require 'public/PHPMailer/class.phpmailer.php';
class Mail {
        static public $error = '';//定义一个静态属性
        //定义一个静态方法，只能通过类来调用
        static public function send($title,$content,$user,$address){
                $mail= new PHPMailer();//实例化这个对象，在class.phpmailer.php中有这个对象
                /*服务器相关信息*/
                $mail->IsSMTP();                //设置使用SMTP服务器发送
                $mail->SMTPAuth   = true;       //开启SMTP认证
                $mail->SMTPSecure = 'ssl';      //设置使用ssl加密方式登录鉴权
                $mail->Port       = 465;        //设置ssl连接smtp服务器的远程服务器端口号 可选465或587
                $mail->Host       = 'smtp.qq.com';   	  //设置 SMTP 服务器,自己注册邮箱服务器地址,注册什么邮箱就写什么邮箱的服务器，如果是新浪就写smtp.sina.com
                $mail->Username   = '2603559572@qq.com';  //发信人的邮箱名称
                $mail->Password   = 'jwazslanfiirecej';   //发信人的邮箱授权码不是密码，注册的时候要填写的
                /*内容信息*/
                $mail->IsHTML(true);                      //指定邮件格式为：html不加true默认为以text的方式进行解析
                $mail->CharSet    ="UTF-8";			     //编码
                $mail->From       = '2603559572@qq.com'; //发件人完整的邮箱名称
                $mail->FromName   = $user;			     //发信人署名
                $mail->Subject    = $title;  			 //信的标题
                $mail->MsgHTML($content);  				 //发信主体内容
                //$mail->AddAttachment("15.jpg");	     //附件
                /*发送邮件*/
                $mail->AddAddress($address);  			 //收件人地址
                //使用send函数进行发送
                if($mail->Send()) {
                    return true;
                } else {
                     self::$error=$mail->ErrorInfo;
                     return   false;
                }
        }
}


?>