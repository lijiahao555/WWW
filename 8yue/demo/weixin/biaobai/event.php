<?php
header('content-type:text/html;charset=utf-8');

// //token
// $token = 'li';

// //组合数组
// $arr = array($token,$_GET['timestamp'],$_GET['nonce']);

// //排序
// sort($arr);

// //分割成字符串
// $str = implode('', $arr);

// //加密
// $data = sha1($str);

// //相同就给微信服务器返回echostr
// if ($data == $_GET['signature']) {
// 	echo $_GET['echostr'];
// }

// 全局
// $GLOBALS


//调试写入xml
// file_put_contents('./a.xml',$GLOBALS['HTTP_RAW_POST_DATA'] );die;

//加载本地xml 调试
// $res = simplexml_load_file('./a.xml', null, LIBXML_NOCDATA);
// var_dump($res);die;

// LIBXML_NOCDATA 自动过滤cdata的定界符
$res = simplexml_load_string($GLOBALS['HTTP_RAW_POST_DATA'], null, LIBXML_NOCDATA);

//文本
if ($res->MsgType == 'text') {

	if ($res->Content == 'quxiao') {

	}

	if ($res->Content != 'quxiao') {
		//查询当前用户存不存在
		$data = get($res->FromUserName);

		//如果查询回来 编号等于#001 代表添加表白人
		if ($data[0]['number'] == '#001') {

			add('#002',$res->FromUserName,$res->Content);
			$str = '<xml>
					<ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
					<FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
					<CreateTime>'.time().'</CreateTime>
					<MsgType><![CDATA[text]]></MsgType>
					<Content><![CDATA[请输入你想对TA说的话

 或回复 取消 使用其他功能]]></Content>
					</xml>';
		}

		//如果查询回来 编号等于#002 代表添加表白内容 修改数据
		if ($data[0]['number'] == '#002') {

			up($data[0]['id'],$res->Content,'#003');
			$str = '<xml>
					<ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
					<FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
					<CreateTime>'.time().'</CreateTime>
					<MsgType><![CDATA[text]]></MsgType>
					<Content><![CDATA[表白成功，可以去列表查询]]></Content>
					</xml>';
		}

		// 表白成功后 查询的单条
		if ($data[0]['user_name'] == $res->Content) {

			add('#011',$res->FromUserName);
			$str = '<xml>
					<ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
					<FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
					<CreateTime>'.time().'</CreateTime>
					<MsgType><![CDATA[text]]></MsgType>
					<Content><![CDATA[发送成功！！<a href="http://47.95.198.52/weixin/biaobai/back.php?id='.$data[0]['id'].'">点击查看</a>

现在TA可以回复自己的名字看到你的祝福了。]]></Content>
					</xml>';
		}



		//如果查询回来 编号等于#011 代表搜索
		if ($data[0]['number'] == '#011') {

			$data = get_name($res->Content);
			$speak = '';
			foreach ($data as $k => $v) {
				if ($k < 5) {

					$speak .= '第'.($k+1).'条,某人对 '.$v['user_name'].' 说：'.$v['content'].'

					<a href="http://47.95.198.52/weixin/biaobai/back.php?id='.$data[0]['id'].'">点击回复</a>


						';
				}else{
					continue;
				}
			}

			if ($k > 5 ) {
				if ($k-5 != 0 ) {
				$speak .= '<a href="http://47.95.198.52/weixin/biaobai/all.php?name='.$res->Content.'">还有'.($k-5).'条消息，查看全部</a>


					';
				}
			}

			$speak .= '或点击屏幕下面的菜单-写表白, 去给TA写一个';

			$str = '<xml>
					<ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
					<FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
					<CreateTime>'.time().'</CreateTime>
					<MsgType><![CDATA[text]]></MsgType>
					<Content><![CDATA[找到了与 '.$res->Content.' 相关的 '.$num.' 条表白。

					'.$speak.']]></Content>
					</xml>';
		}

		//如果没有查询回来 返回找不到或编写
		if (empty($data)) {
			$str = '<xml>
					<ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
					<FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
					<CreateTime>'.time().'</CreateTime>
					<MsgType><![CDATA[text]]></MsgType>
					<Content><![CDATA[暂时没有找到与 '.$res->Content.' 相关的表白。换个人名试试；

					或点击屏幕下方的菜单 - 写表白 , 去给TA匿名写一个]]></Content>
					</xml>';
		}

		echo $str;
	}
	// $str = '<xml>
	// 		<ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
	// 		<FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
	// 		<CreateTime>'.time().'</CreateTime>
	// 		<MsgType><![CDATA[text]]></MsgType>
	// 		<Content><![CDATA['.$res->Content.']]></Content>
	// 		</xml>';

	// echo $str;
}

// 事件
if ($res->MsgType == 'event') {

	//订阅 关注
	if ($res->Event == 'subscribe') {

		$str = '<xml>
			<ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
			<FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
			<CreateTime>'.time().'</CreateTime>
			<MsgType><![CDATA[text]]></MsgType>
			<Content><![CDATA[欢迎关aaa注！]]></Content>
			</xml>';

		echo $str;
	}

	//取消订阅
	if ($res->Event == 'unsubscribe') {
		$str = '<xml>
			<ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
			<FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
			<CreateTime>'.time().'</CreateTime>
			<MsgType><![CDATA[text]]></MsgType>
			<Content><![CDATA[取消关注aaaa！]]></Content>
			</xml>';

		echo $str;
	}

	if ($res->Event == 'CLICK') {

		//写表白
		if ($res->EventKey == 'xiebiaobai') {

			add('#001',$res->FromUserName);
			$str = '<xml>
					<ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
					<FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
					<CreateTime>'.time().'</CreateTime>
					<MsgType><![CDATA[text]]></MsgType>
					<Content><![CDATA[请输入准备表白人名字]]></Content>
					</xml>';
		}

		//查表白
		if ($res->EventKey == 'chabiaobai') {
			// $str = '<xml>
			// 		<ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
			// 		<FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
			// 		<CreateTime>'.time().'</CreateTime>
			// 		<MsgType><![CDATA[news]]></MsgType>
			// 		<ArticleCount>2</ArticleCount>
			// 		<Articles>
			// 		<item>
			// 		<Title><![CDATA[非常牛逼的图片1]]></Title>
			// 		<Description><![CDATA[大1]]></Description>
			// 		<PicUrl><![CDATA[https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=3376526623,269356942&fm=27&gp=0.jpg]]></PicUrl>
			// 		<Url><![CDATA[http://www.baidu.com]]></Url>
			// 		</item>
			// 		<item>
			// 		<Title><![CDATA[非常牛逼的图片2]]></Title>
			// 		<Description><![CDATA[大2]]></Description>
			// 		<PicUrl><![CDATA[https://ss0.bdstatic.com/94oJfD_bAAcT8t7mm9GUKT-xh_/timg?image&quality=100&size=b4000_4000&sec=1510962830&di=b687f449e8b7b9ac54621abb8d529960&src=http://img1.50tu.com/meinv/xinggan/2013-11-16/e65e7cd83f37eed87067299266152807.jpg]]></PicUrl>
			// 		<Url><![CDATA[http://www.baidu.com]]></Url>
			// 		</item>
			// 		</Articles>
			// 		</xml>';



			//搜索
			// add('#011',$res->FromUserName);
			// $str = '<xml>
			// 		<ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
			// 		<FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
			// 		<CreateTime>'.time().'</CreateTime>
			// 		<MsgType><![CDATA[text]]></MsgType>
			// 		<Content><![CDATA[请输入想表白的内容，或取消]]></Content>
			// 		</xml>';

			// 图片
			$str = '<xml>
			<ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
			<FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
			<CreateTime>'.time().'</CreateTime>
			<MsgType><![CDATA[image]]></MsgType>
			<Image>
			<MediaId><![CDATA[BoMRRxv-irKfYMlyNsFhd6lQUOfElO9OkPzqXQAT3fQ25M3XS93iZhoJhL_6c0f8]]></MediaId>
			</Image>
			</xml>';


			// $http = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx65c96fa613ac4f0e&redirect_uri='.urlEncode('http://47.95.198.52/weixin/biaobai/shouquan.php').'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
			// echo file_get_contents($http);
		}

		echo $str;
	}


}

//添加当前事件所对应的信息
function add($number,$open_id,$user_name='',$content=''){

	$pdo = new PDO('mysql:host=127.0.0.1;dbname=weixin','root','root');

	$sql = 'INSERT INTO number(`number`,`open_id`,`user_name`,`add_time`,`content`) VALUES("'.$number.'","'.$open_id.'","'.$user_name.'","'.date('Y-m-d H:i:s').'","'.$content.'")';

	$pdo->exec($sql);
}

//搜索
function get($open_id){
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=weixin','root','root');

	$sql = "SELECT * FROM number WHERE open_id = '$open_id' ORDER BY add_time DESC";

	$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

	return $result;
}

function up($id,$content,$number){
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=weixin','root','root');

	$sql = "UPDATE number SET content = '$content',number='$number' WHERE id = '$id'";

	$pdo->exec($sql);
}

function get_name($user_name){
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=weixin','root','root');

	$sql = "SELECT * FROM number WHERE user_name LIKE '%$user_name%' ORDER BY add_time DESC";

	$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

	return $result;
}