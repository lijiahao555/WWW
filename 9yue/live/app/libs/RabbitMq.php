<?php
/**
* RabbitMQ 类
*/
class RabbitMq
{

	private static $connect;	//连接
	private static $channel;	//连接

	function __construct($data = [])
	{
		// 创建链接 赋值给静态变量
		if (empty(self::$connect)) {

			self::$connect = new AMQPConnection($data);
			if (!self::$connect->connect()) {
			    die("无法连接");
			}
		}

		// 创建通道 赋值给静态变量
		if (empty(self::$channel)) {

			$channel = new AMQPChannel(self::$connect);
			self::$channel = $channel;
		}

	}

	/**
	 * 取数据
	 * @param  array  	$data 	array  	交换机名 队列名  键名
	 * @param  string 	$param 	string 	数据
	 * @return [type]       	bool
	 */
	public function set($data = [], $param='')
	{

		//建立交换机
		$ex = new AMQPExchange(self::$channel);

		// 设置交换机名
		$ex->setName($data['e_name']);

		//设置交换机的类型
		$ex->setType(AMQP_EX_TYPE_DIRECT);

		//设置交换机持久化
		$ex->setFlags(AMQP_DURABLE);

		//声明一个新交换机，如果这个交换机已经存在了，就不需要再调用declareExchange()方法了.
		$status = $ex->declareExchange();

		//建立队列
		$q = new AMQPQueue(self::$channel);

		//绑定队列名
		$q->setName($data['q_name']);

		//声明一个新队列，如果这个队列已经存在了，就不需要再调用declareQueue()方法了.
		$q->declareQueue();//同理如果该队列已经存在不用再调用这个方法了。

		//返回存储状态
		return $ex->publish($param, $data['key']);

	}

	/**
	 * 取数据
	 * @param  array  $data array  交换机名 队列名  键名
	 * @return [type]       bool
	 */
	public function get($data = [])
	{

		//建立交换机
		$ex = new AMQPExchange(self::$channel);

		// 设置交换机名
		$ex->setName($data['e_name']);

		//设置交换机的类型
		$ex->setType(AMQP_EX_TYPE_DIRECT);

		//设置交换机持久化
		$ex->setFlags(AMQP_DURABLE);

		//建立队列
		$q = new AMQPQueue(self::$channel);

		//绑定队列名
		$q->setName($data['q_name']);

		//绑定交换机名 下标
		$q->bind($data['e_name'], $data['key']);

		//获取数据  true false
		$arr = $q->get();

		if ($arr) {

			// 删除rabbitmq里的值
		   	$q->ack($arr->getDeliveryTag());

		   	// 获取值
		    $arr = $arr->getBody();

		}

		//返回
		return $arr;

	}

	/**
	 * 交换机 队列 里有多少条数据
	 * @param  array  $data array  交换机名 队列名  键名
	 * @return [type]       int
	 */
	public function num($data= [])
	{

		//建立队列
		$q = new AMQPQueue(self::$channel);

		//绑定队列名
		$q->setName($data['q_name']);

		//绑定交换机名 下标
		$q->bind($data['e_name'], $data['key']);

		//返回数量
		return $q->declareQueue();

	}

}