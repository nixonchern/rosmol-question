<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\gii\QuestionAnswer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="question-answer-test-question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'question')->textarea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton('Проверить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php 
    if($result){
        if($result['success']){
            Yii::$app->session->setFlash('success', $result['ans']);
        }
        else{
            Yii::$app->session->setFlash('error', $result['guess']);
        }
    } 
    ?>

</div>
