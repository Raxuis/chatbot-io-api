<?php
require 'vendor/autoload.php';

echo "Structure de l'URL : localhost:8080/v1/user/id";

$uriArgs = array_slice(explode("/", $_SERVER['REQUEST_URI']), 1);
$apiVersion = isset($uriArgs[0]) ? $uriArgs[0] : "none";
$apiRoute = isset($uriArgs[1]) ? $uriArgs[1] : "none";
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
  // [
  //   'url' => '/v1/user',
  //   'methods' => ['post']
  // ],
  [
    'url' => '/v1/users',
    'methods' => ['get', 'put', 'delete']
  ]
];

$matchedRoute = null;

foreach ($routes as $route) {
  $pattern = str_replace('/', '\/', $route['url']);
  $pattern = preg_replace('/:(\w+)/', '(\w+)', $pattern);
  $pattern = "/^$pattern$/";

  if (preg_match($pattern, $_SERVER['REQUEST_URI'], $matches) && in_array(strtolower($_SERVER['REQUEST_METHOD']), $route['methods'])) {
    $matchedRoute = $route;
    break;
  }
}

if ($matchedRoute) {
  echo "Route correspondante trouvée : <pre>" . print_r($matchedRoute, true) . "</pre>";
} else {
  echo "Aucune route correspondante trouvée.";
}
