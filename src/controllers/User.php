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

  private function postUser(): void
  {
    echo json_encode([
      'message' => 'Created !',
    ]);
  }

  private function putUser(): void
  {
    echo json_encode([
      'message' => 'Updated !',
    ]);
  }

  private function deleteUser(): void
  {
    echo json_encode([
      'message' => 'Deleted !',
    ]);
  }

  protected function header(): void
  {
      header('Access-Control-Allow-Origin: *');
      header("Content-type: application/json; charset=utf-8");
  }

  protected function run(): void
  {
    $this->header();

    $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
    $method = $requestMethod . 'User';

    if (method_exists($this, $method)) {
      $this->$method();
    } else {
      header("HTTP/1.0 405 Method Not Allowed");
      echo json_encode([
        'message' => 'Method Not Allowed',
        'code' => '405'
      ]);
    }
  }
}
