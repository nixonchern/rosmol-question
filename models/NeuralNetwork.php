<?php

namespace app\models;

use GuzzleHttp\Client;
use yii\base\Model;
use yii\helpers\Json;

class NeuralNetwork extends Model
{
    
    const URL = 'http://localhost:8080';
    
    public function train($data)
    {
        $httpClient = new Client();
        
        $res = null;
        try {
            $res = $httpClient->post(self::URL . '/train', [
                'headers' => ['Content-type' => 'application/json'],
                'body' => Json::encode($data),
            ]);
            $res = Json::decode($res->getBody());
        } catch (\Throwable $e) {
            return false;
        }
        
        if (!$res || !array_key_exists('status', $res) || !$res['status']) {
            return false;
        }
        
        return true;
    }
    
    public function guess($question)
    {
        $httpClient = new Client();
    
        $res = null;
        try {
            $res = $httpClient->post(self::URL . '/guess', [
                'headers' => ['Content-type' => 'application/json'],
                'body' => Json::encode([
                    'guess' => $question
                ])
            ]);
            $res = Json::decode($res->getBody());
        } catch (\Throwable $e) {
            return false;
        }
        
        if (!$res || !array_key_exists('success', $res) || !$res['success']) {
            return false;
        }
        
        return $res['ans'];
    }
    
}