<?php

namespace frontend\controllers;
use yii;

use app\models\Content;

class UserController extends \yii\web\Controller
{
    public function actionUser()
    {

        $code = yii::$app->request->get();

        // 获取access_token
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx65c96fa613ac4f0e&secret=5a62ea768f0ab48cd9e7a289515ae953&code='.$code['code'].'&grant_type=authorization_code';

        $access_token = $this->get($url);

        $access_token = json_decode($access_token,true);

        // 获取用户信息
        $user_info = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token['access_token'].'&openid='.$access_token['openid'].'&lang=zh_CN';

        $user_info = $this->get($user_info);

        $user_info = json_decode($user_info,true);
        $user_info['openid'] = $access_token['openid'];


        return $this->render('user',['data'=>$user_info]);

        
    }

    public function actionAddmsg()
    {
    	if (!empty($post = yii::$app->request->post())) {

    		$res = Yii::$app->db->createCommand()->insert('content', [
			    'content' => $post['content'],
			    'openid' => $post['openid'],
			    'time' => strtotime($post['time']),
			    'type' => 1,
			])->execute();
    		var_dump($res);die;
    	} else {
    		$get = yii::$app->request->get();

    		return $this->render('user2', ['data'=>$get]);
    	}
    }

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
