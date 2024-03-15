<?php

require 'vendor/autoload.php';

use App\Router;
use App\Controllers\User;

new Router([
  'user/:id' => 'User',
  'message/:id' => 'Message'
]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chatbot IO API</title>
</head>

<body>
</body>

</html>