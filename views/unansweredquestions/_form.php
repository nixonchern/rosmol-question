<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\gii\UnansweredQuestions $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="unanswered-questions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelOld, 'id')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'question')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
