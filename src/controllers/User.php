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

  protected function run(): void
  {
    echo json_encode(
      [
        'id' => 1,
        'first_name' => "Elliot",
        'last_name' => "Alderson",
        'email' => "huh@gmail.com",
      ]
    );
  }
}
