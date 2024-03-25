<?php

require 'vendor/autoload.php';


use App\Router;
use App\Controllers\User;

new Router([
  'user/:id' => new User(),
  'message/:id' => 'Message'
]);
