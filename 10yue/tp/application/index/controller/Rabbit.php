<?php
namespace app\index\controller;


use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use think\Controller;

class Rabbit extends Controller
{
	public function index()
	{
		$connection = new AMQPStreamConnection('127.0.0.1', 5672, 'guest', 'guest');
		$channel = $connection->channel();
		var_dump($connection);
	}
}