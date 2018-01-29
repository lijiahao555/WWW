<?php

namespace frontend\controllers;
use Yii;
use app\models\Yk;
use app\models\User;


class WexinController extends \yii\web\Controller
{
	public $layout = false;
    public function actionIndex()
    {

    	header('content-type:text/html;charset=utf8');


    	//设置授权url
    	// $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx65c96fa613ac4f0e&redirect_uri='.urlEncode('http://www.ljiahao.top/admin/frontend/web/index.php?r=wexin/index').'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
    	// echo $url;


    	$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx65c96fa613ac4f0e&secret=5a62ea768f0ab48cd9e7a289515ae953&code='.$_GET['code'].'&grant_type=authorization_code';

    	$access_token = $this->get($url);

    	// $access_token = '{"access_token":"6_tSvCs7eUIy5GOVpXex95kNDf5lPs0X3EQbM4Khup2B2BEA9_5E-F0FyWH_pSHT8h9Pkbqu7ktGFTE_gyuu5biw","expires_in":7200,"refresh_token":"6_8YUK8cvnGWzexcG0RBI6d0DOLmG61bNORPq0QNLv7smrwGI1mB_EEKR7s4siOhjm8cuZmXr8z8g1DGpejgwfSQ","openid":"oTSE21NKWtiE57VQ3OuG2FzpQLys","scope":"snsapi_userinfo"}';

    	$access_token = json_decode($access_token, true);


    	$user_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token['access_token'].'&openid='.$access_token['openid'].'&lang=zh_CN';

    	$info = $this->get($user_url);

    	$user_info = json_decode($info, true);

    	$yk = new Yk();
    	$yk->open_id = $user_info['openid'];
    	$yk->name = $user_info['nickname'];
    	$yk->url = $user_info['headimgurl'];
    	$yk->time = time();
    	$res = $yk->save();

    	$id = $yk->attributes['id'];
    	if ($res) {

    		$str = '';
	    	$string = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'g', 'k', 'i', 'q'];
	    	$len = count($string);
	    	for ($i=0; $i <4 ; $i++) {
	    		$str .= $string[rand(0,$len-1)];
	    	}

	    	$username = 'wx'.date('Ymd').$str;

    		$user = new User();
    		$user->username = $username;
    		$user->password = md5('123456');
    		$user->yk_id = $id;
    		$result = $user->save();

    		$session = Yii::$app->session;
    		$session->set('user_id', $user->attributes['id']);

    		if ($result) {
    			return $this->redirect('?r=wexin/show');
    		}
    	}

    }

    /** 展示后台 */
    public function actionShow()
    {
    	header('content-type:text/html;charset=utf8');

    	$session = Yii::$app->session;
    	$user_id = $session->get('user_id');
    	$user = Yii::$app->db->createCommand('select * from user inner join yk on user.yk_id=yk.id where user.id='.$user_id)->queryOne();
    	$data = Yii::$app->db->createCommand('select * from user inner join yk on user.yk_id=yk.id order by user.id asc')->queryAll();

    	foreach ($data as $key => $v) {

    		$data[$key]['time'] = date('Y-m-d H:i:s', $v['time']);
    	}

    	return $this->render('index', ['data'=> $data, 'user' => $user]);
    }

    public function actionUp()
    {
    	header('content-type:text/html;charset=utf8');
    	if (empty($data = yii::$app->request->post())) {
    		$id = yii::$app->request->get('id');
    		$session = Yii::$app->session;
    		$user_id = $session->get('user_id');
    		$user = Yii::$app->db->createCommand('select * from user inner join yk on user.yk_id=yk.id where user.id='.$user_id)->queryOne();
	    	$data = Yii::$app->db->createCommand('select * from user inner join yk on user.yk_id=yk.id where user.id='.$id)->queryOne();
	    	return $this->render('up', ['data'=> $data, 'user' => $user]);
    	} else {

    		$yk = Yk::findOne($data['id']);
	    	$yk->open_id = $data['open_id'];
	    	$yk->name = $data['name'];
	    	$yk->url = $data['url'];
	    	$yk->time = time();
	    	$res = $yk->save();
	    	if ($res) {
	    		return $this->redirect('?r=wexin/show');
	    	}
    	}

    }


    public function actionUpdate()
    {
    	header('content-type:text/html;charset=utf8');
    	if (empty($data = yii::$app->request->post())) {
    		$id = yii::$app->request->get('id');
    		$session = Yii::$app->session;
    		$user_id = $session->get('user_id');
    		$user = Yii::$app->db->createCommand('select * from user inner join yk on user.yk_id=yk.id where user.id='.$user_id)->queryOne();
	    	$data = Yii::$app->db->createCommand('select * from user where id='.$id)->queryOne();

	    	return $this->render('update', ['data'=> $data, 'user' => $user]);
    	} else {

    		$user = Yii::$app->db->createCommand('select * from user where id='.$data['id'].' and password="'.$data['password'].'"')->queryOne();

    		if (empty($user)) {

    			$user = user::findOne($data['id']);

	    		$user->username = $data['username'];
	    		$user->password = md5($data['password']);
	    		$user->yk_id = $data['id'];
	    		$result = $user->save();
		    	if ($result) {
		    		return $this->redirect('?r=wexin/show');
		    	}
    		}else{

    			echo "<script>alert('密码不能和上次一值');location.href=history.back();</script>";
    		}
    	}

    }

    /** curl get请求 */
    public function get($url = '')
    {
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL, $url);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    	$data = curl_exec($curl);
    	curl_close($curl);
    	return $data;
    }

}
