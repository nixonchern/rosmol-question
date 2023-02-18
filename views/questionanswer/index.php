<?php
/** @var yii\web\View $this */
use yii\grid\GridView;

$this->title = 'My Yii Application';
?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'tableOptions' => [
        'class' => 'table table-striped table-bordered'
    ],
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn'
        ],
        [
            'attribute'=>'id',
        ],
        [
            'attribute'=>'question',
        ],
        [
            'attribute'=>'answer',
        ],
   ],
]); ?>
