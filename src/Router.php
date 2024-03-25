<?php

namespace App;

class Router {
  protected array $routes;
  protected string $url;

  public function __construct(array $routes) {
    $this->routes = $routes;
    $this->url = $_SERVER['REQUEST_URI'];
    $this->run();
  }

  protected function extractParams($url, $rule): array
  {
    (array) $params = [];
    (array) $urlParts = explode('/', trim($url, '/'));
    (array) $ruleParts = explode('/', trim($rule, '/'));

    foreach ($ruleParts as $index => $rulePart) {
      if (strpos($rulePart, ':') === 0 && isset($urlParts[$index])) {
        $paramName = substr($rulePart, 1);
        $params[$paramName] = $urlParts[$index];
      }
    }

    return $params;
  }

  protected function matchRule($url, $rule): bool
  {
    (array) $urlParts = explode('/', trim($url, '/'));
    (array) $ruleParts = explode('/', trim($rule, '/'));

    if (count($urlParts) !== count($ruleParts)) {
      return false;
    }

    foreach ($ruleParts as $index => $rulePart) {
      if ($rulePart !== $urlParts[$index] && strpos($rulePart, ':') !== 0) {
        return false;
      }
    }

    return true;
  }

  protected function run(): void
  {
   (string) $url = parse_url($this->url, PHP_URL_PATH);

    foreach ($this->routes as $route => $controller) {
      if ($this->matchRule($url, $route)) {
        (array) $params = $this->extractParams($url, $route);
//        var_dump($params);
      }
    }
  }
}
