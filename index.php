<?php

require 'vendor/autoload.php';

use App\Router;
use App\Controllers\Message;
use App\Controllers\Messages;
use App\Controllers\User;


new Router([
  'user/:id' => User::class,
  'user' => User::class,
  'message/:id' => Message::class,
  'messages' => Messages::class
]);
