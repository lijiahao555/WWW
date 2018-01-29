<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php $form = ActiveForm::begin(['action'=>'index.php?r=demo/admin']); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'password') ?>

    <div>
        <?= Html::submitButton('登录', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>