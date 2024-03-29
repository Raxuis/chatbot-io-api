<?php

namespace App\Controllers;

use App\Models\MessageModel;

class Message
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
  public function postMessage()
  {
    $body = (array) json_decode(file_get_contents('php://input'));

    $this->model->add($body);

    return $this->model->getLast();
  }

  public function deleteMessage()
  {
    return $this->model->delete(intval($this->params['id']));
  }

  public function getMessage()
  {
    return $this->model->get(intval($this->params['id']));
  }

  protected
    function run(
  ) {
    $this->header();
    $this->ifMethodExist();
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

    if ($this->reqMethod === 'options') {
      header('Access-Control-Allow-Origin: *');
      header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
      header('Access-Control-Allow-Headers: Content-Type');
      header('Access-Control-Max-Age: 86400');
      header("HTTP/1.1 200 OK");
      exit;
    }

    if (method_exists($this, $method)) {
      header("HTTP/1.0 200 OK");
      echo json_encode($this->$method());
      return;
    }

    header("HTTP/1.0 404 Not Found");

    echo json_encode([
      'code' => '404',
      'message' => 'Not Found'
    ]);
  }

  // protected function getMessage(): array
  // {
  //   return [
  //     'id' => '1',
  //     'message' => 'Bonjour ! Je viens de la base de données',
  //     'author' => 'Mr. Robot',
  //     'bot' => true,
  //     'avatar' => 'https://i.pinimg.com/736x/a3/b3/1a/a3b31a3d62d7643ebd97c49dc8c43ffa.jpg',
  //     'image' => null,
  //     'date' => 1711375196
  //   ];
  // }
}
