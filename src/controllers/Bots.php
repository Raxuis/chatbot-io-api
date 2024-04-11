<?php

namespace App\Controllers;

use App\Models\BotModel;

class Bots extends Controller
{
  protected object $bots;

  public function __construct($params)
  {
    $this->bots = new BotModel();

    parent::__construct($params);
  }
  public function postBots()
  {
    return $this->bots->addBot();
  }
  public function getBots()
  {
    return $this->bots->getAll();
  }
}
