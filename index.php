<?php
require 'vendor/autoload.php';


use App\Router;

$router = new Router([
  [
    'url' => '/v1/user/:id',
    // 'methods' => ['get', 'put', 'delete']
  ],
  [
    'url' => '/v1/users',
    // 'methods' => ['get', 'put', 'delete']
  ]
], array_slice(explode("/", $_SERVER['REQUEST_URI']), 1));
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