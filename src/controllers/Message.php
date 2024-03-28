<?php

namespace App\Controllers;

class Message
{
  protected array $params;
  protected string $reqMethod;

  public function __construct($params)
  {
    $this->params = $params;
    $this->reqMethod = strtolower($_SERVER['REQUEST_METHOD']);

    $this->run();
  }

  protected
  function run(): void
  {
    $this->header();
    $this->ifMethodExist();
  }

  protected function header(): void
  {
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json; charset=utf-8');
  }

  protected
  function ifMethodExist(): void
  {
    $method = $this->reqMethod . 'Message';

    if (method_exists($this, $method)) {
      echo json_encode($this->$method());
      return;
    }

    header("HTTP/1.0 404 Not Found");

    echo json_encode([
      'code' => '404',
      'message' => 'Not Found'
    ]);
  }

  protected function getMessage(): array
  {
    return [
      'id' => '1',
      'message' => 'Bonjour ! Je viens de la base de données',
      'author' => 'Mr. Robot',
      'bot' => true,
      'avatar' => 'https://i.pinimg.com/736x/a3/b3/1a/a3b31a3d62d7643ebd97c49dc8c43ffa.jpg',
      'image' => null,
      'date' => 1711375196
    ];
  }
}
