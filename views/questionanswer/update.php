<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\gii\QuestionAnswer $model */

$this->title = 'Изменить вопрос-ответ: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Таблица вопрос-ответ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="question-answer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
