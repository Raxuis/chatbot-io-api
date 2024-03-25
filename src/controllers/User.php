<?php

namespace App\Controllers;

class User
{

  protected array $params;

  public function __construct($params)
  {
    $this->params = $params;
    $this->run();
  }

  private function getUser(): void
  {
    echo json_encode([
      'firstName' => 'Eliott',
      'lastName' => 'Alderson',
      'promo' => 'B1',
      'school' => 'Coda'
    ]);
  }

  protected function run(): void
  {
    $this->getUser();
  }
}
