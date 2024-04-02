<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users
{
  protected array $params;
  protected string $reqMethod;
  protected object $users;

  public function __construct($params)
  {
    $this->params = $params;
    $this->reqMethod = strtolower($_SERVER['REQUEST_METHOD']);
    $this->users = new UserModel();

    $this->run();
  }

  public function postUsers()
  {
    $body = (array) json_decode(file_get_contents('php://input'));

    $this->users->add($body);

    return $this->users->getLast();
  }

  public function deleteUsers()
  {
    return $this->users->delete(intval($this->params['id']));
  }

  public function getUsers()
  {
    return $this->users->getAllUsers();
  }

  protected function header()
  {
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json; charset=utf-8');
  }

  protected function ifMethodExist()
  {
    $method = $this->reqMethod . 'Users';

    if (method_exists($this, $method)) {
      echo json_encode($this->$method());

      return;
    }

    header('HTTP/1.0 404 Not Found');
    echo json_encode([
      'code' => '404',
      'message' => 'Not Found'
    ]);

    return;
  }

  protected function run()
  {
    $this->header();
    $this->ifMethodExist();
  }
}
