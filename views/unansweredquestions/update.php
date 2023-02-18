<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\gii\UnansweredQuestions $model */

$this->title = 'Update Unanswered Questions: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Unanswered Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unanswered-questions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
