<?php

/**
* 封装:curl
* 在 new 本类时new ClassCurl(0) 为直接输出  1为不直接输出,默认为1
* 本类有 get请求 post请求 模拟登陆 方法
*/
class ClassCurl
{
	public $ch; //cURL资源
	function __construct($state=1)
	{
		$this->ch = curl_init();
		// 1.初始化，创建一个新cURL资源
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER,false);
	    // 对认证证书来源的检查
	    curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST,false);
	    // 从证书中检查SSL加密算法是否存在
	    curl_setopt($this->ch, CURLOPT_HEADER,0);
	    // 是否返回header区域的内容
	    curl_setopt($this->ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:55.0) Gecko/20100101 Firefox/55.0');
	    // 模拟用户使用的浏览器
	    curl_setopt($this->ch, CURLOPT_RETURNTRANSFER,$state);
	    // 获取的信息以文件流的形式返回，而不是直接输出
	}
	//析构函数
	function __destruct(){
		curl_close($this->ch);
	    // 4.关闭cURL资源，并且释放系统资源
	}
	// curl get请求 参1,访问网址 参2,数据(一维数组) 参3,cookie文件路径
	public function get($url='http://www.baidu.com',$arr='',$c_url=''){
		if (is_array($arr)) {
			$url = $this->ary($arr,$url);
		}
		if ($c_url) {
			curl_setopt($ch, CURLOPT_COOKIEFILE,$c_url);// 读取cookie文件信息的数据
		}

	    curl_setopt($this->ch, CURLOPT_URL, $url);//2.设置URL和相应的选项
	    return curl_exec($this->ch); // 3.抓取URL并把它传递给浏览器
	}
	// curl post请求
	public function post($url='http://www.baidu.com',$arr=array()){
	    curl_setopt($this->ch, CURLOPT_URL, $url);//2.设置URL和相应的选项
	    curl_setopt($this->ch, CURLOPT_POST,1);    // 设置启用post方式发送请求
	    curl_setopt($this->ch, CURLOPT_POSTFIELDS,$arr);// 设置post请求参数
	    return curl_exec($this->ch);// 3.抓取URL并把它传递给浏览器
	}
	//模拟登陆 参1,访问路径 参2,数据(一维数组) 参3,存放Cookie信息的文件路径
	public function register($url='http://www.baidu.com',$arr=array(),$c_url='D:\phpStudy\WWW\php7\CLASS\aaa.txt'){
		$this->ch = curl_init();
		// 1.初始化，创建一个新cURL资源
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER,false);
	    // 对认证证书来源的检查
	    curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST,false);
	    // 从证书中检查SSL加密算法是否存在
	    curl_setopt($this->ch, CURLOPT_HEADER,0);
	    // 是否返回header区域的内容
	    curl_setopt($this->ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:55.0) Gecko/20100101 Firefox/55.0');
	    // 模拟用户使用的浏览器
	    curl_setopt($this->ch, CURLOPT_RETURNTRANSFER,1);
	    // 获取的信息以文件流的形式返回，而不是直接输出
		curl_setopt($this->ch, CURLOPT_URL, $url);//2.设置URL和相应的选项
	    curl_setopt($this->ch, CURLOPT_POST,1); // 设置启用post方式发送请求
	    curl_setopt($this->ch, CURLOPT_POSTFIELDS,$arr);// 设置post请求参数
	    curl_setopt($this->ch, CURLOPT_COOKIEJAR,$c_url);// 存放Cookie信息的文件名称
	    curl_setopt($this->ch, CURLOPT_COOKIEFILE,$c_url);// 读取cookie文件信息的数据

	    curl_exec($this->ch);// 3.抓取URL并把它传递给浏览器
	    return $this->get('http://172.27.0.200/exam/index.php?m=Index&a=home','',$c_url);

	}
	//辅助get请求,把一维数组变为$v=$k的形式
	public function ary($arr,$url){
		$str = $url.'?';
		foreach ($arr as $k => $v) {
			$str .= $k.'='.$v.'&';
		}
		return trim($str,'&');
	}
}


$curl = new ClassCurl;
$arr = array('username'=>'rg1511phpA48','password'=>'123456','uop'=>'192.168.207.59');
// $a = $curl->register('http://172.27.0.200/exam/index.php?m=Index&a=login',$arr);
$a = $curl->get('http://www.php7.com/CLASS/pp.php',$arr);
// var_dump($curl->post('http://172.27.0.200/exam/index.php?m=Index&a=index',$arr));

var_dump($a);exit;


 ?>