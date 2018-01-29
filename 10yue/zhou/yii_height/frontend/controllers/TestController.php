<?php

namespace frontend\controllers;
use yii;

class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    /** 获取token */
    public function actionTestdo()
    {
    	$post = yii::$app->request->post();

    	$url = 'http://www.b.com/index.php?r=test/index&appid='.$post['appid'].'&appsecret='.$post['appsecret'];

    	$res = $this->getCurl($url);

        return $res;

    }

    /** curl */
    public function getCurl($url = ''){
    	//初始化
     	$curl = curl_init();
     	//设置抓取的url
     	curl_setopt($curl, CURLOPT_URL, $url);
     	//设置头文件的信息作为数据流输出
     	curl_setopt($curl, CURLOPT_HEADER, 0);
     	//设置获取的信息以文件流的形式返回，而不是直接输出。
     	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     	curl_setopt($curl, CURLOPT_REFERER, 'www.a.com');//模拟来路
     	//执行命令
     	$data = curl_exec($curl);
     	//关闭URL请求
     	curl_close($curl);
     	//显示获得的数据
     	return $data;
    }

}
