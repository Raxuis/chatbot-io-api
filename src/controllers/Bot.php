<?php

namespace App\Controllers;

use App\Models\BotModel;

class Bot extends Controller
{
  protected object $bot;

  public function __construct($params)
  {
    $this->bot = new BotModel();

    parent::__construct($params);
  }
  public function postBot()
  {
    return $this->bot->add(intval($this->params['id']));
  }
  public function getBot()
  {
    return $this->bot->get(intval($this->params['id']));
  }
}
