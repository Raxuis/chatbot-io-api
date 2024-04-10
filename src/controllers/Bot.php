<?php

namespace App\Controllers;

use App\Models\UserModel;

class Bot extends Controller
{
  protected object $bot;

  public function __construct($params)
  {
    $this->bot = new UserModel();

    parent::__construct($params);
  }
  public function postBot()
  {
    return $this->bot->addBot(intval($this->params['id']));
  }
  public function getBot()
  {
    return $this->bot->getBot(intval($this->params['id']));
  }
}
