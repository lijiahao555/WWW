<?php

namespace backend\controllers;
use Yii;
use app\models\UploadForm;
use yii\web\UploadedFile;


class UpController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->upload()) {
                echo 1;die;
                return;
            }
        }

        return $this->render('index', ['model' => $model]);

	}
}