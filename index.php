<?php

require 'vendor/autoload.php';

use App\Router;
use App\Controllers\Message;
use App\Controllers\Messages;
use App\Controllers\User;
use App\Controllers\Users;
use App\Controllers\Bots;
use App\Controllers\Bot;


new Router([
  'user/:id' => User::class,
  'users' => Users::class,
  'bot/:id' => Bot::class,
  'bots' => Bots::class,
  'message/:id' => Message::class,
  'message' => Message::class,
  'messages' => Messages::class
]);
