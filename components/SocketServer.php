<?php

namespace app\components;

use Workerman\Worker;
use Channel\Client;
use Channel\Server;
use yii\helpers\Json;

class SocketServer {
    
    public $port = 8082;
    
    public $channel;
    
    public $channelPort = 2233;
    
    public $worker;
    
    public $connections = [];
    
    public function __construct($port, $channelPort)
    {
        $this->port = $port;
        $this->channelPort = $channelPort;
    
        if (PHP_OS !== 'WINNT') {
            $this->channel = new Channel\Server('0.0.0.0', $this->channelPort);
        }
        
        $this->worker = new Worker('websocket://0.0.0.0:' . $this->port['port']);
        
        $this->worker->onWorkerStart = function ($worker) {
            Client::connect('127.0.0.1', $this->channelPort);
            
            Client::on('sendMessage', function ($data) {
                foreach ($this->connections as $connection) {
                    $connection->send($data['message']);
                }
            });
        };
        
        $this->worker->onConnect = function($connection) {
            $this->connections[$connection->id] = $connection;
        };
        
        $this->worker->onMessage = function ($connection, $message) {
            $message = Json::decode($message);
        };
        
        $this->worker->onClose = function($connection) {
            unset($this->connections[$connection->id]);
        };
        
    }
    
}