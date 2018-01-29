<?php

namespace frontend\controllers;
use yii;
class DemoController extends \yii\web\Controller
{
	public function beforeAction($action)
	{
		$action = yii::$app->controller->id.'/'.yii::$app->controller->action->id;
		if ($action=='site/login' || $action=='site/regist' || $action=='site/error') {
			return true;
		}
		if (\Yii::$app->user->can($action)) {
			return true;
		}else{
			echo"<script>alert('对不起，您现在还没获此操作的权限')</script>";die;
		}
	}

    public function actionAdd()
    {
        return $this->render('add');
    }

}
