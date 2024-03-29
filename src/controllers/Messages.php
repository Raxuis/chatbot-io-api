<?php

namespace App\Controllers;

use App\Models\MessageModel;

class Messages
{
  protected array $params;
  protected string $reqMethod;
  protected object $model;

  public function __construct($params)
  {
    $this->params = $params;
    $this->reqMethod = strtolower($_SERVER['REQUEST_METHOD']);
    $this->model = new MessageModel();

    $this->run();
  }

  protected function getMessage()
  {
    return $this->model->getAll();
  }

  protected function header()
  {
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Methods: PUT, DELETE, PATCH, POST, OPTIONS");
    header('Content-type: application/json; charset=utf-8');
  }

  protected function ifMethodExist(): void
  {
    $method = $this->reqMethod . 'Message';

    if (method_exists($this, $method)) {
      header("HTTP/1.1 200 OK");
      echo json_encode($this->$method());
      return;
    }

    header("HTTP/1.0 404 Not Found");

    echo json_encode([
      'code' => '404',
      'message' => 'Not Found'
    ]);
  }

  protected function run()
  {
    $this->header();
    $this->ifMethodExist();
  }
}
