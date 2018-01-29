<?php

namespace backend\controllers;

use Yii;
use app\models\LogininfoForm;
use yii\web\UploadedFile;

class LogininfoController extends \yii\web\Controller
{

    public function actionShow()
    {
        $model = new LogininfoForm();
        $data = Yii::$app->request->post();
        if (!empty($data)) {

            $model->file_upload = UploadedFile::getInstance($model, 'file_upload');
            if ($model->upload()) {
                echo 1;die;
                return;
            }
        }

        return $this->render('show', ['model' => $model]);
    }


}
