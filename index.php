<?php

require 'vendor/autoload.php';

include "Router.php";
include "controllers/user.php";

use App\Router;
use App\Controllers\User;

new Router([
  'user/:id' => new User(),
  'message/:id' => 'Message'
]);
