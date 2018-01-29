<?php

namespace backend\controllers;

use yii;

use yii\web\Session;

use yii\helpers\Url;
use app\models\AuthAssignment;
/** 公共模型 */
class CommonController extends \yii\web\Controller
{

	/** 公共防非法登录 */
    public function init()
    {
    	$admin = Yii::$app->session['admin_id'];

    	if (empty($admin)) {
    		return $this->redirect(['/login/login']);die;
    		// return Yii::app()->runController('login/login');
    		// return Yii::$app->getResponse()->redirect(['login/login']);
    	}

    }

    /** 权限认证 */
    public function beforeAction($action)
    {
        $admin = Yii::$app->session['admin_id'];
        $data = AuthAssignment::find()->where(['user_id' => $admin['id']])->asArray()->one();

        if ($data['item_name'] == '总管理员') {
            return true;
        }else{
            $action = yii::$app->controller->id.'/'.yii::$app->controller->action->id;

            if (Yii::$app->user->can($action)) {
                return true;
            }else{
                echo"<script>alert('对不起，您现在还没获此操作的权限');location.href=history.back()</script>";die;
            }
        }

    }

}
