<?php
use yii\grid\GridView;
echo GridView::widget([
    'dataProvider' => $dataProvider,
    //每列都有搜索框 控制器传过来$searchModel = new ArticleSearch(); 
    //'filterModel' => $searchModel,
    'layout'=> '{items}<div class="text-right tooltip-demo">{pager}</div>',
     'pager'=>[
               //'options'=>['class'=>'hidden']//关闭自带分页
               'firstPageLabel'=>"First",
                'prevPageLabel'=>'Prev',
                'nextPageLabel'=>'Next',
                 'lastPageLabel'=>'Last',
      ],
    'columns' => [
        //['class' => 'yii\grid\SerialColumn'],//序列号从1开始
        // 数据提供者中所含数据所定义的简单的列
        // 使用的是模型的列的数据
        'id',
        'username',
        ['label'=>'文章类别',  /*'attribute' => 'cid',产生一个a标签,点击可排序*/  'value' => 'cate.cname' ],
        ['label'=>'发布日期','format' => ['date', 'php:Y-m-d'],'value' => 'created_at'],
        // 更复杂的列数据
        ['label'=>'封面图','format'=>'raw','value'=>function($m){
         return Html::img($m->cover,['class' => 'img-circle','width' => 30]);
        }],
        [
            'class' => 'yii\grid\DataColumn', //由于是默认类型，可以省略 
            'value' => function ($data) {
                return $data->name; 
                // 如果是数组数据则为 $data['name'] ，例如，使用 

SqlDataProvider 的情形。
            },
        ],
        [
         'class' => 'yii\grid\ActionColumn',
         'header' => '操作', 
         'template' => '{delete} {update}',//只需要展示删除和更新
         /*'headerOptions' => ['width' => '80'],*/
         'buttons' => [
             'delete' => function($url, $model, $key){
                      return Html::a('<i class="glyphicon glyphicon-trash"></i> 删除',
                             ['artdel', 'id' => $key], 
                             ['class' => 'btn btn-default btn-xs',
                              'data' => ['confirm' => '你确定要删除文章吗？',]
                             ]);
             },
            'update' => function($url, $model, $key){
                     return Html::a('<i class="fa fa-file"></i> 更新',
                            ['artedit', 'id' => $key], 
                            ['class' => 'btn btn-default btn-xs']);
             },
            ],
         ],
    ],
]);
?>