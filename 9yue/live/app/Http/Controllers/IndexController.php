<?php
/**
 * 前台首页控制器
 */
namespace App\Http\Controllers;

use Illuminate\Http\Remquest;
use Session,RabbitMq;
use Illuminate\Support\Facades\Input;

use App\Jobs\QueuedTest;
use App\Http\Requests;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

use App\Jobs\Queue;

class IndexController extends Controller
{

	public function index(){

		return view('index/index');
	}

	/** 秒杀 */
	public function miaosha()
	{
		//获取静态页面路径
		$url = base_path().'/resources/views/miaosha/miaosha.html';

		//不存在缓存
		if (!file_exists($url)) {
			echo 1;

			//url
			$get_url = 'http://localhost/8yue/iwebshop4.7/index.php?controller=api&action=index&limit=4&miaosha=1';

			//拉取数据
			$data = json_decode($this->get($get_url), true);

			//处理名字
			foreach ($data['data'] as $key => $v) {
				$data['data'][$key]['name'] = str_replace(substr($v['name'], strpos($v['name'], '（')), '...', $v['name']);
			}


			//赋值
			$html = view('miaosha/miaosha', ['data' => $data['data']])->__toString();

			//写入文件
			file_put_contents($url, $html);
		}

		//输出页面
		require_once "$url";
			// return view('miaosha/miaosha', ['data' => $data]);

	}

	/** 处理秒杀 */
	public function list()
	{
		if (!empty($rand = Input::get('rand'))) {

			if ($rand == Session::get('rand')) {
				$data = [
			        'host'=>'127.0.0.1',  //rabbitmq 服务器host
			        'port'=>5672,         //rabbitmq 服务器端口
			        'login'=>'guest',     //登录用户
			        'password'=>'guest',   //登录密码
			        'vhost'=>'/'         //虚拟主机
			    ];
			    $arr = ['e_name' => 'miaosha','q_name' => 'm_1','key' => 'key1'];
				$connect = new RabbitMq($data);

				// for ($i=1; $i <501 ; $i++) {
				// 	// $res = $connect->get($arr);
				// 	$res = $connect->set($arr,$i);
				// }

				$res = $connect->get($arr);
				$res2 = $connect->num($arr);
				var_dump($res2);
				// echo $res;die;
				if ($res) {
					echo '666';
					$user_info['user_id'] = 25;
					$user_info['user_name'] = '李四';
					$user_info['user_address'] = '北京市海淀区八维研修学院';
					$a = $connect->set(['e_name' => 'miaosha','q_name' => 'm_2','key' => 'key1'], json_encode($user_info));
					echo $a;

				} else {
					echo "<script>alert('秒杀失败');location.href=history.back()</script>";
				}

			} else {
				echo "非法登录";
			}

		} else {
			echo "秒杀没有开始";
		}
	}

	/** url动态化 */
	public function url()
	{
		if (empty(Session::get('rand'))) {
			Session::set('rand', rand(1000,9999));
		}

		$m_time = strtotime('2018-1-16 18:30:10');
		$d_time = time();

		if ($m_time <= $d_time) {
			return json_encode(['url' => 'list?rand='.Session::get('rand')]);
		}else{
			return json_encode(['url' => 'list']);
		}
	}


	/** curl post方法 */
    public function post($url = '', $data = []){
		$curl = curl_init();
	    curl_setopt($curl, CURLOPT_URL, $url);
	    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
	    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	    curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    $data = curl_exec($curl); // 3.抓取URL并把它传递给浏览器
        curl_close($curl);

        return $data;
	}

    /** curl get方法 */
	public function get($url = '', $arr = ''){
		$curl = curl_init();
		if (is_array($arr)) {
			$url = $this->get_array($arr,$url);
		}
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);	// 设置网页不输出
	    curl_setopt($curl, CURLOPT_URL, $url);//2.设置URL和相应的选项
	    $data = curl_exec($curl); // 3.抓取URL并把它传递给浏览器
        curl_close($curl);
        return $data;
	}

    /** 拼接数组成字符串 */
	public function get_array($arr,$url){
		$str = $url.'?';
		foreach ($arr as $k => $v) {
			$str .= $k.'='.$v.'&';
		}
		return trim($str,'&');
	}

}
