<?php
header('content-type:text/html;charset=utf8');

// token
$token = $_POST['token'];

$post = $_POST;
print_r($post);die;
$arr = array();
foreach ($post['father_type'] as $key => $val) {
	$parent = array();

	if ($val == 'parent') {
		//有子级 二级菜单

		//名字
		$parent['name'] =  $_POST['father_name'][$key];

		foreach ($post['child_type'][$key] as $k => $v) {

			//判断是 点击事件还是视图事件
			switch ($v) {
				case 'click': $c_key = 'key';break;
				case 'view': $c_key = 'url';break;
			}

			// 拼接数据
			$str = array('name' => $_POST['child_name'][$key][$k] , 'type' => $v , $c_key => $_POST['child_content'][$key][$k] );

			// 二级菜单内容
			$parent['sub_button'][] = $str;
		}
	}else{
		// 父级 一级菜单

		//判断是 点击事件还是视图事件
		switch ($v) {
			case 'click': $c_key = 'key';break;
			case 'view': $c_key = 'url';break;
		}

		$parent = array('name' => $post['father_name'][$key] , 'type' => $val , $c_key => $post['father_content'][$key]);
	}
	//赋值
	$arr[] = $parent;
}
//赋值
$data['button'] = $arr;

//转换json数据 	JSON_UNESCAPED_UNICODE转换成文字
$data = json_encode($data,JSON_UNESCAPED_UNICODE);

// 链接
$url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$token;

// 初始化curl
$curl = curl_init();

// 设置参数 路径
curl_setopt($curl,CURLOPT_URL,$url);

// 设置网页不输出
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

//设置post提交
curl_setopt($curl,CURLOPT_POST,1);

// 设置post提交参数
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);

//我们使用浏览器访问https的时候，浏览器会自动加载网站的安全证书进行加密。但是你用curl请求https时，没有通过浏览器，就只有自己手动增加一个安全证书进行加密。
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

//执行
$data = curl_exec($curl);

//关闭
curl_close($curl);

//json转换
var_dump(json_decode($data,true));