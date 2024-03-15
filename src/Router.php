<?php

namespace App;

class Router
{
  public array $routes = [];
  public array $userRoute = [];

  public function __construct(array $availableRoutes, array $route)
  {
    $this->setAvailableRoutes($availableRoutes);
    $this->setRoute($route);
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
}
