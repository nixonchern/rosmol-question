<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\gii\QuestionAnswer $model */

$this->title = 'Создать вопрос-ответ';
$this->params['breadcrumbs'][] = ['label' => 'Таблица вопрос-ответ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-answer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
