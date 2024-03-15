<?php

namespace App;

class Router
{
  public array $routes = [];
  public array $userRoute = [];

  public function __construct(array $availableRoutes = array(), array $route = array())
  {
    $this->setAvailableRoutes($availableRoutes);
    $this->setRoute($route);
    $this->run();
  }

  private function setAvailableRoutes($availableRoutes)
  {
    $this->routes = $availableRoutes;
  }
  private function setRoute($route)
  {
    $this->userRoute = $route;
  }
  public function getAvailableRoutes()
  {
    $formattedRoutes = '';
    foreach ($this->routes as $route) {
      $baseUrl = "- localhost:8080";
      $url = $route['url'][0] === '/' ? $route['url'] : '/' . $route['url'];
      $formattedRoutes .= $baseUrl . $url . " <br> ";
    }
    return rtrim($formattedRoutes, " <br>");
  }

  public function getRoute()
  {
    return $this->userRoute;
  }
  public function startController()
  {
    "Your route :" . print_r($this->getRoute()) . "<br/>";
    $matchedRoute = null;
    foreach ($this->routes as $route) {
      $pattern = str_replace('/', '\/', $route['url']);
      $pattern = preg_replace('/:(\w+)/', '(\w+)', $pattern);
      $pattern = "/^$pattern$/";

      if (preg_match($pattern, $_SERVER['REQUEST_URI'], $matches)) {
        $matchedRoute = $route;
        break;
      }
    }
    if ($matchedRoute) {
      echo "Route correspondante trouvée :
    <pre>" . print_r($matchedRoute, true) . "</pre>";
    } else {
      echo "Aucune route correspondante trouvée.";
    }
  }
  private function run()
  {
    $this->startController();
  }
}
