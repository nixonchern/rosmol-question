<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\gii\UnansweredQuestions $model */

$this->title = 'Создание ответа для вопроса';
$this->params['breadcrumbs'][] = ['label' => 'Вопросы без ответа', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Создание ответа на вопрос';
?>
<div class="unanswered-questions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelOld' => $modelOld,
        'model' => $model,
    ]) ?>

</div>
