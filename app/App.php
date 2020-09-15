<?php

namespace App;

use App\WebSocket;
use Dotenv\Dotenv;

class App
{
    public static function run()
    {
        $dotenv = Dotenv::createUnsafeImmutable(BASE_DIR);
        $dotenv->load();

        WebSocket::run();
    }
}
