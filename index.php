<?php

require 'vendor/autoload.php';


use App\Router;
use App\Controllers\User;
use App\Controllers\Message;

new Router([
  'user/:id' => User::class,
  'message/:id' => Message::class
]);
