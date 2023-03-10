<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Сайт для взаимодействия с посетителями grants.myrosmol.ru</h1>
        
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Вопрос-ответ</h2>

                <p>Содержит в себе все вопросы, которые может задать пользователь и соответствующие ответы</p>

                <p><a class="btn btn-outline-secondary" href="/questionanswer">Вопрос-ответ &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Тест вопроса</h2>

                <p>Можно задать вопрос и узнать, найдёт ли ответ система</p>

                <p><a class="btn btn-outline-secondary" href="/questionanswer/test-question">Тест вопроса &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Вопросы без ответа</h2>

                <p>Вопросы на которые пользователь не смог получить ответ</p>

                <p><a class="btn btn-outline-secondary" href="/unansweredquestions">Вопросы без ответа &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
