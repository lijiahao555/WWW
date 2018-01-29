<?php

namespace backend\controllers;
use yii\data\Pagination;

class SeachController extends \yii\web\Controller
{
    public function actionIndex()
    {



        //分页读取类别数据
        $model = Article::find()->with('cate');
        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $model->count(),
        ]);

        $model = $model->orderBy('id ASC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'model' => $model,
            'pagination' => $pagination,
        ]);
    }

}
