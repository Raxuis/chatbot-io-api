<?php

namespace App\Controllers;

class User {

  protected array $params;

  public function __construct($params) {
    $this->params = $params;
    $this->run();
  }

  protected function run(): void
  {
    var_dump($this->params);
    echo 'user';
  }
}
