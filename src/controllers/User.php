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

  private function createUser(): void
  {
    echo json_encode([
      'message' => 'Created !',
    ]);
  }

  private function updateUser(): void
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

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $this->getUser();
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->createUser();
    } else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
      $this->updateUser();
    } else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
      $this->deleteUser();
    }
  }
}
