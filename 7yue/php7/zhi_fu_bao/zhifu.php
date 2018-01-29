<?php 
header("content-type:text/html;charset=utf-8");


// 基本参数 必填
$arr1 = array(
		'service'        => 'create_direct_pay_by_user', // 接口名称
		'partner'        => '2088121321528708', // 合作者身份ID
		'_input_charset' => 'utf-8', // 参数编码字符集
		'sign_type'      => 'MD5', // 签名方式 -
		'sign'           => '1', // 签名 -
		'transport'      => 'http'
		);
		// 业务参数
$arr2 = array(
		'out_trade_no'   => '000000001', // 商户网站唯一订单号
		'subject'        => 'xiao', // 商品名称
		'payment_type'   => '1', // 支付类型
		'total_fee'      => '0.01', // 交易金额
		'seller_email'   => 'itbing@sina.cn', // 卖家支付宝用户号
		
		// 'buyer_id'       => '2088002007018966', // 	买家支付宝用户号
		// 'price'          => '0.01', // 商品单价
		// 'quantity'       => '1', // 购买数量
		);

$arr = array_merge($arr1,$arr2);
foreach ($arr as $k => $v) {
	if ($v=='' || $k=='sign_type' || $k=='sign') {
		unset($arr[$k]);
	}
}
asort($arr);
reset($arr);
$str = '';
foreach ($arr as $k => $v) {
	$str .= $k.'='.$v.'&';
}
$str = trim($str,'&').'1cvr0ix35iyy7qbkgs3gwymeiqlgromm';
$arr['sign'] = md5($str);
$arr['sign_type'] = 'MD5';
$str = '';
foreach ($arr as $k => $v) {
	$str .= $k.'='.$v.'&';
}
$str = trim($str,'&');
$url = 'https://mapi.alipay.com/gateway.do?'.$str;
var_dump($url);
echo " <a href='".$url."'>aaa</a>";
echo "<br>";
$b = payment('000000001','0.01');
var_dump($b);

echo " <a href='".$b."'>bbb</a>";







//封装的支付 参1,订单号 2,金额 3,同步路径
	 function payment($dingdan,$jine,$url='')
	{
		$alipay_config['partner']      = '2088121321528708';
		//收款支付宝账号
		$alipay_config['seller_email'] = 'itbing@sina.cn';
		//安全检验码，以数字和字母组成的32位字符
		$alipay_config['key']          = '1cvr0ix35iyy7qbkgs3gwymeiqlgromm';
		//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
		//签名方式 不需修改
		$alipay_config['sign_type']    = strtoupper('MD5');
		//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
		$alipay_config['transport']    = 'http';
		// *************************************************配置 end***********************

		// ****************************************请求参数拼接 start**********************
		$parameter = array(
			"service"           => "create_direct_pay_by_user",
			"partner"           => $alipay_config['partner'], // 合作身份者id
			"seller_email"      => $alipay_config['seller_email'], // 收款支付宝账号
			"payment_type"      => '1', // 支付类型
			"notify_url"        => "http://localhost/res.php", // 服务器异步通知页面路径
			"return_url"        => $url, // 页面跳转同步通知页面路径
			"out_trade_no"      => $dingdan, // 商户网站订单系统中唯一订单号
			"subject"           => "订单", // 订单名称
			"total_fee"         => $jine, // 付款金额
			"body"              => "", // 订单描述 可选
			"show_url"          => "", // 商品展示地址 可选
			"anti_phishing_key" => "", // 防钓鱼时间戳 若要使用请调用类文件submit中的query_timestamp函数
			"exter_invoke_ip"   => "", // 客户端的IP地址
			"_input_charset"    => 'utf-8', // 字符编码格式
		);
		// 去除值为空的参数
		foreach ($parameter as $k => $v) {
		    if (empty($v)) {
		        unset($parameter[$k]);
		    }
		}
		// 参数排序
		ksort($parameter);
		reset($parameter);

		// 拼接获得sign
		$str = "";
		foreach ($parameter as $k => $v) {
		    if (empty($str)) {
		        $str .= $k . "=" . $v;
		    } else {
		        $str .= "&" . $k . "=" . $v;
		    }
		}
		$parameter['sign'] = md5($str . $alipay_config['key']); // 签名
		$parameter['sign_type'] = $alipay_config['sign_type'];

		$url = "https://mapi.alipay.com/gateway.do?";
		$str = "";
		foreach ($parameter as $k => $v) {
		    if (empty($str)) {
		        $str .= $k . "=" . $v;
		    } else {
		        $str .= "&" . $k . "=" . $v;
		    }
		}
		return $url.$str;
	}









 ?>
 <a href=""></a>
