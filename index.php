<?php
require 'vendor/autoload.php';

echo "Structure de l'URL : localhost:8080/v1/user/id";

// $_SERVER['REQUEST_METHOD']

$uriArgs = array_slice(explode("/", $_SERVER['REQUEST_URI']), 1);
$apiVersion = $uriArgs[0];
$apiRoute = $uriArgs[1];
$apiArgs = array_slice($uriArgs, 2);

echo "<pre><br>";
echo "API Version: " . $apiVersion . "<br>";
echo "Route: " . $apiRoute . "<br>";
var_dump($apiArgs);
echo "</pre>";

$routes = [
  [
    'url' => '/v1/user/:id',
    'methods' => ['get', 'put', 'delete']
  ],
  [
    'url' => '/v1/user',
    'methods' => ['post']
  ],
  [
    'url' => '/v1/users',
    'methods' => ['get', 'put', 'delete']
  ]
];
