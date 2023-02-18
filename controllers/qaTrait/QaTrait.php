<?php

namespace app\controllers\qaTrait;

use app\models\Chats;
use app\models\gii\UnansweredQuestions;
use app\models\NeuralNetwork;
use app\models\stt\Stt;
use Yii;
use yii\web\UploadedFile;

trait QaTrait {
    
    public function actionMessageQuestion(int $chatId = 1)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $message = \Yii::$app->request->post('message');
        $nn = new NeuralNetwork();
        $ans = $nn->guess($message);
        
        $chat = new Chats();
        $chat->idChat = $chatId;
        $chat->dateCreate = date('Y-m-d H:i:s');
        $chat->title = $message;
        $chat->type = 0;
        $chat->save(false);
        
        if (!$ans) {
            $chat = new Chats();
            $chat->idChat = $chatId;
            $chat->dateCreate = date('Y-m-d H:i:s');
            $chat->title = 'Извините, но у меня нет ответа на этот вопрос';
            $chat->type = 1;
            $chat->save(false);
            
            $model = new UnansweredQuestions();
            $model->question = $message;
            $model->save();
            
            return [
                'success' => false,
            ];
        }
        
        $chat = new Chats();
        $chat->idChat = $chatId;
        $chat->dateCreate = date('Y-m-d H:i:s');
        $chat->title = $ans;
        $chat->type = 1;
        $chat->save(false);
        
        return [
            'success' => true,
            'ans' => $ans
        ];
    }
    
    public function actionVoiceQuestion(int $chatId = 1)
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
            $chat = new Chats();
            $chat->idChat = $chatId;
            $chat->dateCreate = date('Y-m-d H:i:s');
            $chat->title = 'Голосовое сообщение';
            $chat->type = 0;
            $chat->save(false);
            
            return [
                'success' => false,
            ];
        }
    
        $chat = new Chats();
        $chat->idChat = $chatId;
        $chat->dateCreate = date('Y-m-d H:i:s');
        $chat->title = $question;
        $chat->type = 0;
        $chat->save(false);
        
        $nn = new NeuralNetwork();
        $ans = $nn->guess($question);
        if (!$ans) {
            $chat = new Chats();
            $chat->idChat = $chatId;
            $chat->dateCreate = date('Y-m-d H:i:s');
            $chat->title = 'Извините, но у меня нет ответа на этот вопрос';
            $chat->type = 1;
            $chat->save(false);
            
            return [
                'success' => false,
            ];
        }
    
        $chat = new Chats();
        $chat->idChat = $chatId;
        $chat->dateCreate = date('Y-m-d H:i:s');
        $chat->title = $ans;
        $chat->type = 1;
        $chat->save(false);
        
        return [
            'success' => true,
            'ans' => $ans
        ];
    }
    
}