<?php

namespace backend\controllers;

use yii;
use app\models\LoginmodelLogin as login;
use app\models\Weixin;

class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {

       	$get = yii::$app->request->get();

       	// 传入数据不能为空
       	if (empty($get)) {
       		return json_encode(['errorcode'=>'-1', 'text'=>'数据为空'], JSON_UNESCAPED_UNICODE);
       	}

       	//判断appid长度
       	if (strlen($get['appid']) != 3) {
       		return json_encode(['errorcode'=>'1', 'text'=>'appid长度不符合'], JSON_UNESCAPED_UNICODE);
       	}

       	//判断appsecret长度
       	if (strlen($get['appsecret']) != 32) {
       		return json_encode(['errorcode'=>'2', 'text'=>'appsecret长度不符合'], JSON_UNESCAPED_UNICODE);
       	}

       	//搜索appid是否存在
		$appid = Weixin::find()->where(['appid' => $get['appid']])->asArray()->one();

		if (!empty($appid)) {

			//搜索appsecret是否存在
			$appsecret = Weixin::find()->where(['appid' => $get['appid'], 'appsecret' => $get['appsecret']])->asArray()->one();

			if (!empty($appsecret)) {

				//搜索url是否一直
				$url = Weixin::find()->where(['appid' => $get['appid'], 'appsecret' => $get['appsecret'], 'url' =>$_SERVER['HTTP_REFERER']])->asArray()->one();

				if (!empty($url)) {

					//生成token
					$rand = rand(000,555).'abcdefg';

					// 添加时间和token入库
					$weixin = Weixin::findOne($url['id']);
					$weixin->token = $url['appid'].$rand;
					$weixin->token_time = (time()+30);
					$res = $weixin->save();

					if ($res) {
						$data = ['errorcode' => '0', 'access_token' => $url['appid'].$rand, 'expires_in' => 30];

						// 返回数据
						return json_encode($data, JSON_UNESCAPED_UNICODE);
					}

				} else {

					// 返回数据
       				return json_encode(['errorcode'=>'40003', 'text'=>'回调url未设置或错误'], JSON_UNESCAPED_UNICODE);

				}

			} else {

				// 返回数据
       			return json_encode(['errorcode'=>'40002', 'text'=>'appsecret错误'], JSON_UNESCAPED_UNICODE);

			}
		} else {

			// 返回数据
       		return json_encode(['errorcode'=>'40001', 'text'=>'appid错误'], JSON_UNESCAPED_UNICODE);

		}


    }

}
