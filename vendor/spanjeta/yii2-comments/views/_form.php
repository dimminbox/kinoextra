<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user')->textInput() ?>
    <?= $form->field($model, 'content')->textarea(['rows' => 2]) ?>
    <?= $form->field($model, 'rating')->radioList([1,2,3,4,5,6,7,8,9,10]) ?>
    
    <?=
    $form->field($model, 'reCaptcha', ['template' => '{input}'])->widget(
            \himiklab\yii2\recaptcha\ReCaptcha::className()
            //['widgetOptions'=>['class'=>'pull-right']]
    )
    ?>

    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Написать') : Yii::t('app', 'Написать'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


<?php ActiveForm::end(); ?>

</div>
