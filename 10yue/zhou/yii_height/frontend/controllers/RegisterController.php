<?php

namespace frontend\controllers;

class RegisterController extends \yii\web\Controller
{
    public function actionAdd()
    {
        return $this->render('add');
    }

}
