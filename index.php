<?php

require 'vendor/autoload.php';

use App\Router;
use App\Controllers\Message;
use App\Controllers\Messages;
use App\Controllers\User;
use App\Controllers\Users;
use App\Controllers\Bots;


new Router([
  'user/:id' => User::class,
  'users' => Users::class,
  'bots' => Bots::class,
  'message/:id' => Message::class,
  'message' => Message::class,
  'messages' => Messages::class
]);
