<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends Controller
{
  protected object $user;

  public function __construct($params)
  {
    $this->user = new UserModel();

    parent::__construct($params);
  }

  public function postUser()
  {
    $body = (array) json_decode(file_get_contents('php://input'));

    $this->user->add($body);

    return $this->user->getLast();
  }

  public function deleteUser()
  {
    return $this->user->delete(intval($this->params['id']));
  }

  public function getUser()
  {
    return $this->user->get(intval($this->params['id']));
  }
  public function putUser()
  {
    $body = (array) json_decode(file_get_contents('php://input'));

    $this->user->update($body);

    return $this->user->getLast();
  }
}
