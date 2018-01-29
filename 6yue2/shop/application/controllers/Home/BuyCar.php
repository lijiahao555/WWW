<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuyCar extends Home_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Cart_model','cart');
		$this->load->model('Admin/Product_model','product');
		$this->load->model('Admin/Address_model','address');
		$this->load->model('Admin/Cart_model','cart');
		$this->load->model('Admin/Ci_order_infor_model','order_infor');
		$this->load->model('Admin/Ci_order_goods_model','order_goods');
		$this->load->model('Admin/Goods_attribute_model','goods_attribute');
	}
	/** 展示购物车页面 */
	public function BuyCar(){
		$cart = $this->shopping();
		$arr['cart'] = $cart;
		$arr['category_type'] = $this->common();
		$this->load->view('Home/BuyCar.html',$arr);
	}
	public function two(){
		$cart = $this->shopping();
		$user_id = 3;
		$address = $this->address->get_where_in('user_id',$user_id);
		foreach ($cart as $key => $v) {
			$new_cart[$key] = $v['product_price']*$v['buy_number'];
		}
		
		$arr['cart'] = $cart;
		$arr['new_cart'] = array_sum($new_cart);
		$arr['address'] = $address;
		$arr['category_type'] = $this->common();
		$this->load->view('Home/BuyCar_Two.html',$arr);

	}
	/** 处理购物车展示商品 */
	public function shopping(){
		$user_id = 1;
		//根据用户ID求出所对应的购物车内容
		$cart = $this->cart->get_sel_many(array('user_id'=>$user_id));
		//转换成一维数组，并取出货品ID
		$new_cart = array_column($cart,'product_id');
		//根据货品ID求出货品表中的货品列
		$product_val = $this->product->get_where_in('product_id',$new_cart,'product_list');
		//把根据货品列求出的货品转换成一维数组
		$product_value = array_column($product_val,'product_list');
		//把一维数组转换字符串
		$product_value = implode(',', $product_value);
		//把字符串转换成1维数组
		$product_list = explode(',', $product_value);
		//根据转换的一维数组求出所对应的规格内容
		$attribute_value = $this->goods_attribute->get_where_in('goods_attribute_id',$product_list);
		// $attribute_value = array_column($attribute_value,'attribute_value');
		//循环规格内容 并且把商品规格表中的ID作为键 内容作为value
		foreach ($attribute_value as $key => $value) {
			$attribute_list[$value['goods_attribute_id']]=$value['attribute_value'];
		}
		//循环货品列 2件就循环2次  组成新的1维数组
		foreach ($product_val as $key => $value) {
			$cart_gsp_id = explode(',',$value['product_list']);
			//循环新的数组 值从新赋值
			foreach ($cart_gsp_id as $k => $v) {
				$cart_gsp_id[$k] = $attribute_list[$v];
			}
			//从新赋到数组里  去除多余的
			$cart[$key]['attribute_value'] = $cart_gsp_id;
			unset($cart_gsp_id);
		}
		//返回回去
		return $cart;
	}
	/** 处理确认订单 */
	public function three(){
		$data = $this->input->post();
		$user_id = 1;
		$user = $this->address->get_sel_one(array('user_id'=>$user_id));
		$cart = $this->cart->get_sel_many(array('user_id'=>$user_id));
		$arr['order_sn'] = $this->time();
		$arr['user_id'] = $user_id;
		$arr['order_status'] = 1;
		$arr['shipping_status'] = 0;
		$arr['pay_status'] = 0;
		$arr['message'] = $data['message'];
		$arr['shipping_id'] = 1;
		$arr['shipping_name'] = '申通快递';
		$arr['pay_id'] = $data['pay_id'];
		$arr['shipping_id'] = $data['pay_name'];
		$arr['goods_amount'] = $data['goods_amount'];
		$arr['shipping_fee'] = 0;
		$arr['add_time'] = time();
		$arr['confirm_time'] = time();
		$arr['consignee'] = $data['consignee'];
		$arr['address'] = $data['address'];
		$arr['mobile'] = $data['tel'];
		$order_infor = $this->order_infor->get_add($arr);
		$order_id = $this->order_infor->get_id();
	  	foreach ($cart as $key => $v) {
	  		$order_goods['order_id'] = $order_id;
		  	$order_goods['goods_id'] = $v['goods_id'];
		  	$order_goods['goods_name'] = $v['goods_name'];
		  	$order_goods['goods_sn'] = $v['goods_sn'];
		  	$order_goods['product_id'] = $v['product_id'];
		  	$order_goods['goods_price'] = $v['buy_number'];
		  	$order_goods['buy_number'] = $v['buy_number'];
		  	$order_goods['market_price'] = $v['market_price'];
		  	$order_goods['buy_number'] = $v['buy_number'];
		  	$res = $this->order_goods->get_add($order_goods);
	  	}	
	  	if ($res) {
	  		$arr['category_type'] = $this->common();
	  		$this->load->view('Home/BuyCar_Three.html',$arr);
	  	}else{
	  		success('失败');
	  	}
	}
	public function time(){
		date_default_timezone_set('PRC');
		return date('Ymdhis',time());
	}
	/** 支付 */
	public function get_pay(){
		$alipay_config['partner']		= '2088121321528708';
			$alipay_config['seller_email']	= 'itbing@sina.cn';
			$alipay_config['key']			= '1cvr0ix35iyy7qbkgs3gwymeiqlgromm';
			$alipay_config['sign_type']    = strtoupper('MD5');
			$alipay_config['transport']    = 'http';
			$parameter = array(
			    "service" => "create_direct_pay_by_user",
			    "partner" => $alipay_config['partner'], // 合作身份者id
			    "seller_email" => $alipay_config['seller_email'], // 收款支付宝账号
			    "payment_type"	=> '1', // 支付类型
			    "notify_url"	=> "http://localhost/res.php", // 服务器异步通知页面路径
			    "return_url"	=> "http://localhost/notify.php", // 页面跳转同步通知页面路径
			    "out_trade_no"	=> "4489489488456", // 商户网站订单系统中唯一订单号
			    "subject"	=> "订单", // 订单名称
			    "total_fee"	=> "0.01", // 付款金额
			    "show_url"	=> "", // 商品展示地址 可选
			    "anti_phishing_key"	=> "", // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
			    "exter_invoke_ip"	=> "", // 客户端的IP地址
			    "_input_charset"	=> 'utf-8', // 字符编码格式
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
			$parameter['sign'] = md5($str . $alipay_config['key']);	// 签名
			$parameter['sign_type'] = $alipay_config['sign_type'];
			$url_str='';
			foreach ($parameter as $key => $value) {
				if (empty($url_str)) {
			        $url_str .= $key . "=" . $value;
			    } else {
			        $url_str .= "&" . $key . "=" . $value;
			    }
			}
			echo "https://mapi.alipay.com/gateway.do?".$url_str;
	}
	public function exam(){
		$data = $this->input->get();
		pri($data);
	}
	public function pay(){
		$alipay_config['partner']		= '2088121321528708';
		$alipay_config['seller_email']	= 'itbing@sina.cn';
		$alipay_config['key']			= '1cvr0ix35iyy7qbkgs3gwymeiqlgromm';
		$alipay_config['sign_type']    = strtoupper('MD5');
		$alipay_config['transport']    = 'http';
		$parameter = array(
		    "service" => "create_direct_pay_by_user",
		    "partner" => $alipay_config['partner'], // 合作身份者id
		    "seller_email" => $alipay_config['seller_email'], // 收款支付宝账号
		    "payment_type"	=> '1', // 支付类型
		    "notify_url"	=> "http://localhost/res.php", // 服务器异步通知页面路径
		    "return_url"	=> "http://localhost/notify.php", // 页面跳转同步通知页面路径
		    "out_trade_no"	=> "27272542778285790640", // 商户网站订单系统中唯一订单号
		    "subject"	=> "订单", // 订单名称
		    "total_fee"	=> "0.01", // 付款金额
		    "body"	=> "1409phpB", // 订单描述 可选
		    "show_url"	=> "", // 商品展示地址 可选
		    "anti_phishing_key"	=> "", // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
		    "exter_invoke_ip"	=> "", // 客户端的IP地址
		    "_input_charset"	=> 'utf-8', // 字符编码格式
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
		$parameter['sign'] = md5($str . $alipay_config['key']);	// 签名
		$parameter['sign_type'] = $alipay_config['sign_type'];
		$url = "";
		foreach ($parameter as $key => $value) {
		    if (empty($url)) {
		        $url .= $key . "=" . $value;
		    } else {
		        $url .= "&" . $key . "=" . $value;
		    }
		echo "https://mapi.alipay.com/gateway.do?".$url;
		}
	}
}