<?php

namespace app\controllers;

use app\controllers\qaTrait\QaTrait;
use app\models\Chats;
use yii\web\Controller;

class ChatController extends Controller
{
    use QaTrait;
    
    public function behaviors()
    {
        $behaviors = parent::behaviors();
    
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Allow' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Allow-Credentials' => null,
                'Access-Control-Max-Age' => 86400,
                'Access-Control-Expose-Headers' => []
            ]
    
        ];
        return $behaviors;
    }
    
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    
    public function actionHistory(int $chatId = 1)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    
        return Chats::find()->where(['idChat' => $chatId])->all();
    }
}