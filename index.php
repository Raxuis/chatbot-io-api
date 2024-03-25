<?php

require 'vendor/autoload.php';


use App\Controllers\Message;
use App\Controllers\Messages;
use App\Controllers\User;
use App\Router;

new Router([
  'user/:id' => User::class,
  'message/:id' => Message::class,
  'messages' => Messages::class
]);
