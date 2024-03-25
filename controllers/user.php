<?php

namespace App\Controllers;

class User {

  public function __construct() {
    $this->run();
  }

  protected function run(): void
  {
    echo 'user';
  }
}
