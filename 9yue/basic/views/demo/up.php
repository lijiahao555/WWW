<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php $form = ActiveForm::begin(['action'=>['demo/up'],'method'=>'post']); ?>

    <?= $form->field($model, 'name'])->textInput(['value'=>$data['name']]) ?>

    <?= $form->field($model, 'password')->textInput(['value'=>$data['password']]) ?>

    <?= $form->field($model, 'id')->hiddenInput(['value'=>$data['id']])->label(false) ?>

    <div>
        <?= Html::submitButton('修改', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

