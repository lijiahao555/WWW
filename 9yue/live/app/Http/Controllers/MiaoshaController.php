<?php

namespace App\Http\Controllers;



use Illuminate\Http\Remquest;
use Session,RabbitMq;
use Illuminate\Support\Facades\Input;
use App\Jobs\QueuedTest;
use App\Http\Requests;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

use App\Jobs\Queue;

class MiaoshaController extends Controller
{
	public function index()
	{
		echo 1;die;
	}
}