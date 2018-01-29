<?php
/**
 * curl 封装
 * @Author: Marte
 * @Date:   2017-09-28 16:50:17
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-09-29 09:42:33
 */
/**
*
*/
class Curl
{
    public $ch;
    //构造函数 当实例化时自动执行
    function __construct()
    {
        $this->ch = curl_init();//1.初始化，创建一个新cURL资源
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER,false); // 对认证证书来源的检查
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST,false); // 从证书中检查SSL加密算法是否存在
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER,1);  // 获取的信息以文件流的形式返回，而不是直接输出
        curl_setopt($this->ch, CURLOPT_HEADER,0);             // 是否返回header区域的内容
        curl_setopt($this->ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:55.0) Gecko/20100101 Firefox/55.0');// 模拟用户使用的浏览器
    }
    //curl 的post 模式 参1,路径 参2,路径页面需要的传值 数组形式
    public function curl_post($url,$arr)
    {
        curl_setopt($this->ch, CURLOPT_URL, $url);      // 2.设置URL和相应的选项
        curl_setopt($this->ch, CURLOPT_POST,1);         // 设置启用post方式发送请求
        curl_setopt($this->ch, CURLOPT_POSTFIELDS,$arr);// 设置post请求参数
        curl_setopt($this->ch, CURLOPT_COOKIEJAR,dirname(__FILE__).'\aaa.txt');// 存放Cookie信息的文件名称
        curl_setopt($this->ch, CURLOPT_COOKIEFILE,dirname(__FILE__).'\aaa.txt');// 读取cookie文件信息的数据

        // $file = curl_exec($this->ch);//3.抓取URL并把它传递给浏览器
        // curl_close($this->ch);//4.关闭cURL资源，并且释放系统资源
        // return $file;
        return $this->exec();
    }
    public function exec()
    {
        $file = curl_exec($this->ch);//3.抓取URL并把它传递给浏览器
        curl_close($this->ch);//4.关闭cURL资源，并且释放系统资源
        return $file;
    }

    //curl 的get 模式 参1,路径 参2,路径页面需要的传值 数组形式
    public function curl_get($url,$arr)
    {
        //循环处理get传参信息
        $str = '';
        foreach ($arr as $k => $v) {
            $str .= $k.'='.$v.'&';
        }
        $url = strpos($url,'?') ? $url.'&'.$str : $url.'?'.$str;//判断地址是否有?
        curl_setopt($this->ch, CURLOPT_URL, $url);      // 2.设置URL和相应的选项
        curl_setopt($this->ch, CURLOPT_COOKIEJAR,dirname(__FILE__).'\aaa.txt');// 存放Cookie信息的文件名称
        curl_setopt($this->ch, CURLOPT_COOKIEFILE,dirname(__FILE__).'\aaa.txt');// 读取cookie文件信息的数据

        $file = curl_exec($this->ch);//3.抓取URL并把它传递给浏览器
        curl_close($this->ch);//4.关闭cURL资源，并且释放系统资源
        return $file;
        // return $url;
    }
}







$arr = array('username'=>'rg1511phpA48','password'=>'123456','uop'=>'192.168.207.59');
$url = 'http://172.27.0.200/exam/index.php?m=Index&a=login';
$curl = new Curl;
var_dump($curl->curl_post($url,$arr));

// $arr = array('username'=>'rg1511phpA48','password'=>'123456','uop'=>'192.168.207.59');
// $url = 'http://127.0.0.1/php7/shiyan.php?';

// $curl = new Curl;
// var_dump($curl->curl_get($url,$arr));