<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use GuzzleHttp\Client;
use yii\console\Controller;
use yii\console\ExitCode;
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
        echo "send json" . "\n";
        return ExitCode::OK;
    }
    
    public function actionTest()
    {
        $client = new Client();
        $res = $client->post('http://localhost:8080/guess', [
            'headers' => ['Content-type' => 'application/json'],
            'body' => Json::encode([
                'guess' => 'Погода в ставрополе'
            ])
        ]);
        echo $res->getBody();
    }
}
