<?php

$conn_args = [
        'host'=>'127.0.0.1',
        'port'=>5672,
        'login'=>'guest',
        'password'=>'guest',
        'vhost'=>'/'
    ];
$e_name = 'e_lin';
$q_name = 'q_demo';
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

$q = new AMQPQueue($channel);

$q->setName($q_name);
$q->bind($e_name, $k_route);
echo $num = $q->declareQueue();

$arr = $q->get();


if ($arr) {
    $res = $q->ack($arr->getDeliveryTag());
    $msg = $arr->getBody();
    var_dump($msg);die;
}else{
    echo "队列没东西了";
}
die;



















$config = [
    'host'=>'127.0.0.1',  //rabbitmq 服务器host
    'port'=>5672,         //rabbitmq 服务器端口
    'login'=>'guest',     //登录用户
    'password'=>'guest',   //登录密码
    'vhost'=>'/'         //虚拟主机
];

//交换机名
$e_name = 'e_linvo1';

// 消息队列名
$q_name = 'q_demo1';

// 下标key
$k_route = 'key_1';

// 实例化 创建链接
$conn = new AMQPConnection($config);

//没连接成功
if(!$conn->connect()){
    die('Cannot connect to the broker');
}

// 创建channel通道
$channel = new AMQPChannel($conn);

//创建一台交换机
$ex = new AMQPExchange($channel);

//设置交换机名字
$ex->setName($e_name);

//设置交换机类型
$ex->setType(AMQP_EX_TYPE_DIRECT);

//设置持久化链接
$ex->setFlags(AMQP_DURABLE);

//创建一台队列
$q = new AMQPQueue($channel);

//设置 队列的名字
$q->setName($q_name);

//交换机name  和  下标key
$q->bind($e_name, $k_route);

//创建连接对象
$arr = $q->get();
if ($arr) {
	$res = $q->ack($arr->getDeliveryTag());
	$msg = $arr->getBody();
	var_dump(json_decode($msg, true));
} else {
	echo "没有队列了";
}
