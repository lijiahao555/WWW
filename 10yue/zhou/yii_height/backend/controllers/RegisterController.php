<?php

namespace backend\controllers;

use yii;

use app\models\LoginmodelLogin as login;
use app\models\Weixin;

class RegisterController extends \yii\web\Controller
{
    public function actionAdd()
    {
    	$session = yii::$app->session;
    	$id = $session->get('id');
    	$data = Weixin::find()->where(['appid'=>$id['id']])->asArray()->one();

        return $this->render('add',$data);
    }

    public function actionAddym()
    {
    	if (!empty($post = yii::$app->request->post())) {

    		$data = Weixin::find()->where(['appid' => $post['appid'], 'appsecret' => $post['appsecret']])->asArray()->one();


    		if (!empty($data)) {

    			$weixin = Weixin::findOne($data['id']);
    			$weixin->url = $post['url'];
    			$res = $weixin->save();

    			if ($res) {
    				echo "<script>alert('添加成功');location.href=history.back()</script>";
    			}

    		}

    	} else {


            //展示视图
    		$get = yii::$app->request->get();

    		return $this->render('addym',$get);
    	}

    }
}
