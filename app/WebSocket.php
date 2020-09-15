<?php

namespace App;

use Workerman\Worker;

class WebSocket
{
    public static function run()
    {
        $protocol = empty(getenv('WS_PROTOCOL')) ? 'websocket' : getenv('WS_PROTOCOL');
        $host = empty(getenv('WS_HOST')) ? 'localhost' : getenv('WS_HOST');
        $port = empty(getenv('WS_PORT')) ? '5000' : getenv('WS_PORT');

        $worker = new Worker($protocol . '://' . $host . ':' . $port);

        $worker->onConnect = function ($connection) {
            echo "New connection\n";
        };

        $worker->onMessage = function ($connection, $data) {
            echo "New message: " . $data . "\n";
            $connection->send('pong');
        };

        $worker->onClose = function ($connection) {
            echo "Connection closed\n";
        };

        Worker::runAll();
    }
}
