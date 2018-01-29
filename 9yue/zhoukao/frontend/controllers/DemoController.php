<?php

namespace frontend\controllers;
use yii;
use app\models\Z_user;

class DemoController extends \yii\web\Controller
{
	/** 展示电话和密码 */
    public function actionLogin()
    {
        return $this->render('login');
    }

    /** 添加电话和密码 */
    public function actionAdd(){

    	$data = yii::$app->request->post();
    	$user = new Z_user;
    	$user->tel = $data['tel'];
    	$user->pwd = $data['pwd'];
    	$res = $user->save();

    	if ($res) {
    		$_SESSION['tel'] = $data['tel'];
    		$this->redirect(['demo/adddo']);
    	}
    }

    /** 展示添加用户信息页面  */
    public function actionAdddo(){
    	if (!isset($_SESSION['name'])) {
    		return $this->render('adddo');
    	}else{
    		$res = Z_user::find()->where(['name'=>$_SESSION['name']])->asArray()->one();
    		return $this->render('adddo',['data'=>$res]);
    	}

    }

    /** 修改用户信息 */
    public function actionAddt(){
    	$data = yii::$app->request->post();

    	$info = Z_user::find()->where(['tel'=>$_SESSION['tel']])->asArray()->one();

    	$user = yii::$app->db->createCommand("update z_user set name = '".$data['name']."',shengri = '".$data['shengri']."',address = '".$data['address']."'")->execute();

    	if ($user) {
    		$_SESSION['name'] = $data['name'];
    		$this->redirect(['demo/type']);
    	}
    }

    /** 展示分类页面 */
    public function actionType(){
    	return $this->render('type');
    }

    /** 处理分类添加 */
    public function actionTypeadd(){
    	$data = yii::$app->request->get('name');

    	$type = rtrim($data,',');

    	$user = Z_user::find()->where(['name'=>$_SESSION['name']])->asArray()->one();
    	if ($type != $user['address']) {
    		$user->type = $type;


    		echo  $user->save();
    	}else{
    		echo 1;
    	}

    }

    public function a()
    {
    //     定义基本表语句
    // 语法：
    // USE 数据库名 CREATE TABLE 表名 (列名 类型(大小) DEFAULT'默认值',
    //                                                      列名 类型(大小) DEFAULT'默认值',  
    //                                                      列名 类型(大小) DEFAULT'默认值',
    //                                                      ... ...);
    // 注：绿色部份是可以省略的。
    // 例：CREATE TABLE S (SNO char(2), SNAME char(8), AGE decimal(2), SEX char(2) DEFAULT'男', DEPT char(2));
    //       创建了一个五列的表，其中第四列的默认值为‘男’。
    }
}
