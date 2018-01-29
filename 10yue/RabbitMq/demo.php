<?php
$conn_args = array(
        'host'=>'127.0.0.1',  //rabbitmq 服务器host
        'port'=>5672,         //rabbitmq 服务器端口
        'login'=>'guest',     //登录用户
        'password'=>'guest',   //登录密码
        'vhost'=>'/'         //虚拟主机
    );
$e_name = 'e_lin';
$q_name = 'q_de';
$k_route = 'key_11';

$conn = new AMQPConnection($conn_args);
if(!$conn->connect()){
    die('Cannot connect to the broker');
}
$channel = new AMQPChannel($conn);

$ex = new AMQPExchange($channel);
$ex->setName($e_name);
$ex->setType(AMQP_EX_TYPE_DIRECT);
$ex->setFlags(AMQP_DURABLE);
$status = $ex->declareExchange();  //声明一个新交换机，如果这个交换机已经存在了，就不需要再调用declareExchange()方法了.

$q = new AMQPQueue($channel);
$q->setName($q_name);
$status = $q->declareQueue(); //同理如果该队列已经存在不用再调用这个方法了。

for ($i=0; $i <5 ; $i++) {
    $ex->publish('dwqdqwdadwq'.$i, $k_route);
}
























$config = [
    'host'=>'127.0.0.1',  //rabbitmq 服务器host
    'port'=>5672,         //rabbitmq 服务器端口
    'login'=>'guest',     //登录用户
    'password'=>'guest',   //登录密码
    'vhost'=>'/'         //虚拟主机
];

// 创建连接
$conn = new AMQPConnection($config);

// 无法连接到代理！
if (!$conn->connect()) {
    die("Cannot connect to the broker!\n");
}

//创建channel通道
$channel = new AMQPChannel($conn);

//交换机名
$e_name = 'e_linvo1';

// 交换机 key
$k_route = array(0=> 'key_1', 1=> 'key_2');

//创建一台交换机
$ex = new AMQPExchange($channel);

//设置交换机名
$ex->setName($e_name);

//设置交换机的类型
$ex->setType(AMQP_EX_TYPE_DIRECT);

//设置交换机持久化
$ex->setFlags(AMQP_DURABLE);

// 循环往 值value 下标key
for($i=0; $i<5; ++$i){
	// $a = [$i=>'连傻逼'.$i . date('H:i:s')];
    echo $ex->publish(date('H:i:s'), $k_route[0]);
}
