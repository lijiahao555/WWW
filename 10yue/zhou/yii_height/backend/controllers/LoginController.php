<?php

namespace backend\controllers;

use yii;
// use yii\redis\Cache;
use app\models\LoginmodelLogin as login;
use app\models\Weixin;

class LoginController extends \yii\web\Controller
{
    public function actionAaa()
    {
        // Yii::$app->redis->set('test','111');
        echo Yii::$app->redis->rpop('aa');
        die;
        // Yii::$app->redis->set('a','12345');
        // Yii::$app->cache->set('test', 'hehe..');
    }
    /** 展示登录 */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /** 注册 */
    public function actionLogindo()
    {

    	$post = yii::$app->request->post();
    	$data = login::find()->where(['username' => $post['username'], 'password' => md5($post['password'])])->asArray()->one();

    	if (!empty($data)) {
            $session = Yii::$app->session;
            $id = rand(100,555);
            $session->set('id',['id' => $id, 'username' => $data['username']]);

    		$weixin = new weixin;
    		$weixin->appid = "$id";
    		$weixin->appsecret = $data['password'];

    		$weixin->save();

    		return $this->redirect(['register/add']);
    	} else {
    		echo "<script>alert('账号或密码不对');location.href=history.back()</script>";
    	}
    }
}
