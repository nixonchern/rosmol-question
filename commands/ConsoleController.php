<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\gii\QuestionAnswer;
use app\models\NeuralNetwork;
use yii\console\Controller;
use \GuzzleHttp\Client as GuzzleClient;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ConsoleController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionSend()
    {
        $questionAnswers = QuestionAnswer::find()->asArray()->all();
        $data = ArrayHelper::map($questionAnswers, 'question', 'answer');
        $NeuralNetwork = (new NeuralNetwork)->train($data);
        return (string)$NeuralNetwork;
    }
    
    public function actionTest()
    {
        $client = new GuzzleClient();
        $res = $client->post('http://localhost:8080/guess', [
            'headers' => ['Content-type' => 'application/json'],
            'body' => Json::encode([
                'guess' => 'Погода в ставрополе'
            ])
        ]);
        echo $res->getBody();
    }
}
