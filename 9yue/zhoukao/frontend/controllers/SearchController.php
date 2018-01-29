<?php

namespace frontend\controllers;
use yii\data\Pagination;
use app\models\Article;
use common\models\ArticleSearch;
class SearchController extends \yii\web\Controller
{
    // public function actionIndex()
    // {

    //     //分页读取类别数据
    //     $model = Article::find();
    //     $pagination = new Pagination([
    //         'defaultPageSize' => 2,
    //         'totalCount' => $model->count(),
    //     ]);

    //     $model = $model->orderBy('id ASC')
    //         ->offset($pagination->offset)
    //         ->limit($pagination->limit)->asArray()
    //         ->all();

    //     return $this->render('index', [
    //         'models' => $model,
    //         'pagination' => $pagination,
    //     ]);
    // }
    public function actionIndex()
	{
	  $searchModel = new ArticleSearch();
	  $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

	   return $this->render('index', [
	        'searchModel' => $searchModel,
	        'dataProvider' => $dataProvider,
	    ]);
	 }

}
