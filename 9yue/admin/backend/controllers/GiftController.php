<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\Gift;

class GiftController extends Controller
{


    public function actionIndex()
    {


        // return $this->render('index');
    }

    /** [actionAdd 添加礼物] */
    public function actionAdd()
    {

        $model = new Gift();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // 验证 $model 收到的数据
            $model = new Gift();

            $data = Yii::$app->request->post();
            // 接收文件上传数据
            $arr =  $model->img = UploadedFile::getInstance($model,'img');

            if ($model->upload()) {
                // 文件上传成功
                // 添加数据入库
                $img = $arr->name;
                $model->name = $data['name'];
                $model->img = $img;
                $model->money = $data['money'];
                $res = $model->save();
                if ($res) {
                    // 添加成功跳转展示页面
                    return $this->redirect(['list']);
                }
            }


        } else {
            // 无论是初始化显示还是数据验证错误
            return $this->render('add', ['model' => $model]);
        }


    }

    public function actionAdds(){

    }

    public function actionList()
    {
        // 查询所有的礼物
        $data = Gift::find()->asArray()->all();

        return $this->render('list', ['data' => $data]);
    }

}
