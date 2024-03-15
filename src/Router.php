<?php

namespace App;

class Router
{
  private array $routes = [];
  private array $userRoute = [];

  public function __construct(array $availableRoutes = [], array $route = [])
  {
    $this->setAvailableRoutes($availableRoutes);
    $this->setRoute($route);
    $this->startController();
  }

  private function setAvailableRoutes(array $availableRoutes): void
  {
    $this->routes = $availableRoutes;
  }

  private function setRoute(array $route): void
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
    echo 'Routes disponibles :<br/>' . rtrim($formattedRoutes, " <br>");
  }

  public function getRoute(): array
  {
    return $this->userRoute;
  }

  private function startController(): void
  {
    echo "Votre route : " . print_r($this->getRoute(), true) . "<br/>";
    $this->getAvailableRoutes();
    echo '<br/>';
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
      echo "Route correspondante trouvée :<pre>" . print_r($matchedRoute, true) . "</pre>";
    } else {
      echo "Aucune route correspondante trouvée.";
    }
  }
}
