<?php

namespace app\models\stt;

use GuzzleHttp\Client;
use yii\base\Model;
use yii\helpers\Json;
use yii\web\UploadedFile;

class Stt extends Model
{
    
    const API_URL = 'https://stt.api.cloud.yandex.net/speech/v1/stt:recognize?lang=ru-RU';
    
    /**
     * @param UploadedFile $file
     * @return false|string
     */
    public function recognize($file)
    {
        $url = self::API_URL . '&folderId=' . \Yii::$app->params['yandex']['folderId'];
        $authToken = \Yii::$app->params['yandex']['Iam'];
        $fileContent = file_get_contents($file->tempName);
        if ($fileContent === false) {
            return false;
        }
        
        $httpClient = new Client();
        $res = null;
        try {
            $res = $httpClient->post($url, [
                'headers' => [ 'Authorization' => 'Bearer ' . $authToken],
                'body' => $fileContent
            ]);
            $res = Json::decode($res->getBody());
        } catch (\Throwable $e) {
            return false;
        }
        
        if (!$res || !array_key_exists('result', $res)) {
            return false;
        }
        
        return $res['result'];
    }
    
}