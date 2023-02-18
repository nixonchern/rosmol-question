<?php

namespace app\models\stt;

use yii\base\Model;

class Stt extends Model
{
    
    const API_URL = 'https://stt.api.cloud.yandex.net/speech/v1/stt:recognize?lang=ru-RU';
    
    public function recognize($file)
    {
        $url = self::API_URL . '&folderId=' . \Yii::$app->params['yandex']['folderId'];
        $authToken = \Yii::$app->params['yandex']['Iam'];
    }
    
}