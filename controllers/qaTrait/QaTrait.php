<?php

namespace app\controllers\qaTrait;

use app\models\gii\UnansweredQuestions;
use app\models\NeuralNetwork;
use app\models\stt\Stt;
use Yii;
use yii\web\UploadedFile;

trait QaTrait {
    
    public function actionMessageQuestion()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $message = \Yii::$app->request->post('message');
        $nn = new NeuralNetwork();
        $ans = $nn->guess($message);
        if (!$ans) {
            $model = new UnansweredQuestions();
            $model->question = $message;
            $model->save();
            return [
                'success' => false,
            ];            
        }
        
        return [
            'success' => true,
            'ans' => $ans
        ];
    }
    
    public function actionVoiceQuestion()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $voiceFile = UploadedFile::getInstanceByName('voice');
        if (!$voiceFile) {
            return [
                'success' => false,
            ];
        }
        
        $stt = new Stt();
        $question = $stt->recognize($voiceFile);
        
        if ($question === false) {
            return [
                'success' => false,
            ];
        }
        
        $nn = new NeuralNetwork();
        $ans = $nn->guess($question);
        if (!$ans) {
            return [
                'success' => false,
            ];
        }
    
        return [
            'success' => true,
            'ans' => $ans
        ];
    }
    
}