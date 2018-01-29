<?php
// 支付宝 快速支付
header('content-type:text/html;charset=utf-8');

//基本参数
$param = array(

	'service'=>'create_direct_pay_by_user',	//接口名称
	'partner'=>'2088121321528708',			//合作者身份
	'_input_charset'=>'utf-8',				//字符编码
	'sign_type'=>'MD5',						//签名方式
	'sign'=>'',
	'ntify_url'=>'',						//异步通知
	'return_url'=>''						//同步跳转
);

$yw = array(
	'out_trade_no'=>'aabbcc',				//业务参数
	'subject'=>'名称',						//商品名称
	'payment_type'=>1,						//支付类型
	'total_fee'=>'0.01',					//支付价格
	'seller_email'=>'itbing@sina.cn'		//收款账户
);

$paraminfo = array_merge($param, $yw);

//筛选
foreach($paraminfo as $key=>$val){
	if(empty($val) || $key == 'sign' || $key == 'sign_type') unset($paraminfo[$key]);
}

//排序
ksort($paraminfo);
reset($paraminfo);

//生成代签名
$str = '';
foreach($paraminfo as $key=>$val){
	$str .= $key.'='.$val.'&';
}
$str = trim($str, '&');

// _input_charset=utf-8&out_trade_no=aabbcc&partner=2088121321528708&payment_type=1&seller_email=itbing@sina.cn&service=create_direct_pay_by_user&subject=名称&total_fee=0.01
// _input_charset=utf-8&out_trade_no=aabbcc&partner=2088121321528708&payment_type=1&seller_email=itbing@sina.cn&service=create_direct_pay_by_user&subject=名称&total_fee=0.01
//生成签名
$sign = MD5($str.'1cvr0ix35iyy7qbkgs3gwymeiqlgromm');


//重组表单数据
$paraminfo['sign'] = $sign;
$paraminfo['sign_type'] = 'MD5';


$html = "<form id='alipaysubmit' name='alipaysubmit' action='https://mapi.alipay.com/gateway.do?'>";

foreach($paraminfo as $key=>$val){
	$html .= ':<input type="text" name="'.$key.'" value="'.$val.'" />';
}
$html .= '</form>';

$html .= '<script>document.getElementById("alipaysubmit").submit();</script>';
echo $html;



