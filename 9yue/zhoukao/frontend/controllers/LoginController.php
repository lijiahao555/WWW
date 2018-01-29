<?php

namespace frontend\controllers;

use yii;
use app\models\Login;

class LoginController extends \yii\web\Controller
{

	public $layout = false;

    public function actionLogin()
    {
    	$num = yii::$app->request->get('num');
    	$time = yii::$app->request->get('time');

    	if (empty($num)) {

	    	return $this->render('login');

    	}else{

    		if ($num!=3) {

	    		return $this->render('login',['num'=>$num,'time'=>$time]);

    		}else{

	    		return $this->render('login',['num'=>$num]);

    		}

    	}
    }

    public function actionLogindo(){

    	$data = yii::$app->request->post();

    	$login = Login::find()->where(['name'=>$data['username'] , 'pwd'=>$data['password']])->asArray()->one();

    	if (empty($login)) {
    		$time = time();
    			if ($data['num'] == 0) {

	    			return $this->redirect(['login/login','num'=>1,'time'=>$time]);

	    		}else if($data['num'] == 1){

	    			return $this->redirect(['login/login','num'=>2,'time'=>$time]);

	    		}else{

	    			return $this->redirect(['login/login','num'=>3]);

	    		}

    	}else{
    		echo "成功";
    	}

    }

}
