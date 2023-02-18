<?php

use app\models\gii\QuestionAnswer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */

$this->title = 'Тест вопроса';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-answer-test-question">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-test-question', [
        'model' => $model,
        'result' => $result,
    ]) ?>

</div>
