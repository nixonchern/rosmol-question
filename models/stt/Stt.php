<?php

namespace app\models\stt;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Utils;
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
        if (!file_exists($file->tempName)) {
            return false;
        }
        $fileContent = Utils::tryFopen($file->tempName, 'r');
        
        $httpClient = new Client();
        $res = null;
        try {
            $res = $httpClient->request('POST', $url, [
                'headers' => [ 'Authorization' => 'Bearer ' . $authToken],
                'multipart' => [
                    'name' => 'voice.ogg',
                    'contents' => $fileContent
                ]
            ]);
            $res = Json::decode($res->getBody());
        } catch (\Throwable $e) {
            throw new \yii\web\HttpException(404, $e->getTraceAsString());
        }
        
        if (!$res || !array_key_exists('result', $res)) {
            return false;
        }
        
        return $res['result'];
    }
    
}